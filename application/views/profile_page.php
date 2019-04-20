<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div id="wrapper">
		<h2 class="center-heading">Welcome to your profile</h2>

		<div class="row">
			<div class="profile-photo-column">
				<!-- <form class="profile-photo-form" action="php/profile.controller.php" method="post" enctype="multipart/form-data"> -->
				<div class="profile-photo-display">
					<figure>
						<?php
						if (file_exists($row->profilePicture)) {
							echo '<img src="'.$row->profilePicture.'">'; 
						} else {
							echo '<img src="imgsay/user.jpg">';
						}
						?>
						<figcaption></figcaption>
					</figure>
					<input id="profile-photo-change-button" type="button" name="profile-photo-submit" value="Change Photo" class="button-color">
					<!-- <input type="file" name="newProfilePic" id="newProfilePic">
					<input type="submit" name="profile_photo_submit" value="Change Photo" class="button-color"> -->
				</div>
			</div>
			<div class="profile-details-column">

				<?php
				if ($this->session->userdata('role') == 'individual') {
					$this->load->view('profile_individual_form');
				} else if ($this->session->userdata('role') == 'event') {
					$this->load->view('profile_event_form');
				} else if ($this->session->userdata('role') == 'business') {
					$this->load->view('profile_business_form');
				}
				
				$this->load->view('profile_password_form');
				?>

			</div>
		</div>
	</div>
	<div id="modal-new-profile-photo" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<form id="profile-photo-form" class="profile-photo-form" action="php/profile.controller.php" method="post" enctype="multipart/form-data">
				<figure>
					<?php
					if (file_exists($row->profilePicture)) {
						echo '<img id="newProfilePicImage" src="'.$row->profilePicture.'">'; 
					} else {
						echo '<img id="newProfilePicImage" src="imgsay/user.jpg">';
					}
					?>
					<figcaption></figcaption>
				</figure>
				<input type="file" name="newProfilePic" id="newProfilePic">
				<input type="submit" name="profile_photo_submit" value="Change Photo" class="button-color">
			</form>
		</div>
	</div>
</main>

<?php
$this->load->view('footer');
?>