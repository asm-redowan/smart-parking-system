<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "iotproject";

$connection = mysqli_connect($host, $user, $pass, $db) or die("Not Connected" . mysqli_error($connection));

?>