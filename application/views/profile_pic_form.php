<?php
echo form_open_multipart('profile/upload_pic', 'id="profile-photo-form", class="profile-photo-form", name="profile_photo_form"');
?>

<figure>

	<?php
	if (file_exists($row->profilePicture)) {
	?>
		
		<img id="newProfilePicImage" src=<?php echo base_url().$row->profilePicture ?> >

	<?php
	} else {
	?>
	
		<img id="newProfilePicImage" src=<?php echo base_url() ?>"imgsay/user.jpg" >

	<?php
	}
	?>
	<figcaption></figcaption>
</figure>

<?php
$data_upload = array('type' => 'file', 'name' => 'newProfilePic', 'id' => 'newProfilePic');
echo form_upload($data_upload);

echo form_submit('profile_photo_submit', 'Change Photo', 'id="newProfilePic" class="button-color"');

echo form_close();
?>