<div id="header">
<div id="custom-header">

<?php
	if(isset($username)) {
		echo $username . " ";
	}	

	if (isset($logged_in)) {
		echo "(" . anchor('home/logout', 'Logout') . ")";
	}
	

?></div>
</div>
<div id="home">
</div>
	<div id="cpanel">

	</div>
	<div id="rounded">


	<div id="main" class="container">
	<h1>Document Tracking System</h1>
	<h2>You Send, We Track.</h2>

	<center><?php echo "Welcome, " . $this->session->userdata('username') . "!";    
	
	?></center>

    <ul id="navigation">
    <li><a href="#page1">Home</a></li>
    <li><a href="#page2">Sent</a></li>
    <li><a href="#page3">Received</a></li>
    <li><a href="#page4">Inbox</a></li>
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
		echo '<div>Subject: <b>'.$feed->name . '</b> <i>To: '.$feed->first_name . ' '.$feed->last_name . '<br /></i>';
		echo 'Location: '.$feed->location .' Date: '.$feed->date_time . "<hr/></div>";
		
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
