<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Order_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// place order
	function place_order($email, $firstName, $lastName, $address, $apartment, $city, $state, $language, $zip, $totalPrice, $cart) {
		$this->db->trans_start();

		$this->insert_order($email, $firstName, $lastName, $address, $apartment, $city, $state, $language, $zip, $totalPrice);
		$orderId = $this->db->insert_id();

		foreach ($cart as $id => $product) {
			$this->insert_product($orderId, $product['name'], $product['imageUrl'], $product['price'], $product['quantity']);
		}

		$this->db->trans_complete();

		return ($this->db->trans_status() === TRUE);
	}

	// insert row in orders table
	private function insert_order($email, $firstName, $lastName, $address, $apartment, $city, $state, $language, $zip, $totalPrice) {
		$data = array('email' => $email, 'firstName' => $firstName, 'lastName' => $lastName, 'address' => $address, 'apartment' => $apartment, 'city' => $city, 'state' => $state, 'language' => $language, 'zip' => $zip, 'amount' => $totalPrice);
		$this->db->insert('orders', $data);
	}

	// insert row in orderitems table
	private function insert_product($orderId, $itemName, $itemImage, $itemPrice, $itemQuantity) {
		$data = array('orderId' => $orderId, 'itemName' => $itemName, 'itemImage' => $itemImage, 'itemPrice' => $itemPrice, 'itemQuantity' => $itemQuantity);
		$this->db->insert('orderitems', $data);
	}

}