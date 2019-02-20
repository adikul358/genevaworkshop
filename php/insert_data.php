<?php
    require 'functions.php';

    if (!check_already_exists()) {
        add_registration();
    }

?>