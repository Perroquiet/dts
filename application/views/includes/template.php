<?php $this->load->view('includes/header'); ?>

	<div id="container">
		<header>
		</header>
		<div id="main" role="main">
<?php if (isset($header_content)) { $this->load->view($header_content); } ?>
<?php $this->load->view($main_content); ?>
<?php if(isset($sub_content)) { $this->load->view($sub_content); } ?>
		</div>
		<footer>
		</footer>
	</div> <!--! end of #container -->
	
<?php $this->load->view('includes/footer'); ?>
