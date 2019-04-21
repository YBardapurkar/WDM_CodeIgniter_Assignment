<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Events_model');
		$this->load->model('Businesses_model');
	}

	// GET
	// default, open dashboard
	public function index() {
		if ($this->session->has_userdata('id')) {
			$events = $this->count_events();
			$totalEvents = $this->count_total_events();
			$businesses = $this->count_businesses();
			$totalBusinesses = $this->count_total_businesses();

			$data = array('events' => $events, 'totalEvents' => $totalEvents, 'businesses' => $businesses, 'totalBusinesses' => $totalBusinesses);

			$this->load->view('dashboard_page', $data);
		} else {
			redirect('home');
		}
	}

	private function count_events() {
		$id = $this->session->userdata('id');
		$role = $this->session->userdata('role');
		if ($role == 'individual') {
			return $this->Events_model->count_events_of_individual($id);
		} else if ($role == 'event') {
			return $this->Events_model->count_events_of_event($id);
		} else {
			return 0;
		}
	}

	private function count_total_events() {
		return $this->Events_model->count_all_events();
	}

	private function count_businesses() {
		$id = $this->session->userdata('id');
		$role = $this->session->userdata('role');
		if ($role == 'business') {
			return $this->Businesses_model->count_businesses_of_business($id);
		} else {
			return 0;
		}
	}

	private function count_total_businesses() {
		return $this->Businesses_model->count_all_businesses();
	}
}
