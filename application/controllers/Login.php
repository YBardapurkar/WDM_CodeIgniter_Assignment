<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('User_model');

		$this->load->database();

		$this->load->helper('url');
	}

	// default
	public function index() {
		$this->load->view('login_page');
	}

	// login
	public function login() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$user = $this->User_model->login($email);

		if (password_verify($password, $user->password)) {

			print_r($user);
			$this->session->set_userdata('id', $user->id);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('role', $user->role);
			$this->session->set_userdata('firstName', $user->firstName);
			$this->session->set_userdata('lastName', $user->lastName);

			redirect('home');
		}
	}
}

?>