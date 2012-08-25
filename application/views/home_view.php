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
<<<<<<< HEAD
	<h1>Document Tracking System</h1>
	<h2>You Send, We Track.</h2>

	<center><?php echo "Welcome, " . $this->session->userdata('username') . "!";    
	
	?></center>


=======
    <h1>Document Tracking System</h1>
       
>>>>>>> upstream/master
    <ul id="navigation">

    <li><a href="#page1">Home</a></li>
    <li><a href="#page2">Sent</a></li>
    <li><a href="#page3">Received</a></li>
<<<<<<< HEAD
    <li><?php
                if (isset($logged_in)) {
                echo anchor('home/logout', 'Logout');
                }
        ?></li>    
=======
    <li><a href="#page4">Inbox</a></li>
>>>>>>> upstream/master
    </ul>
    <div class="clear"></div>
    
    <div id="pageContent">
		<?php
		
	if(isset($user_info))
	echo "Name: " . $user_info[0] . " " . $user_info[1];
	echo "<br />Profession: " . $user_info[2] . " Location: " . $user_info[3];
	
	if(isset($feeds))
	foreach ($feeds as $feed)
	{

	}


   ?>
	<hr/>
	<div>
	To: Napoleon Jaime
	<br />
	Subject: SCS funds flowchart
	<br />
	Description: This is a highly classified document.
	<br />
	Location: Information Technology Department
	<br />
	Date: 8-21-2012 10:10 AM
	<hr/>
	</div>	
	<div>
	From: Napoleon Jaime
	<br />
	Subject: CSc 188 Grades
	<br />
	Description: Tentative grades for CSc 188 Students.
	<br />
	Location: Information Technology Department
	<br />
	Date: 8-22-2012 10:10 AM
	<hr/>
	</div>	
	
	</div>
	    
    <div class="clear"></div>
</div>
