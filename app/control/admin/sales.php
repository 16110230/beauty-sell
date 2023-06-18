<?php
session_start();
if(!empty($_SESSION['username'])){
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
        $stage = $_GET['m'];
        if($stage == 'sales'){
            $no = 1;
            $data = $con->execute_query("select tr.*, tu.user_full_name from t_reciept tr join t_user tu on tu.id = tr.user_id where tr.is_active = true order by tr.id desc ;");
            $title   = 'Sales Management';
            $content = VIEWADMIN.'salesView.php';
            $sidebar = VIEWADMIN.'sidebarAdminView.php';
            $navbar  = VIEWADMIN.'navbarAdminView.php';
            $js      = JS.'prodCat.php';
            include VIEWADMIN.'template.php';
        } elseif ($stage == 'sales/detail-chart'){
            $id = $_GET['id'];
            $idrec = $_GET['id-rec'];
            $no = 1;
            $data = $con->execute_query('select *, 
                                        (select tp.prod_name  from t_product tp where tp.id = tcd.prod_id) as prod_name 
                                        from t_chart tc 
                                        left join t_chart_dtl tcd on tcd.chart_id = tc.id 
                                        where tc.id ='.$id.' order by tc.id asc');
            $reciept = $con->execute_query('select * from t_reciept where id = '.$idrec.' ')->fetch_assoc();
            $shipsddress = $con->execute_query('select tu.user_address, tu.user_phone from t_user tu where tu.id = '.$idrec.'')->fetch_assoc();
//            var_dump($shipsddress);

//            var_dump($reciept); die();
            $title   = 'Sales Detail';
            $content = VIEWADMIN.'salesDetailView.php';
            $sidebar = VIEWADMIN.'sidebarAdminView.php';
            $navbar  = VIEWADMIN.'navbarAdminView.php';
            $js      = JS.'prod.php';
            include VIEWADMIN.'template.php';
        } elseif ($stage == 'sales/acc-payment'){
            $id = $_GET['id'];
            $updated_by = $_SESSION['username'];
            $query = mysqli_query($con, "UPDATE t_reciept SET is_paid = 'PAID', 
                                              updated_at = CURRENT_TIMESTAMP, 
                                              updated_by = '$updated_by', 
                                              version =  version +1  where id = $id");

            $page = '?m=sales';
            $sec = "0";
            header("Refresh: $sec; url=$page");
        }
    }else{
        header('Location: ' . "?m=admin-404", true, "303");
        die();
    }
}else{
    header('Location: ' . "?m=login", true, "303");
    die();
}

?>