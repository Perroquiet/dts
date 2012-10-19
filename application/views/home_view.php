<script>

function con(msg1) {
 var answer = confirm(msg1);
 if (answer) {
  return true;
 }

 return false;
}
</script>
	<?php
	echo "Filter: ";
	echo anchor('home/sort_send', "Sent");
	echo " | ";
	echo anchor('home/sort_received', "Received");
	echo "<hr/>";
	
	if(!isset($feeds)) {
		echo "<br/><p align=center>No documents sent or received yet.</p>";
	}
	else {
		foreach ($feeds as $feed)
		{
			
			echo '<table id="feed"><tr><td width=580px><div><strong>Document: </strong><b>';
			
			if ($feed->dept_id != null) {
				echo anchor('home/viewitemdept/'.$feed->tracking_id, $feed->name);
			}
			else {
				echo anchor('home/viewitem/'.$feed->tracking_id, $feed->name);
			}
			echo '</b><br/>';
			
			
			echo '<strong>Date Sent: </strong>'.$feed->date_time_sent . "</br>";
			if ($feed->date_time_received != NULL) {
				echo '<strong>Date Received: </strong>'. $feed->date_time_received . "</td>";
			} 		
			echo "<td id=\"tdop\"></div><div>";
			echo "<ul id=\"navigation\">";
			if ($feed->dept_id != null) {
				echo "<li id=\"op\">".anchor('home/viewitemdept/'.$feed->tracking_id,'View')."</li>";
			}
			else {
				echo "<li id=\"op\">".anchor('home/viewitem/'.$feed->tracking_id,'View')."</li>";
			}
			
			echo "<li id=\"op\">".anchor('home/delete/'.$feed->tracking_id,'Delete', 'onclick="return con(\'Are you sure you want to delete the document? Click OK or Cancel button.\');"')."</li>";
			echo "</ul>";
			echo "</td>";
			echo "</div></tr></table>";
		}
	}
	
?>