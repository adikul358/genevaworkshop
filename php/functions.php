<?php

    require 'kanona_mail.php';
    require 'conn.php';
    
    function generate_id() {
        global $conn;
        $sql = "SELECT id FROM registered_data ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result) { if(mysqli_num_rows($result)>0) { while($row = mysqli_fetch_assoc($result)) { $last = $row['id']; } } }
        else { $last = "CSEP1900"; }
        $last_id = intval(substr($last, 6));  
        $id = $last_id >= 9 ? "CSEP19" . ($last_id + 1) : "CSEP190" . ($last_id + 1);
        return $id;
    }

    function generate_link($code, $html = '', $link = "http://keft.es/verify/?verify_id=") {
        if ($html == '') {
            $html = fopen("verification_mail.html", 'r');
            $html = fread($html, filesize("verification_mail.html"));
        }
        $link .= $code;
        $html = explode("AKBS", $html);
        $html = $html[0] . $link . $html[1];
        return $html;
    }

    function verify_mail() {
        // $_POST['email'] = "aditya.kulshrestha@outlook.com";
        // $_POST['first_name'] = "Aditya";
        // $_POST['last_name'] = "Kulshrestha";

        $credentials = array(); $recipents = array(); $content = array(); $verify_id = md5($_POST['email']);
        $recipents[0] = array("email" => $_POST['email'], "name" => $_POST['first_name'] . " " . $_POST['last_name']);
        $credentials['username'] = "";
        $credentials['recipents'] = $recipents;
        $content['subject'] = "Verification of your account";
        $content['HTML_body'] = generate_link($verify_id);
        $content['body'] = "Go to the following URL to verify your account: \n\n http://keft.gearhostpreview.com/verify/?verify_id={$verify_id}";

        kanona_mail($credentials, $content);
    }

    function check_already_exists() {
        global $conn;
        $email = $_POST['email'];
        $sql = "SELECT first_name, last_name, email FROM registered_data WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { $name = $row['first_name'] . " " . $row['last_name']; }
            echo "AL -v:-{$name}";
            return true;
        }
        $sql = "SELECT first_name, last_name, email FROM temp_data WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { $name = $row['first_name'] . " " . $row['last_name'];}
            echo "AL:-{$name}";
            return true;
        }
        return false;
    }

    function add_registration() {
        global $conn;
        if (!$_POST['ex_employer1']) { $_POST['ex_employer1'] = ""; }
        if (!$_POST['ex_employer2']) { $_POST['ex_employer2'] = ""; }
        if (!$_POST['ex_employer3']) { $_POST['ex_employer3'] = ""; }
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $verify_id = md5($_POST['email']);
        $city = $_POST['city'];
        $employer = $_POST['employer'];
        $ex_employers = array($_POST['ex_employer1'],$_POST['ex_employer2'],$_POST['ex_employer3']);
        $subjects = $_POST['subjects'];
        $curriculum = $_POST['curriculum'];
        $class_size = $_POST['class_size'];
        $IB_curr = $_POST['IB_curr'];
        $participate_reason = $_POST['participate_reason'];
        $concept_teaching = $_POST['concept_teaching'];
        $applications = array($_POST['apply1'],$_POST['apply2'],$_POST['apply3']);
        $sql = "INSERT INTO temp_data(id, first_name, last_name, phone, email, city, employer, ex_employer1, ex_employer2, ex_employer3, subjects, curriculum, class_size, IB_curr) VALUES(`$verify_id`, `$first_name`, `$last_name`, `$phone`, `$email`, `$city`, `$employer`, `$ex_employers[0]`, `$ex_employers[1]`, `$ex_employers[2]`, `$subjects`, `$curriculum`, `$class_size`, `$IB_curr`);";
        $sql .= "INSERT INTO temp_writeup_data(id, participate_reason, concept_teaching, apply1, apply2, apply3) VALUES(`$verify_id`, `$participate_reason`, `$concept_teaching`, `$applications[0]`, `$applications[1]`, `$applications[2]`);";
        $result = mysqli_multi_query($conn, $sql);
        if ($result) { 
            verify_mail();
            echo "OK";
        }
        else { 
            echo "You couldn't be registered successfully as we are having a problem with server communication.<br>" . mysqli_error($conn); 
        }
    }

    function shift_data($verify_id) {
        global $conn; $id = generate_id();
        $sql = "SELECT email FROM temp_data WHERE id='$verify_id";
        $result = mysqli_query($conn, $sql);
        if ($result) { if(mysqli_num_rows($result)>0) { while($row = mysqli_fetch_assoc($result)) { $acc_email = $row['email']; } } }
        $sql = "INSERT INTO registered_data(first_name, last_name, phone, email, city, employer, ex_employer1, ex_employer2, ex_employer3, subjects, curriculum, class_size, IB_curr) SELECT first_name, last_name, phone, email, city, employer, ex_employer1, ex_employer2, ex_employer3, subjects, curriculum, class_size, IB_curr FROM temp_data WHERE id='$verify_id'; DELETE FROM temp_data WHERE verify_id='$verify_id'; UPDATE registered_data SET id = '$id' WHERE email='$email';";
        $sql .= "INSERT INTO writeup_data(id, participate_reason, concept_teaching, apply1, apply2, apply3) SELECT participate_reason, concept_teaching, apply1, apply2, apply3 FROM temp_writeup_data WHERE id='$verify_id'; DELETE FROM temp_writeup_data WHERE verify_id='$verify_id'; UPDATE writeup_data SET id = '$id' WHERE email='$email';";
        mysqli_multi_query($conn, $sql);
        // if (!$result) { die(mysqli_error($conn)); }
    }

    function verify($verify_id) {
        global $conn;
        $id = generate_id();
        $sql = "SELECT * FROM registration_data WHERE verify_id='$verify_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { $name = $row['first_name'] . " " . $row['last_name']; }
        if (mysqli_num_rows($result) > 0) { echo "AL-" . $name; }
        else {
            $sql = "SELECT * FROM temp_data WHERE verify_id='$verify_id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) { $email = $row['email']; $name = $row['first_name'] . " " . $row['last_name']; }
            if(mysqli_num_rows($result) > 0) {
                shift_data($verify_id, $email);
                echo "OK-" . $name;
            } else {
                echo "Oops, there was a problem in verifying your email <br> " . mysqli_error($conn);
            }
        }
    }
?>