<form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
    <div class="form-group">
        <input hidden name="id" value="<?=$data['id']?>" readonly>
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" value="<?=$data['prod_cat_name']?>" required>
        <small id="nameHelp" class="form-text text-muted">Add your admin name here.</small>

        <label for="exampleInputEmail1">Code</label>
        <input name="code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$data['prod_cat_code']?>" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        <div class="mt-3">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name="is_active[]" class="form-check-input" type="checkbox" value="" id="is_active" <?php if($data['is_active']){echo "checked";}?> />
            <label class="form-check-label" for="is_active">is active?</label>
        </div>

    </div>
    <div class="modal-footer">
        <a class="btn btn-warning" href="?m=product-category" title="BACK"><i class="fa fa-arrow-circle-left"></i></a>
        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit"><i class="fa fa-save"></i></button>
        <?php
        if(isset($_POST['Submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $code = $_POST['code'];
            $isActive = $_POST['is_active'];
            $updated_by = "SYSTEM";

            $inserAdmin = mysqli_query($con, "UPDATE t_prod_cat SET prod_cat_name = '$name', 
                                              prod_cat_code= '$code', 
                                              is_active = true, 
                                              updated_by = '$updated_by',
                                              updated_at = CURRENT_TIMESTAMP,
                                              version = version + 1
                                            where id = $id");

            ?>
            <script type="text/javascript">
                alert('Success');
                document.location.href="?m=product-category";
            </script>
            <?php
        }
        ?>
    </div>
</form>