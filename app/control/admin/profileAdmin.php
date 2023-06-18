<?php 
    session_start();
    if(!empty($_SESSION['username'])){
        if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
            $id = $_SESSION['idUser'];
            $stmt = $con->prepare('SELECT * FROM t_user WHERE id=?');
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $data = $stmt->get_result()->fetch_assoc();
        
            $title   = 'Profile';
            $content = VIEWADMIN.'profileAdminView.php';
            $sidebar = VIEWADMIN.'sidebarAdminView.php';
            $navbar  = VIEWADMIN.'navbarAdminView.php';
            $js = JS.'adminManage.php';
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