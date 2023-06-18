<button class="btn btn-success pull-right" title="Add Admin" id="add-admin"><i class="fa fa-plus-square"></i></button>
<br><br>
<table id="example1" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Code</th>
        <th scope="col">Created At</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['prod_cat_name']?></td>
            <td><?php echo $data['prod_cat_code'] ?></td>
            <td><?php echo $data['created_at'] ?></td>
            <td><?php  if ($data['is_active']){echo "ACTIVE";}else{echo "DELETED";} ?></td>
            <td align="text-center">
                <a class="btn-sm btn-primary" id="edit" title="Edit"  href="?m=product-category/edit&id=<?= $data['id'];?>"><i class="fa fa-edit"></i></a>
                <a class="btn-sm btn-danger" title="Delete" href="?m=product-category/delete&id=<?= $data['id'];?>"><i class="fa fa-trash"></i></a>
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
                        <label for="name">Category Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" required>
                        <small id="nameHelp" class="form-text text-muted">Add your admin name here.</small>

                        <label for="exampleInputEmail1">Category Code</label>
                        <input name="code" type="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Code" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

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
                            $code = $_POST['code'];
                            $isactive = $_POST['is_active'];
                            $createdBy = 'SYSTEM';
                            if($_POST['is_active']){
                                $isActive = true;
                            }else{
                                $isActive = false;
                            }

                            $inserAdmin = mysqli_query($con, "insert into t_prod_cat(prod_cat_code, prod_cat_name, created_by,
                       created_at, is_active, version) values ('$code', '$name', '$createdBy', CURRENT_TIMESTAMP, true, 1) ");
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
            </div>
        </div>
    </div>
</div>