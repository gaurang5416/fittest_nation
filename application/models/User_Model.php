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
}
