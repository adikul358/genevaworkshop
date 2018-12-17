<?php

    // $f_name = $_POST['firstname'];
    // $l_name = $_POST['lastname'];
    // $email_id = $_POST['email'];
    // $about = $_POST['about'];

    $last_id = "KAN19_00";  
    
    for($i=1; $i<=550; $i++) {
        $last_id = intval(substr($last_id, 6));  
        $id = $last_id >= 9 ? "KAN19_" . ($last_id + 1) : "KAN19_0" . ($last_id + 1);
        echo $id . "<br>";
        $last_id = $id;
    }

?>