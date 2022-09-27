<?php

class Membership extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Membership';
		$data['office_number'] = $this->Setting_Model->get_setting_by_key('office_number');
		$data['membership'] = $this->Membership_Model->get_membership();
		$this->load->view('templates/header', $data);
		$this->load->view('membership/index', $data);
		$this->load->view('templates/footer');
	}

	public function save()
	{
		if (!$this->session->userdata('login')) {
			redirect('/');
		}

		$check_membership = $this->db->get_where('gym_member',
			array('selected_membership' => $this->input->post('membership_id'), 'id' => $this->session->userdata('user_id')));
		if (!empty($check_membership->row_array())) {
			$this->session->set_flashdata('already_buy_membership', 'You have already buy this');
			redirect('membership');
		}

		$joining_date = $this->input->post('joining_date');
		$start_date = date("Y-m-d", strtotime($joining_date));

		$query = $this->db->get_where('membership', array('id' => $this->input->post('membership_id')));
		$membership = $query->row_array();

		$period = $membership["membership_length"];
		$end_date = date("Y-m-d", strtotime($start_date . " + {$period} days"));

		$gym_member_data = array(
			'selected_membership' => $membership['id'],
			'membership_status' => 'Continue',
			'membership_valid_from' => $start_date,
			'membership_valid_to' => $end_date
		);

		// Update gym Member
		$this->db->where('id', $this->session->userdata('user_id'))->update('gym_member', $gym_member_data);

		// Add in membership_history
		$membership_history_data = array(
			'member_id' => $this->session->userdata('user_id'),
			'selected_membership' => $membership['id'],
			'membership_valid_from' => $start_date,
			'membership_valid_to' => $end_date,
			'created_date' => date("Y-m-d")
		);
		$this->db->insert('membership_history', $membership_history_data);

		// Add in membership_payment
		$membership_payment_data = array(
			'member_id' => $this->session->userdata('user_id'),
			'membership_id' => $membership['id'],
			'membership_amount' => $membership['membership_amount'],
			'paid_amount' => 0,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'created_date' => date("Y-m-d")
		);
		$this->db->insert('membership_payment', $membership_payment_data);

		$this->session->set_flashdata('save_membership', 'Thank you for buying.');
		redirect('membership');

	}
}
