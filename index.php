<?php
  session_start();
  $_SESSION = array();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
  </head>
  <body>
    <center>
    
      <h2> LOGIN </h2>
      <hr>
      <form action="login.php" method="POST">
        <table>
          <tr>
            <td> USERID : </td>
            <td> <input type="text" name="uname"> </td>
          </tr>
          <tr>
            <td> PASSWORD : </td>
            <td> <input type="password" name="pass"> </td>
          </tr>
          
          <tr>
            <td>
              <select name="acc_type">
                <option value="nurse">Nurse</option>
                <option value="recept">Receptionist</option>
                <option value="h_doc">Head Doctor</option>
                <option value="a_doc">Assistant Doctor</option>
                <option value="lab_incharge">Lab Incharge</option>
                <option value="pharma">Pharmacist</option>
              </select>
            </td>
            <td> <input type="submit" name="submit" value="login"> </td>
          </tr>
        </table>
      </form>
    
    </center>
  </body>
</html>