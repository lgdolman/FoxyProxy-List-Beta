<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

<div id="container">
	<h1>Login</h1>
	<div id="content">
	<?php
		
		echo form_open('main/login_validation');
		
		echo validation_errors();
		
		echo "<p>Email: ";
		echo form_input('email', $this->input->post('email'));
		echo "</p>";
		
		echo "<p>Password: ";
		echo form_password('password');
		echo "</p>";
		
		echo "<p>";
		echo form_submit('login_submit', 'Login');
		echo "</p>";
		
		echo form_close();
		
	?>	
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>