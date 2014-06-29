<?php
      //Setup Database Connection
	include_once 'config.inc.php'; 
    $con = mysql_connect($DBHOST, $DBUSER, $DBPASS);
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    //Select Table
    $db_selected = mysql_select_db($DBASE, $con);
    if (!$db_selected){
        die ("Can\'t use db : " . mysql_error());
    }
?>
