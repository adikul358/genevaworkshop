<?php
    require 'conn.php';

    function generate_id() {
        global $conn;
        $sql = "SELECT id FROM registrationData ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (!$result) { die(mysqli_error($conn)); }
        if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { 
                $last = $row['id']; 
            }
        }
        else { 
            $last = "KAN19_00"; 
        }
        $last_id = intval(substr($last, 6));  
        $id = $last_id >= 9 ? "KAN19_" . ($last_id + 1) : "KAN19_0" . ($last_id + 1);
        return $id;
    }

    function shift_data($verID) {
        global $conn; $id = generate_id();
        $sql = "INSERT INTO registrationData(fName, lName, email, verID) SELECT fName, lName, email, verID FROM tempData WHERE verID='$verID'; DELETE FROM tempData WHERE verID='$verID'; UPDATE registrationData SET id = '$id' WHERE verID='$verID';";
        mysqli_multi_query($conn, $sql);
        // if (!$result) { die(mysqli_error($conn)); }
        
        $temp_file = fread(fopen("../about_data/unverified/" . $verID . ".txt", 'r'), filesize("../about_data/unverified/" . $verID . ".txt"));
        unlink("../about_data/unverified/" . $verID . ".txt");
        fwrite(fopen("../about_data/" . $id . ".txt", 'w'), $temp_file);
    }

    function verify($verID) {
        global $conn;
        $id = generate_id();
        $sql = "SELECT * FROM registrationData WHERE verID='$verID'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { $name = $row['fName'] . " " . $row['lName']; }
        if (mysqli_num_rows($result) > 0) { echo "AL-" . $name; }
        else {
            $sql = "SELECT * FROM tempData WHERE verID='$verID'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) { $email = $row['email']; $name = $row['fName'] . " " . $row['lName']; }
            if(mysqli_num_rows($result) > 0) {
                shift_data($verID, $email);
                echo "OK-" . $name;
            } else {
                echo "Oops, there was a problem in verifying your email <br> " . mysqli_error($conn);
            }
        }
    }

    verify($_POST['verID']);
    // verify('b40d627f55ad5654abc0adf967e9e0b5');
?>