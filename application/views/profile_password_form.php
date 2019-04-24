<?php

echo form_open('profile/password_reset', 'class="profile-details-form", name="profile_password_form"');

echo form_input(array('name' => 'oldPassword', 'type' => 'password', 'placeholder' => 'Enter Old Password'));

echo form_input(array('name' => 'newPassword', 'type' => 'password', 'placeholder' => 'Enter New Password'));

echo form_submit('password_submit', 'Reset Password', 'class="button-color"');

echo form_close();