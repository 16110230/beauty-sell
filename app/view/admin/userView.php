<table id="example1" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Admin Full-Name</th>
        <th scope="col">Admin Email</th>
        <th scope="col">Admin Phone</th>
        <th scope="col">Admin Address</th>
        <th scope="col">Join Date</th>
        <th scope="col">Account Level</th>
        <th scope="col">Is Active</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($user as $key => $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['user_full_name']?></td>
            <td><?php echo $data['user_email'] ?></td>
            <td><?php echo $data['user_phone'] ?></td>
            <td><?php echo $data['user_address'] ?></td>
            <td><?php echo $data['created_at'] ?></td>
            <td><?= $data['user_type_name']?></td>
            <td><?php  if ($data['is_active']){echo "ACTIVE";}else{echo "NOT ACTIVE";} ?></td>
            <td align="text-center">
                <?php if($data['is_active']){ ?>
                    <a class="btn-sm btn-danger" title="Deactivated" href="?m=user-manage/deact&id=<?= $data['id'];?>"><i class="fa fa-trash"></i></a>
                <?php }else{ ?>
                    <a class="btn-sm btn-success" title="Re-activated" href="?m=user-manage/react&id=<?= $data['id'];?>"><i class="fa fa-undo"></i></a>
                <?php } ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
