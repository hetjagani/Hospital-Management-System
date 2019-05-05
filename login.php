<?php 
  require 'connect.php';
  session_start();

  $uname =  $_POST["uname"];
  $pass =  $_POST["pass"];
  $acc =  $_POST["acc_type"];

  $login_sucess = 0;

  if($_POST["acc_type"] == "h_doc") {
    $query = 'SELECT * FROM Person JOIN (HeadDoctor JOIN Doctor USING(DoctorId)) USING(PersonID) WHERE DoctorId = "'.$uname.'" AND Password = MD5("'.$pass.'")';
    
    if($query_run = mysqli_query($conn,$query) or die(mysqli_error($conn))){
    
      $query_data = mysqli_fetch_assoc($query_run);

      if($query_data) {
        $login_sucess = 1;
      }else {
        $login_sucess = 0;
      }
    }

  }else if ($_POST["acc_type"] == "a_doc") {
    $query = 'SELECT * FROM Person JOIN (AssistantDoctor JOIN Doctor USING(DoctorId)) USING(PersonID) WHERE DoctorId = "'.$uname.'" AND Password = MD5("'.$pass.'")';
    
    if($query_run = mysqli_query($conn,$query) or die(mysqli_error($conn))){
    
      $query_data = mysqli_fetch_assoc($query_run);

      if($query_data) {
        $login_sucess = 1;
      }else {
        $login_sucess = 0;
      }
    }
    
  }else if ($_POST["acc_type"] == "nurse") {
    $query = 'SELECT * FROM Nurse JOIN Person USING(PersonId) WHERE NurseId = "'.$uname.'" AND Password = MD5("'.$pass.'")';
    
    if($query_run = mysqli_query($conn,$query) or die(mysqli_error($conn))){
    
      $query_data = mysqli_fetch_assoc($query_run);

      if($query_data) {
        $login_sucess = 1;
      }else {
        $login_sucess = 0;
      }
    }
    
  }else if ($_POST["acc_type"] == "recept") {
    $query = 'SELECT * FROM Receptionist JOIN Person USING(PersonId) WHERE ReceptionistId = "'.$uname.'" AND Password = MD5("'.$pass.'")';
    
    if($query_run = mysqli_query($conn,$query) or die(mysqli_error($conn))){
    
      $query_data = mysqli_fetch_assoc($query_run);

      if($query_data) {
        $login_sucess = 1;
      }else {
        $login_sucess = 0;
      }
    }
    
  }else if ($_POST["acc_type"] == "lab_incharge") {
    $query = 'SELECT * FROM LabIncharge JOIN Person USING(PersonId) WHERE LabInchargeId = "'.$uname.'" AND Password = MD5("'.$pass.'")';
    
    if($query_run = mysqli_query($conn,$query) or die(mysqli_error($conn))){
    
      $query_data = mysqli_fetch_assoc($query_run);

      if($query_data) {
        $login_sucess = 1;
      }else {
        $login_sucess = 0;
      }
    }
    
  }
  else if ($_POST["acc_type"] == "pharma") {
    $query = 'SELECT * FROM Pharmacist JOIN Person USING(PersonId) WHERE PharmacistId = "'.$uname.'" AND Password = MD5("'.$pass.'")';
    
    if($query_run = mysqli_query($conn,$query) or die(mysqli_error($conn))){
    
      $query_data = mysqli_fetch_assoc($query_run);

      if($query_data) {
        $login_sucess = 1;
      }else {
        $login_sucess = 0;
      }
    }
    
  }


  if($login_sucess === 1){
    if($_POST["acc_type"] == "h_doc") {
      header('Location: head_doctor_menu.php');
      $_SESSION['doc_id'] = $_POST['uname'];
    }else if ($_POST["acc_type"] == "a_doc") {
      header('Location: assistant_doctor_menu.php');
      $_SESSION['doc_id'] = $_POST['uname'];
    }else if ($_POST["acc_type"] == "nurse") {
      header('Location: nurse_menu.php');
      $_SESSION['nurse_id'] = $_POST['uname'];
    }else if ($_POST["acc_type"] == "recept") {
      header('Location: receptionist_menu.php');
      $_SESSION['recept_id'] = $_POST['uname'];
    }else if ($_POST["acc_type"] == "lab_incharge") {
      header('Location: lab_incharge_menu.php');
      $_SESSION['lab_in_id'] = $_POST['uname'];
    }
    else if ($_POST["acc_type"] == "pharma") {
      header('Location: pharmacist_menu.php');
      $_SESSION['pharma_id'] = $_POST['uname'];
    }
  }else {
    header('Location: index.php?login=0');
  }
    

?>