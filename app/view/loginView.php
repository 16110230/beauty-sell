<div class="row mb-xl-1" >
    <div class="col-4"></div>
    <div class="col-4">
        <form method="POST">
            LOGIN
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control" name="email" required/>
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" name="password" required/>
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <div class="row mb-4">
            </div>

            <button type="submit" name="Submit" id="submit" class="btn btn-warning btn-block mb-4">Sign in</button>

            <?php
            if(isset($_POST['Submit'])){
                if(isset($_POST['email']) && isset($_POST['password'])){
                    $email = $_POST['email'];
                    $pass = md5(md5($_POST['password']));
                    $admin = adminc;
                    $spradm = superAdmin;

                    $login = $con->execute_query("select tu.*, tut.user_type_code  from t_user tu
                                                    join t_user_type tut on tut.id = tu.user_type_id 
                                                    where tu.is_active = true 
                                                    and tu.user_email = '$email' and tu.user_pass = '$pass'");
                    if($login->num_rows > 0){
                        $data = $login->fetch_assoc();
                        $_SESSION['username'] = $data['user_email'];
                        $_SESSION['userType'] = $data['user_type_code'];
                        $_SESSION['idUser'] = $data['id'];                 ?>
                        <script type="text/javascript">
                            alert('Success');
                            <?php
                            if($data['user_type_code'] == adminc || $data['user_type_code'] == superAdmin ){
                            ?>
                            document.location.href="?m=admin";
                            <?php
                            }else{
                            ?>
                            document.location.href="?m=user";
                            <?php
                            }
                            ?>
                        </script>
                    <?php
                    }else{
                    ?>
                        <script type="text/javascript">
                            alert('GAGAL');
                            document.location.href="?m=login";
                        </script>
                        <?php
                    }
                }
            }
            ?>
        </form>
    </div>
</div>