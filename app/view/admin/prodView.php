<button class="btn btn-success pull-right" title="Add Product" id="add-prod"><i class="fa fa-plus-square"></i></button>
<br><br>
<table id="example1" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Category</th>
        <th scope="col">Stock</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['prod_name']?></td>
            <td><?php echo $data['prod_cat_name'] ?></td>
            <td><?php echo $data['prod_stock'] ?></td>
            <td><?php echo $data['prod_price'] ?></td>
            <td><img src="asset/img/uploads/<?=$data['prod_img']?>" height="50" width="65"></td>
            <td align="text-center">
                <a class="btn-sm btn-primary" id="edit" title="Edit"  href="?m=product-manage/edit&id=<?= $data['id'];?>"><i class="fa fa-edit"></i></a>
                <a class="btn-sm btn-danger" title="Delete" href="?m=product-manage/delete&id=<?= $data['id'];?>"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<div class="modal fade" id="add-prod-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" required>

                        <select class="form-control mb-3 mt-3 " aria-label="Default select example" name="category">
                            <option selected>Select Category</option>
                            <?php
                                foreach ($cats as $cat){?>
                                    <option value="<?=$cat['id']?>"><?=$cat['prod_cat_name']?></option>
                            <?php
                                }
                            ?>
                        </select>

                        <input name="stock" type="number" class="form-control mb-3 mt-3" id="stock" aria-describedby="nameHelp" placeholder="Enter Stock" required>
                        <input name="price" type="number" class="form-control mb-3 mt-3" id="price" aria-describedby="nameHelp" placeholder="Enter Price" required>
                        <input name="file" type="file" class="form-control mb-3 mt-3" id="file" aria-describedby="nameHelp" placeholder="Enter File" required>
                        <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                        <div class="mt-3">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name="is_active[]" class="form-check-input" type="checkbox" value="is_active" id="is_active" checked />
                            <label class="form-check-label" for="is_active">is active?</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit">Save</button>
                        <button type="button" class="btn btn-secondary pull-right ml-1" data-dismiss="modal">Close</button>
                        <?php
                        if(isset($_POST['Submit'])){
                            $name = $_POST['name'];
                            $category = $_POST['category'];
                            $stock = $_POST['stock'];
                            $price = $_POST['price'];
                            $desc = $_POST['desc'];
                            $isactive = 1;
                            $createdBy = 'SYSTEM';
                            if(in_array('is_active', $_POST['is_active'])){
                                $isactive = 0;
                            }
                            $fileName = basename($_FILES["file"]["name"]);
                            $targetFilePath = UPLOADS . $fileName;
                            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                            if(!empty($_FILES["file"]["name"])){
                                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                                if(in_array($fileType, $allowTypes)){
                                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                        $insert = mysqli_query($con, "insert into
                                                                            t_product (prod_name, prod_cat_id, prod_stock,
                                                                                       prod_price, prod_desc, prod_img, created_by,
                                                                                       created_at, is_active, version)
                                                                    values ('$name', $category, $stock, $price, '$desc', '$fileName', '$createdBy', CURRENT_TIMESTAMP, true, 1)");
                                    }
                                }
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
            </div>
        </div>
    </div>
</div>