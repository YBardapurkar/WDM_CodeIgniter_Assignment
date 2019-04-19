<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Event_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// get all events
	function get_all_events() {
		$this->db->select('*');
		$query = $this->db->get('events');
		return $query->result();
	}
}