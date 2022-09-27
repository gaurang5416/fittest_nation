<?php

class PersonalTrainer extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Personal Trainer';
		$data['office_number'] = $this->Setting_Model->get_setting_by_key('office_number');
		$data['trainers'] = $this->Trainer_Model->get_personal_trainers();
        $this->load->view('templates/header', $data);
        $this->load->view('personal_trainer/index', $data);
        $this->load->view('templates/footer');
    }
}
