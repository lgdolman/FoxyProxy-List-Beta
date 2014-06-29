<?php
    //Enable the database
Require 'connect.php';
include_once 'config.inc.php'; 

    //Set Query to SELECT 3 Columns from Table when Field 4 is set to true
$result = mysql_query("SELECT Name, Domain, Tld FROM $DBTAB WHERE Enabled='1'") or die (mysql_error());

    //Build arrays
while ($row = mysql_fetch_array($result)) {
        $new_array[$row['Name']]['Name'] = $row['Name'];
        $new_array[$row['Name']]['Domain'] = $row['Domain'];
        $new_array[$row['Name']]['Tld'] = $row['Tld'];
}

    //Close Database Connection
mysql_close($con);

    //Open and wipe JSON, Redundant Failsafe
$myFile = "patterns.json";
$fh = fopen($myFile, 'w') or die("can't open file");
fclose($fh);

    //Start output buffer
ob_start();

    //print out initialisation line
Echo $Pretax = <<<PRETAX
{ "patterns": [
PRETAX;
$endvar=end($new_array);

    //Print each result with formatting
foreach($new_array as $array){

 if($array==$endvar)
{
    //print out last result   
require 'format.php';
}
else
{
    //print out all but last result   
require 'format.php';
Echo ", ";

};

};

    //Write Postax
Echo "]}";

    //Write buffer to file
$content = ob_get_contents();
ob_end_clean(); //Cleans output
$f = fopen("patterns.json", "w");
fwrite($f, $content);
fclose($f);
?> 

<html>
<body>
</br>
<p>
All work is done. Go back to the <a href="<?php echo $HOST ?>" title="Add a new site!" target="_self">add page?</a>
</p>
</body>
</html>
