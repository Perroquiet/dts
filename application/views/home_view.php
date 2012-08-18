<div id="home">
	<div id="cpanel">
	<?php
		if (isset($logged_in)) {
		echo anchor('home/logout', 'Logout');
		}
	?>
	</div>
	<div>
	<h1>Sent Documents</h1>
	<table>
	<tbody>
		<tr>
		<td>
			Sample doc.
		</td>
		</tr>
		<tr>
		<td>
			To: Prof. James Bond at CS Dept.
		</td>
		</tr>
		<tr>
		<td>
			Verified: No
		</td>
		</tr>
	</tbody>
	</table>
	</div>
</div>