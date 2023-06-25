<div class="row mb-xl-1" >
    <div class="col-4"></div>
    <div class="col-4">
        <form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" required>
                <small id="nameHelp" class="form-text text-muted">Add your admin name here.</small>

                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                <label for="exampleInputEmail1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>

<!--                <label for="exampleInputEmail1">Re-type Password</label>-->
<!--                <input name="re-password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>-->
<!--                <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>-->

                <label for="phone">Phone Number</label>
                <input name="phone" type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" rows="3" required></textarea>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit">REGISTER</button>
                <?php
                if(isset($_POST['Submit'])){
//                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $pass = md5(md5($_POST['password']));
                    $updated_by = "REGISTER";
                    $idUser = $con->execute_query("select ut.id from t_user_type ut where ut.user_type_name = 'USER'")->fetch_assoc();
//                    var_dump($idUser['id']);die();
                    $idSend = $idUser['id'];

                    $inserAdmin = mysqli_query($con, "insert into t_user 
                                             (user_type_id, user_full_name, user_email, 
                                              user_pass, user_address, created_by, 
                                              created_at, is_active, user_phone, version) 
                                             values($idSend, '$name', '$email', '$pass', '$address', '$updated_by', 
                                                    CURRENT_TIMESTAMP, true , '$phone', 0)");

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
