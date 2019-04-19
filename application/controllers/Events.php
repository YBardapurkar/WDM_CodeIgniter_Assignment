<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Event_model');
	}

	// load 'list of events'
	public function index() {
		$rows = $this->Event_model->get_all_events();
		$data = array("rows" => $rows);
		$this->load->view('list_of_events_page', $data);
	}

	// load 'list of my events'
	public function my() {
		$this->load->view('list_of_my_events_page');
	}

	// signup individual
	public function signup_individual() {
		$form_data = $this->input->post();

		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$school = $this->input->post("school");
		$placeOfWork = $this->input->post("placeOfWork");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_individual($firstName, $lastName, $school, $placeOfWork, $email, $hashed_password);
	}

}