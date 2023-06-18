<button class="btn btn-success pull-right" title="Add User Type" id="add-user-type"><i class="fa fa-plus-square"></i></button>
<br><br>
<table id="example1" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">Is Active</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['user_type_code'] ?></td>
            <td><?= $data['user_type_name']?></td>
            <td><?php  if ($data['is_active']){echo "ACTIVE";}else{echo "NOT ACTIVE";} ?></td>
            <td align="text-center">
                <a class="btn-sm btn-primary" id="edit" title="Edit"  href="?m=user-type/edit&id=<?= $data['id'];?>"><i class="fa fa-edit"></i></a>
                <a class="btn-sm btn-danger" title="Deactivated" href="?m=user-type/delete&id=<?= $data['id'];?>"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add User Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" id="add-admin-form">
                    <div class="form-group">
                        <label for="name">Code</label>
                        <input name="code" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" required>
                        <small id="nameHelp" class="form-text text-muted">Type the code here</small>

                        <label for="exampleInputEmail1">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">Type the name here</small>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-right ml-1" name="Submit" id="submit">Save</button>
                        <button type="button" class="btn btn-secondary pull-right ml-1" data-dismiss="modal">Close</button>
                        <?php
                        if(isset($_POST['Submit'])){
                            $code = $_POST['code'];
                            $name = $_POST['name'];
                            $created_by = $_SESSION['username'];
                            $inserAdmin = mysqli_query($con, "insert into t_user_type 
                                             (user_type_name, user_type_code, created_by, 
                                              created_at, is_active, version) 
                                             values('$name', '$code', '$created_by',
                                                    CURRENT_TIMESTAMP, true , 0)");
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
            </div>
        </div>
    </div>
</div>
