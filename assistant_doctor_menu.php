<?php 
  session_start();
  $_SESSION['a_doc'] = 1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Assistant Doctor Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <center>
    <h2> Assistant Doctor </h2>
    <hr>
    <a href="give_prescription.php"> Give Prescription </a> <br>
    <hr>
    <a href="view_patient_hist.php"> View Patient History </a> <br>
    <hr>
    <a href="view_lab_report.php"> View Lab Report </a> <br>
    <hr>
    <a href="view_surgery.php"> View Surgery Details </a> <br>
    <hr>
    <a href="index.php"> LOGOUT </a> <br>
    <hr>
  </center>  
</body>
</html>