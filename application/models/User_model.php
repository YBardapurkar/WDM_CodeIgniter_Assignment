<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class User_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// insert individual user into table
	function signup_individual($firstName, $lastName, $school, $placeOfWork, $email, $password) {
		$data = array('firstName' => $firstName, 'lastName' => $lastName, 'school' => $school, 'placeOfWork' => $placeOfWork, 'email' => $email, 'password' => $password, 'roleId' => 1);
		$this->db->insert('users', $data);
	}

	// insert event user into table
	function signup_event($firstName, $lastName, $email, $password) {
		$data = array('firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'password' => $password, 'roleId' => 2);
		$this->db->insert('users', $data);
	}

	// insert business user into table
	function signup_business($firstName, $businessType, $email, $password) {
		$data = array('firstName' => $firstName, 'businessType' => $businessType, 'email' => $email, 'password' => $password, 'roleId' => 3);
		$this->db->insert('users', $data);
	}

	// login
	function login($email) {
		$data = array('email' => $email);
		$this->db->select('users.id, users.firstName, users.lastName, users.email, users.password, roles.role');
		$this->db->join('roles', 'users.roleId = roles.id');
		$this->db->where($data);
		$query = $this->db->get('users');
		return $query->row();
	}

	// get profile
	function get_profile($id) {
		$data = array('users.id' => $id);
		$this->db->select('*');
		$this->db->where($data);
		$query = $this->db->get('users');
		return $query->row();
	}

	// update individual profile
	function update_profile_individual($id, $firstName, $lastName, $school, $placeOfWork) {
		$this->db->set('firstName', $firstName);
		$this->db->set('lastName', $lastName);
		$this->db->set('school', $school);
		$this->db->set('placeOfWork', $placeOfWork);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	// update event profile
	function update_profile_event($id, $firstName, $lastName) {
		$this->db->set('firstName', $firstName);
		$this->db->set('lastName', $lastName);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	// update business profile
	function update_profile_business($id, $firstName, $businessType) {
		$this->db->set('firstName', $firstName);
		$this->db->set('businessType', $businessType);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	// reset password
	function password_reset($id, $newPassword) {
		$this->db->set('password', $newPassword);
		$this->db->where('id', $id);
		$this->db->update('users');
	}
}