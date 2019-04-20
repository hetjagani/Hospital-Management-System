<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pharmacy Bill</title>
</head>
<body>
  <center>
  
  <h2>Pharmacy Bill</h2>
  <hr>
  <table>
    <tr>
        <td>Patient Contact No : </td>
          <form action="" method="post">
            <td><input type="text" name="con_no" id=""></td>
            <td><input type="date" name="rep_date" id=""></td>
            <td><input type="submit" name="search" value="Search" id=""></td>
          </form>
    </tr>
  </table>
  <hr>

  <form action="" method="post">
  
    <table>
    
    <tr>
      <td>Bill No : </td>
      <td>autogen</td>
    </tr>
    <tr>
      <td>Patient Name : </td>
      <td>XXXX</td>
    </tr>
    <tr>
      <td>Date : </td>
      <td><input type="date" name="pharm_bill_date" id=""></td>
      <td><center>Quantity</center></td>
    </tr>
    <form method="POST">
    <tr>
      <td>Medicine Name : </td>
      <td>
        <select name="med_name" id="">
          <option value="med1">Medicine 1</option>
          <option value="med2">Medicine 2</option>
          <option value="med3">Medicine 3</option>
        </select>
      </td>
      <td>
        <input type="text" name="med_quan" id="">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value ="Search" name="search">
      </td>
      <td>
        <input type="submit" value="Add" name="add">
        <input type="submit" value="Remove" name="remove">
      </td>
    </tr>
    <!-- When a medicine added then it is shown below in the table. -->
    </form>
    
    <tr>
      <td>Total Amount : </td>
      <td>XXXX</td>
    </tr>
    
    
    <tr>
    <td></td>
    <td><input type="submit" value="SAVE"></td>
    </tr>    
    </table>
  </form>
  <hr>  
  <?php
    echo $_POST['search'];
    echo $_POST['add'];
    echo $_POST['remove'];
    echo $_POST['med_name'];
  ?>
  </center>
</body>
</html>