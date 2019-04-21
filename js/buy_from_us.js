var modal;
var close;
var id = 0;

function openModal(modal_id) {
	modal = document.getElementById(modal_id);
	words = modal_id.split('-');
	id = words[words.length - 1];

	modal.style.display = "block";

	close = document.getElementById("close-modal-" + id);
	close.onclick = function() {
		closeModal();
	} 
}

function closeModal() {
	var form = document.getElementById('add-to-cart-form-' + id);
	form.reset();
	modal.style.display = "none";
}

window.onclick = function(event) {
	if (event.target == modal) {
		closeModal();
	}
}