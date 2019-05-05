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
  <title>Lab Bill</title>
</head>
<body>
  
<center>
   <p>  Hospital Management System  </p>
  <h2>Appointment Bills</h2>
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
  <a href="receptionist_menu.php">Receptionist Menu</a>
  <?php
    // get patient id from phone number 
    if(isset($_POST)){
      $query = 'SELECT PatientId, PersonId, ContactNo, FirstName, LastName FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "'.$_POST['con_no'].'"';

      $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $pat_data = mysqli_fetch_assoc($run_query);
      if(isset($pat_data)){
        $patient_id = $pat_data['PatientId'];
        $patient_name = $pat_data['FirstName'].' '.$pat_data['LastName'];
      }else
          echo '<h4>Provided contact number is not found in database.</h4>';
    }
  ?>

  <hr>
  
  <?php 
    $bills_query = 'SELECT * FROM Bill JOIN OPDBill USING(BillNo) WHERE PatientId = "'.$patient_id.'" ORDER BY Date DESC;';

    $bills_data = mysqli_query($conn, $bills_query) or die(mysqli_error($conn));

    while($bill_row = mysqli_fetch_assoc($bills_data)){

      //get receptionist name
      $recept_name_q = 'SELECT FirstName, LastName FROM Person JOIN Receptionist USING(PersonId) WHERE ReceptionistId = "'.$recept_id.'";';
      $run = mysqli_query($conn, $recept_name_q) or die(mysqli_error($conn));
      $name = mysqli_fetch_assoc($run);
      $recept_name = $name['FirstName'].' '.$name['LastName'];

      //get doctor name
      $doc_name_query = 'SELECT FirstName, LastName, DoctorId FROM Person JOIN Doctor USING(PersonId) WHERE DoctorId = "'.$bill_row['DoctorId'].'";';
      $run = mysqli_query($conn, $doc_name_query) or die(mysqli_error($conn));
      $name = mysqli_fetch_assoc($run);
      $doc_name = $name['FirstName'].' '.$name['LastName'];        

      echo '<table>
            <tr>
              <td>Date : </td>
              <td>'.$bill_row['Date'].'</td>
            </tr>
            <tr>
              <td>Receptionist Name : </td>
              <td>'.$recept_name.'</td>
            </tr>
            <tr>
              <td>Doctor Name : </td>
              <td>'.$doc_name.'</td>
            </tr>
            <tr>
              <td>Patient Name : </td>
              <td>'.$patient_name.'</td>
            </tr>
            <tr>
              <td>Total Amount : </td>
              <td>'.$bill_row['TotalAmount'].'</td>
            </tr>
            </table>
            <hr>';
    }
  ?>
  
</center>

</body>
</html>
