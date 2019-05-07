<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="project.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add Medicine</title>
    </head>
    <body>
    <center>
        <p>  Hospital Management System  </p>
        <h2>Enter Medicines</h2>
        <hr>
        <form action="enter_medicine_db.php" method="post">
            <table border>
                <tr>
                    <td>Medicine Name</td>
                    <td>Medicine Company</td>
                    <td>Medicine Type</td>
                </tr>
                <tr>
                    <td><input type="text" name="med_name" id=""></td>
                    <td><input type="text" name="med_comp" id=""></td>
                    <td><input type="text" name="med_type" id=""></td>
                </tr>
                <br>
                <tr>
                    <td>Drug Description</td>
                    <td>Per Medicine Cost</td>
                    <td>Quantity</td>
                </tr>
                <tr>
                    <td><input type="text" name="med_desc" id=""></td>
                    <td><input type="text" name="med_cost" id=""></td>
                    <td><input type="text" name="med_qty" id=""></td>
                </tr>


            </table>
            <br>  

            <br>
            <input type="submit" value="SAVE">
        </form>
    </center>
</body>
</html>
