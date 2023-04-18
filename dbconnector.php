<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xchange";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("Connection failed: ". conn -> connect_error);
}

echo "connected successfully <br/>";

?>