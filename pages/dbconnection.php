<?php
$server='localhost';
$user='root';
$pass='';
$dbname = "dbbank";
$conn=mysqli_connect($server,$user,$pass,$dbname);
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>
