<div id="content">
<html><body><center><img src=<?php echo '"' . base_url() . 'public/logo1.png"' ?> /></center></body></html>
	
	<br>
	<div class="login_form">
	<div id="rounded">

	<?php
	
	echo form_open('login/validate_credentials');
	echo form_label("Username ");
	echo form_input('username', '') . "</br>";
	echo form_label("Password ");
	echo form_password('password', '') . "</br>";
	//echo form_submit('submit', 'Login');
	?>
	<input type="submit" class="button" value="login"> 
	<?php
	//echo "</br>" . anchor('signup', 'Sign up');
	echo "</br></br> Don't have an account? " . anchor('signup', 'Create Now!');	
	
	echo form_close();
	?>
	</div>
</div>
</div>