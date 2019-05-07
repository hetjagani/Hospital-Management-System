<?php
require 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="project.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lab Incharge Menu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>
        <div class="vertical-menu">

            <h2> Lab Incharge </h2>
            <hr>
            <a href="generate_lab_report.php"> Generate Lab Report </a> <br>
            <a href="generate_lab_bill.php"> Generate Lab Bill </a> <br>
            <a href="view_lab_bill.php"> View Lab Bill </a> <br>
            <hr>
            <a href="index.php"> LOGOUT </a> <br>
        </div>
    </center>
</body>
</html>
