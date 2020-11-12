<?php
$con = mysqli_connect("localhost", "root", "" , "hms") or die("connectoin was not established");

if(!$con){
    echo("connection error".mysqli_connect_error());
}

?>
