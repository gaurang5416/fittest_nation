<?php

class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
		$data['title'] = $page === 'home' ? 'Triple Five Club' : ucfirst($page);

		if ($page === 'privacy_policy') {
			$privacy_policy_query = $this->db->get_where('gym_pages', array('slug' => 'Privacy-policy'))->row();
			$data['privacy_policy'] = $privacy_policy_query != null ? base64_decode($privacy_policy_query->description) : '';
		}

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function thank_you() {
        $data['title'] = 'Thank you';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/thank_you', $data);
        $this->load->view('templates/footer');
    }
}
