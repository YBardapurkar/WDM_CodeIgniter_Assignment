<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('url');
	}

	// default
	public function index() {
		redirect('home');
	}

	public function logout() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('firstName');
		$this->session->unset_userdata('lastName');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->sess_destroy();

		redirect('home');
	}
}

?>