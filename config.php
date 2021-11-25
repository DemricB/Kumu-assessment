<?php

/* Attempt to connect to MySQL database */
$connection = mysqli_connect('localhost', 'root', '', 'kumu_assessment');
mysqli_set_charset($connection, "utf8"); //set this to have special characters working/showing correctly in the system
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>