

<?php
if (isset($receivers))
$dropdown_array = array();
foreach($receivers as $row)
{
	//$element = $row->id; //google insert ordered pairs in an array
	array_push($dropdown_array, $row->first_name . ' ' . $row->last_name);
}

$birthday_month = array (
	'1' => 'Jan',
	'2' => 'Feb',
	'3' => 'Mar',
	'4' => 'Apr',
	'5' => 'May',
	'6' => 'Jun',
	'7' => 'Jul',
	'8' => 'Aug',
	'9' => 'Sep',
	'10' => 'Oct',
	'11' => 'Nov',
	'12' => 'Dec'
);
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
