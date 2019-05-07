<?php
  require 'connect.php';
  session_start();

  $lab_incharge_id = $_SESSION['lab_in_id'];

  //add report entry
  $add_report_q = 'INSERT INTO `Report` (`ReportNo`, `DATE`) VALUES ("'.$_POST['report_id'].'", "'.$_POST['report_date'].'");';
  mysqli_query($conn, $add_report_q) or die(mysqli_error($conn));

  //add lab report entry
  $add_lab_rep_q = 'INSERT INTO `LabReport` (`ReportNo`, `TestId`, `Results`, `Remarks`, `LabInchargeId`, `PatientId`) VALUES ("'.$_POST['report_id'].'", "'.$_POST['test_id'].'", "'.$_POST['lab_result'].'", "'.$_POST['remarks'].'", "'.$lab_incharge_id.'", "'.$_POST['patient_id'].'");';
  mysqli_query($conn, $add_lab_rep_q) or die(mysqli_error($conn));

  header('Location: lab_incharge_menu.php');
?>