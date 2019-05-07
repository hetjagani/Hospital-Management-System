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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="project.css">

        <title>View Surgery</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>
        <h2>Surgeries</h2>
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
        // get patient id from phone number 
        if (isset($_POST)) {
            $query = 'SELECT * FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "' . $_POST['con_no'] . '"';

            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $pat_data = mysqli_fetch_assoc($run_query);
            if (isset($pat_data)) {
                $patient_id = $pat_data['PatientId'];
            } else
                echo '<h4>Provided contact number is not found in database.</h4>';
        }

        //get all the IPD appointments and surgery from patient ID
        $sur_que = 'SELECT * FROM IPDAppointment JOIN Surgery USING(IPDAppointmentId) WHERE PatientId = "' . $patient_id . '" ORDER BY Surgery.DateOfAdmission DESC;';
        $sur_run = mysqli_query($conn, $sur_que) or dir(mysqli_error($conn));
        if ($_SESSION['h_doc'] === 1) {
            echo '<a href="head_doctor_menu.php">Head Doctor Menu</a>';
        } elseif ($_SESSION['a_doc'] === 1) {
            echo '<a href="assistant_doctor_menu.php">Assistant Doctor Menu</a>';
        }
        ?>

        <?php
        while ($sur_data = mysqli_fetch_assoc($sur_run)) {
            //doctor name
            $doc_query = 'SELECT * FROM Doctor JOIN Person USING(PersonId) WHERE DoctorId = "' . $sur_data['DoctorId'] . '";';
            $doc_run = mysqli_query($conn, $doc_query) or die(mysqli_error($conn));
            $doc_details = mysqli_fetch_assoc($doc_run);

            echo '<table>
  <tr>
    <td>Date Of Admission : </td>
    <td>' . $sur_data['DateOfAdmission'] . '</td>
  </tr>
  <tr>
    <td>Surgery No : </td>
    <td>' . $sur_data['SurgeryNo'] . '</td>
  </tr>
  <tr>
    <td>Doctor Name : </td>
    <td>' . $doc_details['FirstName'] . ' ' . $doc_details['LastName'] . '</td>
  </tr>
  <tr>
    <td>Room No : </td>
    <td>' . $sur_data['RoomNo'] . '</td>
  </tr>
  <tr>
    <td>Bed No : </td>
    <td>' . $sur_data['BedNo'] . '</td>
  </tr>
  <tr>
    <td>Patient Name : </td>
    <td>' . $pat_data['FirstName'] . ' ' . $pat_data['LastName'] . '</td>
  </tr>';

            //getting all assistant docs for surgery
            $assi_doc_q = 'SELECT * FROM (AssistantDoctor_Operates_Surgery JOIN Doctor USING(DoctorId)) JOIN Person USING(PersonId) WHERE SurgeryNo = "' . $sur_data['SurgeryNo'] . '";';
            $assi_doc_run = mysqli_query($conn, $assi_doc_q) or die(mysqli_error($conn));

            $count = 1;
            while ($assi_data = mysqli_fetch_assoc($assi_doc_run)) {
                echo '<tr>
              <td>Assistant Doctor (' . $count . ') : </td>
              <td>' . $assi_data['FirstName'] . ' ' . $assi_data['LastName'] . '</td>
              </tr>';
                $count++;
            }
            echo '</table> <hr>';
        }
        ?>


    </center>
</body>
</html>
