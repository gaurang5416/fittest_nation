<?php

class User_Model extends CI_Model
{
	public function register($encrypt_password)
	{
		$result= $this->db->select_max('id')->get('gym_member')->row_array();
		$lastId = $result['id'];
		$lastId = ($lastId != null) ? $lastId + 1 : 01 ;

		$m = date("d");
		$y = date("y");
		$prefix = "M" . $lastId;
		$member_id = $prefix . $m . $y;

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'password' => $encrypt_password,
			'activated' => 1,
			'role_name' => 'member',
			'member_type' => 'Member',
			'member_id' => $member_id,
			'created_date' => date("Y-m-d")
		);

		return $this->db->insert('gym_member', $data);
	}

	public function login($email, $encrypt_password)
	{
		//Validate
		$this->db->where('email', $email);
		$this->db->where('password', $encrypt_password);

		$result = $this->db->get('gym_member');

		if ($result->num_rows() == 1) {
			return $result->row(0);
		} else {
			return false;
		}
	}

	// Check email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('gym_member', array('email' => $email));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	// Get User detail
	public function get_user_detail()
	{
		$result = $this->db->get_where('gym_member', array('id' => $this->session->userdata('user_id')));
		return $result->row_array();
	}

	// Get Membership history
	public function get_membership_history()
	{
		$result = $this->db->select('membership.membership_label, membership_payment.membership_amount, membership_payment.paid_amount, 
            membership_payment.created_date, membership_payment_history.payment_method')
			->from('membership')
			->where('membership_payment.member_id', $this->session->userdata('user_id'))
			->join('membership_payment', 'membership.id = membership_payment.membership_id', 'LEFT')
			->join('membership_payment_history', 'membership_payment.mp_id = membership_payment_history.mp_id', 'LEFT')
			->get();
		return $result->result();
	}

	// Get Class history
	public function get_class_history()
	{
		$result = $this->db->select('class_schedule.class_name, class_schedule.class_fees, class_booking.booking_date, class_booking.payment_by')
			->from('class_booking')
			->where('class_booking.email', $this->session->userdata('email'))
			->join('class_schedule', 'class_booking.class_id = class_schedule.id', 'LEFT')
			->get();
		return $result->result();
	}
}
