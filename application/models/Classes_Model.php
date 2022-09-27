<?php

class Classes_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_classes()
	{
		$query = $this->db->get_where('class_schedule');
		return $query->result_array();
	}

	public function get_popular_classes()
	{
		$query = $this->db->get_where('class_schedule', array('is_popular' => 1));
		return $query->result_array();
	}

	public function record_count() {
		return $this->db->count_all("class_schedule");
	}

	public function fetch_classes($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get("class_schedule");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
}
