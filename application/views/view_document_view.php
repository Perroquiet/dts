<?php
	if (isset($documentView)) {
		if (isset($relations)) {
			echo "<table>";
			foreach ($documentView as $row) {
				echo "<tr><td>";
				echo "<strong>Tracking ID: </strong>" . $row->tracking_id . "<br/>";
				echo "<strong>Subject: </strong>" . $row->name . "<br/>";
				echo "<strong>Description: </strong>" . $row->description . "<br/>";
				echo "<strong>Date Sent: </strong>" . $row->date_time_sent . "<br/>";
				echo "</td></tr>";
				break;
			}
			echo "</table>";
			echo "<hr/>";
			echo "<table>";
			echo "<tr><strong>Current Location: </strong>";
			if(isset($currentLocation)) {
				foreach ($currentLocation as $row) {
					echo $row->location . "<br/><br/>";
					break;
				}
			}
			foreach ($relations as $row) {
						if($user_id == $row->sender) {
						echo "<td>";
						echo "To: ";
						echo $row->first_name . ' ' . $row->last_name . '<br/>';
						echo "Location: " . $row->location . "<br/>";
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
						echo "From: ";
						echo $row->first_name . ' ' . $row->last_name . '<br/>';
						echo "Location: " . $row->location . "<br/>";
						
						foreach ($documentView as $verified)
						if ($verified->verified == 0) {
						echo "<td>";
						echo "<ul id=\"navigation\">";
						echo "<li>". anchor('home/verifydoc/'.$row->tracking_id .'/'. $user_id, 'Received') . "</li></td>";
						break;
						}
					}
					
					
				}
			echo "</tr>";
			echo "</table>";
		}
	}
?>