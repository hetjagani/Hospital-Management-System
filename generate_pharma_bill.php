<?php
require 'connect.php';
session_start();
$phar_id = $_SESSION['pharma_id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="project.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pharmacy Bill</title>
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>


        <h2>Pharmacy Bill</h2>
        <hr>
        <table>
            <tr>
                <td>Patient Contact No : </td>
            <form action="" method="post">
                <td><input type="text" name="con_no" id=""></td>
                <td><input type="date" name="date"></td>
                <td><input type="submit" name="search" value="Search" id=""></td>
            </form>
            </tr>
        </table>
        <hr>

        <?php
        // get patient id from phone number 
        if (isset($_POST)) {
            $query = 'SELECT * FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "' . $_POST['con_no'] . '"';

            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $pat_data = mysqli_fetch_assoc($run_query);
            if (isset($pat_data)) {
                $patient_id = $pat_data['PatientId'];
                $_SESSION['patient_id'] = $patient_id;
                $_SESSION['bill_date'] = $_POST['date'];
                header('Location: generate_pharma_bill_next.php');
            } else
                echo '<h4>Provided contact number is not found in database.</h4>';

            //get new bill id
            $query = 'SELECT * FROM Bill;';
            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            while ($data = mysqli_fetch_assoc($run_query)) {
                $lastid = $data['BillNo'];
            }
            if (isset($lastid)) {
                $bill_no = ++$lastid;
            } else {
                $bill_no = 'B00001';
            }

            $_SESSION['bill_no'] = $bill_no;
            //add bill entry
            $bill_query = 'INSERT INTO `Bill` (`BillNo`, `PatientId`, `Date`) VALUES ("' . $bill_no . '", "' . $patient_id . '", "' . $_POST['date'] . '");';
            mysqli_query($conn, $bill_query) or die(mysqli_error($conn));

            //add pharmasict bill 
            $pharma_bill_q = 'INSERT INTO `PharmacyBill` (`BillNo`, `PharmacistId`) VALUES ("' . $bill_no . '", "' . $phar_id . '");';
            mysqli_query($conn, $pharma_bill_q) or die(mysqli_error($conn));
        }
        ?>
        <hr>

        <form action="" method="post">

            <table>

                <tr>
                    <td>Bill No : </td>
                    <td>autogen</td>
                </tr>
                <tr>
                    <td>Patient Name : </td>
                    <td>XXXX</td>
                </tr>
                <tr>
                    <td>Date : </td>
                    <td><input type="date" name="pharm_bill_date" id=""></td>
                    <td><center>Quantity</center></td>
                </tr>
                <form method="POST">
                    <tr>
                        <td>Medicine Name : </td>
                        <td>
                            <select name="med_name" id="">
                                <option value="med1">Medicine 1</option>
                                <option value="med2">Medicine 2</option>
                                <option value="med3">Medicine 3</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="med_quan" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value ="Search" name="search">
                        </td>
                        <td>
                            <input type="submit" value="Add" name="add">
                            <input type="submit" value="Remove" name="remove">
                        </td>
                    </tr>
                    <!-- When a medicine added then it is shown below in the table. -->
                </form>

                <tr>
                    <td>Total Amount : </td>
                    <td>XXXX</td>
                </tr>


                <tr>
                    <td></td>
                    <td><input type="submit" value="SAVE"></td>
                </tr>    
            </table>
        </form>
        <hr>  
        <?php
        echo $_POST['search'];
        echo $_POST['add'];
        echo $_POST['remove'];
        echo $_POST['med_name'];
        ?>
    </center>
</body>
</html>
