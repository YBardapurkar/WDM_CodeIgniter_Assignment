<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->session->has_userdata('id'))
			redirect('dashboard');
		else {
			$this->load->view('home_page');
		}
	}

	// add email to mailing list
	public function mailList() {
		// todo
	}
}
