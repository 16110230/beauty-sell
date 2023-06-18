SALES MANAGE PER CHART
<br><br>
<table id="example1" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">User Name</th>
        <th scope="col">Order Date</th>
        <th scope="col">Total Price</th>
        <th scope="col">Payment Prof</th>
        <th scope="col">Is Paid</th>
        <th scope="col">Paid Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['user_full_name']?></td>
            <td><?php echo $data['created_at'] ?></td>
            <td><?php echo $data['total_price'] ?></td>
            <?php
                if($data['is_paid'] != 'COD'){
                    ?>
                    <td title="click to view detail"><a href="<?=UPLOADS.$data['payment_proof']?>" target="_blank"><img src="<?=UPLOADS.$data['payment_proof']?>" height="50" width="65"></a></td>
                    <?php
                }else{
                    ?>
                    <td><?="COD"?></td>
                    <?php
                }
            ?>
            <td><?php echo $data['is_paid'] ?></td>
            <td><?php echo $data['updated_at'] ?></td>
            <td><?php echo $data['status'] ?></td>
            <td align="center" valign="center">
                <?php
                    if ($data['is_paid'] == "PAID" && $data['status'] != 'COD'){
                        ?>
                        <a class="btn-sm btn-primary" id="detail" title="Detail"  href="?m=sales/detail-chart&id=<?= $data['chart_id'];?>&id-rec=<?= $data['id']?>"><i class="fa fa-eye"></i></a>
                        <?php
                    }

                    if($data['is_paid'] != 'PAID' && $data['status'] != 'COD' && $data['is_paid'] != 'COD'){
                        ?>
                        <a class="btn-sm btn-danger" id="acc" title="Acc Payment"  href="?m=sales/acc-payment&id=<?= $data['id'];?>" onclick="return confirm('Are you sure? PLEASE CHECK PAYMENT PROOF FIRST !!!')"><i class="fa fa-check"></i></a>
                        <?php
                    }

                    if ($data['is_paid'] == "COD"){
                        ?>
                        <a class="btn-sm btn-primary" id="detail" title="Detail"  href="?m=sales/detail-chart&id=<?= $data['chart_id'];?>&id-rec=<?= $data['id']?>"><i class="fa fa-eye"></i></a>
                        <?php
                    }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
