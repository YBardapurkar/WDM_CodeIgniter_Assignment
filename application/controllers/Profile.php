<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('User_model');
	}

	// GET
	// load 'profile' page
	public function index() {
		$id = $this->session->userdata('id');
		$user = $this->User_model->get_profile($id);
		$data = array('row' => $user);
		$this->load->view('profile_page', $data);
	}

	// POST
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

	// POST
	// update event profile
	public function update_profile_event() {
		$firstName = $this->input->post("firstName");
		$lastName = $this->input->post("lastName");
		$email = $this->input->post("email");

		$id = $this->session->userdata('id');

		$this->User_model->update_profile_event($id, $firstName, $lastName);
		redirect('profile');
	}

	// POST
	// update business profile
	public function update_profile_business() {
		$firstName = $this->input->post("firstName");
		$businessType = $this->input->post("businessType");
		$email = $this->input->post("email");

		$id = $this->session->userdata('id');

		$this->User_model->update_profile_business($id, $firstName, $businessType);
		redirect('profile');
	}

	// POST
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

	// POST
	// upload new proffile pic
	public function upload_pic(){
		$id = $this->session->userdata('id');

		$config['upload_path']			= './profilePics/'.$id.'/';
		$config['allowed_types']		= 'gif|jpg|png';
		$config['max_size']				= 5*1024;
		$config['max_width']			= 1024;
		$config['max_height']			= 768;
		$config['overwrite']			= true;

		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('newProfilePic')) {
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('upload_form', $error);
			print_r($error);
			// redirect('profile');
		} else {
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
			$to_save = substr($config['upload_path'], 2).$data['upload_data']['file_name'];
			$this->User_model->update_profile_pic($id, $to_save);

			redirect('profile');
		}
	}

}