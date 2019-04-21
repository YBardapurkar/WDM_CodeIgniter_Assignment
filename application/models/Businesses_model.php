<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Businesses_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// get all businesses
	function get_all_businesses() {
		$this->db->select('*');
		$query = $this->db->get('businesses');
		return $query->result();
	}

	// get business by id
	function get_business($businessId) {
		$data = array('id' => $businessId);
		$this->db->select('*');
		$query = $this->db->get_where('businesses', $data);
		return $query->row();
	}

	// get businesses of business
	function get_businesses_of_business($userId) {
		$data = array('createdBy' => $userId);
		$this->db->select('*');
		$query = $this->db->get_where('businesses', $data);
		return $query->result();
	}

	// add business to table
	function add_business($businessName, $businessDescription, $createdBy) {
		$data = array('name' => $businessName, 'description' => $businessDescription, 'createdBy' => $createdBy);
		$this->db->insert('businesses', $data);
	}

	// update business
	function update_business($id, $businessName, $businessDescription) {
		$this->db->set('name', $businessName);
		$this->db->set('description', $businessDescription);
		$this->db->where('id', $id);
		$this->db->update('businesses');
	}

	// delete business
	function delete_business($businessId) {
		$data = array('id' => $businessId);
		$this->db->where($data);
		$this->db->delete('businesses');
	}

	// number of businesses of business
	function count_businesses_of_business($userId) {
		$data = array('createdBy' => $userId);
		$this->db->select('*');
		$query = $this->db->get_where('businesses', $data);
		return $query->num_rows();
	}

	// number of all businesses
	function count_all_businesses() {
		$this->db->select('*');
		$query = $this->db->get('businesses');
		return $query->num_rows();
	}

}