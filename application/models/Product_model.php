<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Product_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// get all products
	function get_all_products() {
		$this->db->select('*');
		$query = $this->db->get('products');
		return $query->result();
	}

	// get product
	function get_product_array($productId) {
		$data = array('id' => $productId);
		$this->db->select('*');
		$this->db->where($data);
		$query = $this->db->get('products');
		return $query->row_array();
	}

}