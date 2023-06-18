<?php
    session_start();
    if(!empty($_SESSION['username'])){
        if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
            $stage = $_GET['m'];
            if($stage == 'product-category'){
                $no = 1;
                $data = $con->execute_query("select * from t_prod_cat where is_active = true");
                $title   = 'Product Category Management';
                $content = VIEWADMIN.'prodCatView.php';
                $sidebar = VIEWADMIN.'sidebarAdminView.php';
                $navbar  = VIEWADMIN.'navbarAdminView.php';
                $js      = JS.'prodCat.php';
                include VIEWADMIN.'template.php';
            } elseif ($stage == 'product-category/edit'){
                $id = $_GET['id'];
                $stmt = $con->prepare('SELECT * FROM t_prod_cat WHERE id=? and is_active = true');
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $data = $stmt->get_result()->fetch_assoc();
                $title   = 'Product Category Management';
                $content = VIEWADMIN.'prodCatEditView.php';
                $sidebar = VIEWADMIN.'sidebarAdminView.php';
                $navbar  = VIEWADMIN.'navbarAdminView.php';
                $js      = JS.'prodCat.php';
                include VIEWADMIN.'template.php';
            } elseif ($stage == 'product-category/delete'){
                $id = $_GET['id'];
                $updated_by = 'SYSTEM';
                $query = mysqli_query($con, "UPDATE t_prod_cat SET is_active = false, 
                                              updated_at = CURRENT_TIMESTAMP, 
                                              updated_by = '$updated_by', 
                                              version =  version +1  where id = $id");
        
                $page = '?m=product-category';
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