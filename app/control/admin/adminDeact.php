<?php 

session_start();

if(!empty($_SESSION['username'])){
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
        $id = $_GET['id'];

        $updated_by = $_SESSION['username'];
        $query = mysqli_query($con, "UPDATE t_user SET is_active = false, 
                                        updated_at = CURRENT_TIMESTAMP, 
                                        updated_by = '$updated_by', 
                                        version =  version +1  where id = $id");

        header("Location:?m=admin-manage");
    }else{
        header('Location: ' . "?m=admin-404", true, "303");
        die();
    }
}else{
    header('Location: ' . "?m=login", true, "303");
    die();
}
	
?>
