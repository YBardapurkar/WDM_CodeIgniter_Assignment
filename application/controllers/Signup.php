<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	// load default page
	public function index() {
		$this->individual();
	}

	// load individual sign up page
	public function individual() {
		$this->load->view('signup_individual_page');
	}

	// load event signup page
	public function event() {
		$this->load->view('signup_event_page');
	}

	// load business signup page
	public function business() {
		$this->load->view('signup_business_page');
	}

}

?>