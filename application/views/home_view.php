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
	
	
	if(!isset($feeds)) {
		echo "<br/><p align=center>No documents sent or received yet.</p>";
	}
	else {
		foreach ($feeds as $feed)
		{
			
			echo '<table><tr><td width=600px><div>Subject: <b>'.anchor('home/viewitem/'.$feed->tracking_id, $feed->name) . '</b> <i>';
			
			if($user_id == $feed->sender) {
				echo "To: ";
					echo $feed->first_name . ' ' . $feed->last_name . '<br /></i>';
					
			} else { 
				echo "From: ";
					echo $feed->first_name . ' ' . $feed->last_name . '<br /></i>';
				
			}
			
			echo 'Date Sent: '.$feed->date_time_sent . "</br>";
			if ($feed->date_time_received != NULL) {
				echo 'Date Received: '. $feed->date_time_received . "</td>";
			} 		
			echo "<td></div><div>";
			echo "<ul id=\"navigation\">";
			echo "<li>".anchor('home/viewitem/'.$feed->tracking_id,'View')."</li>";
			echo "<li>".anchor('home/viewitem/'.$feed->tracking_id,'Delete', 'onclick="return con(\'Are you sure you want to delete the document? Click OK or Cancel button.\');"')."</li>";
			echo "</ul>";
			echo "</td>";
			echo "</div></tr></table><hr/>";
			
		}
	}
	
	?>
	  
