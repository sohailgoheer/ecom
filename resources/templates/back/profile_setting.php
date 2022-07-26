<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Profile Settings   </h4>
</div>


<?php

$data = fill_user_profile_data();


?>

<div class="col-md-12">
    <?php display_message(); ?>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <?php update_user_profile(); ?>
    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="username" value="<?php echo $data[0]; ?>" class="form-control" placeholder="Username" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="email" value="<?php echo $data[1]; ?>" class="form-control" placeholder="Username" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                <input type="text" name="password" value="<?php echo $data[2]; ?>" class="form-control" placeholder="Username" required>
            </div>
        </div>


        <div class="btn-group">


            <a class="btn btn-warning" href="index.php"><span class="fa fa-backward"></span> Back</a>
            <button type="submit" name="add_user_profile" class="btn btn-success" ><span class="fa fa-save"></span> Update </button>
        </div>


    </div>


</form>






