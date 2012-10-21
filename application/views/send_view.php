<script type="text/javascript">

function con(msg1) {
 var answer = confirm(msg1);
 if (answer) alert("Are you sure you wish to continue to send document!");{
 return true;
 }
 return false;
 }

	/* $("#sentlink").click(function(){ 
			$().toastmessage('showToast',{text:'Sent!', position:'middle-right',type:'success'});
		}
	});  */
	

 
</script>

<?php
$subject = array(
	'name'			=>	'documentName',
	'value'			=>	set_value('subject'),
	'placeholder'	=>	'Name of Document' 
);

$form_attrib = array(
	'name'		=>	'formSubmit',
	'id'		=>	'formSubmit',
	'class'		=>	'formSubmit'
);

$page_nums = array(
	'name'		=>	'pageNum',
	'id'		=>	'pageNum'
);
?>

<div id="rounded">
<div id="main" class="container">
<h1>Send a Document</h1>
<h2>by <?php echo $bywhat; ?></h2>
<?php echo validation_errors('<p class="error">'); ?>
<div id="content">
	
	<div class="send_form">
	
	<?php 
	if ($bywhat == 'Person') {
	echo form_open('send/submit', $form_attrib);
	} else if ($bywhat == 'Department'){
	echo form_open('send/submitdept', $form_attrib);
	}
		
	?>
	
	<table align='center'>
		<tr>
			<td align='right'>
				<b><?php echo form_label("Document Name: "); ?></b>
			</td>
			<td align='left'>
				<?php echo form_input($subject); ?> 
				</br>
				<?php // echo form_button($add_recipient) ."<br/>"; ?>
			</td>
		</tr>
	
	<tr id="tr1">
			<td align='right'>
				<b>
				<?php echo "Send to (by ".$bywhat."): "; ?>
				</b>
			</td>
			<td align='left' id="td1" >
				
				    <input type="text" id="demo-input" name="recipients" />
        
					<script type="text/javascript">
					$(document).ready(function() {
						$("#demo-input").tokenInput(<?php echo $receivers; ?>, {
							hintText: "Type in name of receiver(s) for the document",
							theme: "facebook"
						});
					});
					
					</script>
				
			</td>
			
		</tr>
	
	<br/>
	<tr align='center'>
		<td align='right'>
			<b>
			<?php echo "Description: "; ?>
			</b>
		</td>
		
		<td align='left'>
			<?php echo form_textarea('documentDescription', '', 'placeholder="Description"' ); ?>
			<br/>
		</td>
	</tr>
	<br/>
	<tr align='center'>
		<td align='right'>
			<b>
			<?php echo "# of pages: "; ?>
			</b>
		</td>
		<td align='left'>
			<?php echo form_input($page_nums); ?>
			<br/>
		</td>
	</tr>
	<br/>
	<tr align='center'>
		<td/>
		<td align='center'>
			 
		<!-- <?php echo form_submit('submit', 'Submit', 'id="sentlink" onclick="return con(\'Are you sure to send the document? Click OK or Cancel button.\');"'); ?> -->
		
		<?php echo form_submit('submit', 'Submit','onclick="return con(\'Are you sure to send the document? Click OK or Cancel button.\');"'); ?>
		<?php echo anchor(base_url(), 'Back'); ?>
		</td>
		
	</tr>
		
	<?php echo form_close(); ?>
	</table>
	</div>
</div>
</div>
</div>