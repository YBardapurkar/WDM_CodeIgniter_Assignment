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
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
}

/* The Close Button */
.error-modal-close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.error-modal-close:hover,
.error-modal-close:focus {
  color: #000;
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
    <span class="error-modal-close">&times;</span>
    <p><?php echo $error ?></p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('error-modal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("error-modal-close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
