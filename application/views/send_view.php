<script type="text/javascript">
function con(message) {
 var answer = confirm(message);
 if (answer) {
  return true;
 }

 return false;
}
</script>

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
	echo "<table align='center' class='imagetable'>";
	echo "<tr>";
	echo "<td align='right'>";
	echo "<b>";
	echo form_label("Subject: ");
	echo "</b>";
	echo "</td>";
	
	echo "<td align='left'>";
	echo form_input('documentName', '') . "</br>";
	echo "</td>";
	echo "</tr>";
	
//	echo form_label("To: ");
	echo "<tr>";
	echo "<td align='right'>";
	echo "<b>";
	echo "To:"; 
	echo "</b>";
	echo "</td>";
	echo "<td align='left'>";
	echo form_dropdown('receiverName', $dropdown_array) . "<br />";
	echo "</td>";
	echo "</tr>";
	
	echo "<br>";
	
	echo "<tr align='center'>";
	echo "<td align='justify'>";
	echo "<b>";
	echo "Description: ";
	echo "</b>";
	echo "</td>";
	
	echo "<td>";
	echo form_textarea('documentDescription', '') . "</br>";
	echo "</td>";
	echo "</tr>";
	echo "<td>";
	echo "<td align='center'>";



	echo form_submit('submit', 'Submit', 'onclick="return con(\'Are you sure to send document(s). Please click ok or cancel button.\')"');

	echo "</td>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	
	echo form_close();
	?>
	</div>
</div>
