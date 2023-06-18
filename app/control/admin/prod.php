<?php
    session_start();
    if(!empty($_SESSION['username'])){
        if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
            $stage = $_GET['m'];
            if($stage == 'product-manage'){
                $no = 1;
                $data = $con->execute_query("select tp.*, tpc.prod_cat_name from t_product tp
                                                join t_prod_cat tpc on tpc.id = tp.prod_cat_id
                                                where tp.is_active = true");
                $cats = $con->execute_query("select id, prod_cat_name from t_prod_cat where is_active = true");
                $title   = 'Product Management';
                $content = VIEWADMIN.'prodView.php';
                $sidebar = VIEWADMIN.'sidebarAdminView.php';
                $navbar  = VIEWADMIN.'navbarAdminView.php';
                $js      = JS.'prod.php';
                include VIEWADMIN.'template.php';
            }elseif ($stage == 'product-manage/edit'){
                $id = $_GET['id'];
                $stmt = $con->prepare('select tp.*, tpc.prod_cat_name, tpc.id as id_cat from t_product tp
                                                join t_prod_cat tpc on tpc.id = tp.prod_cat_id
                                                where tp.id = ? and tp.is_active = true');
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $data = $stmt->get_result()->fetch_assoc();
                $cats = $con->execute_query("select id, prod_cat_name from t_prod_cat where is_active = true");

                $title   = 'Product Management';
                $content = VIEWADMIN.'prodEditView.php';
                $sidebar = VIEWADMIN.'sidebarAdminView.php';
                $navbar  = VIEWADMIN.'navbarAdminView.php';
                $js      = JS.'prodEdit.php';
                include VIEWADMIN.'template.php';
            }elseif ($stage == 'product-manage/delete'){
                $id = $_GET['id'];
                $updated_by = 'SYSTEM';
                $query = mysqli_query($con, "UPDATE t_product SET is_active = false, 
                                            updated_at = CURRENT_TIMESTAMP, 
                                            updated_by = '$updated_by', 
                                            version =  version +1  where id = $id");

                $page = '?m=product-manage';
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
