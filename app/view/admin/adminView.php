<button class="btn btn-success pull-right" title="Add Admin" id="add-admin"><i class="fa fa-plus-square"></i></button>
<br><br>
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
    <?php foreach ($admData as $key => $data) { ?>
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
                <a class="btn-sm btn-primary" id="edit" title="Edit"  href="?m=admin-manage/edit&id=<?= $data['id'];?>"><i class="fa fa-edit"></i></a>
                <a class="btn-sm btn-warning" id="reset-pass" title="Reset Password" href="?m=admin-manage/reset&id=<?= $data['id'];?>"><i class="fa fa-undo"></i></a>
                <a class="btn-sm btn-danger" title="Deactivated" href="?m=admin-manage/deact&id=<?= $data['id'];?>"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<div class="modal fade" id="add-admin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" required>
                        <small id="nameHelp" class="form-text text-muted">Add your admin name here.</small>

                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <label for="phone">Phone Number</label>
                        <input name="phone" type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address" rows="3" required></textarea>

                        <div class="mt-3">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name="is_active" class="form-check-input" type="checkbox" value="" id="is_active" checked />
                            <label class="form-check-label" for="is_active">is active?</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit">Save</button>
                        <button type="button" class="btn btn-secondary pull-right ml-1" data-dismiss="modal">Close</button>
                        <?php
                        if(isset($_POST['Submit'])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            if($_POST['is_active']){
                                $isActive = true;
                            }else{
                                $isActive = false;
                            }
                            $pass = md5(md5("password5"));

                            $inserAdmin = mysqli_query($con, "insert into t_user 
                                             (user_type_id, user_full_name, user_email, 
                                              user_pass, user_address, created_by, 
                                              created_at, is_active, user_phone, version) 
                                             values(3, '$name', '$email', '$pass', '$address', 'SUPER_ADMIN', 
                                                    CURRENT_TIMESTAMP, true , '$phone', 0)");
//                $con();
                            ?>
                            <script type="text/javascript">
                                alert('Success');
                                document.location.href="?m=admin-manage";
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


