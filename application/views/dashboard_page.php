<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>
	
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
						<?php echo $totalEvents ?>
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
						<?php echo $events ?>
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
						<?php echo $totalBusinesses ?>
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
						<?php echo $businesses ?>
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
