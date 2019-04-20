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

	// load 'add event' page
	public function new() {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		}
		if ($this->session->userdata('role') != 'event') {
			redirect('login');
			return;
		}
		$this->load->view('events_add_page');
	}

	// load 'edit event' page
	public function update($eventId) {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		}
		if ($this->session->userdata('role') != 'event') {
			redirect('login');
			return;
		}
		$event = $this->Events_model->get_event($eventId);
		$data = array('row' => $event);
		$this->load->view('events_update_page', $data);
	}

	// confirm event (only for individuals)
	public function confirm_event() {
		$eventId = $this->input->post('eventId');
		if ($this->session->userdata('role') != 'individual') {
			redirect('events');
			return;
		}

		$userId = $this->session->userdata('id');

		if ($this->Events_model->check_if_confirmed($userId, $eventId)) {
			redirect('events');
		} else {
			$this->Events_model->confirm_event($userId, $eventId);
			redirect('events/my');
		}
	}

	// remove event (only for individuals)
	public function remove_event() {
		$eventId = $this->input->post('eventId');
		if ($this->session->userdata('role') != 'individual') {
			redirect('events');
			return;
		}

		$userId = $this->session->userdata('id');

		$this->Events_model->remove_event($userId, $eventId);
		redirect('events/my');
	}

	// add new event (only for event)
	public function add_event() {
		if ($this->session->userdata('role') != 'event') {
			redirect('events/my');
			return;
		}

		$eventName = $this->input->post('eventName');
		$eventDate = $this->input->post('eventDate');
		$eventVenue = $this->input->post('eventVenue');
		$eventDescription = $this->input->post('eventDescription');

		$createdBy = $this->session->userdata('id');
		$timestamp = strtotime($eventDate);

		$this->Events_model->add_event($eventName, date('Y-m-d', $timestamp), $eventVenue, $eventDescription, $createdBy);
		redirect('events/my');
	}

	// update event (only for event)
	public function update_event() {
		$eventId = $this->input->post('eventId');
		if ($this->session->userdata('role') != 'event') {
			redirect('events/my');
			return;
		}

		$eventName = $this->input->post('eventName');
		$eventDate = $this->input->post('eventDate');
		$eventVenue = $this->input->post('eventVenue');
		$eventDescription = $this->input->post('eventDescription');

		$timestamp = strtotime($eventDate);

		$this->Events_model->update_event($eventId, $eventName, date('Y-m-d', $timestamp), $eventVenue, $eventDescription);
		redirect('events/my');
	}

}