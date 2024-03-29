<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Businesses extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Businesses_model');
	}

	// GET
	// load 'list of businesses'
	public function index() {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		}
		if ($this->session->userdata('role') != 'business') {
			redirect('events');
			return;
		} else {
			$rows = $this->Businesses_model->get_all_businesses();
			$data = array('rows' => $rows);
			$this->load->view('list_of_businesses_page', $data);
		}
	}

	// GET
	// load 'list of my businesses'
	public function my() {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		} 
		// businesses for business
		$rows = $this->Businesses_model->get_businesses_of_business($this->session->userdata('id'));
		$data = array('rows' => $rows);
		$this->load->view('list_of_my_businesses_page', $data);
	}

	// GET
	// load 'add business' page
	public function new() {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		}
		if ($this->session->userdata('role') != 'business') {
			redirect('login');
			return;
		}
		$this->load->view('businesses_add_page');
	}

	// GET
	// load 'edit business' page
	public function update($businessId = null) {
		if (!$this->session->has_userdata('role')){
			redirect('login');
			return;
		}
		if ($this->session->userdata('role') != 'business') {
			redirect('businesses');
			return;
		}
		if ($businessId == null) {
			$this->session->set_flashdata('error', '<p>Business not found</p>');
			redirect('businesses/my');
			return;
		}
		$business = $this->Businesses_model->get_business($businessId);
		$data = array('row' => $business);
		$this->load->view('businesses_update_page', $data);
	}

	// POST
	// add new business (only for business)
	public function add_business() {
		$this->form_validation->set_rules('businessName', 'Business Name', 'required');
		$this->form_validation->set_rules('businessDescription', 'Description', 'required|max_length[255]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('businesses/new');
			return;
		}

		if ($this->session->userdata('role') != 'business') {
			redirect('businesses/my');
			return;
		}

		$businessName = $this->input->post('businessName');
		$businessDescription = $this->input->post('businessDescription');

		$createdBy = $this->session->userdata('id');

		$this->Businesses_model->add_business($businessName, $businessDescription, $createdBy);

		$this->session->set_flashdata('success', '<p>New Business Added</p>');
		redirect('businesses/my');
	}

	// POST
	// update business (only for business)
	public function update_business() {
		$businessId = $this->input->post('businessId');

		$this->form_validation->set_rules('businessName', 'Business Name', 'required');
		$this->form_validation->set_rules('businessDescription', 'Description', 'required|max_length[255]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('businesses/update/'.$businessId);
			return;
		}

		if ($this->session->userdata('role') != 'business') {
			redirect('businesses/my');
			return;
		}

		$businessName = $this->input->post('businessName');
		$businessDescription = $this->input->post('businessDescription');

		$this->Businesses_model->update_business($businessId, $businessName, $businessDescription);

		$this->session->set_flashdata('success', '<p>Business Updated</p>');
		redirect('businesses/my');
	}

	// POST
	// delete business (only for business)
	public function delete_business() {
		$businessId = $this->input->post('businessId');
		if ($this->session->userdata('role') != 'business') {
			redirect('businesses/my');
			return;
		}

		$this->Businesses_model->delete_business($businessId);

		$this->session->set_flashdata('success', '<p>Business Deleted</p>');
		redirect('businesses/my');
	}
}