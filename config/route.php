<?php
/*
this file to set the route
*/
    $modul = (@$_GET['m']) ?: '';

    switch ($modul) {

        //Admin
        case 'admin':
            include APPADMIN.'homeAdmin.php';
            break;

        case 'user-manage':
            include APPADMIN.'user.php';
            break;

        case 'user-manage/deact':
            include APPADMIN.'userDeact.php';
            break;

        case 'user-manage/react':
            include APPADMIN.'userReact.php';
            break;

        case 'admin-manage':
            include APPADMIN.'admin.php';
            break;

        case 'admin-manage/edit':
            include APPADMIN.'adminAdd.php';
            break;

        case 'admin-manage/reset':
            include APPADMIN.'adminReset.php';
            break;

        case 'admin-manage/deact':
            include APPADMIN.'adminDeact.php';
            break;

        case 'product-category':
            include APPADMIN.'prodCat.php';
            break;

        case 'product-category/edit':
            include APPADMIN.'prodCat.php';
            break;

        case 'product-category/delete':
            include APPADMIN.'prodCat.php';
            break;

        case 'product-manage':
            include APPADMIN.'prod.php';
            break;

        case 'product-manage/edit':
            include APPADMIN.'prod.php';
            break;

        case 'product-manage/delete':
            include APPADMIN.'prod.php';
            break;

        case 'user-type':
            include APPADMIN.'userType.php';
            break;
        
        case 'user-type/edit':
            include APPADMIN.'userType.php';
            break;

        case 'user-type/delete':
            include APPADMIN.'userType.php';
            break;
        
        case 'admin-404':
            include APPADMIN.'admin404.php';
            break;
        
        case 'profile-admin':
            include APPADMIN.'profileAdmin.php';
            break;

        case 'sales':
            include APPADMIN.'sales.php';
            break;

        case 'sales/acc-payment':
            include APPADMIN.'sales.php';
            break;

        case 'sales/detail-chart':
            include APPADMIN.'sales.php';
            break;

    
        //session management
        case 'login':
            include APP.'login.php';
            break;

        case 'login/process':
            include APP.'login.php';
            break;

        case 'logout':
            include APP.'logout.php';
            break;

       //User
        case 'home':
            include APP.'homeUser.php';
            break;

        case 'register':
            include APP.'register.php';
            break;

        case 'product':
            include APP.'product.php';
            break;

        case 'product/detail':
            include APP.'product.php';
            break;

        case 'chart':
            include APP.'chart.php';
            break;

        case 'chart/delete':
            include APP.'chart.php';
            break;

        case 'checkout':
            include APP.'checkout.php';
            break;

        default:
            include APP.'homeUser.php';
            break;
    }
?>