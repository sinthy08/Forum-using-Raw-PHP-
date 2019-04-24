<?php 

/*please create the database as per the instructions on the attached folder...
thank you*/


 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "online_forum";

 // Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) 
{
    die("Connection failed" . mysqli_connect_error());
}



?>