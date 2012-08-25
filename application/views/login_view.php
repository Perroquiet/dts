<div id="content">
<html><body><center><img src=<?php echo '"' . base_url() . 'public/logo1.png"' ?> /></center></body></html>
	
	<br>
	<div class="login_form">

	<?php
	
	echo form_open('login/validate_credentials');
	echo form_label("Username ");
	echo form_input('username', '') . "</br>";
	echo form_label("Password ");
	echo form_password('password', '') . "</br>";
	echo form_submit('submit', 'Login');
	echo "</br>" . anchor('signup', 'Sign up');
	
	echo form_close();
	?>
	</div>
</div>

