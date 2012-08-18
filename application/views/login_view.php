<div id="content">
	<div class="login_form">
	<div class="form_title">Login</div><br>
	<?php
	
	echo form_open('login/validate_credentials');
	echo form_label("Username: ");
	echo form_input('username', '') . "</br>";
	echo form_label("Password: ");
	echo form_password('password', '') . "</br>";
	echo form_submit('submit', 'Login');
	echo "</br>" . anchor('signup', 'Sign up');
	
	echo form_close();
	?>
	</div>
</div>

