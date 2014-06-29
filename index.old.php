<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add a new site pattern</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
<?php 
	include_once 'config.inc.php';
?>
	<h2 class="h2">Daedalus Censor Smasher!</h2>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
	  <h1><a>Add a new site pattern</a></h1>
		<form id="addsite" class="appnitro"  method="post" action="update.php">
					<div class="form_description">
			<h2>Add a new site to the list!</h2>
			<p>Don't forget to manually refresh your pattern after adding a new site or else you will have to wait for your browsers list to expire. If you  believe that we have missed a site please send an email to <?php echo $EMAIL?> with the site's url, name and a screenshot of the block screen. Please note we will only unblock original censored content, so no proxies please as this methood makes them redundant, that does not breach our moral code. To use this list you will need to <a href="http://getfoxyproxy.org/subscriptions/patterns/import.html" title="help adding a new pattern subscription" target="new">add a pattern subscription</a> in  <a href="http://getfoxyproxy.org/downloads.html" title="FoxyProxy Standard Download" target="new">FoxyProxy Standard</a> that points to <b><?php echo $HOST ?>patterns.json</b> with a refresh  time of no less than 200 minutes. Need <a href="<?php echo $HOST ?>help.html" title="help adding a new pattern subscription" target="new">Help?</a> </p>
</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Site Name <inline class="Ast">*</inline></label>
		<div>
		  <input id="name" name="name" class="element text medium" type="text" maxlength="255" value="Site" required="required"/>
		</div><p class="guidelines" id="guide_1"><small>What is the name of the site you wish to add</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="domain">Site Domain <inline class="Ast">*</inline></label>
		<div>
			<input id="domain" name="domain" class="element text large" type="text" maxlength="255" value="example" required="required"/> 
		</div><p class="guidelines" id="guide_2"><small>What is the domain name for this site without the subdomain or TLD? For example for http://www.subdomin.example.com/index you should only put "example" here. </small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">TLD  <inline class="Ast">*</inline></label>
		<div>
			<input id="tld" name="tld" class="element text medium" type="text" maxlength="255" value="com" required="required"/> 
		</div><p class="guidelines" id="guide_3"><small>What is the Top-level Domain for this site? For example for http://www.subdomin.example.com/index you should only put "com" here.  </small></p> 
		</li>		<li id="li_4" style="padding-top:20px;" >
		<label class="description" for="password">Password  <inline class="Ast">*</inline></label>
		<div>
			<input id="password" name="password" class="element text large" type="password" maxlength="255" value="" required="required"/> 
		</div><p class="guidelines" id="guide_4"><small>Enter the administration password to add a new site. This is to stop abuse. </small></p> 
		</li>
			
					<li class="buttons"></li>
					<span class="buttons">
					<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
					</span>
			</ul>
		</form>
      <div><p class="Ast" style="text-align:left;">&nbsp;&nbsp;&nbsp; * Required</p>	
		</div><div id="footer">
		  <a href="<?php echo $HOST ?>file.php" title="JSON Parsed!" target="_self">Update JSON?</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
