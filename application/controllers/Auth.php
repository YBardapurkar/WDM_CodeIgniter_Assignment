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

	// login, set session
	public function login() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$user = $this->User_model->login($email);

		if (password_verify($password, $user->password)) {
			$this->session->set_userdata('id', $user->id);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('role', $user->role);
			$this->session->set_userdata('firstName', $user->firstName);
			$this->session->set_userdata('lastName', $user->lastName);

			redirect('home');
		}
	}

	// logout, clear session
	public function logout() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('firstName');
		$this->session->unset_userdata('lastName');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->sess_destroy();

		redirect('home');
	}

	// create new individual user
	public function signup_individual() {
		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$school = $this->input->post("school");
		$placeOfWork = $this->input->post("placeOfWork");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_individual($firstName, $lastName, $school, $placeOfWork, $email, $hashed_password);

		redirect('login');
	}

	// create new event user
	public function signup_event() {
		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_event($firstName, $lastName, $email, $hashed_password);

		redirect('login');
	}

	// create new business user
	public function signup_business() {
		$firstName = $this->input->post("firstName");
		$businessType = $this->input->post("businessType");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$this->User_model->signup_business($firstName, $businessType, $email, $hashed_password);

		redirect('login');
	}

}

?>