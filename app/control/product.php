<?php
session_start();
$data = $con->execute_query("select * from t_prod_cat where is_active = true");
$productRecent = $con->execute_query("select * from t_product where is_active  = true order by id desc");

if(empty($_SESSION['username'])){
    if($_GET['m'] == 'product'){
        $title   = 'Product';
        $content = VIEW.'productView.php';
        include VIEW.'template.php';
    }
    if($_GET['m'] == 'product/detail'){
        header('Location: ' . "?m=login", true, "303");
        die();
    }

}else{
    $user = $_SESSION['username'];
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
        header('Location: ' . "?m=admin", true, "303");
        die();
    }else if($_SESSION['userType'] == userc){
        if($_GET['m'] == 'product'){
            $title   = 'Product';
            $content = VIEW.'productView.php';
            $js = JS.'prodDetailJs.php';
            include VIEW.'template.php';
        }
        if($_GET['m'] == 'product/detail'){
            $id = $_GET['id'];
            $data = $con->execute_query("select * from t_prod_cat where is_active = true");
            $product = $con->execute_query('select * from t_product where id = '.$id.'')->fetch_assoc();
            $title   = 'Product';
            $content = VIEW.'productDetailView.php';
            $js = JS.'prodDetailJs.php';
            include VIEW.'template.php';
        }
    }
}



?>
