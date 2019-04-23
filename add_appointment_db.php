<?php
  require 'connect.php';
  session_start();

  //get appointment ID and autogen next id

  if($_POST['appoi_type'] === 'ipd'){
    $query = 'SELECT IPDAppointmentID FROM IPDAppointment;'; 

    if($run_query = mysqli_query($conn,$query) or die('Error getting data...')){
      
      while($data = mysqli_fetch_assoc($run_query)){
        $lastid =  $data['IPDAppointmentID'];
      }
      if(isset($lastid)){
        $appointment_id = ++$lastid;
      }else{
        $appointment_id = 'IPD00001';
      }
    }

    $insert_query = 'INSERT INTO `IPDAppointment` (`IPDAppointmentId`, `DateOfAdmission`, `RoomNo`, `BedNo`, `PatientId`) VALUES ("'.$appointment_id.'", "'.$_POST['appoi_date'].'", "'.$_POST['appoi_room'].'", "'.$_POST['appoi_bed'].'", "'.$_POST['appoi_pat_id'].'");';

    mysqli_query($conn,$insert_query) or die(mysqli_error($conn));

    header('Location: receptionist_menu.php');
  }elseif ($_POST['appoi_type'] === 'opd') {
    $query = 'SELECT OPDAppointmentID FROM OPDAppointment;'; 

    if($run_query = mysqli_query($conn,$query) or die(mysqli_error($conn))){
      
      while($data = mysqli_fetch_assoc($run_query)){
        $lastid =  $data['OPDAppointmentID'];
      }
      if(isset($lastid)){
        $appointment_id = ++$lastid;
      }else{
        $appointment_id = 'OPD00001';
      }
    }

    $insert_query = 'INSERT INTO `OPDAppointment` (`OPDAppointmentId`, `PatientId`, `Date`) VALUES ("'.$appointment_id.'", "'.$_POST['appoi_pat_id'].'", "'.$_POST['appoi_date'].'");';

    mysqli_query($conn,$insert_query) or die(mysqli_error($conn));

    header('Location: receptionist_menu.php');
  }
?>