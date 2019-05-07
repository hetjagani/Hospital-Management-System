/*
*   @author Jagani
*   @version 0.1.0
*/


<?php
require 'connect.php';
session_start();

//get all the medicine data
$get_med_q = 'SELECT * FROM Medicine';
$med_run = mysqli_query($conn, $get_med_q) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="project.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Available Medicines</title>
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>


        <h2>Available Medicines</h2>

        <table border>

            <tr>
                <td>Medicine ID</td>
                <td>Medicine Name</td>
                <td>Medicine Company</td>
                <td>Medicine Type</td>
                <td>Drug Description</td>
                <td>Per Medicine Cost</td>
                <td>Quantity</td>
            </tr>
            <?php
            while ($med_data = mysqli_fetch_assoc($med_run)) {
                echo '<tr>
          <td>' . $med_data['MedicineId'] . '</td>
          <td>' . $med_data['MedicineName'] . '</td>
          <td>' . $med_data['CompanyName'] . '</td>
          <td>' . $med_data['MedicineType'] . '</td>
          <td>' . $med_data['DrugDescription'] . '</td>
          <td>' . $med_data['Cost'] . '</td>
          <td>' . $med_data['Quantity'] . '</td>
        </tr>';
            }
            ?>
        </table>



    </center>
</body>
</html>
