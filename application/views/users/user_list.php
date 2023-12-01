<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">User List</h3>
        <div class="card-tools">
            <a href="<?php  echo base_url().'index.php/new-user'?>" class="btn btn-sm btn-success mx-1">Add new</a>
        </div>
    </div>

    <div class="card-body row">
        <table id="users" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>User Name</th>
                    <th>Contact</th>
                    <th>Email Id</th>
                    <th>Role</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="subgruop_table">
                <?php $sr_no = 1; 
                foreach($users as $user){
                ?>
                <tr>
                    <td>
                        <?php echo $sr_no ?>
                    </td>
                    <td>
                        <?php echo $user->first_name.' '.$user->last_name ?>
                    </td>
                    <td>
                        <?php echo $user->contact ?>
                    </td>
                    <td>
                        <?php echo $user->email ?>
                    </td>
                    <td>
                        <?php echo get_role_name_by_role_id($user->user_type) ?>
                    </td>
                    <td>
                        <?php echo date('Y-m-d', strtotime($user->created_date)) ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url().'index.php/edit-user/'.$user->user_id ?>"
                            class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" onclick="delete_user(<?php echo $user->user_id ?>)"
                            class="btn btn-sm btn-danger">Delete</a>
                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Access
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user_access/'.$user->user_id ?>">Module Access</a></li>
                            <li><a class="dropdown-item" href="#">Project Access</a></li>
                        </ul>
                    </td>

                </tr>

                <?php $sr_no++; } ?>


            </tbody>
        </table>

    </div>
</div>

<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(function () {
        $("#users").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
    });


    function delete_user(id) {
        yes = confirm('Are sure want to delete this user ?')
        console.log(id)
        if (yes) {
            window.location.href = "<?php echo base_url().'index.php/delete-user/'?>" + id
        }
    }
</script>