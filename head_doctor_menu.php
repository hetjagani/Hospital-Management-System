<?php 
  require 'connect.php';
  session_start();

  $doc_id = $_SESSION['h_doc_id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Head Doctor Menu</title>
</head>
<body>
  <center>
    <h2> Head Doctor </h2>
    <hr>
    <a href="give_prescription.php"> Give Prescription </a> <br>
    <hr>
    <a href="view_patient_hist.php"> View Patient History </a> <br>
    <hr>
    <a href="view_lab_report.php"> View Lab Report </a> <br>
    <hr>
    <a href="add_surgery.php"> Add Surgery </a> <br>
    <hr>
    <a href="view_surgery.php"> View Surgery Details </a> <br>
    <hr>
  </center>
</body>
</html>