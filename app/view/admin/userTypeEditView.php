<form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
    <div class="form-group">
        <input hidden name="id" value="<?=$data['id']?>" readonly>
        <label for="code">Code</label>
        <input name="code" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" value="<?=$data['user_type_code']?>" required>

        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$data['user_type_name']?>" required>


    </div>
    <div class="modal-footer">
        <a class="btn btn-warning" href="?m=user-type" title="BACK"><i class="fa fa-arrow-circle-left"></i></a>
        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit"><i class="fa fa-save"></i></button>
        <?php
        if(isset($_POST['Submit'])){
            $code = $_POST['code'];
            $name = $_POST['name'];
            $updated_by = $_SESSION["username"];

            $inserAdmin = mysqli_query($con, "UPDATE t_user_type SET user_type_name = '$name', 
                                              user_type_code = '$code', 
                                              updated_by = '$updated_by',
                                              updated_at = CURRENT_TIMESTAMP,
                                              version = version + 1
                                            where id = $id");

            ?>
            <script type="text/javascript">
                alert('Success');
                document.location.href="?m=user-type";
            </script>
            <?php
        }
        ?>
    </div>
</form>