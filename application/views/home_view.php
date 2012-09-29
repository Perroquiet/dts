<div id="header">
<div id="custom-header">

<?php
	if(isset($username)) {
		foreach ($username as $row) {
			echo $row->first_name . " " . $row->last_name;
		}
	}	

	if (isset($logged_in)) {
		echo " (" . anchor('home/logout', 'Logout') . ")";
	}
	

?></div>
</div>
<div id="home">
</div>
	<div id="cpanel">

	</div>
	<div id="rounded">


	<div id="main" class="container">

    <ul id="navigation">
    <li><?php echo anchor('home', "Home"); ?></li>
    <li><?php echo anchor('home/sort_send', "Sent"); ?></li>
    <li><?php echo anchor('home/sort_received', "Received"); ?></li>
    <li><?php echo anchor('home/not_verified', "Inbox"); ?></li>
	<li><?php echo anchor("send", "Send"); ?></li>
    </ul>

    <div class="clear"></div>
    
    <div id="pageContent">
		<?php
		
	// if(isset($user_info))
	// echo "Name: " . $user_info[0] . " " . $user_info[1];
	// echo "<br />Profession: " . $user_info[2] . " Location: " . $user_info[3];
	
	if(isset($feeds))
	foreach ($feeds as $feed)
	{
		//print_r($feeds);
		echo '<table><tr><td width=1000px><div>Subject: <b>'.anchor('home/viewitem/'.$feed->tracking_id, $feed->name) . '</b> <i>';
		// echo ' Received: ';
		
		// if ($feed->verified == 0) {
			// echo "No";
		// } else {
			// echo "Yes";
		// }
		// echo "<br/>";
		if($user_id == $feed->sender) {
			echo "To: ";
		} else { 
			echo "From: ";
		}
		if(isset($is_receiver)) {
			foreach ($is_receiver as $sender)
			{
				echo $sender->first_name . ' ' . $sender->last_name . '<br /></i>';
			}
		} else {
			echo $feed->first_name . ' '.$feed->last_name . '<br /></i>';
		}
		
		echo 'Date Sent: '.$feed->date_time_sent . "</br>";
		if ($feed->date_time_received != NULL) {
			echo 'Date Received: '. $feed->date_time_received . "</td>";
		} 		
		echo "<td></div><div float=right>";
		echo "<ul id=\"navigation\">";
		echo "<li>".anchor('home/viewitem/'.$feed->tracking_id,'View')."</li>";
		echo "</ul>";
		echo "</td></div></tr></table><hr/>";
		
	}
	
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
   	</div>
	    
    <div class="clear"></div>
</div>

<?php

function formatTweet($tweet,$dt)

{
	if(is_string($dt)) $dt=strtotime($dt);

	$tweet=htmlspecialchars(stripslashes($tweet));

	return'
	<li>
	<a href="#"><img class="avatar" src="img/avatar.jpg" width="48" height="48" alt="avatar" /></a>
	<div class="tweetTxt">
	<strong><a href="#">demo</a></strong> '. preg_replace('/((?:http|https|ftp):\/\/(?:[A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?[^\s\"\']+)/i','<a href="$1" rel="nofollow" target="blank">$1</a>',$tweet).'
	<div class="date">'.relativeTime($dt).'</div>
	</div>
	<div class="clear"></div>
	</li>';

}

?>
