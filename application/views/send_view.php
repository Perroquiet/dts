<script type="text/javascript">


	$( "#confirm-submit" ).click(function() {
		jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {
		jAlert('Confirmed: ' + r, 'Confirmation Results');
				
		});
	});

		
// function con(msg1) {
 // var answer = confirm(msg1);
 // if (answer) {
 // return true;
 // }

 // return false;
 // }

// $('#confirm-submit').click(function(){
// $('#dialog_box').dialog({
  // title: 'Really delete this stuff?',
  // width: 500,
  // height: 200,
  // modal: true,
  // resizable: false,
  // draggable: false,
  // buttons: [{
  // text: 'Yep, delete it!',
  // click: function(){
      // delete it
    // }
  // },
  // {
  // text: 'Nope, my bad!',
  // click: function() {
      // $(this).dialog('close');
    // }
  // }]
// });
// });

// $.fx.speeds._default = 100;
    /*
    $(function() {
        //$( "#dialog:ui-dialog" ).dialog( "destroy" );
		$( "#dialog-confirm" ).dialog({
			autoOpen: false,
			resizable: false,
			modal: true,
			buttons: {
				"OK": function() {
				
                $("#formSubmit").submit();
				$(this).dialog('close');
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});

		$( "#confirm-submit" ).click(function() {
				$( "#dialog-confirm" ).dialog( "open" );
				return false;
			});
			
   });
   */
   
</script>

<?php
$subject = array(
	'name'		=>	'documentName',
	'value'		=>	set_value('subject')
);

$form_attrib = array(
	'name'		=>	'formSubmit',
	'id'		=>	'formSubmit',
	'class'		=>	'formSubmit'
);
	// if (isset($receivers)) {
		// $dropdown_array = array();
		// $dropdown_array[] = '';
		// foreach($receivers as $row)	{
			// $dropdown_array[$row->user_id] = $row->first_name . ' ' . $row->last_name;
		// }
	// }
	
?>

<div id="rounded">
<div id="main" class="container">
<?php echo validation_errors('<p class="error">'); ?>
<div id="content">
	
	<div class="send_form">
	
	<?php echo form_open('send/submit', $form_attrib); ?>
	
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
				<?php echo "Send to:"; ?>
				</b>
			</td>
			<td align='left' id="td1" >
				
				    <input type="text" id="demo-input" name="recipients" />
        
					<script type="text/javascript">
					$(document).ready(function() {
						$("#demo-input").tokenInput(<?php echo $receivers; ?>, {
							hintText: "Type in name of receiver(s) for the document",
							//theme: "facebook"
						});
					});
					
					</script>
    
				<?php //echo form_dropdown('data0', $dropdown_array, '', 'id="sel1"'); ?>
				
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
			<?php echo form_textarea('documentDescription', ''); ?>
			<br/>
		</td>
	</tr>
	<tr align='center'>
		<td/>
		<td align='center'>
		<!--	
		<div id="dialog-confirm" title="Empty the recycle bin?">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure to send the document? Click OK or Cancel button.</p>
		</div>
		-->
		<?php //echo form_submit('submit', 'Submit', 'onclick="return con(\'Are you sure to send the document? Click OK or Cancel button.\');"'); ?>
		<?php echo form_submit('submit', 'Submit', 'id="confirm-submit"'); ?>
		<?php echo anchor(base_url(), 'Back'); ?>
		</td>
		
	</tr>
	
 
	
	<?php echo form_close(); ?>
	</table>
	</div>
</div>
</div>
</div>