<div id="content">
<div class="reg_form">
<div class="form_title" align="center">Sign Up</div><br>
<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("signup/registration"); ?>
		<p>
			<label for="first_name">Firstname:</label>
			<input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" /><span id="usr_verify" class="verify"></span>
		</p>
		<p>
			<label for="last_name">Lastname:</label>
			<input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" /><span id="usr_verify" class="verify"></span>
			
		</p>
		<p>
			<label for="profession">Profession:</label>
			
			<input type="text" id="profession" name="profession" value="<?php echo set_value('profession'); ?>" /><span id="usr_verify" class="verify"></span>
		</p>
    	<!-- LIST OF COLLEGES -->
		<p>
			<label for="location">Location:</label>
				<?php $options = array(
					'Information Technology Department' 							  => 'IT Dept.',
					'Computer Science Department'   								  => 'CS Dept.',
					'ESET Department'          							    		  => 'ESET Dept.',
					'Dean'             				      							  => 'Dean',
					'EC Department'             							 		  => 'ES Dept.',					
					'DSA'             				 								  => 'DSA',
					'Computer Center'          							              => 'Com. Center',				
                ); 
             echo form_dropdown('location', $options, 'location'); ?>
			 <span id="usr_verify" class="verify"></span>
		</p>
		
		<p>
			<label for="user_name">Username:</label>
			<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" /><span id="usr_verify" class="verify"></span>
		</p>        
		 <p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" /><span id="password_verify" class="verify"></span>
		</p>
		<p>
			<label for="con_password">Confirm Password:</label>
			<input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" /><span id="confrimpwd_verify" class="verify"></span>
		</p>        
		<p>
			<input type="submit" class="greenButton" value="Submit" />
		</p>
	<?php echo form_close(); ?>
</div><!--<div class="reg_form">-->    
</div><!--<div id="content">-->



<script type="text/javascript">
$(document).ready(function(){
	$("#password").keyup(function(){
        
        if($("#con_password").val().length >= 4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>images/no.png')" });
                pwd=false;
                register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" });
            }
        }
    });
    
    $("#con_password").keyup(function(){
        
        if($("#password").val().length >=4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>images/no.png')" });
                pwd=false;
                register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" });

            }
        }
    });
});
</script>
