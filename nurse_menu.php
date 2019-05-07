<?php
require 'connect.php';
session_start();
$nurse_id = $_SESSION['nurse_id'];

//get nurse name
$nurse_name_q = 'SELECT * FROM Nurse JOIN Person USING(PersonId) WHERE NurseId = "' . $nurse_id . '";';
$nurse_name_run = mysqli_query($conn, $nurse_name_q) or die(mysqli_error($conn));
$nurse_data = mysqli_fetch_assoc($nurse_name_run);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="project.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nurse Menu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>

        <h2> Nurse /<?php echo '[' . $nurse_data['FirstName'] . ' ' . $nurse_data['LastName'] . ']'; ?></h2>
        <hr>
        <form action="" method="POST">
            Enter Date : <input type="Date" name="n_date"> 
            <input type="submit" value="Search">
        </form>
        <hr>

        <table border>
            <tr>
                <td> Patient Name </td>
                <td> Room No </td>
                <td> Bed No </td>
                <td> Gender </td>
                <td> Date of Birth </td>
                <td> Contact No </td>
            </tr>
            <?php
            $flag = 0;
            if (isset($_POST)) {
                $serve_query = 'SELECT * FROM Serve WHERE Date = "' . $_POST['n_date'] . '" AND NurseId = "' . $nurse_id . '";';
                $serve_run = mysqli_query($conn, $serve_query) or die(mysqli_error($conn));

                while ($serve_data = mysqli_fetch_assoc($serve_run)) {
                    $patient_name_q = 'SELECT * FROM (IPDAppointment JOIN Patient USING(PatientId)) JOIN Person USING(PersonId) WHERE IPDAppointmentId = "' . $serve_data['IPDAppointmentId'] . '"';
                    $patient_name_run = mysqli_query($conn, $patient_name_q) or die(mysqli_error($conn));
                    $patient_details = mysqli_fetch_assoc($patient_name_run);

                    if ($patient_details['Gender'] == 0) {
                        $gender = 'Male';
                    } elseif ($patient_details['Gender'] == 1) {
                        $gender = 'Female';
                    }

                    echo '<tr>
                <td> ' . $patient_details['FirstName'] . ' ' . $patient_details['LastName'] . '</td>
                <td> ' . $serve_data['RoomNo'] . ' </td>
                <td> ' . $serve_data['BedNo'] . ' </td>
                <td> ' . $gender . ' </td>
                <td> ' . $patient_details['DateOfBirth'] . ' </td>
                <td> ' . $patient_details['ContactNo'] . ' </td>
              </tr>
            ';
                    $flag = 1;
                }
            }
            if ($flag === 0) {
                echo '<h3>No Patient Assigned...</h3>';
            }
            ?>
            <br>
        </table>
        <hr>
        <a href="index.php"> LOGOUT </a> <br>
        <hr>

    </center>
</body>
</html>
