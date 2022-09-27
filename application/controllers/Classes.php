<?php

class Classes extends CI_Controller
{

	public function __construct() {
		parent:: __construct();
		$this->load->helper("url");
		$this->load->library("pagination");
	}

    public function index()
    {
        $data['title'] = 'Classes';
		$data['office_number'] = $this->Setting_Model->get_setting_by_key('office_number');

		// Pagination
		$config = array();
		$config["base_url"] = base_url() . "classes";
		$config["total_rows"] = $this->Classes_Model->record_count();
		$config["per_page"] = 2;
		$config["uri_segment"] = 2;

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["classes"] = $this->Classes_Model->fetch_classes($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('classes/index', $data);
		$this->load->view('templates/footer');

    }
}
