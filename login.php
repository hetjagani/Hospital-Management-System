<?php 
  require 'connect.php';
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>login....</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
    echo $_POST["uname"]."<br>";
    echo $_POST["pass"]."<br>";
    echo $_POST["acc_type"]."<br>";

    if($_POST["acc_type"] == "h_doc") {
      header('Location: head_doctor_menu.php');
      $_SESSION['h_doc_id'] = $_POST['uname'];
    }else if ($_POST["acc_type"] == "a_doc") {
      header('Location: assistant_doctor_menu.php');
      $_SESSION['a_doc_id'] = $_POST['uname'];
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
    

  ?>
  </body>
</html>