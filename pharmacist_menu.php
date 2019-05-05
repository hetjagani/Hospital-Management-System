<?php
  require 'connect.php';
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pharmacist Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <center>
    <h2> Pharmacist </h2>
    <hr>
    <a href="view_available_med.php"> View Available Medicine </a> <br>
    <hr>
    <a href="generate_pharma_bill.php"> Generate Bill </a> <br>
    <hr>
    <a href="enter_medicine.php"> Enter Medicine </a> <br>
    <hr>
    <a href="index.php"> LOGOUT </a> <br>
    <hr>
  </center>
</body>
</html>