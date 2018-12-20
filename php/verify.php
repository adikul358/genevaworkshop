<?php
    require 'conn.php';

    function verify($verID) {
        global $conn;
        $sql = "INSERT INTO registrationData(fName, lName, email) SELECT fName, lName, email FROM tempData WHERE verID='$verID'";
        $result = mysqli_query();
        if($result) {
            echo "Great! You have been verified";
        } else {
            echo "Oops, there was a problem in verifying your email <br> " . mysqli_error($conn);
        }
    }

    verify($_POST['verID']);
?>