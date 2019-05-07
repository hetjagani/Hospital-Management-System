<?php

require 'connect.php';
session_start();

$surg_no = $_SESSION['surg_no'];
//add the surgery
$surgery_add_q = 'INSERT INTO `Surgery` (`SurgeryNo`, `DoctorId`, `RoomNo`, `IPDAppointmentID`, `DateOfAdmission`) VALUES ("' . $_POST['surg_no'] . '", "' . $_POST['h_doc_id'] . '", "' . $_POST['sur_room'] . '", "' . $_POST['ipd_appoi_id'] . '", "' . $_POST['date_of_add'] . '");';
mysqli_query($conn, $surgery_add_q) or die(mysqli_error($conn));

header('Location: add_surgery_complete.php');
?>