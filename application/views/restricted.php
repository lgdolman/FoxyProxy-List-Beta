<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<div id="container">
	<h1>401: I'm sorry, but you don't have access to that document, sir.</h1>
	<div id="content">
	<?php
		
		echo "<p>";
		echo 'The system indicates that the file, Bravo Charlie Yankee 307604, requires at least level 10 access. <br /> Would you like to <a href="mailto:admin@localhost">submit a formal request to Director Fury</a>, sir?';
        echo "<br />";
        echo "<br />";
        echo 'Perhaps you input your authorisation code incorrectly, or provided an incorrect file identifier, would you like to <a href="http://localhost">try again?</a>';
        echo "</p>";
	?>	
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>