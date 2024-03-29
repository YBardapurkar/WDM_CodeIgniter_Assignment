<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Product_model');
		$this->load->model('Order_model');
	}

	// GET
	// open 'buy from us' page
	public function index() {
		$rows = $this->Product_model->get_all_products();
		$data = array('rows' => $rows);
		$this->load->view('buy_from_us_page', $data);

		if (!$this->session->has_userdata('cart')) {
			$this->session->set_userdata('cart', array());
		}
	}

	// GET
	// open 'place order' page
	public function order() {

		// check if cart is set
		if ($this->session->has_userdata('cart')) {
			$cart = $this->session->userdata('cart');
			$numProducts = count($cart, COUNT_NORMAL);
		} else {
			$cart = array();
		}
		$totalPrice = 0;

		// get product details
		foreach ($cart as $id => $quantity) {
			$row = $this->Product_model->get_product_array($id);

			$cart[$id] = array();
			$cart[$id]['id'] = $id;
			$cart[$id]['product'] = $row;
			$cart[$id]['quantity'] = $quantity;

			$totalPrice += ($cart[$id]['quantity'] * $row['price']);
		}

		$data = array('cart' => $cart, 'totalPrice' => $totalPrice);
		$this->load->view('place_order_page', $data);
	}

	// POST
	// add to cart
	public function add_to_cart() {
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|greater_than[0]', array('greater_than' => 'Must select atleast 1 quantity'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('store');
			return;
		}

		$productId = $this->input->post('productId');
		$quantity = $this->input->post('quantity');

		$cart = $this->session->userdata('cart');
		if (isset($cart[$productId])) {
			$cart[$productId] += $quantity;
		} else {
			$cart[$productId] = $quantity;
		}

		$this->session->set_userdata('cart', $cart);
		redirect('store');
	}

	// POST
	// place order
	public function place_order() {
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Email is invalid'));
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('apartment', 'Apartment', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('zip', 'Postal Code', 'required|regex_match[/^[0-9]{5}$/]', array('regex_match' => 'Postal Code must have 5 digits'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('store/order');
			return;
		}


		$email = $this->input->post('email');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$address = $this->input->post('address');
		$apartment = $this->input->post('apartment');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$language = $this->input->post('language');
		$zip = $this->input->post('zip');

		$totalPrice = 0;
		$cart = $this->session->userdata('cart');

		foreach ($cart as $id => $quantity) {
			$product = $this->Product_model->get_product_array($id);
			$product['quantity'] = $quantity;
			$cart[$id] = $product;
			$totalPrice += ($quantity * $product['price']);
		}

		$res = $this->Order_model->place_order($email, $firstName, $lastName, $address, $apartment, $city, $state, $language, $zip, $totalPrice, $cart);

		if ($res) {
			$this->session->unset_userdata('cart');
			$this->session->set_flashdata('success', '<p>Your order has been placed</p>');
			redirect('store');
		} else {
			$this->session->set_flashdata('error', '<p>Error placing order</p>');
			redirect('store/order');
		}
	}

}