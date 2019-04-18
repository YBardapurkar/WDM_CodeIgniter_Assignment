<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo $this->session->userdata('id');
echo $this->session->userdata('email');
echo $this->session->userdata('role');

// logout form
echo form_open('logout/logout');
echo form_submit('logout_submit', 'Logout');
echo form_close();

?>
