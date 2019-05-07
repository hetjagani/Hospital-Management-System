/*
*   @author Jagani
*   @version 0.1.0
*/

<?php

$servername = "localhost";
$username = "root";
$password = "devyask47";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($conn, 'hospital_mngt');
?>
