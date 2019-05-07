<?php

require 'connect.php';
session_start();

//create report table entry
$rep_query = 'INSERT INTO `Report` (`ReportNo`, `DATE`) VALUES ("' . $_POST['prec_id'] . '", "' . $_POST['prec_date'] . '");';
mysqli_query($conn, $rep_query) or die(mysqli_error($conn));

//save prec details
$prec_query = 'INSERT INTO `Prescription` (`ReportNo`, `Details`, `OPDAppointmentId`, `DoctorId`) VALUES ("' . $_POST['prec_id'] . '", "' . $_POST['prec_details'] . '", "' . $_POST['opd_appoi_id'] . '", "' . $_POST['doc_id'] . '");';
mysqli_query($conn, $prec_query) or die(mysqli_error($conn));

if ($_SESSION['h_doc'] === 1) {
    header('Location: head_doctor_menu.php');
} elseif ($_SESSION['a_doc'] === 1) {
    header('Location: assistant_doctor_menu.php');
}
?>