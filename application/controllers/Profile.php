<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('User_model');
	}

	// load 'list of events'
	public function index() {
		$id = $this->session->userdata('id');
		$user = $this->User_model->get_profile($id);
		$data = array('row' => $user);
		$this->load->view('profile_page', $data);
	}

	// update individual profile
	public function update_profile_individual() {
		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$school = $this->input->post("school");
		$placeOfWork = $this->input->post("placeOfWork");
		$email = $this->input->post("email");

		$id = $this->session->userdata('id');

		$this->User_model->update_profile_individual($id, $firstName, $lastName, $school, $placeOfWork);
		redirect('profile');
	}

	// update event profile
	public function update_profile_event() {
		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");

		$id = $this->session->userdata('id');

		$this->User_model->update_profile_event($id, $firstName, $lastName);
		redirect('profile');
	}

	// update business profile
	public function update_profile_business() {
		$firstName = $this->input->post("firstName");
		$businessType = $this->input->post("businessType");
		$email = $this->input->post("email");

		$id = $this->session->userdata('id');

		$this->User_model->update_profile_business($id, $firstName, $businessType);
		redirect('profile');
	}

	// update profile details
	public function password_reset() {
		$oldPassword = $this->input->post('oldPassword');
		$newPassword = $this->input->post('newPassword');

		$email = $this->session->userdata('email');

		$user = $this->User_model->login($email);

		if (password_verify($oldPassword, $user->password)) {
			$this->User_model->password_reset($id, $newPassword);
			redirect('profile');
		} else {
			echo 'fail';
		}
	}

}