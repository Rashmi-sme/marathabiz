<?php
$servername = "localhost";
$username = "mcbi-datab";
$password = "marathichamber@12345";
$db_name = "mcbi";

// create connection

$conn = new mysqli($servername, $username, $password, $db_name);

// check connection

if ($conn -> connect_error){
    die("Connection failed: " .$conn->connect_error);
}
    