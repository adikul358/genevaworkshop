<?php
    require 'conn.php';

    function generate_id() {
        global $conn;
        $sql = "SELECT id FROM registrationData ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result) { while($row = mysqli_fetch_assoc($result)) { $last = $row['id']; } }
        else { $last = "KAN19_00"; }
        $last_id = intval(substr($last, 6));  
        $id = $last_id >= 9 ? "KAN19_" . ($last_id + 1) : "KAN19_0" . ($last_id + 1);
        return $id;
    }

    function shift_data() {
        
    }

    function verify($verID) {
        global $conn;
        $id = generate_id();
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

    verify($_POST['verID']);
    // verify('7c89d3361b6dc6cfba7182cee026d695');
?>