<?php

class Trainer_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_personal_trainers()
	{
		$query = $this->db->get_where('gym_member', array('role_name' => 'staff_member'));
		return $query->result_array();
	}
}
