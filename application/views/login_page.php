<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');

echo form_open('login/login');
echo form_input(array('name' => 'email', 'type' => 'email'));
echo '<br>';
echo form_input(array('name' => 'password', 'type' => 'password'));
echo '<br>';
echo form_submit('login', 'Login');
echo form_close();
?>