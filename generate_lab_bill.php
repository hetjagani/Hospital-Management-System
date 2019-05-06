<?php
  require 'connect.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="project.css">
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lab Bill</title>
</head>
<body>

  <center>
      <p>  Hospital Management System  </p>

  <h2>Lab Bill</h2>
  <hr>
  <table>
    <tr>
        <td>Patient Contact No : </td>
          <form action="" method="post">
            <td><input type="text" name="con_no" id=""></td>
            <td><input type="date" name="rep_date" id=""></td>
            <td><input type="submit" name="search" value="Search"></td>
          </form>
    </tr>
  </table>
  <hr>
  <?php
    // get patient id from phone number 
    if(isset($_POST['search'])){
      $query = 'SELECT * FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "'.$_POST['con_no'].'"';

      $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $pat_data = mysqli_fetch_assoc($run_query);
      if(isset($pat_data)){
        $patient_id = $pat_data['PatientId'];
        $patient_name = $pat_data['FirstName'].' '.$pat_data['LastName'];
      }else
          echo '<h4>Provided contact number is not found in database.</h4>';
      
      //fetch report data
      $rep_query = 'SELECT * FROM LabReport JOIN Report USING(ReportNo) WHERE PatientId = "'.$patient_id.'" AND DATE = "'.$_POST['rep_date'].'";';
      $rep_run_query = mysqli_query($conn, $rep_query) or die(mysqli_error($conn));
      
      //auto gen billId
      $query = 'SELECT BillNo FROM Bill;'; 
      $run_query = mysqli_query($conn,$query) or die(mysqli_error($conn));
      while($data = mysqli_fetch_assoc($run_query)){
        $lastid =  $data['BillNo'];
      }
      if(isset($lastid)){
        $bill_no = ++$lastid;
      }else{
        $bill_no = 'B00001';
      }

      //test amount list
      $test_amount = [
          '001' => 500,
          '002' => 500,
          '003' => 200,
          '004' => 200
        ];
      $test_name = [
          '001' => 'blood test',
          '002' => 'urine test',
          '003' => 'blood pressure check',
          '004' => 'eyes checkup'
        ];

      $flag = 0;
      $total_amount = 0;
      while ($rep_data = mysqli_fetch_assoc($rep_run_query)) {
        //get lab incharge name
        $lab_inc_q = 'SELECT * FROM LabIncharge JOIN Person USING(PersonId) WHERE LabInchargeId = "'.$rep_data['LabInchargeId'].'";';
        $run_q = mysqli_query($conn, $lab_inc_q) or die(mysqli_error($conn));
        $lab_inc_data = mysqli_fetch_assoc($run_q);
        $rep_date = $rep_data['DATE']; 
        $pickup_date = ++$rep_data['DATE'];
        echo '<table>
              <tr>
                <td>Date : </td>
                <td>'.$rep_date.'</td>
              </tr>
              <tr>
                <td>Bill No : </td>
                <td>'.$bill_no.'</td>
              </tr>
              <tr>
                <td>Lab Incharge Name : </td>
                <td>'.$lab_inc_data['FirstName'].' '.$lab_inc_data['LastName'].'</td>
              </tr>
              <tr>
                <td>Patient Name : </td>
                <td>'.$patient_name.'</td>
              </tr>
              <tr>
                <td>Test :  </td>
                <td>'.$test_name[$rep_data['TestId']].'</td>
              </tr>
              <tr>
                <td>Test Details : </td>
                <td>'.$rep_data['Results'].'</td>
              </tr>
              <tr>
                <td>Report Pickup Date : </td>
                <td>'.++$pickup_date.'</td>
              </tr>';
        $flag = 1;
        $total_amount += $test_amount[$rep_data['TestId']];

        echo '<tr>
                <td><b>Total Amount : </b></td>
                <td>'.$total_amount.'</td>
              </tr>';
        echo '</table><hr>';
        //add data to bill table
        $add_bill_q = 'INSERT INTO `Bill` (`BillNo`, `TotalAmount`, `PatientId`, `Date`) VALUES ("'.$bill_no.'", "'.$total_amount.'", "'.$patient_id.'", "'.$pickup_date.'");';
        mysqli_query($conn, $add_bill_q) or die(mysqli_error($conn));

        
        //add in lab bill table
        $add_lab_bill_q = 'INSERT INTO `LabBill` (`BillNo`, `TestId`, `TestDetails`, `ReportPickup`, `ReportNo`, `LabInchargeId`) VALUES ("'.$bill_no.'", "'.$rep_data['TestId'].'", "'.$rep_data['Results'].'", "'.$pickup_date.'", "'.$rep_data['ReportNo'].'", "'.$rep_data['LabInchargeId'].'");';

        mysqli_query($conn, $add_lab_bill_q) or die(mysqli_error($conn)); 
      }
      if ($flag === 0) {
        echo '<h4>There are no reports on the provided Date.</h4>';
      }      
    }
  ?>
  
  </center>
  
</body>
</html>
