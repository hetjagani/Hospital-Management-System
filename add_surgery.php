<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Surgery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <form action="" method="post">
  <table>
  <tr>
    <td>Surgery No : </td>
    <td>autogen</td>
  </tr>
  <tr>
    <td>Doctor ID : </td>
    <td>autogen</td>
  </tr>
  <tr>
    <td>Room No : </td>
    <td><input type="text" name="sur_room" id=""></td>
  </tr>
  <tr>
    <td>Patient ID : </td>
    <td><input type="text" name="pat_id" id=""></td>
  </tr>
  <tr>
    <td>Date Of Admission : </td>
    <td><input type="date" name="date_of_add" id=""></td>
  </tr>
  </table>
  <hr>
  <b> Assistant Doctor : </b>
  <form action="" method="POST">
    <select name="assi_doc_id" id="">
      <option value="id">doc1</option>
      <option value="id1">doc2</option>
    </select> 
    <input type="submit" value="Add Doctor" name="add_doc">
    <input type="submit" value="Remove Doctor" name="rem_doc">
  </form>
  <!-- Display all assistant doc name and id which are selected -->
  <?php
    echo $_POST['add_doc'];
    echo $_POST['rem_doc'];
  ?>
  <table border>
  <tr><td><b> Added Doctors </b></td></tr>
  <tr>
    <td>name id</td>
  </tr>
  </table>
  <hr>
  <input type="submit" value="Add Surgery">
  </form>

</body>
</html>