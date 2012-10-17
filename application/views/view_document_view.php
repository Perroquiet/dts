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
	if (isset($documentView)) {
		if (isset($relations)) {
			echo "<table>";
			foreach ($documentView as $row) {
				echo "<tr><td>";
				echo "<strong>Tracking ID: </strong>" . $row->tracking_id . "<br/>";
				echo "<strong>Subject: </strong>" . $row->name . "<br/>";
				echo "<strong>Description: </strong>" . $row->description . "<br/>";
				if ($row->page_number != 0) {
					echo "<strong># of pages: </strong>" . $row->page_number . "<br/>";
				}
				echo "<strong>Date Sent: </strong>" . $row->date_time_sent . "<br/>";
				echo "</td></tr>";
				break;
			}
			echo "</table>";
			echo "<hr/>";
			echo "<table>";
			if(isset($currentLocation)) {
				echo "<tr><strong>Current Location: </strong>";
				foreach ($currentLocation as $row) {
					echo $row->location . "<br/><br/>";
					break;
				}
			}
			foreach ($relations as $row) {
						if ($row->dept_id != null) {
							echo "<strong>To: </strong>";
							echo $row->office_name . '<br/>';
							echo "<strong>Location: </strong>" .$row->acronym .' - '. $row->office_name . "<br/>";
							echo "<strong>Received: </strong>";
							
							if ($row->verified == 0) {
								echo "No <br/>";
							} else {
								echo "Yes <br/>";
							}
							
							if ($row->date_time_received != NULL) {
								echo "<strong>Date Received: </strong>".$row->date_time_received;
							}
							echo "<hr/>";
							
						
							echo "</td></tr>";
							if($user_id == $row->receiver) {
							echo "<strong>From: </strong>";
							echo $row->first_name . ' ' . $row->last_name . '<br/>';
							echo "<strong>Location: </strong>" . $row->location . "<br/>";
							break;
							}
							
						}
						else {
							if($user_id == $row->sender) {
							echo "<td>";
							echo "<strong>To: </strong>";
							echo $row->first_name . ' ' . $row->last_name . '<br/>';
							echo "<strong>Location: </strong>" . $row->location . "<br/>";
							echo "<strong>Received: </strong>";
							
							if ($row->verified == 0) {
								echo "No <br/>";
							} else {
								echo "Yes <br/>";
							}
							
							if ($row->date_time_received != NULL) {
								echo "<strong>Date Received: </strong>".$row->date_time_received;
							}
							echo "<hr/>";
							
							}
							
							echo "</td></tr>";
							if($user_id == $row->receiver) {
							echo "<strong>From: </strong>";
							echo $row->first_name . ' ' . $row->last_name . '<br/>';
							echo "<strong>Location: </strong>" . $row->location . "<br/>";
							
							foreach ($documentView as $verified)
							if ($verified->verified == 0) {
							echo "<td>";
							echo "<ul id=\"navigation\">";
							echo "<li>". anchor('home/verifydoc/'.$row->tracking_id .'/'. $user_id, 'Received', 'onclick="return con(\'Are you sure to mark this document as received? Click OK or cancel button.\')"') . "</li></td>";
							break;
							}
							// else if ($verified->verified == 1) {
							
							// }
							
						}
					
					}
				}
			echo "</tr>";
			echo "</table>";
		}
	}
?>