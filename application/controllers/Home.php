<?php

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Home';
		$data['banners'] = $this->Banner_Model->get_banners();
		$data['popular_classes'] = $this->Classes_Model->get_popular_classes();
		$data['office_number'] = $this->Setting_Model->get_setting_by_key('office_number');
		$about_us_query = $this->db->get_where('gym_pages', array('slug' => 'About-Us'))->row();
		$data['about_us'] = $about_us_query != null ? base64_decode($about_us_query->description) : '';
		$this->load->view('templates/header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}
}
