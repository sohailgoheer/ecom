<?php

if(isset($_GET['id'])){

    $user_id = escape_string($_GET['id']);
    $sql = "select * from users where user_id = ".$user_id;
    $query = query($sql);
    confirm($query);
    while ($user = fetch_array($query)){

        $user_id = $user['user_id'];
        $username = $user['username'];
        $useremail = $user['useremail'];
        $password = $user['password'];
        $role = $user['role'];
        $status = $user['status'];

    }
}
$go = "users";
if(isset($_GET['edit_user'])){
    if(isset($_GET['store_id'])){
        $store_id = escape_string($_GET['store_id']);
        $go = "store_users&store_id=".$store_id;
    }
}

?>

<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / <a href="index.php?users">Users</a>  / Edit Users   </h4>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <?php  update_users($user_id,$go); ?>
    <div class="col-md-6">


        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text"  name="username" class="form-control" placeholder="Username" value="<?php  echo $username; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope red"></i></span>
                <input type="text"  name="email" class="form-control" placeholder="E-mail" value="<?php  echo $useremail; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <select name="role" class="form-control" required>
                    <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                    <option value="admin">admin</option>
                    <option value="saler">saler</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-warning-sign"></i></span>
                <select name="status" class="form-control" required>
                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                    <option value="Active">Active</option>
                    <option value="Ban">Ban</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <p><strong>Store Location</strong> </p>
                <?php fill_stores_in_update_users($user_id); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                <input type="text" name="password" class="form-control" value="<?php  echo $password; ?>" required placeholder="*********">
            </div>
        </div>

        <div class="form-group btn-group">
            <a class="btn btn-warning" href="index.php?<?php echo $go;?>"><span class="fa fa-backward"></span> Back</a>
            <button type="submit" name="update_user" class="btn btn-success"><span class="fa fa-save"></span> Update</button>

        </div>
    </div>
</form>





    