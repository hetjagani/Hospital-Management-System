<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lab Report</title>
</head>
<body>

<center>
  <h2>Lab Report</h2>
  <hr>
  <table>
    <tr>
        <td>Patient Contact No : </td>
        <td><input type="text" name="con_no" id=""></td>
        <td><input type="submit" name="search" value="Search" id=""></td>
    </tr>
  </table>
  <hr>

  <form action="" method="POST" id="lab_rep_form">
  <table>
    <tr>
      <td>Report ID : </td>
      <td>autogen</td>
    </tr>
    <tr>
      <td>Lab Incharge ID : </td>
      <td>autogen</td>
    </tr>
    <tr>
      <td>Test :  </td>
      <td><select name="test_id" id="">
        <option value="test1">test1</option>
        <option value="test2">test2</option>
        <option value="test3">test3</option>
      </select></td>
    </tr>
    <tr>
      <td>Results : </td>
      <td><textarea name="lab_result" form="lab_rep_form" cols="50" rows="4"></textarea></td>
    </tr>
    <tr>
      <td>Remarks : </td>
      <td><textarea rows="4" cols="50" name="address" form="presc_form"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="SAVE"></td>
    </tr>
  </table>
  </form>
</center>
</body>
</html>