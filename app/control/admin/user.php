<?php
    session_start();
    if(!empty($_SESSION['username'])){
        if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
            $arg1 = "USR";
            $no = 1;
            $user = $con->execute_query("  select tu.id, tu.user_full_name,
                                            tu.user_email, tu.user_address, 
                                            tu.created_at, tu.user_phone,
                                            tu.is_active, tut.user_type_name
                                            from t_user tu
                                            join t_user_type tut on tu.user_type_id = tut.id
                                           where tut.user_type_code = '".$arg1."'");
            $title   = 'User Management';
            $content = VIEWADMIN.'userView.php';
            $sidebar = VIEWADMIN.'sidebarAdminView.php';
            $navbar  = VIEWADMIN.'navbarAdminView.php';
            $js = JS.'userManage.php';
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