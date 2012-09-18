<script type="text/javascript">
function con(message) {
 var answer = confirm(message);
 if (answer) {
  return true;
 }

 return false;
}

function add() {
 var p = "<tr><td/><td align='left'>sdfdf</td></tr>";
 $("#recipients").append(p);
}
</script>

<?php
$add_recipient = array (
	'name'		=>	'addRecipient',
	'id'		=>	'addRecipient',
	'content'	=>	'Add Next Receiver',
	'onClick'	=>	'return add()'
);

if (isset($receivers))
$dropdown_array = array();

foreach($receivers as $row)
{
	$dropdown_array[$row->user_id] = $row->first_name . ' ' . $row->last_name;
}


?>

<div id="custom-header">
	<?php echo anchor('login', 'Back'); ?>

</div>

<div id="content">
	
	<div class="send_form">
	<div class='imagetable'>
	<?php echo form_open('send/submit'); ?>
	
	<table align='center'>
		<tr>
			<td align='right'>
				<b><?php echo form_label("Subject: "); ?></b>
			</td>
			<td align='left'>
				<?php echo form_input('documentName', ''); ?> 
				</br>
			</td>
		</tr>
	</table>
	<?php //echo form_label("To: "); ?>
	<table id="recipients"  align='center'>	
		<tr>
			<td align='right'>
				<b>
				<?php echo "To:"; ?>
				</b>
			</td>
			<td align='left'>
				<?php echo form_dropdown('receiverName', $dropdown_array) . "&nbsp&nbsp". form_button($add_recipient); ?>
				<br />
			</td>
		</tr>
	</table>
	<br/>
	<table  align='center'>
	<tr align='center'>
		<td align='justify'>
			<b>
			<?php echo "Description: "; ?>
			</b>
		</td>
		
		<td>
			<?php echo form_textarea('documentDescription', ''); ?>
			<br/>
		</td>
	</tr>
	<tr align='center'>
		<td/>
		<td align='center'>
		<?php echo form_submit('submit', 'Submit', 'onclick="return con(\'Are you sure to send document(s). Please click ok or cancel button.\')"'); ?>

		</td>
		
	</tr>
	
	
	<?php echo form_close(); ?>
	</table>
	</div>
	</div>
</div>
