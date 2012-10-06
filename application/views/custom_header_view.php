<div id="header">
<div id="custom-header">
<table align="center" width=890px>
<tr><td align="left" class="table1">
<a href="home">
<img src=<?php echo '"' . base_url() . 'public/logob.png"'; ?> /></a>
</td>
<td align="right">
<?php
	echo "Welcome, ";
	if(isset($username)) {
		foreach ($username as $row) {
			echo $row->first_name . " " . $row->last_name;
			break;
		}
	}	

	if (isset($logged_in)) {
		echo " (" . anchor('home/logout', 'Logout') . ")";
	}
?>
</td></tr>
</table>
</div>
</div>