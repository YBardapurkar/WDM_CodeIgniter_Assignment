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

	// reset password
	function password_reset($id, $newPassword) {
		$this->db->set('password', $newPassword);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	// login
	function login($email) {
		$data = array('email' => $email);
		$this->db->select('*');
		$this->db->join('roles', 'users.roleId = roles.id');
        $this->db->where($data);
        $query = $this->db->get('users');
        return $query->row();
	}
}