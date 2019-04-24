<?php

echo form_open('profile/update_profile_event', 'class="profile-details-form", name="profile_event_form"');

$data = array('name' => 'firstName', 'placeholder' => 'Enter First Name', 'type' => 'text', 'value' => $row->firstName);
echo form_input($data);

$data = array('name' => 'lastName', 'placeholder' => 'Enter Last Name', 'type' => 'text', 'value' => $row->lastName);
echo form_input($data);

$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'text', 'disabled' => true, 'value' => $row->email);
echo form_input($data);

echo form_submit('profile_submit', 'Update Profile', 'class="button-color"');

echo form_close();