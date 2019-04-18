<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('User_model');

		$this->load->library('session');
	}

	// load default page
	public function index() {
		$this->individual();
	}

	// load individual sign up page
	public function individual() {
		$this->load->view('signup_individual');
	}

	// load event signup page
	public function event() {
		$this->load->view('signup_event');
	}

	// load business signup page
	public function business() {
		$this->load->view('signup_business');
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

	// signup event
	public function signup_event() {
		$form_data = $this->input->post();

		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_event($firstName, $lastName, $email, $hashed_password);
	}

	// signup business
	public function signup_business() {
		$form_data = $this->input->post();

		$firstName = $this->input->post("firstName");
		$businessType = $this->input->post("businessType");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_business($firstName, $businessType, $email, $hashed_password);
	}

}

?>