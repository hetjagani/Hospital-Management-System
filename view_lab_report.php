/*
*   @author Jagani
*   @version 0.1.0
*/


<?php
require 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="project.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lab Report</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    <center>
        <p>  Hospital Management System  </p>

        <h2>Patient Lab Reports</h2>
        <hr>
        <table>
            <tr>
                <td>Patient Contact No : </td>
            <form action="" method="post">
                <td><input type="text" name="con_no" id=""></td>
                <td><input type="submit" name="search" value="Search" id=""></td>
            </form>
            </tr>
        </table>
        <?php
        // get patient details from phone number 
        if (isset($_POST)) {
            $query = 'SELECT * FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "' . $_POST['con_no'] . '"';

            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $pat_data = mysqli_fetch_assoc($run_query);
            if (isset($pat_data)) {
                $patient_id = $pat_data['PatientId'];
                $patient_name = $pat_data['FirstName'] . ' ' . $pat_data['LastName'];
                if ($pat_data['Gender'] == 0) {
                    $gender = 'male';
                } elseif ($pat_data['Gender'] == 1) {
                    $gender = 'female';
                }
            } else
                echo '<h4>Provided contact number is not found in database.</h4>';
        }
        if ($_SESSION['h_doc'] === 1) {
            echo '<a href="head_doctor_menu.php">Head Doctor Menu</a>';
        } elseif ($_SESSION['a_doc'] === 1) {
            echo '<a href="assistant_doctor_menu.php">Assistant Doctor Menu</a>';
        }

        //get lab reports of the patient
        $lab_rep_que = 'SELECT * FROM LabReport JOIN Report USING(ReportNo) WHERE PatientId = "' . $patient_id . '" ORDER BY DATE DESC;';
        $run_lab_rep = mysqli_query($conn, $lab_rep_que) or die(mysqli_error($conn));
        ?>

        <?php
        while ($report_data = mysqli_fetch_assoc($run_lab_rep)) {
            $test_name = [
                '001' => 'blood test',
                '002' => 'urine test',
                '003' => 'blood pressure check',
                '004' => 'eyes checkup'
            ];

            //lab incharge name
            $lab_inc_q = 'SELECT * FROM LabIncharge JOIN Person USING(PersonId) WHERE LabInchargeId = "' . $report_data['LabInchargeId'] . '";';
            $run = mysqli_query($conn, $lab_inc_q) or die(mysqli_error($conn));

            $inc_data = mysqli_fetch_assoc($run);
            $lab_inchrg_name = $inc_data['FirstName'] . ' ' . $inc_data['LastName'];

            echo '<table>
    <tr>
      <td>Date : </td>
      <td>' . $report_data['DATE'] . '</td>
    </tr>
    <tr>
    <td>Patient Name : </td>
    <td>' . $patient_name . '</td>
    </tr>
    <tr>
      <td>Lab Incharge Name : </td>
      <td>' . $lab_inchrg_name . '</td>
    </tr>
    <tr>
      <td>Report No : </td>
      <td>' . $report_data['ReportNo'] . '</td>
    </tr>
    <tr>
      <td>Test : </td>
      <td>' . $test_name[$report_data['TestId']] . '</td>
    </tr>
    <tr>
      <td>Results : </td>
      <td>' . $report_data['Results'] . '</td>
    </tr>
    <tr>
      <td>Remarks : </td>
      <td>' . $report_data['Remarks'] . '</td>
    </tr>
    
  </table>
  <hr>';
        }
        ?>


    </center>

</body>
</html>
