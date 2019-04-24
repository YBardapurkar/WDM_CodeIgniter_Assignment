<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Newsletter_model');
	}

	// GET
	// default, open home page
	public function index() {
		if ($this->session->has_userdata('id'))
			redirect('dashboard');
		else {
			$this->load->view('home_page');
		}
	}

	// POST
	// add email to mailing list
	public function mailList() {
		// todo
		$email = $this->input->post("email");

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('home');
		}

		$this->load->library('email'); 

		$this->email->from('admin@sayitright', 'Say It Right');
		$this->email->to($email);
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if($this->email->send())
			$this->session->set_flashdata("email_sent", "Email sent successfully.");
		else
			$this->session->set_flashdata("error", "Error in sending Email.");

		redirect('home');
	}

}
