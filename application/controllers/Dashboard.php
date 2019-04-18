<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->session->has_userdata('id'))
			$this->load->view('dashboard_page');
		else {
			redirect('home_page');
		}
	}
}
