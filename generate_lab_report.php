<?php
require 'connect.php';
session_start();
$lab_inch_id = $_SESSION['lab_in_id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="project.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lab Report</title>
    </head>
    <body>

    <center>
        <p>  Hospital Management System  </p>

        <h2>Lab Report</h2>
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
                $patient_name = $pat_data['FirstName'] . ' ' . $pat_data['LastName'];
            } else
                echo '<h4>Provided contact number is not found in database.</h4>';
        }

        //generate prescription ID
        $query = 'SELECT ReportNo FROM Report;';

        if ($run_query = mysqli_query($conn, $query) or die('Error getting data...')) {
            while ($data = mysqli_fetch_assoc($run_query)) {
                $lastid = $data['ReportNo'];
            }
            if (isset($lastid)) {
                $lab_rep_no = ++$lastid;
            } else {
                $lab_rep_no = 'Rep00001';
            }
        }

        //test ID list
        $test_name = [
            '001' => 'blood test',
            '002' => 'urine test',
            '003' => 'blood pressure check',
            '004' => 'eyes checkup'
        ];
        ?>
        <hr>

        <form action="generate_lab_report_db.php" method="POST" id="lab_rep_form">
            <table>
                <tr>
                    <td>Report ID : </td>
                    <td><input type="text" name="report_id" value= <?php echo '"' . $lab_rep_no . '"'; ?> ></td>
                </tr>
                <tr>
                    <td>Lab Incharge ID : </td>
                    <td><input type="text" name="lab_inch_id" value= <?php echo '"' . $lab_inch_id . '"'; ?> ></td>
                </tr>
                <tr>
                    <td>Patient ID : </td>
                    <td><input type="text" name="patient_id" value= <?php echo '"' . $patient_id . '"'; ?> ></td>
                </tr>
                <tr>
                    <td>Date : </td>
                    <td><input type="date" name="report_date"></td>
                </tr>
                <tr>
                    <td>Test :  </td>
                    <td>
                        <select name="test_id" id="">
                            <?php
                            foreach ($test_name as $id => $name) {
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>

                        </select></td>
                </tr>
                <tr>
                    <td>Results : </td>
                    <td><textarea name="lab_result" form="lab_rep_form" cols="50" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td>Remarks : </td>
                    <td><textarea rows="4" cols="50" name="remarks" form="lab_rep_form"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SAVE"></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
