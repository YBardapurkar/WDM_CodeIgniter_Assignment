<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	/* The Modal (background) */
	.success-modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.success-modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 40%;
	}

	/* The Close Button */
	.success-modal-close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.success-modal-close:hover,
	.success-modal-close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
</style>
<body>
	<!-- The Modal -->
	<div id="success-modal" class="success-modal">

		<!-- Modal content -->
		<div class="success-modal-content">
			<span id="success-modal-close" class="success-modal-close">&times;</span>
			<p><?php echo $success ?></p>
		</div>

	</div>

	<script>
// Get the modal
var modal = document.getElementById('success-modal');

// Get the <span> element that closes the modal
var span = document.getElementById('success-modal-close');

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
}

function modal_open() {
	modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>

</body>
