<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('signup/signup_individual');

$data = array('name' => 'firstName', 'placeholder' => 'Enter First Name', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array('name' => 'lastName', 'placeholder' => 'Enter Last Name', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array('name' => 'school', 'placeholder' => 'Enter School', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array('name' => 'placeOfWork', 'placeholder' => 'Enter Place of Work', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'email');
echo form_input($data);
echo '<br>';

$data = array('name' => 'password', 'placeholder' => 'Enter Password', 'type' => 'password');
echo form_input($data);
echo '<br>';

echo form_submit('signup_individual_submit', 'Sign Up');

echo form_close();
?>