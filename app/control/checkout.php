<?php
session_start();
$id = $_SESSION['idUser'];
$data = $con->execute_query("select *, tc.id as chartId, tp.id as prodId, tcd.id as idtcd from t_chart_dtl tcd  join t_chart tc on tc.id = tcd.chart_id join t_user tu on tu.id = tc.user_id 
join t_product tp on tp.id = tcd.prod_id where tu.id = '$id' and tcd.is_active = true");
$subtotal = $con->execute_query("select sum(tp.prod_price) as subtotal  from t_chart_dtl tcd  join t_chart tc on tc.id = tcd.chart_id join t_user tu on tu.id = tc.user_id 
join t_product tp on tp.id = tcd.prod_id 
where tu.id = '$id' and tc.is_active = true ")->fetch_assoc();
if(empty($_SESSION['username'])){
    header('Location: ' . "?m=login", true, "303");
    die();
}else{
    $user = $_SESSION['username'];
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
        header('Location: ' . "?m=admin", true, "303");
        die();
    }else if($_SESSION['userType'] == userc){
        if($_GET['m'] == 'checkout'){
            $title   = 'Checkout';
            $js = JS.'prodDetailJs.php';
            $content = VIEW.'checkoutView.php';
            include VIEW.'template.php';
        }
        if($_GET['m'] == 'chart/delete'){
            $idchrtdtl = $_GET['id-dtl'];
            $js = JS.'prodDetailJs.php';
            $con->execute_query("update t_chart_dtl set is_active = false where  id= '$idchrtdtl'");
            header('Location: ' . "?m=chart&id=".$id, true, "303");
        }
    }
}



?>
