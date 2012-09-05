<?php
if (isset($receivers))
$data = array();
foreach($receivers as $row)
{
	$data = $row->first_name . '<br />';
}

?>

<div id="content">
	<br>
	<div class="send_form">

	<?php
	
	echo form_open('send/submit');
	echo form_label("Subject: ");
	echo form_input('documentName', '') . "</br>";
	echo form_label("To: ");
	echo form_dropdown('receiverName', $data) . "</br>";
	echo form_label("Description: ") . "<br />";
	echo form_textarea('documentDescription', '') . "</br>";
	echo form_submit('submit', 'Submit');
	echo form_close();
	?>
	</div>
</div>