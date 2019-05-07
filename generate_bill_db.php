<?php

require 'connect.php';
session_start();

$recept_id = $_SESSION['recept_id'];

$query = 'SELECT BillNo FROM Bill;';

if ($run_query = mysqli_query($conn, $query) or die('Error getting data...')) {

    while ($data = mysqli_fetch_assoc($run_query)) {
        $lastid = $data['BillNo'];
    }
    if (isset($lastid)) {
        $bill_no = ++$lastid;
    } else {
        $bill_no = 'B00001';
    }
}

//add data in bill table
$bill_query = 'INSERT INTO `Bill` (`BillNo`, `TotalAmount`, `PatientId`, `Date`) VALUES ("' . $bill_no . '", "' . $_POST['bill_amt'] . '", "' . $_POST['bill_pat_id'] . '", "' . $_POST['bill_date'] . '");';

mysqli_query($conn, $bill_query) or die(mysqli_error($conn));

//add data in opd bill table
$opd_query = 'INSERT INTO `OPDBill` (`BillNo`, `DoctorId`, `ReceptionistId`) VALUES ("' . $bill_no . '", "' . $_POST['bill_doc'] . '", "' . $recept_id . '");';
mysqli_query($conn, $opd_query) or die(mysqli_error($conn));

header('Location: receptionist_menu.php')
?>