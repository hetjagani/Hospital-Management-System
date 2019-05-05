<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
     <link rel="stylesheet" href="project.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register Patient</title>
</head>
<body>
  
  <center>
     <p>  Hospital Management System  </p>
 
  <h2>Register Patient</h2>
  <form action="register_patient_db.php" method="post" id="pat_reg_form">
  
  <table>
  
    <tr>
      <td>First Name : </td>
      <td><input type="text" name="patient_fname" id=""></td>
    </tr>
    <tr>
      <td>Middle Name : </td>
      <td><input type="text" name="patient_mname" id=""></td>
    </tr>
    <tr>
      <td>Last Name : </td>
      <td><input type="text" name="patient_lname" id=""></td>
    </tr>
    <tr>
      <td>Date of Birth : </td>
      <td><input type="date" name="patient_dob" id=""></td>
    </tr>
    <tr>
      <td>Gender : </td>
      <td><input type="radio" name="patient_gen" value="male" checked> Male
          <input type="radio" name="patient_gen" value="female"> Female
          <input type="radio" name="patient_gen" value="other"> Other</td>
    </tr>
    <tr>
      <td>Contact No : </td>
      <td><input type="text" name="patient_con" id=""></td>
    </tr>
    <tr>
      <td>Address : </td>
      <td><textarea name="patient_addr" form="pat_reg_form" cols="50" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Description : </td>
      <td><textarea name="patient_desc" form="pat_reg_form" cols="50" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Height : </td>
      <td><input type="text" name="patient_height" id=""></td>
    </tr>
    <tr>
      <td>Weight : </td>
      <td><input type="text" name="patient_weight" id=""></td>
    </tr>
    <tr>
      <td>Blood Group : </td>
      <td><input type="text" name="patient_bldgrp" id=""></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="SUBMIT"></td>
    </tr>
  
  </table>
  
  </form>
  </center>

</body>
</html>
