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
  <title>Patient's History</title>
</head>
<body>
<center>
  <p>  Hospital Management System  </p>

  <h2>Patient History</h2>
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
    if(isset($_POST)){
      $query = 'SELECT * FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "'.$_POST['con_no'].'"';

      $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $pat_data = mysqli_fetch_assoc($run_query);
      if(isset($pat_data)){
        $patient_id = $pat_data['PatientId'];
        $patient_name = $pat_data['FirstName'].' '.$pat_data['LastName'];
        if($pat_data['Gender'] == 0){
          $gender = 'male';
        }elseif ($pat_data['Gender'] == 1) {
          $gender = 'female';
        }
      }else
          echo '<h4>Provided contact number is not found in database.</h4>';
    }

    //get appointment IDs from patient ID
    $appoi_id_query = 'SELECT OPDAppointmentId FROM OPDAppointment WHERE PatientId = "'.$patient_id.'" ORDER BY Date DESC;';
    $run_id_query = mysqli_query($conn, $appoi_id_query) or die(mysql_error($conn));
    
    if($_SESSION['h_doc'] === 1){
      echo '<a href="head_doctor_menu.php">Head Doctor Menu</a>';
    } elseif ($_SESSION['a_doc'] === 1) {
      echo '<a href="assistant_doctor_menu.php">Assistant Doctor Menu</a>';
    } 
  ?>

  <hr>
  <h3>Patient Details</h3>
  <table>
    <tr>
      <td>Patient Name : </td>
      <td><?php echo $patient_name; ?></td>
    </tr>
    <tr>
      <td>Patient Date Of Birth : </td>
      <td><?php echo $pat_data['DateOfBirth']; ?></td>
    </tr>
    <tr>
      <td>Patient Address : </td>
      <td><?php echo $patient_name; ?></td>
    </tr>
    <tr>
      <td>Patient Gender : </td>
      <td><?php echo $gender; ?></td>
    </tr>
    <tr>
      <td>Patient Description : </td>
      <td><?php echo $pat_data['Description']; ?></td>
    </tr>
    <tr>
      <td>Patient Contact No : </td>
      <td><?php echo $pat_data['ContactNo']; ?></td>
    </tr>
    <tr>
      <td>Patient Height : </td>
      <td><?php echo $pat_data['Height']; ?></td>
    </tr>
    <tr>
      <td>Patient Weight : </td>
      <td><?php echo $pat_data['Weight']; ?></td>
    </tr>
    <tr>
      <td>Patient Blood Group : </td>
      <td><?php echo $pat_data['BloodGroup']; ?></td>
    </tr>
  </table>
  <hr><hr>

  <h3>Patient Prescription History</h3>

  <?php
    while ($appoi_ids = mysqli_fetch_assoc($run_id_query)) {
      $report_query = 'SELECT * FROM Prescription JOIN Report USING(ReportNo) WHERE OPDAppointmentId = "'.$appoi_ids['OPDAppointmentId'].'" ORDER BY Date DESC;';
      $report_run = mysqli_query($conn, $report_query) or die(mysqli_error($conn));

      while($report_data = mysqli_fetch_assoc($report_run)){

      //get doctor name
      $doc_name_query = 'SELECT FirstName, LastName, DoctorId FROM Person JOIN Doctor USING(PersonId) WHERE DoctorId = "'.$report_data['DoctorId'].'";';
      $run = mysqli_query($conn, $doc_name_query) or die(mysqli_error($conn));
      $name = mysqli_fetch_assoc($run);
      $doc_name = $name['FirstName'].' '.$name['LastName']; 

    echo '<hr>
  <table>
    <tr>
      <td>Prescription Report No : </td>
      <td>'.$report_data['ReportNo'].'</td>
    </tr>
    <tr>
      <td>Doctor Name : </td>
      <td>'.$doc_name.'</td>
    </tr>
    <tr>
      <td>Date : </td>
      <td>'.$report_data['DATE'].'</td>
    </tr>
    <tr>
      <td>Details : </td>
      <td>'.$report_data['Details'].'</td>
    </tr>
  </table>';
  }
}
  ?>
  

</center>  
</body>
</html>
