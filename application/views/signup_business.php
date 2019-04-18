<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('signup/signup_business');

$data = array('name' => 'firstName', 'placeholder' => 'Enter First Name', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array( 'name' => 'businessType', 'value' => 'university');
echo form_radio($data); 
$data = array( 'name' => 'businessType', 'value' => 'company', 'checked' => TRUE); 
echo form_radio($data);

$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'email');
echo form_input($data);
echo '<br>';

$data = array('name' => 'password', 'placeholder' => 'Enter Password', 'type' => 'password');
echo form_input($data);
echo '<br>';

echo form_submit('signup_business_submit', 'Sign Up');

echo form_close();
?>