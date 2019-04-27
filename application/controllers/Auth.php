<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('User_model');
	}

	// no default, redirect to dashboard
	public function index() {
		redirect('dashboard');
	}

	// POST
	// login, set session
	public function login() {
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('login');
			return;
		}

		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$user = $this->User_model->login($email);

		if (password_verify($password, $user->password)) {
			$this->session->set_userdata('id', $user->id);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('role', $user->role);
			$this->session->set_userdata('firstName', $user->firstName);
			$this->session->set_userdata('lastName', $user->lastName);

			$this->session->set_flashdata('success', '<p>Logged in</p>');

			redirect('dashboard');
			return;
		}

		$this->session->set_flashdata('error', '<p>Invalid Username/Password</p>');
		redirect('login');
		return;
	}

	// GET, POST
	// logout, clear session
	public function logout() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('firstName');
		$this->session->unset_userdata('lastName');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->sess_destroy();

		$this->session->set_flashdata('success', '<p>Logged Out</p>');
		redirect('home');
	}

	// POST
	// create new individual user
	public function signup_individual() {
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('school', 'School', 'required');
		$this->form_validation->set_rules('placeOfWork', 'Place of Work', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('signup/individual');
			return;
		}

		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$school = $this->input->post("school");
		$placeOfWork = $this->input->post("placeOfWork");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_individual($firstName, $lastName, $school, $placeOfWork, $email, $hashed_password);

		$this->session->set_flashdata('success', '<p>Individual User Created</p>');
		redirect('login');
	}

	// POST
	// create new event user
	public function signup_event() {
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('signup/event');
			return;
		}

		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_event($firstName, $lastName, $email, $hashed_password);

		$this->session->set_flashdata('success', '<p>Event User Created</p>');
		redirect('login');
	}

	// POST
	// create new business user
	public function signup_business() {
		$this->form_validation->set_rules('firstName', 'Name', 'required');
		$this->form_validation->set_rules('businessType', 'Business Type', 'required', array('required' => 'Select a Business Type'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('signup/business');
			return;
		}

		$firstName = $this->input->post("firstName");
		$businessType = $this->input->post("businessType");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_business($firstName, $businessType, $email, $hashed_password);

		$this->session->set_flashdata('success', '<p>Business User Created</p>');
		redirect('login');
	}

}

?>