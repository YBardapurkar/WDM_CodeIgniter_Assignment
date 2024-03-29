<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	/* The Modal (background) */
	.error-modal {
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
	.error-modal-content {
		background-color: #fff0f0;
		margin: auto;
		padding: 20px;
		border: 1px solid #440000;
		width: 40%;
	}

	.error-modal-content p {
		color: #440000;
	}

	/* The Close Button */
	.error-modal-close {
		color: #770000;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.error-modal-close:hover,
	.error-modal-close:focus {
		color: #440000;
		text-decoration: none;
		cursor: pointer;
	}
</style>
</head>
<body>
	<!-- The Modal -->
	<div id="error-modal" class="error-modal">

		<!-- Modal content -->
		<div class="error-modal-content">
			<span id="error-modal-close" class="error-modal-close">&times;</span>
			<p><?php echo $error ?></p>
		</div>

	</div>

	<script>
// Get the modal
var error_modal = document.getElementById('error-modal');

// Get the <span> element that closes the modal
var error_span = document.getElementById("error-modal-close");

function error_modal_open() {
	error_modal.style.display = "block";
}
function error_modal_close() {
	error_modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
error_span.onclick = function() {
	error_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == error_modal) {
		error_modal.style.display = "none";
	}
}
</script>

</body>
</html>
