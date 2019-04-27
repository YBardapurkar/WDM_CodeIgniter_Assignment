<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$data = $this->session->flashdata('error');
$this->load->view('error_modal', array('error' => $data));
if ($data != null) {
	echo '<script type="text/javascript"> error_modal_open(); </script>';
}

$data = $this->session->flashdata('success');
$this->load->view('success_modal', array('success' => $data));
if ($data != null) {
	echo '<script type="text/javascript"> success_modal_open(); </script>';
}
?>