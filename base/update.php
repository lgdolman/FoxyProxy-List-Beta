<?php
    //Enable the database
include 'connect.php';
include 'config.inc.php';
$table = $DBTAB;
$JSON = 'work is done. Would you like to parse a new <a href="'.$HOST.'file.php" title="Update JSON!" target="_self">JSON?</a> (You should do this now instead of going back!)';

    //Get Data
if(isset($_POST['name'], $_POST['domain'], $_POST['tld'], $_POST['password'])){
        $name = trim(preg_replace('/[^a-z^1-9^-]/', "", strtolower($_POST['name'])));
        $domain = trim(preg_replace('/[^a-z^1-9^-]/', "", strtolower($_POST['domain'])));
        $tld = trim(preg_replace('/[^a-z^1-9]/', "", strtolower($_POST['tld'])));
        $password = trim(preg_replace('/[^a-z^1-9]/', "", ($_POST['password'])));
}
else
{
        echo "We think you missed something, try again?", '</br>';
};

    //Check Password
if($password === $PASS)
{
    
    //Check Duplicate
            $results = mysql_query("SELECT * FROM $table WHERE Domain='$domain' AND Tld='$tld'") or die (mysql_error());
            $num_rows = mysql_num_rows($results);
                if ($num_rows > 0) 
                {
                    //Close Database Connection
                    mysql_close($con);
                    echo 'Error! '.$domain.'.'.$tld.' is already on the list! Have you refreshed your list?'; 
                    echo '<p>Go back to the <a href="'.$HOST.'" title="Add a new site!" target="_self">add page?</a>';
                    
                }
                else 
                {
    
    //Insert Record
                    $insertSite_sql = "INSERT INTO $table (Name, Domain, Tld) VALUES('$name', '$domain', '$tld')";
                    mysql_query($insertSite_sql) or die (mysql_error());
                    //Close Database Connection
                    mysql_close($con);
                    echo "</br>{$name} - {$domain}.{$tld} has been added to the database! Remember to refresh your list!";
                    include 'file.php';                   
echo <<<MOVE
$JSON
MOVE;
                }
    }
    else 
    {
    echo 'Error! There was an issue with that password!';
    };
   
?>
