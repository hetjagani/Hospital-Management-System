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
  <title>Add Appointment</title>
</head>
<body>
  <center>
  <h2>Add Appointment</h2>
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
    if(isset($_POST)){
      $query = 'SELECT PatientId, PersonId, ContactNo FROM Patient JOIN Person USING(PersonId) WHERE ContactNo = "'.$_POST['con_no'].'"';

      $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $data = mysqli_fetch_assoc($run_query);
      if(isset($data)){
        $patient_id = $data['PatientId'];
      }else
          echo '<h4>Provided contact number is not found in database.</h4>';
    }
  ?>

  <form action="add_appointment_db.php" method="post">
  <table>

    <tr>
      <td>Patient ID :</td>
      <td><input type="text" name="appoi_pat_id" value=<?php echo '"'.$patient_id.'"'; ?>></td>
    </tr>
    <tr>
      <td>Date :</td>
      <td><input type="date" name="appoi_date" id=""></td>
    </tr>
    <tr>
      <td>Appointment Type :</td>
      <td><input type="radio" name="appoi_type" value="ipd" checked> IPD
        <input type="radio" name="appoi_type" value="opd"> OPD
      </td>
    </tr>
    <tr>
    <td>(Add below information only for IPD Appointment)</td>
    </tr>
    <tr>
      <td>Room No :</td>
      <td><input type="text" name="appoi_room" id=""></td>
    </tr>
    <tr>
      <td>Bed No :</td>
      <td><input type="text" name="appoi_bed" id=""></td>
    </tr>
    <tr>
      <td></td>
      <td> <input type="submit" name="submit"> </td>
    </tr>
  </table>
  </form>

  </center>
</body>
</html>