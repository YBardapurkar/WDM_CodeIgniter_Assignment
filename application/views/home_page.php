<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$data = $this->session->flashdata('error');
	$this->load->view('error_modal', array('error' => $data));
	if ($data != null) {
		echo '<script type="text/javascript"> document.getElementById("error-modal").style.display = "block"; </script>';
	}
	?>

	<div class="banner-home">
		<div class="right">
			<h1>For good communication <span class="red">Say It Right</span> is a tool that you should use.</h1>
			<p>You can see our video tutorial of use with just pressing this button</p>
		</div>
	</div>
	<div class="newsletter banner-bottom">
		<div class="left">
			<h1>Subscribe Our Newsletter</h1>
			<p>We won't send any kind of spam</p>
		</div>

		<?php
		echo form_open('home/mailList');

		echo form_input(array('name' => 'email', 'type' => 'text', 'value' => set_value('email')));

		echo form_submit('newsletter_submit', 'Subscribe');
		echo form_close();
		?>

	</div>
</main>

<?php
$this->load->view('footer');
?>
