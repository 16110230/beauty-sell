<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="?m=home">Home</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-4">
<!--            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>-->
<!--            <div class="bg-light p-30 mb-5">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>First Name</label>-->
<!--                        <input class="form-control" type="text" placeholder="John">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>Last Name</label>-->
<!--                        <input class="form-control" type="text" placeholder="Doe">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>E-mail</label>-->
<!--                        <input class="form-control" type="text" placeholder="example@email.com">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>Mobile No</label>-->
<!--                        <input class="form-control" type="text" placeholder="+123 456 789">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>Address Line 1</label>-->
<!--                        <input class="form-control" type="text" placeholder="123 Street">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>Address Line 2</label>-->
<!--                        <input class="form-control" type="text" placeholder="123 Street">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>Country</label>-->
<!--                        <select class="custom-select">-->
<!--                            <option selected>United States</option>-->
<!--                            <option>Afghanistan</option>-->
<!--                            <option>Albania</option>-->
<!--                            <option>Algeria</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>City</label>-->
<!--                        <input class="form-control" type="text" placeholder="New York">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>State</label>-->
<!--                        <input class="form-control" type="text" placeholder="New York">-->
<!--                    </div>-->
<!--                    <div class="col-md-6 form-group">-->
<!--                        <label>ZIP Code</label>-->
<!--                        <input class="form-control" type="text" placeholder="123">-->
<!--                    </div>-->
<!--                    <div class="col-md-12 form-group">-->
<!--                        <div class="custom-control custom-checkbox">-->
<!--                            <input type="checkbox" class="custom-control-input" id="newaccount">-->
<!--                            <label class="custom-control-label" for="newaccount">Create an account</label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="collapse mb-5" id="shipping-address">-->
<!--                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>-->
<!--                <div class="bg-light p-30">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>First Name</label>-->
<!--                            <input class="form-control" type="text" placeholder="John">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>Last Name</label>-->
<!--                            <input class="form-control" type="text" placeholder="Doe">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>E-mail</label>-->
<!--                            <input class="form-control" type="text" placeholder="example@email.com">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>Mobile No</label>-->
<!--                            <input class="form-control" type="text" placeholder="+123 456 789">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>Address Line 1</label>-->
<!--                            <input class="form-control" type="text" placeholder="123 Street">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>Address Line 2</label>-->
<!--                            <input class="form-control" type="text" placeholder="123 Street">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>Country</label>-->
<!--                            <select class="custom-select">-->
<!--                                <option selected>United States</option>-->
<!--                                <option>Afghanistan</option>-->
<!--                                <option>Albania</option>-->
<!--                                <option>Algeria</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>City</label>-->
<!--                            <input class="form-control" type="text" placeholder="New York">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>State</label>-->
<!--                            <input class="form-control" type="text" placeholder="New York">-->
<!--                        </div>-->
<!--                        <div class="col-md-6 form-group">-->
<!--                            <label>ZIP Code</label>-->
<!--                            <input class="form-control" type="text" placeholder="123">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <?php
                        foreach ($data as $key => $datas){
                            ?>
                            <div class="d-flex justify-content-between">
                                <p><?=$datas['prod_name']?></p>
                                <p><?=$datas['prod_price']?></p>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>Rp.<?=$subtotal['subtotal']?>.00</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">FREE</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>Rp.<?=$subtotal['subtotal']?>.00</h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">
                    <p>
                        Please Transfer the money to 111909090 BRI A/N AGAN KASKUS
                    </p>
                    <form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control mb-3 mt-3" id="file" aria-describedby="nameHelp" placeholder="Enter File" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit">Save</button>
                            <button type="button" class="btn btn-secondary pull-right ml-1" data-dismiss="modal">Close</button>
                            <?php
                            if(isset($_POST['Submit'])){
                                $iduser = $_SESSION['idUser'];
                                $chartid = $_GET['id'];
                                $isPaid = "ON_CHECK";
                                $shipAdd = "SAME";
                                $status= "SHIPMENT_PROD";
                                $total = $subtotal['subtotal'];
                                $fileName = basename($_FILES["file"]["name"]);
                                $targetFilePath = UPLOADS . $fileName;
                                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                                if(!empty($_FILES["file"]["name"])){
                                    $allowTypes = array('jpg','png','jpeg','gif','pdf');
                                    if(in_array($fileType, $allowTypes)){
                                        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                            $insert = mysqli_query($con, "
                                                       insert into t_reciept(user_id, chart_id, total_price, payment_proof, 
                                                                             is_paid, ship_address, status, is_active, version, created_at, created_by)
                                                       values ('$iduser', '$chartid', '$total', '$fileName', '$isPaid', '$shipAdd', '$status', true, 1, CURRENT_TIMESTAMP, '$iduser')");
                                            if($insert){
                                                $update = $con->execute_query("update t_chart set is_active = false where id = '$chartid'");
                                                $update2 = $con->execute_query("update t_chart_dtl set is_active = false where chart_id = '$chartid'");
                                            }
                                        }
                                    }
                                }
                                ?>
                                <script type="text/javascript">
                                    alert('Success');
                                    document.location.href="?m=home";
                                </script>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->