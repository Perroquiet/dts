<div id="home">
</div>
	<div id="cpanel">
	</div>
	<div id="rounded">
	<div id="main" class="container">
    <h1>Document Tracking System</h1>
    <h2>You Send, We Track.</h2>
    
    <ul id="navigation">
    <li><a href="#page1">Home</a></li>
    <li><a href="#page2">Sent</a></li>
    <li><a href="#page3">Received</a></li>
    <li><?php
		if (isset($logged_in)) {
		echo anchor('home/logout', 'Logout');
		}
	?></li>
    </ul>
    
    <div class="clear"></div>
    
    <div id="pageContent">
    </div>
    <div class="clear"></div>
</div>