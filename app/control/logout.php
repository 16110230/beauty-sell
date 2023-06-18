<?php 
    session_start();
    session_destroy();
    header('Location: ' . "?m=home", true, "303");
        die();
?>