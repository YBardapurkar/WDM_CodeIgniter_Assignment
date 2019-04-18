<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Contact_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// insert individual user into table
	function enter_feedback($firstName, $lastName, $email, $phone, $message) {
		$data = array('firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'telephone' => $phone, 'message' => $message);
		$this->db->insert('feedback', $data);
	}

}
?>