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
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));
		$this->form_validation->set_rules('phone', 'Phone', 'regex_match[/^[0-9]{10}$/]', array('regex_match' => 'Phone must have 10 digits'));
		$this->form_validation->set_rules('message', 'Message', 'required|max_length[255]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('contact_page');
			return;
		}

		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$message = $this->input->post("message");

		$this->Contact_model->enter_feedback($firstName, $lastName, $email, $phone, $message);

		redirect('contact');
	}

}
