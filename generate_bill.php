<?php
require 'connect.php';
session_start();

$recept_id = $_SESSION['recept_id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="project.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Appointment Bill</title>
    </head>
    <body>

    <center>
        <p>  Hospital Management System  </p>
        <h2>Appointment Bill</h2>
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
        <hr>

        <?php
        // get patient id from phone number 
        if (isset($_POST)) {
            $query = 'SELECT PatientId, PersonId, ContactNo, FirstName, LastName FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "' . $_POST['con_no'] . '"';

            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $pat_data = mysqli_fetch_assoc($run_query);
            if (isset($pat_data)) {
                $patient_id = $pat_data['PatientId'];
            } else
                echo '<h4>Provided contact number is not found in database.</h4>';
        }

        // get receptionist name 
        $recept_name_q = 'SELECT FirstName, LastName FROM Person JOIN Receptionist USING(PersonId) WHERE ReceptionistId = "' . $recept_id . '";';

        $run = mysqli_query($conn, $recept_name_q) or die(mysqli_error($conn));
        $name = mysqli_fetch_assoc($run);
        $recept_name = $name['FirstName'] . ' ' . $name['LastName'];
        ?>
        <a href="receptionist_menu.php">Goto Receptionist menu</a>
        <form action="generate_bill_db.php" method="POST">
            <table border>

                <tr>
                    <td>Date : </td>
                    <td><input type="date" name="bill_date" id=""></td>
                </tr>
                <tr>
                    <td>Receptionist Name : </td>
                    <td><?php echo $recept_name; ?></td>
                </tr>
                <tr>
                    <td>Doctor Name : </td>
                    <td>
                        <select name="bill_doc" id="">
                            <?php
                            //get all the doctors ID and name
                            $doc_query = 'SELECT FirstName, LastName, DoctorId FROM Person JOIN Doctor USING(PersonId);';
                            if ($run = mysqli_query($conn, $doc_query) or die(mysqli_error($conn))) {
                                while ($doc_data = mysqli_fetch_assoc($run)) {
                                    echo '<option value="' . $doc_data['DoctorId'] . '">' . $doc_data['FirstName'] . ' ' . $doc_data['LastName'] . ' (' . $doc_data['DoctorId'] . ')</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Patient Name : <?php echo $pat_data['FirstName'] . ' ' . $pat_data['LastName'] ?> </td>
                    <td>Patient ID : <input type="text" name="bill_pat_id" value=<?php echo '"' . $patient_id . '"'; ?>></td>
                </tr>
                <tr>
                    <td>Total Amount : </td>
                    <td><input type="text" name="bill_amt" id=""></td>
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
