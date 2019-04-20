<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prescription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <center>
  <h2>Prescription</h2>
  <hr>
  <table>
    <tr>
        <td>Patient Contact No : </td>
        <td><input type="text" name="con_no" id=""></td>
        <td><input type="submit" name="search" value="Search" id=""></td>
    </tr>
  </table>
  <hr>
  <form action="" method="POST" id="presc_form">
  <table>
    <tr>
      <td>Prescription ID : </td>
      <td>autogen</td>
    </tr>
    <tr>
      <td>Doctor ID : </td>
      <td>autogen</td>
    </tr>
    <tr>
      <td>OPD Appointment ID : </td>
      <td>autogen</td>
    </tr>
    <tr>
      <td>Details : </td>
      <td><textarea rows="4" cols="50" name="address" form="presc_form"></textarea></td>
    </tr>
  </table>
  </form>
  </center>
</body>
</html>