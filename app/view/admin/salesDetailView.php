<h2 align="center">SALES MANAGE DETAIL CHART</h2>
<br><br>
<table>
    <tr>
        <td>Shipment Type</td>
        <td>&nbsp:&nbsp</td>
        <td><?=$reciept['status']?></td>
    </tr>
    <tr>
        <td>Payment Status</td>
        <td>&nbsp:&nbsp</td>
        <td><?=$reciept['is_paid']?></td>
    </tr>
    <?php
    if ($reciept['status'] == 'SHIPMENT_PROD' || $reciept['status'] == 'SEND'){
        ?>
        <tr>
            <td>Air Way Bill</td>
            <td>&nbsp:&nbsp</td>
            <td><?=$reciept['resi_num']?></td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td>Address</td>
        <td>&nbsp:&nbsp</td>
        <td><?php if($reciept['ship_address'] == 'SAME'){echo $shipsddress['user_address'];}else{echo $reciept['ship_address'];}?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>&nbsp:&nbsp</td>
        <td><?=$shipsddress['user_phone']?></td>
    </tr>
</table>
<br>
<?php
    if($reciept['status'] == 'SHIPMENT_PROD'){
        ?>
        <button class="btn btn-primary pull-left" title="Send Product" id="send-prod"><i class="fa fa-send"></i></button>
        <?php
    }
    if($reciept['status'] == 'COD'){
        ?>
        <form method="post" action="" enctype="multipart/form-data" id="admin-form">
            <button class="btn btn-primary pull-left" title="proses product" id="proses product" type="submit" name="COD"><i class="fa fa-circle"></i></button>
            <?php
            if(isset($_POST['COD'])){
                $id = $_GET['id-rec'];
                $createdBy = $_SESSION['username'];
                $send = "COD_DONE";
                $insert = mysqli_query($con, "update t_reciept set  
                                                                updated_by = '$createdBy',
                                                                 updated_at = CURRENT_TIMESTAMP,
                                                                 status = '$send'
                                                                 where id = '$id'");

                ?>
                <script type="text/javascript">
                    alert('Success');
                    document.location.href="?m=sales";
                </script>
                <?php
            }
            ?>
        </form>
        <?php
    }
?>
<br><br>
<table id="example1" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">QTY</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['prod_name']?></td>
            <td><?php echo $data['qty'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<div class="modal fade" id="send-prod-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SEND PRODUCT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
                    <div class="form-group">
                        <label for="name">ENTER AIR WAY BILL</label>
                        <input name="awb" type="text" class="form-control" id="awb" aria-describedby="nameHelp" placeholder="ENTER AIR WAY BILL" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit">Save</button>
                        <button type="button" class="btn btn-secondary pull-right ml-1" data-dismiss="modal">Close</button>
                        <?php
                        if(isset($_POST['Submit'])){
                            $id = $_GET['id-rec'];
                            $awb = $_POST['awb'];
                            $createdBy = $_SESSION['username'];
                            $send = "SEND";
                            $insert = mysqli_query($con, "update t_reciept set resi_num ='$awb', 
                                                                updated_by = '$createdBy',
                                                                 updated_at = CURRENT_TIMESTAMP,
                                                                 status = '$send'
                                                                 where id = '$id'");

                            ?>
                            <script type="text/javascript">
                                alert('Success');
                                document.location.href="?m=sales";
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
