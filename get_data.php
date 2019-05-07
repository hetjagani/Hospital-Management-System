/*
*   @author Jagani
*   @version 0.1.0
*/



<?php

require 'connect.php';

$query = 'SELECT * FROM user_info;';

if ($query_run = mysqli_query($conn, $query)) { //executed the query...
    echo 'query executed... <br>';

    //$query_data = mysqli_fetch_assoc($query_run); 	
    // fetched the data from query...
    while ($query_data = mysqli_fetch_assoc($query_run)) {
        print_r($query_data);
        echo "<br>";
    }
}
?>