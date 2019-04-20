<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Events_model');
	}

	// load 'list of events'
	public function index() {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		} 
		if ($this->session->userdata('role') == 'business') {
			redirect('businesses');
			return;
		} else {
			$rows = $this->Events_model->get_all_events();
			$data = array('rows' => $rows);
			$this->load->view('list_of_events_page', $data);
		}
	}

	// load 'list of my events'
	public function my() {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		} 
		// events for business - none
		if ($this->session->userdata('role') == 'business') {
			redirect('businesses/my');
			return;
		} 
		// events for individual
		else if ($this->session->userdata('role') == 'individual') {
			$rows = $this->Events_model->get_events_of_individual($this->session->userdata('id'));
			$data = array('rows' => $rows);
			$this->load->view('list_of_my_events_page', $data);
		} 
		// events for event
		else if ($this->session->userdata('role') == 'event') {
			$rows = $this->Events_model->get_events_of_event($this->session->userdata('id'));
			$data = array('rows' => $rows);
			$this->load->view('list_of_my_events_page', $data);
		}
	}

	// confirm event (only for individuals)
	public function confirm_event() {
		$eventId = $this->input->post("eventId");
		if ($this->session->userdata('role') != 'individual') {
			redirect('events');
			return;
		}

		$userId = $this->session->userdata('id');

		if ($this->Events_model->check_if_confirmed($userId, $eventId)) {
			echo "sdfsafsadf";
		} else {
			$this->Events_model->confirm_event($userId, $eventId);
			redirect('events/my');
		}
	}

	// remove event (only for individuals)
	public function remove_event() {
		$eventId = $this->input->post("eventId");
		if ($this->session->userdata('role') != 'individual') {
			redirect('events');
			return;
		}

		$userId = $this->session->userdata('id');
		
		$this->Events_model->remove_event($userId, $eventId);
		redirect('events/my');
	}

}