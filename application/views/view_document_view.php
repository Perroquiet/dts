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
if (isset($forwardListPerson)) {

	$forwardDropdown = array();
	
	foreach ($forwardListPerson as $row) {
		$forwardDropdown[$row->receiver] = $row->first_name . ' ' . $row->last_name;
	}
	
	//print_r($forwardDropdown);
} 

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
			if (isset($attachments)) {
				foreach ($attachments as $attachment) {
					echo '<tr><td><strong>Attachment: </strong>';
					echo '<a href="'.$attachment['url'].'">'.$attachment['file_name'].'</a>';
					echo '</td></tr>';
				}
			}
			echo "</table>";
			echo "<hr/>";
			
			foreach ($relations as $relation) {
				if(isset($currentLocation)) {
					echo "<strong>Current Location: </strong>";
					if ($relation->dept_id == null) {
					foreach ($currentLocation as $row) {
						echo $row->location . "<br/>";
						break;
					}
					} else {
						foreach ($currentLocation as $row) {
						echo $row->office_name . "<br/>";
						break;
					}
					
					}
				}
				break;
			}
			if (isset($currentForwarded)) {
				foreach ($currentForwarded as $detail) {
					echo "<strong>Currently forwarded to: </strong>";
					echo $detail->first_name . ' ' . $detail->last_name . "<br/><br/>";
					break;
				}
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
								echo "<td width=400px>";
								echo "<strong>From: </strong>";
								echo $row->first_name . ' ' . $row->last_name . '<br/>';
								echo "<strong>Location: </strong>" . $row->location . "<br/>";
								echo "</td>";
								if ($row->verified == 0) {
									echo "<td>";
									echo "<ul id=\"navigation\">";
									echo "<li>". anchor('home/verifydoc/'.$row->tracking_id .'/'. $user_id, 'Received', 'onclick="return con(\'Are you sure to mark this document as received? Click OK or cancel button.\')"') . "</li></td>";
									break;
								} else {
									echo "<td>";
									echo '<strong>Status: </strong><b id="received">Received</b><br/>';
									
									
									if ($row->forwarded != 0) {
										if (isset($forwardedDetails)) {
											foreach ($forwardedDetails as $forwardedNgalan) {
												echo "<strong>Forwarded to: </strong>";
												echo $forwardedNgalan->first_name . ' ' .  $forwardedNgalan->last_name . "<br/>";
												echo "<strong>Date Forwarded: </strong>" . $forwardedNgalan->date_time_forwarded;
												break;
											}
										}
									}
									else if (isset($forwardListPerson)){
										
										echo "<strong>Forward to: </strong>";
										echo form_open('home/forwardToPerson/' . $row->tracking_id);
										echo form_dropdown('forwardId', $forwardDropdown);
										echo form_submit('submit', 'Submit', 'id="sentlink" onclick="return con(\'Are you sure to send the document? Click OK or Cancel button.\');"');
										echo form_close();
									}
									echo "</td>";
									
								}
									
								
							}
					
						}
				}
			$this->load->model('home_model');
			echo "</tr>";
			echo '</table><hr/><table>';
			echo '<tr><td>';
			echo '<div class="submitComment" id="insertbeforMe">';
			echo '<h3>Add your comment</h3>';
			echo form_open('home/add_comment/'.$this->uri->segment(3).'/'.$this->home_model->get_user_id());
			echo '<p>';
			echo form_textarea('comment', '', 'placeholder="Write comment here..."' );
			echo '</p><br/>';
			echo form_submit('submit', 'Comment');
			echo form_close();
			echo '</div>';
			echo '<div><br/><br/>';
			echo '<h3>Comments:</h3>';
			echo '<br/>';
			if (isset($comments)) {
				
				foreach ($comments as $comment) {
				echo '<strong>'.$comment->first_name .' '. $comment->last_name . '</strong> ';
				echo '<font size="1">'.$comment->date_time . '</font><br/>';
				echo '&nbsp&nbsp'.$comment->message.'<br/>';
				echo '<hr/>';
				echo '</div>';
				}
			} else {
				echo 'No comments.';
			}
			
			echo '</div>';
						
			
			echo '</td></tr>';
			echo "</table>";
		}
	}
	
?>