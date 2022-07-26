<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / <a href="index.php?users">Users</a>  / New User   </h4>
</div>


<form action="" method="post" enctype="multipart/form-data">
    <?php add_users(); ?>
    <div class="col-md-6">
        <!--        <div class="form-group">-->
        <!--            <input type="file" name="file">-->
        <!--        </div>-->
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" name="email" class="form-control" required placeholder="Email@gmail.com">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <select name="role" class="form-control" required>
                    <option value="0">Select User Role</option>
                    <option value="admin">admin</option>
                    <option value="saler">saler</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-warning-sign"></i></span>
                <select name="user_status" class="form-control" required>
                    <option value="0">Select Status</option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="input-group ">
                <p><strong>Store Location</strong> </p>
                <?php fill_stores_in_new_users(); ?>
            </div>
        </div>




        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                <input type="password" name="password" class="form-control" required placeholder="*********">
            </div>
        </div>
        <div class="btn-group">


            <a class="btn btn-warning" href="index.php?users"><span class="fa fa-backward"></span> Back</a>
            <button type="submit" name="add_user" class="btn btn-success" ><span class="fa fa-save"></span> Save </button>
        </div>


    </div>


</form>





    