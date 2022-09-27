<?php

class Setting_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_setting_by_key($key)
	{
		$query = $this->db->select($key)->from('general_setting');
		return $query->get()->row()->$key;
	}
}
