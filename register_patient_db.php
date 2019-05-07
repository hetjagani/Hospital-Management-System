/*
*   @author Jagani
*   @version 0.1.0
*/


<?php

require 'connect.php';
session_start();

//get person ID auto gen new person ID
$query = 'SELECT PersonId FROM Person;';

if ($run_query = mysqli_query($conn, $query) or die('Error getting data...')) {

    while ($data = mysqli_fetch_assoc($run_query)) {
        $lastid = $data['PersonId'];
    }
    if (isset($lastid)) {
        $person_id = ++$lastid;
    } else {
        $person_id = 'P00001';
    }
}

//get patient ID auto get new patient ID
$query = 'SELECT PatientId FROM Patient;';

if ($run_query = mysqli_query($conn, $query) or die('Error getting data...')) {

    while ($data = mysqli_fetch_assoc($run_query)) {
        $lastid = $data['PatientId'];
    }
    if ($lastid) {
        $patient_id = ++$lastid;
    } else {
        $patient_id = 'PA00001';
    }
}

//Add person Details
if ($_POST['patient_gen'] === 'male') {
    $gen = 0;
} elseif ($_POST['patient_gen'] === 'female') {
    $gen = 1;
} else {
    $gen = 2;
}
$person_query = 'INSERT INTO `Person` (`PersonId`, `FirstName`, `LastName`, `MiddleName`, `DateOfBirth`, `Address`, `Gender`, `Description`, `ContactNo`) VALUES ("' . $person_id . '", "' . $_POST['patient_fname'] . '", "' . $_POST['patient_lname'] . '", "' . $_POST['patient_mname'] . '", "' . $_POST['patient_dob'] . '", "' . $_POST['patient_addr'] . '", ' . $gen . ', "' . $_POST['patient_desc'] . '", "' . $_POST['patient_con'] . '");';

mysqli_query($conn, $person_query) or die(mysqli_error($conn));

//Add patient Details

$patient_query = 'INSERT INTO `Patient` (`PatientId`, `Height`, `Weight`, `BloodGroup`, `PersonId`) VALUES ("' . $patient_id . '", ' . $_POST['patient_height'] . ', ' . $_POST['patient_weight'] . ', "' . $_POST['patient_bldgrp'] . '", "' . $person_id . '");';

mysqli_query($conn, $patient_query) or die(mysqli_error($conn));

header('Location: receptionist_menu.php');
?>