/*
*   @author Jagani
*   @version 0.1.0
*/

<?php
session_start();
$_SESSION['a_doc'] = 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="project.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Assistant Doctor Menu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>
        <div class="vertical-menu">
            <h2> Assistant Doctor </h2>
            <a href="give_prescription.php"> Give Prescription </a> <br>

            <a href="view_patient_hist.php"> View Patient History </a> <br>

            <a href="view_lab_report.php"> View Lab Report </a> <br>

            <a href="view_surgery.php"> View Surgery Details </a> <br>

            <a href="index.php"> LOGOUT </a> <br>
        </div>

    </center>  
</body>
</html>
