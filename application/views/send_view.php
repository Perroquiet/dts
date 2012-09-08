

<?php
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
	<br>
	<div class="send_form">


	<?php
	
	echo form_open('send/submit');
	echo form_label("Subject: ");
	echo form_input('documentName', '') . "</br>";
//	echo form_label("To: ");
	echo "To: " . form_dropdown('receiverName', $dropdown_array) . "</br>";
	echo form_label("Description: ") . "<br />";
	echo form_textarea('documentDescription', '') . "</br>";
	echo form_submit('submit', 'Submit');
	echo form_close();
	?>
	</div>
</div>
