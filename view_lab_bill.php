<?php
  require 'connect.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lab Bill</title>
</head>
<body>
  
  <center>
  <h2>Lab Bills</h2>
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
    if(isset($_POST)){
      $query = 'SELECT * FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "'.$_POST['con_no'].'"';

      $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $pat_data = mysqli_fetch_assoc($run_query);
      if(isset($pat_data)){
        $patient_id = $pat_data['PatientId'];
        $patient_name = $pat_data['FirstName'].' '.$pat_data['LastName'];
      }else
          echo '<h4>Provided contact number is not found in database.</h4>';

      //fetch the lab bill data
      $lab_bill_q = 'SELECT * FROM Bill JOIN LabBill USING(BillNo) WHERE PatientId = "'.$patient_id.'";';
      $run_lab_bill = mysqli_query($conn, $lab_bill_q) or die(mysqli_error($conn));

      $flag = 0;

      while($lab_bill_data = mysqli_fetch_assoc($run_lab_bill)) {

        //lab incharge name
        $lab_inc_name_q = 'SELECT * FROM LabIncharge JOIN Person USING(PersonId) WHERE LabInchargeId = "'.$lab_bill_data['LabInchargeId'].'";';
        $run_lab_inch = mysqli_query($conn, $lab_inc_name_q) or die(mysqli_error($conn));
        $lab_inch_data = mysqli_fetch_assoc($run_lab_inch);

        //test name list
        $test_name = [
          '001' => 'blood test',
          '002' => 'urine test',
          '003' => 'blood pressure check',
          '004' => 'eyes checkup'
        ];

        echo '<table>
              <tr>
                <td>Bill Date : </td>
                <td>'.$lab_bill_data['Date'].'</td>
              </tr>
              <tr>
                <td>Bill No : </td>
                <td>'.$lab_bill_data['BillNo'].'</td>
              </tr>
              <tr>
                <td>Lab Incharge Name : </td>
                <td>'.$lab_inch_data['FirstName'].' '.$lab_inch_data['LastName'].'</td>
              </tr>
              <tr>
                <td>Test :  </td>
                <td>'.$test_name[$lab_bill_data['TestId']].'</td>
              </tr>
              <tr>
                <td>Test Details : </td>
                <td>'.$lab_bill_data['TestDetails'].'</td>
              </tr>
              <tr>
                <td>Total Amount :</td>
                <td>'.$lab_bill_data['TotalAmount'].'</td>
              </tr>
            </table>
            <hr>';  

        $flag = 1;
      }

      if($flag === 0) {
        echo '<h3>No bill found for the given patient..</h3>';
      }
    }
  ?>

  


  </center>
</body>
</html>