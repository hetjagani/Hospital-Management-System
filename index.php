<?php
  session_start();
  $_SESSION = array();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="project.css">
    
    <title>Login page</title>
  </head>
  <body>
    <center>
    
      <h2> Hospital Management System </h2>
      <hr>
      <form action="login.php" method="POST">
        
        <table style="bord">
          <tr>
            <td> <center> <br> User ID: </center> </td>
            <td> <br> <input type="text" name="uname"> </td>
          </tr>
          <tr>
            <td> <center> <br> Password : </center> </td>
            <td> <br> <input type="password" name="pass"> </td>
          </tr>
          </table>
          
          
          <table>          
          <tr>
            <td>
            <center>
            <br> <br>
              <select name="acc_type">
                &nbsp; &nbsp; &nbsp; &nbsp;
                <option value="nurse">Nurse</option>
                <option value="recept">Receptionist</option>
                <option value="h_doc">Head Doctor</option>
                <option value="a_doc">Assistant Doctor</option>
                <option value="lab_incharge">Lab Incharge</option>
                <option value="pharma">Pharmacist</option>
              </select>
              </center>
            </td>
            <td> <br> <br> &nbsp; &nbsp; &nbsp; &nbsp; <input type="submit" name="submit" value="Login"> </td>
          </tr>
        </table>
      </form>
    
    </center>
  </body>
</html>
