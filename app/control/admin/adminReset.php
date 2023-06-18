<?php 
session_start();

if(!empty($_SESSION['username'])){
    if($_SESSION['userType'] == adminc || $_SESSION['userType'] == superAdmin){
		$id = $_GET['id'];

		$pass = md5(md5("password5"));
		$updated_by = $_SESSION['username'];
	
		$query = mysqli_query($con, "UPDATE t_user SET user_pass = '$pass', updated_by = '$updated_by', updated_at = CURRENT_TIMESTAMP, version =  version +1  where id = $id");
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