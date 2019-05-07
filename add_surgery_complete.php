<?php
require 'connect.php';
session_start();

$surg_no = $_SESSION['surg_no'];
//fetch all assistant doctors
$assi_doc_q = 'SELECT * FROM (AssistantDoctor JOIN Doctor USING(DoctorId)) JOIN Person USING(PersonId);';
$assi_q_run = mysqli_query($conn, $assi_doc_q) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Complete Adding Surgery</title>
    </head>
    <body>
    </table>
    <h3> Assistant Doctor : </h3>
    <form action="" method="POST">
        <select name="assi_doc_id" id="">
            <?php
            while ($data = mysqli_fetch_assoc($assi_q_run)) {
                echo '<option value="' . $data['DoctorId'] . '">' . $data['FirstName'] . ' ' . $data['LastName'] . ' (' . $data['DoctorId'] . ')</option>';
            }
            ?>
        </select> 
        <input type="submit" value="Add Doctor" name="add_doc">
        <input type="submit" value="Remove Doctor" name="rem_doc">
        <?php
        //add remove assistant doctors in surgery
        if (isset($_POST['add_doc'])) {
            $add_query = 'INSERT INTO `AssistantDoctor_Operates_Surgery` (`DoctorId`, `SurgeryNo`) VALUES ("' . $_POST['assi_doc_id'] . '", "' . $surg_no . '");';
            mysqli_query($conn, $add_query) or die(mysqli_error($conn));
        } elseif (isset($_POST['rem_doc'])) {
            $rem_query = 'DELETE FROM `AssistantDoctor_Operates_Surgery` WHERE DoctorId = "' . $_POST['assi_doc_id'] . '" AND SurgeryNo = "' . $surg_no . '";';
            mysqli_query($conn, $rem_query) or die(mysqli_error($conn));
        }
        ?>
    </form>
    <hr>
    <?php
    // display all assistant doctors in surgery
    $disp_query = 'SELECT * FROM (AssistantDoctor_Operates_Surgery JOIN Doctor USING(DoctorId)) JOIN Person USING(PersonId) WHERE SurgeryNo = "' . $surg_no . '";';
    $run = mysqli_query($conn, $disp_query) or die(mysqli_error($conn));

    echo '<table border>';
    echo '<tr>
      <td>Doctor ID</td>
      <td>Doctor Name</td>
      <td>Doctor Contact No</td>
    </tr>';
    while ($data = mysqli_fetch_assoc($run)) {
        echo '<tr>
      <td>' . $data['DoctorId'] . '</td>
      <td>' . $data['FirstName'] . ' ' . $data['LastName'] . '</td>
      <td>' . $data['ContactNo'] . '</td>
    </tr>';
    }
    echo '</table>';
    ?>
    <a href="head_doctor_menu.php">Completed Adding, back to main menu.</a>
</body>
</html>