<?php

class Banner_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_banners()
	{
		$query = $this->db->get('gym_banner');
		return $query->result_array();
	}
}
