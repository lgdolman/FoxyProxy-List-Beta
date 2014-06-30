<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Management</title>
</head>
<body>

<div id="container">
	<h1>User Management</h1>
	<div id="content">
	    <div id="adduser">
	    <h2>Add a User</h2>
	<?php
		echo form_open('main/signup_validation');
		
		echo validation_errors();
		
		echo "<p>Email: ";
		echo form_input('email', $this->input->post('email'));
		echo "</p>";
		
        echo "<p>Confirm Email: ";
        echo form_input('cemail');
        echo "</p>";
        
        echo "<p>User will recieve two emails, one with an activation key and one with a password.";
		
		echo "<p>";
		echo form_submit('users_submit', 'Add User');
		echo "</p>";
		
		echo form_close();
		
	?>	
	</div>
	<div id="seeuser">
	<h2>Users</h2>    
	</div>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>