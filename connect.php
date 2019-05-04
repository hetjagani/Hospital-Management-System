<?php
	$servername = "localhost";
	$username = "root";
	$password = "windowsubuntu1!";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	mysqli_select_db($conn,'hoapital_mngt');

?>
