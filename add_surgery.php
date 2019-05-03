<?php
  require 'connect.php';
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Surgery</title>
</head>
<body>
  <center>
  <h2>Add Surgery</h2>

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

    //generate Surgery No
    $query = 'SELECT SurgeryNo FROM Surgery;'; 

    if($run_query = mysqli_query($conn,$query) or die('Error getting data...')){
      while($data = mysqli_fetch_assoc($run_query)){
        $lastid =  $data['SurgeryNo'];
      }
      if(isset($lastid)){
        $surg_no = ++$lastid;
      }else{
        $surg_no = 'Sur00001';
      }
    }
    $_SESSION['surg_no'] = $surg_no;

    //get IPD appointment ID
    $ipd_query = 'SELECT * FROM IPDAppointment WHERE PatientId="'.$patient_id.'" ORDER BY DateOfAdmission DESC;';

    $run = mysqli_query($conn, $ipd_query) or die(mysqli_error($conn));
    $ipd_appoi_data = mysqli_fetch_assoc($run);
    if(!isset($ipd_appoi_data)){
      echo '<h4>Not registered as IPD patient...<h4>';
    }
  ?>

  <hr>
  <form action="add_surgery_next.php" method="post">
  <table>
  <tr>
    <td>Surgery No : </td>
    <td><input type="text" name="surg_no" value= <?php echo $surg_no; ?> ></td>
  </tr>
  <tr>
    <td>Doctor ID : </td>
    <td><input type="text" name="h_doc_id" value= <?php echo $_SESSION['doc_id']; ?> ></td>
  </tr>
   <tr>
    <td>IPD Appointment ID : </td>
    <td><input type="text" name="ipd_appoi_id" value= <?php echo $ipd_appoi_data['IPDAppointmentId']; ?> ></td>
  </tr>
  <tr>
    <td>Patient ID : </td>
    <td><input type="text" name="pat_id" value= <?php echo $patient_id ?> ></td>
  </tr>
  <tr>
    <td>Room No : </td>
    <td><input type="text" name="sur_room" value= <?php echo $ipd_appoi_data['RoomNo']; ?>></td>
  </tr>
  <tr>
    <td>Date Of Admission : </td>
    <td><input type="date" name="date_of_add" value= <?php echo $ipd_appoi_data['DateOfAdmission']; ?>></td>
  </tr>
  <tr>
    <td></td>
    <td> <input type="submit" value="Next>>"></td>
  </tr>
  </form>
 
  </center>

</body>
</html>