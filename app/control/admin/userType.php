<?php
    session_start();
    $stage = $_GET['m'];
    if($stage == 'user-type'){
        $no = 1;
        $data = $con->execute_query("select * from t_user_type where is_active = true");
        $title   = 'User Type Management';
        $content = VIEWADMIN.'userTypeView.php';
        $sidebar = VIEWADMIN.'sidebarAdminView.php';
        $navbar  = VIEWADMIN.'navbarAdminView.php';
        $js      = JS.'userType.php';
        include VIEWADMIN.'template.php';
    }elseif ($stage == 'user-type/edit'){
        $id = $_GET['id'];
        $stmt = $con->prepare('select * from t_user_type tp where tp.id = ? and tp.is_active = true');
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();

        $title   = 'User Type Management';
        $content = VIEWADMIN.'userTypeeditView.php';
        $sidebar = VIEWADMIN.'sidebarAdminView.php';
        $navbar  = VIEWADMIN.'navbarAdminView.php';
        $js      = JS.'prodEdit.php';
        include VIEWADMIN.'template.php';
    }elseif ($stage == 'user-type/delete'){
        $id = $_GET['id'];
        $updated_by = $_SESSION['username'];
        $query = mysqli_query($con, "UPDATE t_user_type SET is_active = false, 
                                      updated_at = CURRENT_TIMESTAMP, 
                                      updated_by = '$updated_by', 
                                      version =  version +1  where id = $id");

        $page = '?m=user-type';
        $sec = "0";
        header("Refresh: $sec; url=$page");
    }
?>