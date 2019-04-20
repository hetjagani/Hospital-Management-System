<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Appointment Bill</title>
</head>
<body>
  
  <center>
  <h2>Appointment Bill</h2>
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

  <table>
  
  <tr>
    <td>Date : </td>
    <td><input type="date" name="bill_date" id=""></td>
  </tr>
  <tr>
    <td>Receptionist Name : </td>
    <td>autogen</td>
  </tr>
  <tr>
    <td>Doctor Name : </td>
    <td>
      <select name="bill_doc" id="">
        <option value="doc1">Doctor 1</option>
        <option value="doc2">Doctor 2</option>
        <option value="doc3">Doctor 3</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Patient Name : </td>
    <td><input type="text" name="bill_pati_name" id=""></td>
  </tr>
  <tr>
    <td>Total Amount : </td>
    <td><input type="text" name="bill_amt" id=""></td>
  </tr>
  <tr>
  <td></td>
  <td><input type="submit" value="SAVE"></td>
  </tr>
  </table>

  </center>

</body>
</html>