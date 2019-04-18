<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Contact_model');
	}

	// default, load view
	public function index() {
		$this->load->view('contact_page');
	}

	// add feedback to table
	public function feedback() {
		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$message = $this->input->post("message");

		$this->Contact_model->enter_feedback($firstName, $lastName, $email, $phone, $message);

		redirect('contact');
	}

}
