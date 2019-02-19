<?php
    require 'kanona_mail.php';
    require 'conn.php';
    
    function generate_id() {
        global $conn;
        $sql = "SELECT id FROM registered_data ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result) { 
            if(mysqli_num_rows($result)>0) { 
                while($row = mysqli_fetch_assoc($result)) { 
                    $last = $row['id']; 
                } 
            }
        }
        else { $last = "CSEP1900"; }
        $last_id = intval(substr($last, 7));  
        $id = $last_id >= 9 ? "CSEP19" . ($last_id + 1) : "CSEP190" . ($last_id + 1);
        return $id;
    }

    function generate_link($code, $html = '', $link = "http://kanonatw.esy.es/verify/?vercode=") {
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
        // $_POST['f_name'] = "Aditya";
        // $_POST['l_name'] = "Kulshrestha";

        $credentials = array(); $recipents = array(); $content = array(); $verID = md5($_POST['email']);
        $recipents[0] = array("email" => $_POST['email'], "name" => $_POST['f_name'] . " " . $_POST['l_name']);
        $credentials['username'] = "registrations@heisenbergscorner.org";
        $credentials['recipents'] = $recipents;
        $content['subject'] = "Verification of your account";
        $content['HTML_body'] = generate_link($verID);
        $content['body'] = "Go to the following URL to verify your account: \n\n http://kanonatw.esy.es/verify/?verID={$verID}";

        kanona_mail($credentials, $content);
    }

    function checkAL() {
        global $conn;
        $email = $_POST['email'];
        $sql = "SELECT fName, lName, email FROM registered_data WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { $name = $row['fName'] . " " . $row['lName']; }
            echo "AL -v:-{$name}";
            return true;
        }
        $sql = "SELECT fName, lName, email FROM tempData WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { $name = $row['fName'] . " " . $row['lName'];}
            echo "AL:-{$name}";
            return true;
        }
        return false;
    }

    function add_registration() {
        global $conn;
        $fn = $_POST['f_name'];
        $ln = $_POST['l_name'];
        $ph = $_POST['phone'];
        $em = $_POST['email'];
        $vi = md5($_POST['email']);
        $sql = "INSERT INTO tempData(fName, lName, email, phone, verID) VALUES('$fn', '$ln', '$em', '$ph', '$vi')";
        $result = mysqli_query($conn, $sql);
        if ($result) { 
            add_about($vi);
            verify_mail();
            echo "OK";
            $_SESSION['v_mail'] = true;
        }
        else { 
            $_SESSION['v_mail'] = false; 
            echo "You couldn't be registered successfully as we are having a problem with server communication.<br>" . mysqli_error($conn); 
        }
    }

    if (!checkAL()) {
        add_registration();
    }

?>