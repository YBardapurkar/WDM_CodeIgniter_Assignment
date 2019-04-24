<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$success = $this->session->flashdata('success');
$error = $this->session->flashdata('error');

$this->load->view('error_modal', array('error' => $error));
if ($error != null) {
	echo '<script type="text/javascript"> document.getElementById("error-modal").style.display = "block"; </script>';
}

$this->load->view('success_modal', array('success' => $success));
if ($success != null) {
	echo '<script type="text/javascript"> modal_open(); </script>';
}
?>