<?php
  require 'connect.php';
  session_start();
  $patient_id = $_SESSION['patient_id'];
  $bill_no = $_SESSION['bill_no'];
  $bill_date = $_SESSION['bill_date'];

  //get all the medicines
  $get_all_med_q = 'SELECT * FROM Medicine';
  $get_med_run = mysqli_query($conn, $get_all_med_q) or die(mysqli_error($conn));

  $total_cost = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Medicines</title>
</head>
<body>
  <center>
    <h2>Add Medicines</h2>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Medicines</td>
        <td>Quantity</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>
          <select name="med_id">
            <?php 
              while ($med_data = mysqli_fetch_assoc($get_med_run)) {
                  echo '<option value="'.$med_data['MedicineId'].'">'.$med_data['MedicineName'].'</option>';
              }
            ?>
          </select>
        </td>
        <td><input type="text" name="med_qty"></td>
        <td><input type="submit" name="add_med" value="ADD Medicine"></td>
        <td><input type="submit" name="rem_med" value="REMOVE Medicine"></td>
      </tr>
    </table>
  </form>
  <?php
    if(isset($_POST['add_med'])){
      $med_add_query = 'INSERT INTO `PharmacyBill_has_Medicine` (`BillNo`, `MedicineId`, `Quantity`) VALUES ("'.$bill_no.'", "'.$_POST['med_id'].'", "'.$_POST['med_qty'].'");';
      mysqli_query($conn, $med_add_query)or die(mysqli_error($conn));

      $med_qty_q = 'SELECT Quantity, Cost FROM Medicine WHERE MedicineId = "'.$_POST['med_id'].'";';
      $run_qty = mysqli_query($conn, $med_qty_q)or die(mysqli_error($conn));
      $med_qty = mysqli_fetch_assoc($run_qty);

      $new_qty = $med_qty['Quantity'] - $_POST['med_qty'];
      $total_cost = $total_cost +  $med_qty['Cost'] * $_POST['med_qty'];

      $med_update_q = 'UPDATE `Medicine` SET `Quantity` = '.$new_qty.' WHERE `Medicine`.`MedicineId` = "'.$_POST['med_id'].'";';
      mysqli_query($conn, $med_update_q) or die(mysqli_error($conn));

      //update total cost in the bill table
      $update_cost_q = 'UPDATE Bill SET TotalAmount = '.$total_cost.' WHERE BillNo = "'.$bill_no.'";';
      mysqli_query($conn, $update_cost_q)or die(mysqli_error($conn));

    }elseif (isset($_POST['rem_med'])) {
      $med_rem_q = 'DELETE FROM `PharmacyBill_has_Medicine` WHERE BillNo = "'.$bill_no.'" AND MedicineId = "'.$_POST['med_id'].'";';
      mysqli_query($conn, $med_rem_q)or die(mysqli_error($conn));

      $med_qty_q = 'SELECT Quantity, Cost FROM Medicine WHERE MedicineId = "'.$_POST['med_id'].'";';
      $run_qty = mysqli_query($conn, $med_qty_q)or die(mysqli_error($conn));
      $med_qty = mysqli_fetch_assoc($run_qty);

      $new_qty = $med_qty['Quantity'] + $_POST['med_qty'];
      $total_cost = $total_cost - $med_qty['Cost'] * $_POST['med_qty'];

      $med_update_q = 'UPDATE `Medicine` SET `Quantity` = '.$new_qty.' WHERE `Medicine`.`MedicineId` = "'.$_POST['med_id'].'";';
      mysqli_query($conn, $med_update_q) or die(mysqli_error($conn));
      
      //update total cost in the bill table
      $update_cost_q = 'UPDATE Bill SET TotalAmount = '.$total_cost.' WHERE BillNo = "'.$bill_no.'";';
      mysqli_query($conn, $update_cost_q)or die(mysqli_error($conn));
    }
  ?>

  <hr>
  <h3>Added Medicines</h3>
  <table border>
    <tr>
      <td>Medicine Name</td>
      <td>Quantity</td>
    </tr>
  
    <?php
      $added_med_q = 'SELECT MedicineName, PharmacyBill_has_Medicine.Quantity FROM PharmacyBill_has_Medicine JOIN Medicine USING(MedicineId) WHERE BillNo = "'.$bill_no.'";';
      $run_added = mysqli_query($conn, $added_med_q) or die(mysqli_error($conn));

      while ($added_data = mysqli_fetch_assoc($run_added)) {
          echo '<tr>
                  <td>'.$added_data['MedicineName'].'</td>
                  <td>'.$added_data['Quantity'].'</td>
                </tr>';
      }
    ?>

  </table>
  </center>
</body>
</html>