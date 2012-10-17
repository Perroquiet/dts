<div id="content">
<html><body><center><img src=<?php echo '"' . base_url() . 'public/logo.png"' ?> /></center></body></html>
	
	<br>
	<div class="login_form">
	<div id="rounded">

	<?php 
	echo form_open('login/validate_credentials');
	?>
	
	<!-- the login form using tr td below -->
	
		<table> 
			<tr>
				<td align="right">Username: </td>
				<td align="left">			
				<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" /><span id="usr_verify" class="verify"></span>
				</td>
			</tr>
			
		<tr>
			<td align="right">Password: </td>
		    <td align="left">
			<input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" /><span id="usr_verify" class="verify"></span> 		
		    </td>
		</tr>
		<tr>
            <td colspan="2" id="error">
            <?php echo form_error('username'); ?><?php echo isset($errors['username'])?$errors['username']:''; ?>
            <?php echo form_error('password'); ?><?php echo isset($errors['password'])?$errors['password']:''; ?>
			<?php if(isset($mismatch)) { echo "Username and Password does not match."; } ?>
			</td>
         </tr>
		</table>	
	<input type="submit" class="button" value="login">
	
	<?php
	//echo "</br>" . anchor('signup', 'Sign up');
	echo "</br></br> Don't have an account? " . anchor('signup', 'Create Now!');	
	echo form_close();
	?>
	</div>
</div>
</div>
