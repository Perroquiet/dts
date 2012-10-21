<script type="text/javascript">
	
var msg = new con(
{
title: 'Title',
text: 'Alert Message',
skin: 'default',
width: 300,
height: 300,
ok: {value: true, text: 'Yes', onclick: showValue},
cancel: {value: false, text: 'No', onclick: showValue }
}); 
	

</script>

<?php

$verified = false;

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
				$verified = $row->verified;
				break;
			}
			echo "</table>";
			echo "<hr/>";
			
			foreach ($relations as $relation) {
				if(isset($currentLocation)) {
					echo "<strong>Current Location: </strong>";
					if ($relation->dept_id == null) {
					foreach ($currentLocation as $row) {
						echo $row->location . "<br/><br/>";
						break;
					}
					} else {
						foreach ($currentLocation as $row) {
						echo $row->office_name . "<br/><br/>";
						break;
					}
					
					}
				}
				break;
			}
			echo "<table>";
			foreach ($relations as $row) {
						if ($row->dept_id != null) {
							if($user_id == $row->sender) {
							echo "<tr><td width=400px><strong>Sent to: </strong>";
							echo $row->office_name . '<br/>';
							echo "</td><td>";
							echo "<strong>Received: </strong>";
							
							if ($row->verified == 0) {
								echo '<b id="not_received">No</b> <br/>';
							} else {
								echo '<b id="received">Yes</b> <br/>';
							}
							
							if ($row->date_time_received != NULL) {
								echo "<strong>Date Received: </strong>".$row->date_time_received;
							}
							
							//echo "<hr/>";
							
						
							echo "</td></tr>";
							echo "<tr><td><hr/></td><td><hr/></td></tr>";
							}
							
							if($row->sender != $user_id) {
							echo "<strong>From: </strong>";
							echo $row->first_name . ' ' . $row->last_name . '<br/>';
							echo "<strong>Location: </strong>" . $row->location . "<br/>";
							
								if ($row->verified == 0) {
								echo "<td>";
								echo "<ul id=\"navigation\">";
								echo "<li>". anchor('home/verifydoc/'.$row->tracking_id .'/'. $row->dept_id, 'Received', 'onclick="return con(\'Are you sure to mark this document as received? Click OK or cancel button.\')"') . "</li></td>";
								break;
								} else {
								echo "<strong>Status: </strong>Received";
								}
							
							}
						}
						else {
							if($user_id == $row->sender) {
								echo "<tr><td width=400px>";
								echo "<strong>To: </strong>";
								echo $row->first_name . ' ' . $row->last_name . '<br/>';
								echo "<strong>Location: </strong>" . $row->location . "<br/>";
								
								echo "</td><td>";
								echo "<strong>Received: </strong>";
								
								if ($row->verified == 0) {
									echo '<b id="not_received">No</b><br/>';
								} else {
									echo '<b id="received">Yes</b><br/>';
								}
								
								if ($row->date_time_received != NULL) {
									echo "<strong>Date Received: </strong>".$row->date_time_received;
								}
								
								echo "</td>";
								echo "<tr><td><hr/></td><td><hr/></td></tr>";
								
							}
							
							echo "</td></tr>";
							if($user_id == $row->receiver)
							{
								echo "<strong>From: </strong>";
								echo $row->first_name . ' ' . $row->last_name . '<br/>';
								echo "<strong>Location: </strong>" . $row->location . "<br/>";
								
								if ($row->verified == 0) {
									echo "<td>";
									echo "<ul id=\"navigation\">";
									echo "<li>". anchor('home/verifydoc/'.$row->tracking_id .'/'. $user_id, 'Received', 'onclick="return con(\'Are you sure to mark this document as received? Click OK or cancel button.\')"') . "</li></td>";
									break;
								} else {
									echo "<strong>Status: </strong>Received";
									
								
								}
									
								
							}
					
						}
				}
			echo "</tr>";
			echo "</table>";
		}
	}
	
?>