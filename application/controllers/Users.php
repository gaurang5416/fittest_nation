<?php

class Users extends CI_Controller
{
	public function dashboard()
	{
		if (!$this->session->userdata('login')) {
			redirect('users/login');
		}
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header');
		$this->load->view('users/dashboard', $data);
		$this->load->view('templates/footer');
	}

	// Log in User
	public function login()
	{
		$type = $this->uri->segment(2);
		$data['title'] = 'Sign In';
		$data['type'] = $type;

		if ($this->session->userdata('login')) {
			redirect('/');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('users/login', $data);
		$this->load->view('templates/footer');
	}

	// Log in User
	public function login_submit()
	{

		$type = $this->uri->segment(2);

		if ($this->session->userdata('login')) {
			redirect('/');
		}

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/login');
			$this->load->view('templates/footer');
		} else {
			// get username and Encrypt Password
			$email = $this->input->post('email');
			$encrypt_password = md5($this->input->post('password'));

			$user_id = $this->User_Model->login($email, $encrypt_password);

			if ($user_id) {
				//Create Session
				$user_data = array(
					'user_id' => $user_id->id,
					'username' => $email,
					'email' => $user_id->email,
					'login' => true
				);

				$this->session->set_userdata($user_data);

				//Set Message
				$this->session->set_flashdata('user_logged_in', 'You are now logged in.');
				if ($type) {
					redirect('/' . $type);
				} else {
					redirect('/');
				}
			} else {
				$this->session->set_flashdata('login_failed', 'Login is invalid.');
				redirect('users/login');
			}
		}
	}

	// Register User
	public function register()
	{
		$type = $this->uri->segment(2);
		$data['title'] = 'Sign Up';
		$data['type'] = $type;
		$this->load->view('templates/header', $data);
		$this->load->view('users/register', $data);
		$this->load->view('templates/footer');

	}

	public function register_submit()
	{

		$type = $this->uri->segment(2);
		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {

			//Encrypt Password
			$encrypt_password = md5($this->input->post('password'));

			$this->User_Model->register($encrypt_password);

			$email = $this->input->post('email');
			$user_id = $this->User_Model->login($email, $encrypt_password);
			if ($user_id) {

				$user_data = array(
					'user_id' => $user_id->id,
					'username' => $email,
					'email' => $user_id->email,
					'login' => true
				);

				$this->session->set_userdata($user_data);
			}

			//Set Message
			$this->session->set_flashdata('user_registered', 'Welcome ' . $this->input->post('first_name') . ' ' . $this->input->post('last_name'));
			if ($type) {
				redirect('/' . $type);
			} else {
				redirect('/');
			}
		}
	}

	public function my_account()
	{
		$data['title'] = 'My account';
		$data['user_data'] = $this->User_Model->get_user_detail();
		$data['currency'] = $this->Setting_Model->get_setting_by_key('currency');
		$data['membership_history'] = $this->User_Model->get_membership_history();
		$data['classes_history'] = $this->User_Model->get_class_history();
		if ($_POST) {

			// Update user
			$member_data = array('first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name'), 'mobile' => $this->input->post('mobile'));
			$this->db->where('id', $this->session->userdata('user_id'))->update('gym_member', $member_data);

			//Set Message
			$this->session->set_flashdata('profile_updated', 'Successfully updated.');
			redirect('/my_account');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('users/my_account', $data);
		$this->load->view('templates/footer');
	}

	public function forgot_password()
	{
		$data['title'] = 'Checkout';
		$this->load->view('templates/header', $data);
		$this->load->view('users/forgot_password', $data);
		$this->load->view('templates/footer');
	}

	// log user out
	public function logout()
	{
		// unset user data
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		//Set Message
		$this->session->set_flashdata('user_logged_out', 'You are logged out.');
		redirect(base_url());
	}

	// Check Email exists
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

		if ($this->User_Model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
