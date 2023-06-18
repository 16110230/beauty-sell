<?php
session_start();
if(!empty($_SESSION['username'])){
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
        $title   = 'HOME';
        $content = VIEWADMIN.'homeAdminView.php';
        $sidebar = VIEWADMIN.'sidebarAdminView.php';
        $navbar  = VIEWADMIN.'navbarAdminView.php';
        include VIEWADMIN.'template.php';
    }else{
        header('Location: ' . "?m=admin-404", true, "303");
        die();
    }
}else{
    header('Location: ' . "?m=login", true, "303");
    die();
}
?>