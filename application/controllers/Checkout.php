<?php

class Checkout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('custom');
	}

	public function index()
	{

		if (!$this->session->userdata('login')) {
			redirect('/login');
		}

		$data['title'] = 'Checkout';

		if (isset($_COOKIE["shopping_cart"])) {
			$cookie_data = stripslashes($_COOKIE['shopping_cart']);
			$cart_data = json_decode($cookie_data, true);
		} else {
			$cart_data = [];
		}

		$this->load->view('templates/header', $data);
		if (count($cart_data) > 0) {
			$this->load->view('users/checkout', $data);
		} else {
			$this->load->view('users/cart', $data);
		}
		$this->load->view('templates/footer');
	}

	public function cart()
	{
		$data['title'] = 'Cart';
		$this->load->view('templates/header');
		$this->load->view('users/cart', $data);
		$this->load->view('templates/footer');
	}

	public function addToCart()
	{
		if (isset($_COOKIE["shopping_cart"])) {
			$cookie_data = stripslashes($_COOKIE['shopping_cart']);
			$cart_data = json_decode($cookie_data, true);
		} else {
			$cart_data = array();
		}


		$item_type_list = array_column($cart_data, 'item_type');
		if ($_POST["hidden_type"] === 'membership') {

			// Check if already in cart or not
			if (in_array($_POST["hidden_type"], $item_type_list)) {
				$this->session->set_flashdata('already_added_membership_to_cart', 'You can select only one membership at a time');
				redirect_back();
			} else {

				// Check if already buy or not
				if($this->session->userdata('login')) {
					$check_membership = $this->db->get_where('gym_member', array('selected_membership' => $_POST["hidden_id"], 'id' => $this->session->userdata('user_id')));
					if (!empty($check_membership->row_array())) {
						$this->session->set_flashdata('already_buy_membership', '"'. $_POST["hidden_name"] .'" is already enjoy by you, now you can not book this');
						redirect_back();
					}
				}
			}
		}

		if($_POST["hidden_type"] === 'class') {

			// Check if already buy or not
			if($this->session->userdata('login')) {
				$check_class = $this->db->get_where('class_booking', array('class_id' => $_POST["hidden_id"], 'email' => $this->session->userdata('email')));
				if (!empty($check_class->row_array())) {
					$this->session->set_flashdata('already_buy_class', '"'. $_POST["hidden_name"] .'" is already enjoy by you, now you can not book this');
					redirect_back();
				}
			}
		}

		$item_id_list = array_column($cart_data, 'id_type');
		$hidden_type_id = $_POST["hidden_id"] . '_' . $_POST["hidden_type"];
		if (in_array($hidden_type_id, $item_id_list)) {

			$this->session->set_flashdata('already_added_to_cart', 'Already added into Cart');
			redirect_back();

		} else {
			$item_array = array(
				'item_id' => $_POST["hidden_id"],
				'item_name' => $_POST["hidden_name"],
				'item_price' => $_POST["hidden_price"],
				'item_type' => $_POST["hidden_type"],
				'id_type' => $hidden_type_id
			);
			$cart_data[] = $item_array;
		}

		$item_data = json_encode($cart_data);
		setcookie('shopping_cart', $item_data, time() + (86400 * 30));

		$this->session->set_flashdata('item_added_to_cart', 'Item Added into Cart');
		redirect_back();
	}

	public function removeCart()
	{
		if ($_GET["action"] == "delete") {
			$cookie_data = stripslashes($_COOKIE['shopping_cart']);
			$cart_data = json_decode($cookie_data, true);
			foreach ($cart_data as $keys => $values) {
				if ($cart_data[$keys]['id_type'] == $_GET["id"]) {
					unset($cart_data[$keys]);
					$item_data = json_encode($cart_data);
					setcookie("shopping_cart", $item_data, time() + (86400 * 30));
					redirect_back();
				}
			}
		}
		if ($_GET["action"] == "clear") {
			setcookie("shopping_cart", "", time() - 3600);
			redirect_back();
		}
	}

	public function save()
	{

		if (!$this->session->userdata('login')) {
			redirect('/');
		}

		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);

		// Check Already buy or not
		foreach ($cart_data as $var) {
			if ($var['item_type'] === 'membership') {
				$check_membership = $this->db->get_where('gym_member', array('selected_membership' => $var["item_id"], 'id' => $this->session->userdata('user_id')));
				if (!empty($check_membership->row_array())) {
					$this->session->set_flashdata('already_buy_membership', '"'. $var['item_name'] .'" is already enjoy by you, now you can not book this');
					redirect('cart');
				}
			}
			if ($var['item_type'] === 'class') {
				$check_class = $this->db->get_where('class_booking', array('class_id' => $var["item_id"], 'email' => $this->session->userdata('email')));
				if (!empty($check_class->row_array())) {
					$this->session->set_flashdata('already_buy_class', '"'. $var['item_name'] .'" is already enjoy by you, now you can not book this');
					redirect('cart');
				}
			}
		}

		foreach ($cart_data as $var) {
			if ($var['item_type'] === 'membership') {

				$joining_date = $this->input->post('joining_date');
				$start_date = date("Y-m-d", strtotime($joining_date));

				$query = $this->db->get_where('membership', array('id' => $var['item_id']));
				$membership = $query->row_array();

				$period = $membership["membership_length"];
				$end_date = date("Y-m-d", strtotime($start_date . " + {$period} days"));

				$gym_member_data = array(
					'selected_membership' => $membership['id'],
					'membership_status' => 'Continue',
					'membership_valid_from' => $start_date,
					'membership_valid_to' => $end_date
				);

				// Update gym Member
				$this->db->where('id', $this->session->userdata('user_id'))->update('gym_member', $gym_member_data);

				// Add in membership_history
				$membership_history_data = array(
					'member_id' => $this->session->userdata('user_id'),
					'selected_membership' => $membership['id'],
					'membership_valid_from' => $start_date,
					'membership_valid_to' => $end_date,
					'created_date' => date("Y-m-d")
				);
				$this->db->insert('membership_history', $membership_history_data);

				// Add in membership_payment
				$membership_payment_data = array(
					'member_id' => $this->session->userdata('user_id'),
					'membership_id' => $membership['id'],
					'membership_amount' => $membership['membership_amount'],
					'paid_amount' => $membership['membership_amount'], // Need to check while payment if 0 or not
					'start_date' => $start_date,
					'end_date' => $end_date,
					'created_date' => date("Y-m-d")
				);
				$this->db->insert('membership_payment', $membership_payment_data);
				$mp_id = $this->db->insert_id();

				// Add in membership_payment_history
				$membership_payment_history_data = array(
					'mp_id' => $mp_id,
					'amount' => $membership['id'],
					'payment_method' => $this->input->post('payment_method'),
					'paid_by_date' => date("Y-m-d"),
					'created_by' => $this->session->userdata('user_id')
				);

				$this->db->insert('membership_payment_history', $membership_payment_history_data);

			}
			if ($var['item_type'] === 'class') {

				$joining_date = $this->input->post('joining_date');
				$start_date = date("Y-m-d", strtotime($joining_date));

				$query = $this->db->get_where('gym_member', array('id' => $this->session->userdata('user_id')));
				$member = $query->row_array();
				$class_booking_data = array(
					'full_name' => $member['first_name'] . ' ' . $member['last_name'],
					'mobile_no' => $member['mobile'],
					'email' => $member['email'],
					'class_id' => $var['item_id'],
					'booking_date' => $start_date,
					'booking_type' => 'Demo',
					'created_at' => date("Y-m-d")
				);
				$this->db->insert('class_booking', $class_booking_data);
			}
		}

		setcookie("shopping_cart", "", time() - 3600);
		$this->session->set_flashdata('save_membership', 'Thank you for buying.');
		redirect('my_account');
	}
}
