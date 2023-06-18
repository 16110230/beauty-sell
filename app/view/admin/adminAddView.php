<form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
    <div class="form-group">
        <input hidden name="id" value="<?=$data['id']?>" readonly>
        <label for="name">Full Name</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" value="<?=$data['user_full_name']?>" required>
        <small id="nameHelp" class="form-text text-muted">Add your admin name here.</small>

        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$data['user_email']?>" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        <label for="phone">Phone Number</label>
        <input name="phone" type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone" value="<?=$data['user_phone']?>" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        <label for="address">Address</label>
        <textarea name="address" class="form-control" id="address" rows="3" required><?=$data['user_address']?></textarea>

        <div class="mt-3">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name="is_active[]" class="form-check-input" type="checkbox" value="" id="is_active" <?php if($data['is_active']){echo "checked";}?> />
            <label class="form-check-label" for="is_active">is active?</label>
        </div>

    </div>
    <div class="modal-footer">
        <a class="btn btn-warning" href="?m=admin-manage" title="BACK"><i class="fa fa-arrow-circle-left"></i></a>
        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit"><i class="fa fa-save"></i></button>
        <?php
        if(isset($_POST['Submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $isActive = $_POST['is_active'];
            $updated_by = "SYSTEM";

            $inserAdmin = mysqli_query($con, "UPDATE t_user SET user_full_name = '$name', 
                                              user_email= '$email', 
                                              user_phone = '$phone', 
                                              user_address = '$address', 
                                              is_active = true, 
                                              updated_by = '$updated_by',
                                              updated_at = CURRENT_TIMESTAMP,
                                              version = version + 1
                                            where id = $id");

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