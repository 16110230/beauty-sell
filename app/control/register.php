<?php
session_start();
if(empty($_SESSION['username'])){
    $title   = 'Register';
    $content = VIEW.'registerView.php';
    $js = JS.'prodDetailJs.php';
    $data = $con->execute_query("select * from t_prod_cat where is_active = true");

    include VIEW.'template.php';
}else{
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
        header('Location: ' . "?m=admin", true, "303");
        die();
    }else if($_SESSION['userType'] == userc){
        header('Location: ' . "?m=home", true, "303");
        die();
    }
}



?>
