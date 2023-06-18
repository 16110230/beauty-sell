<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="?m=home">Home</a>
                <span class="breadcrumb-item active">Product Detail</span>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?=UPLOADS.$product['prod_img']?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?=$product['prod_name']?></h3>
                <h3 class="font-weight-semi-bold mb-4">IDR <?=$product['prod_price']?>.00</h3>
                <h5 class="font-weight-semi-bold mb-4">Only <?=$product['prod_stock']?> left</h5>
                <p class="mb-4"><?=$product['prod_desc']?></p>
               <form method="post" action="">
                   <div class="d-flex align-items-center mb-4 pt-2">
                       <div class="input-group quantity mr-3" style="width: 130px;">
                           <div class="input-group-btn">
                               <button class="btn btn-primary btn-minus">
                                   <i class="fa fa-minus"></i>
                               </button>
                           </div>
                           <input type="text" name="qty" class="form-control bg-secondary border-0 text-center" value="1">
                           <div class="input-group-btn">
                               <button class="btn btn-primary btn-plus">
                                   <i class="fa fa-plus"></i>
                               </button>
                           </div>
                       </div>
                       <button type="submit" name="add" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                           Cart</button>
                   </div>
                   <?php
                    $pain = 'PAID';
                    if(isset($_POST['add'])){
                        $paid = "PAID";
                        $idUser = $_SESSION['idUser'];
                        $idprod = $_GET['id'];
                        $qty = $_POST['qty'];
                        $check = $con->execute_query("
                                                            select * from t_chart tc 
                                                            join t_user tu on tu.id = tc.user_id 
                                                            join t_reciept tr on tr.chart_id = tc.id 
                                                            where tu.id = '$idUser' 
                                                            and tr.is_paid = '$paid'
                                                            ")->num_rows;
//                        var_dump($check);die();
                        if($check = 0){
                            $createChart = $con->execute_query("insert into t_chart (user_id, is_active, version, created_at, created_by ) values ('$idUser', true, 1, CURRENT_TIMESTAMP, '$idUser')");
                            $chartId = $con->execute_query('select id from t_chart where user_id = '.$_SESSION['idUser'].' order by id desc limit 1')->fetch_assoc();
                            $idChart = $chartId['id'];
                            $con->execute_query("insert into t_chart_dtl (chart_id, prod_id, qty, is_active, version, created_at, created_by) 
                                                                            values('$idChart', '$idprod' ,'$qty' , true, 1,  CURRENT_TIMESTAMP,'$idUser')");
                        }else{
                            $chartId = $con->execute_query('select id from t_chart where user_id = '.$_SESSION['idUser'].' order by id desc limit 1')->fetch_assoc();
                            $idChart = $chartId['id'];
                            $con->execute_query("insert into t_chart_dtl (chart_id, prod_id, qty, is_active, version, created_at, created_by) 
                                                                            values($idChart, $idprod , $qty , true, 1,  CURRENT_TIMESTAMP ,$idUser)");
                        }
                    }
                   ?>
               </form>


                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Shop Detail End -->

<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
    <div class="row px-xl-5">
        <?php
        foreach ($productRecent as $key => $data) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="asset/img/uploads/<?= $data['prod_img']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?=$data['prod_name']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>IDR <?=$data['prod_price']?></h5><h6 class="text-muted ml-2"><del>IDR <?php echo $data['prod_price'] + 10/100 * $data['prod_price']?></del></h6>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }
        ?>
    </div>
</div>
