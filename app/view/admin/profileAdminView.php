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

        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter New Password">
        <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>

        <label for="address">Address</label>
        <textarea name="address" class="form-control" id="address" rows="3" required><?=$data['user_address']?></textarea>

       
        

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit"><i class="fa fa-save"></i></button>
        <?php
        if(isset($_POST['Submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = null;
            if($_POST['password'] != ""){
                $password = md5(md5($_POST['password']));
            }
            $updated_by = $_SESSION['username'];

            if($password == null){
                $inserAdmin = mysqli_query($con, "UPDATE t_user SET user_full_name = '$name', 
                user_email= '$email', 
                user_phone = '$phone', 
                user_address = '$address', 
                is_active = true, 
                updated_by = '$updated_by',
                updated_at = CURRENT_TIMESTAMP,
                version = version + 1
                where id = $id");
            }else{
                $inserAdmin = mysqli_query($con, "UPDATE t_user SET user_full_name = '$name', 
                user_email= '$email', 
                user_phone = '$phone', 
                user_address = '$address', 
                user_pass = '$password',
                is_active = true, 
                updated_by = '$updated_by',
                updated_at = CURRENT_TIMESTAMP,
                version = version + 1
              where id = $id");
            }
           

            ?>
            <script type="text/javascript">
                alert('Success');
                document.location.href="?m=profile-admin";
            </script>
            <?php
        }
        ?>
    </div>
</form>