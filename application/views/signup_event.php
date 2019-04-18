<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('signup/signup_event');

$data = array('name' => 'firstName', 'placeholder' => 'Enter First Name', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array('name' => 'lastName', 'placeholder' => 'Enter Last Name', 'type' => 'text');
echo form_input($data);
echo '<br>';

$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'email');
echo form_input($data);
echo '<br>';

$data = array('name' => 'password', 'placeholder' => 'Enter Password', 'type' => 'password');
echo form_input($data);
echo '<br>';

echo form_submit('signup_event_submit', 'Sign Up');

echo form_close();
?>