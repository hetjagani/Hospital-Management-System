<?php
  require 'connect.php';
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="project.css">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prescription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<center>
      <p>  Hospital Management System  </p>
</center>

  <center>
  <h2>Prescription</h2>
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
      $query = 'SELECT PatientId, PersonId, ContactNo, FirstName, LastName FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "'.$_POST['con_no'].'"';

      $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $pat_data = mysqli_fetch_assoc($run_query);
      if(isset($pat_data)){
        $patient_id = $pat_data['PatientId'];
      }else
          echo '<h4>Provided contact number is not found in database.</h4>';
    }

    //generate prescription ID
    $query = 'SELECT ReportNo FROM Report;'; 

    if($run_query = mysqli_query($conn,$query) or die('Error getting data...')){
      while($data = mysqli_fetch_assoc($run_query)){
        $lastid =  $data['ReportNo'];
      }
      if(isset($lastid)){
        $pre_rep_no = ++$lastid;
      }else{
        $pre_rep_no = 'Rep00001';
      }
    }

    //get OPD appointment ID
    $opd_query = 'SELECT OPDAppointmentId FROM OPDAppointment WHERE PatientId="'.$patient_id.'" ORDER BY Date DESC;';

    $run = mysqli_query($conn, $opd_query) or die(mysqli_error($conn));
    $opd_appoi_id = mysqli_fetch_assoc($run)['OPDAppointmentId'];
    if(!isset($opd_appoi_id)){
      echo '<h4>Not registered as OPD patient...<h4>';
    }
  ?>

  <form action="save_prescription_db.php" method="POST" id="presc_form">
  <table>
    <tr>
      <td>Prescription ID : </td>
      <td><input type="text" name="prec_id" value=<?php echo '"'.$pre_rep_no.'"'; ?>></td>
    </tr>
    <tr>
      <td>Doctor ID : </td>
      <td><input type="text" name="doc_id" value=<?php echo '"'.$_SESSION['doc_id'].'"'; ?>></td>
    </tr>
    <tr>
      <td>OPD Appointment ID : </td>
      <td><input type="text" name="opd_appoi_id" value=<?php echo '"'.$opd_appoi_id.'"'; ?>></td>
    </tr>
    <tr>
      <td>Date : </td>
      <td><input type="date" name="prec_date"></td>
    </tr>
    <tr>
      <td>Details : </td>
      <td><textarea rows="4" cols="50" name="prec_details" form="presc_form"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" name="save" value="SAVE DETAILS">
      </td>
    </tr>
  </table>
  </form>
  </center>
</body>
</html>
