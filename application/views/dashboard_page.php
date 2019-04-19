<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div id="wrapper">
		<h1>

			<?php
			echo 'welcome to the '.$this->session->userdata('role').' landing page';
			?>

		</h1>
		<div class="dashboard-row">
			<div class="dashboard-item-1 blue">
				<div class="top">
					<i class="fas fa-globe-americas"></i>
					<p class="count">
							<!-- <?php
							// $query = 'SELECT count(*) from events';
							// $stmt = $db->prepare($query);
							// $stmt->execute();
							// $nRows = $stmt->fetchColumn();
							// echo $nRows;
							?> -->
							5
					</p>
					<p class="name">activities performed</p>
				</div>
				<div class="bottom">
					<p>Total Events</p>
				</div>
			</div>
			<div class="dashboard-item-1 green">
				<div class="top">
					<i class="fas fa-users"></i>
					<p class="count">
						<!-- <?php
						if ($_SESSION['role'] == 'event') {
							// $query = 'SELECT count(*) from events where createdBy = :id';
							// $stmt = $db->prepare($query);
							// $stmt->execute(array(':id' => $_SESSION['id']));
							// $nRows = $stmt->fetchColumn();
						} else {
							// $query = 'SELECT count(*) from userevents where userevents.userId = :id;';
							// $stmt = $db->prepare($query);
							// $stmt->execute(array(':id' => $_SESSION['id']));
							// $nRows = $stmt->fetchColumn();
						}
						echo $nRows;
						?> -->
						4
					</p>
					<p class="name">activities performed</p>
				</div>
				<div class="bottom">
					<p>My Events</p>
				</div>
			</div>
			<div class="dashboard-item-1 yellow">
				<div class="top">
					<i class="fas fa-star"></i>
					<p class="count">
						<!-- <?php
						// $query = 'SELECT count(*) from businesses';
						// $stmt = $db->prepare($query);
						// $stmt->execute();
						// $nRows = $stmt->fetchColumn();
						// echo $nRows;
						?> -->
						3
					</p>
					<p class="name">activities performed</p>
				</div>
				<div class="bottom">
					<p>Total Businesses</p>
				</div>
			</div>
			<div class="dashboard-item-1 grey">
				<div class="top">
					<i class="fas fa-trophy"></i>
					<p class="count">
						<!-- <?php
						// $query = 'SELECT count(*) from businesses where createdBy = :id';
						// $stmt = $db->prepare($query);
						// $stmt->execute(array(':id' => $_SESSION['id']));
						// $nRows = $stmt->fetchColumn();
						// echo $nRows;
						?> -->
						2
					</p>
					<p class="name">activities performed</p>
				</div>
				<div class="bottom">
					<p>My Businesses</p>
				</div>
			</div>
		</div>

		<div class="dashboard-row">
			<div class="dashboard-item-2 blue">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
			<div class="dashboard-item-2 grey">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
			<div class="dashboard-item-2 green">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
			<div class="dashboard-item-2 red">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
		</div>

		<div class="dashboard-row">
			<div class="dashboard-item-2 yellow">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
			<div class="dashboard-item-2 red">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
			<div class="dashboard-item-2 white">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
			<div class="dashboard-item-2 black">
				<div class="head">
					<p>Header</p>
				</div>
				<div class="body">
					<p>Title card</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
				</div>
				<div class="foot"></div>
			</div>
		</div>
	</div>
</main>
	
<?php
$this->load->view('footer');
?>
