<div id="home">
	<?php
		if (isset($logged_in)) {
		echo anchor('home/logout', 'Logout');
		}
		else {
			echo anchor('user', 'Sign up') . "</br>";
			echo anchor('login', 'Login');
		}
		
	?>
</div>