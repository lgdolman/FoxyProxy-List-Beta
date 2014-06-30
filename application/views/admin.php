<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Administrators Page</title>
</head>
<body>

<div id="container">
	<h1>Administration Page</h1>
	<div id="header">
	<a href='<?php echo base_url()."main/logout"?>'>Logout</a>   
	</div>
	<div id="content">
	<?php
		
		echo "<pre>";
		print_r ($this->session->all_userdata());
        echo "</pre>";
	?>	
	</div>
	<a href='<?php echo base_url()."main/users"?>'>Add User</a>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>