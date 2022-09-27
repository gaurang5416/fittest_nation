<?php

class Membership_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_membership()
	{
		$query = $this->db->get('membership');
		return $query->result_array();
	}
}
