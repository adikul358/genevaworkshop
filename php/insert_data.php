<?php
    require 'kanona_mail.php';

    $conn = mysqli_connect("sql189.main-hosting.eu", "u593806508_main", "Bs_02010021", "u593806508_keft");
    
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

    function add_about($id) {
        $about = array();
        $about['path'] = "about_data/" . $id . ".txt";
        if (!is_dir("about_data")) { mkdir("about_data"); }
        $about['file'] = fopen($about['path'], 'w');
        $about['text'] = $_POST['about'];
        // $about['text'] = "Hello, I am a guy!";
        fwrite($about['file'], $about['text']);
        fclose($about['file']);
    }

    function add_registration() {
        global $conn;
        $id = generate_id();
        $fn = $_POST['f_name'];
        $ln = $_POST['l_name'];
        $em = $_POST['email'];
        $sql = "INSERT INTO tempData(id, fName, lName, email, state) VALUES('$id', '$fn', '$ln', '$em', 0)";
        $result = mysqli_query($conn, $sql);
        if ($result) { 
            add_about($id); 
            kanona_mail($credentials, $content);
            echo "OK";
            $_SESSION['v_mail'] = true;
        }
        else { echo "You couldn't be registered successfully as we are having a problem with server communication.<br>" . mysqli_error($conn); }
    }

    add_registration();

?>