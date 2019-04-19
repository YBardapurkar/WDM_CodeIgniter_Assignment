<?php

echo form_open('profile/update_profile_business', 'class="profile-details-form", name="profile_business_form"');

$data = array('name' => 'firstName', 'placeholder' => 'Enter First Name', 'type' => 'text', 'value' => $row->firstName);
echo form_input($data);

$data = array( 'name' => 'businessType', 'value' => 'university', 'checked' => ($row->businessType == 'university'));
echo form_radio($data); 
echo form_label('University', 'businessType');
$data = array( 'name' => 'businessType', 'value' => 'company', 'checked' => ($row->businessType == 'company'));
echo form_radio($data);
echo form_label('Company', 'businessType');

$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'email', 'disabled' => true, 'value' => $row->email);
echo form_input($data);

echo form_submit('profile_submit', 'Update Profile', 'class="button-color"');

echo form_close();
