<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <center>
  
  <h2> Register User </h2>
  <hr>
  <form action="add_user.php" method="POST" id="reg_form">
    <table>
      <tr>
        <td> First Name : </td>
        <td> <input type="text" name="first_name"> </td>
      </tr>
      <tr>
        <td> Last Name : </td>
        <td> <input type="text" name="last_name"> </td>
      </tr>
      <tr>
        <td> User Name : </td>
        <td> <input type="text" name="user_name"> </td>
      </tr>
      <tr>
        <td> Password : </td>
        <td> <input type="password" name="password"> </td>
      </tr>
      <tr>
        <td> Address : </td>
        <td> <textarea rows="4" cols="50" name="address" form="reg_form"></textarea> </td>
      </tr>
      <tr>
        <td> Date of birth : </td>
        <td> <input type="Date" name="date_of_birth" value="YYYY-MM-DD"> </td>
      </tr>
      <tr>
        <td> Blood Group : </td>
        <td> <input type="text" name="blood_grp" value="(A/B/O)"> </td>
      </tr>
      <tr>
        <td> Contact Number : </td>
        <td> <input type="text" name="contact_no"> </td>
      </tr>
      <tr>
        <td> Email Address : </td>
        <td> <input type="text" name="email_add"> </td>
      </tr>

      <tr>
        <td> <input type="submit" name="register" value="Submit"> </td>
      </tr>
    </table>
  </form>  

  </center>
</body>
</html>