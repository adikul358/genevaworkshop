<?php
    require 'kanona_mail.php';
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

    function generate_html($verID) {
        $verlink = "https://kanonatw.esy.es/verify/?vercode=" . $verID;
        $html = explode("AKBS", fread(fopen("verification_mail.html", 'r'), filesize("verification_mail.html")))[0] . $verlink . explode("AKBS", fread(fopen("verification_mail.html", 'r'), filesize("verification_mail.html")))[1]; 
        return $html;
    }

    function add_about($id) {
        $about = array();   
        $about['path'] = "../about_data/temp/" . $id . ".txt";
        if (!is_dir("../about_data")) { mkdir("../about_data"); }
        if (!is_dir("../about_data/temp")) { mkdir("../about_data/temp"); }
        $about['file'] = fopen($about['path'], 'w');
        $about['text'] = $_POST['about'];
        fwrite($about['file'], $about['text']);
        fclose($about['file']);
    }

    function verify_mail() {
        // $_POST['email'] = "aditya.kulshrestha@outlook.com";
        // $_POST['f_name'] = "Aditya";
        // $_POST['l_name'] = "Kulshrestha";

        $credentials = array(); $recipents = array(); $content = array(); $verID = md5($_POST['email']);

        $credentials['username'] = "registrations@heisenbergscorner.org";
        $recipents[0] = array("email" => $_POST['email'], "name" => $_POST['f_name'] . " " . $_POST['l_name']);
        $credentials['recipents'] = $recipents;
        
        $content['subject'] = "Verification of your account";
        $content['HTML_body'] = generate_html($verID);
        $content['body'] = "Go to the following URL to verify your account: \n\n http://kanonatw.esy.es/verify/?verID={$verID}";

        kanona_mail($credentials, $content);
    }

    function checkAL($name_return = false) {
        $email = $_POST['email'];
        $sql = "SELECT fName, lName, email FROM registrationData WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows)
    }

    function add_registration() {
        global $conn;
        $fn = $_POST['f_name'];
        $ln = $_POST['l_name'];
        $em = $_POST['email'];
        $vi = md5($_POST['email']);
        $sql = "INSERT INTO tempData(fName, lName, email, verID) VALUES('$fn', '$ln', '$em', '$vi')";
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

    if (checkAL()) {
        echo "AL-" . ""
    }
    add_registration();

?>