<?php
  require 'connect.php';
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lab Incharge Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<center>
    <h2> Lab Incharge </h2>
    <hr>
    <a href="generate_lab_report.php"> Generate Lab Report </a> <br>
    <hr>
    <a href="generate_lab_bill.php"> Generate Lab Bill </a> <br>
    <hr>
    <a href="view_lab_bill.php"> View Lab Bill </a> <br>
    <hr>
    <a href="index.php"> LOGOUT </a> <br>
    <hr>
  </center>
</body>
</html>