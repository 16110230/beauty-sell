<?php
session_start();

$data = $con->execute_query("select * from t_prod_cat where is_active = true");
$productDisplay = $con->execute_query("select * from t_product where is_active  = true order by id desc limit 3");
$productRecent = $con->execute_query("select * from t_product where is_active  = true order by id desc");
$productFeatured = $con->execute_query("select * from t_product where is_active  = true order by rand() desc limit 8");
$title   = 'Home';
$content = VIEW.'homeView.php';
include VIEW.'template.php';
?>