<form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
    <div class="form-group">
        <label for="name">Product Name</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" value="<?=$data['prod_name']?>" required>
        <select class="form-control mb-3 mt-3 " aria-label="Default select example" name="category">
            <option value="<?=$data['id_cat']?>" selected><?=$data['prod_cat_name']?></option>
            <?php
            foreach ($cats as $cat){?>
                <option value="<?=$cat['id']?>"><?=$cat['prod_cat_name']?></option>
                <?php
            }
            ?>
        </select>
        <input type="hidden" value="<?=$data['id']?>" name="id">
        <input name="stock" type="number" class="form-control mb-3 mt-3" id="stock" aria-describedby="nameHelp" placeholder="Enter Stock" value="<?=$data['prod_stock']?>" required>
        <input name="price" type="number" class="form-control mb-3 mt-3" id="price" aria-describedby="nameHelp" placeholder="Enter Price" value="<?=$data['prod_price']?>" required>
        <img class="mt-3 mb-1" src="<?=UPLOADS.$data['prod_img']?>" width="100" height="70">
        <input name="file" type="file" class="form-control mb-3 mt-3" id="file" aria-describedby="nameHelp" placeholder="Enter File">
        <textarea name="desc" class="form-control" id="desc" rows="3" required><?=$data['prod_desc']?></textarea>
    </div>
    <div class="modal-footer">
        <a class="btn btn-warning" href="?m=product-manage" title="BACK"><i class="fa fa-arrow-circle-left"></i></a>
        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit"><i class="fa fa-save"></i></button>
        <?php
        if(isset($_POST['Submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $stock = $_POST['stock'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $isactive = true;
            $createdBy = 'SYSTEM';

            if(!empty($_FILES["file"]["name"])){
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = UPLOADS . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if(in_array($fileType, $allowTypes)){
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $update = mysqli_query($con, " UPDATE t_product SET
                                                            prod_name = '$name',
                                                            prod_cat_id = $category,
                                                            prod_stock = $stock,
                                                            prod_price = $price,
                                                            prod_desc = '$desc',
                                                            prod_img = '$fileName',
                                                            updated_by = '$createdBy',
                                                            updated_at = CURRENT_TIMESTAMP,
                                                            version = version + 1
                                                            WHERE id = $id");
                    }
                }
            } else {
                $insert = mysqli_query($con, "update t_product set
                                                            prod_name = '$name',
                                                            prod_cat_id = $category,
                                                            prod_stock = $stock,
                                                            prod_price = $price,
                                                            prod_desc = '$desc',
                                                            updated_by = '$createdBy',
                                                            updated_at = CURRENT_TIMESTAMP,
                                                            version = version + 1
                                                            where id = $id");
            }
            ?>
            <script type="text/javascript">
                alert('Success');
                document.location.href="?m=product-manage";
            </script>
            <?php
        }
        ?>
    </div>
</form>