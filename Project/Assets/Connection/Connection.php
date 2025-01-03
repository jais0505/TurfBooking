<?php
$server="localhost";
$user="root";
$password="";
$DB="db_turfbooking";
$Con=mysqli_connect($server,$user,$password,$DB);
if(!$Con)
{
	echo "Not connected";
}
?>