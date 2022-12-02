<?php

$host ="localhost";
$user = "root";
$pass = "";
$db  ="eduhub";

$con=mysqli_connect($host,$user,$pass,$db);
if($con){
//    echo "Connected";
    
}else{
    echo "Failed".mysqli_error($con);
}

date_default_timezone_set("Africa/Accra");
$now = date("d-m-Y h:i:sa");

?>