<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Newsletter_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// insert individual user into table
	function subscribe_newsletter($email) {
		$data = array('email' => $email);
		$this->db->insert('newsletter', $data);
	}

}