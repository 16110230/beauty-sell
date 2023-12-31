<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
    <div class="row px-xl-5">
        <?php
        foreach ($productRecent as $key => $data) {
//            var_dump($data);
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="asset/img/uploads/<?= $data['prod_img']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="?m=product/detail&id=<?=$data['id']?>"><i class="fa fa-shopping-cart"></i></a>
                            <!--                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>-->
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <!--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>-->
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?=$data['prod_name']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>IDR <?=$data['prod_price']?></h5><h6 class="text-muted ml-2"><del>IDR <?php echo $data['prod_price'] + 10/100 * $data['prod_price']?></del></h6>
                        </div>
                        <!--                    <div class="d-flex align-items-center justify-content-center mb-1">-->
                        <!--                        <small class="fa fa-star text-primary mr-1"></small>-->
                        <!--                        <small class="fa fa-star text-primary mr-1"></small>-->
                        <!--                        <small class="fa fa-star text-primary mr-1"></small>-->
                        <!--                        <small class="fa fa-star text-primary mr-1"></small>-->
                        <!--                        <small class="fa fa-star text-primary mr-1"></small>-->
                        <!--                        <small>(99)</small>-->
                        <!--                    </div>-->
                    </div>
                </div>
            </div>


            <?php
        }
        ?>
    </div>
</div>
<!-- Products End -->