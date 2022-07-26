<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?vendors">   Vendors </a> / Edit Vendor </h4>
</div>

<?php

if(isset($_GET['vendor_id'])){
    $vendor_id = escape_string($_GET['vendor_id']);

    $data = fill_vendor_for_edit($vendor_id);
}




?>

<?php display_message(); ?>
<div class="col-md-6">
    <form action="" method="post">
        <?php edit_vendor(); ?>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="f_name" class="form-control" value="<?php echo $data[0]; ?>" placeholder="First Name*" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="l_name" class="form-control" value="<?php echo $data[1]; ?>" placeholder="Last Name*" required>
            </div>
        </div>



        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="phone" class="form-control" value="<?php echo $data[2]; ?>" placeholder="Phone*" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" name="mail" class="form-control" value="<?php echo $data[3]; ?>" placeholder="E-Mail*" required>
            </div>
        </div>



        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                <input type="text" name="house_street" class="form-control" value="<?php echo $data[4]; ?>" placeholder="House / Street">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" name="town_city" class="form-control" value="<?php echo $data[5]; ?>"  placeholder="Town / City">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                <input type="text" name="zip_postal_code" class="form-control" value="<?php echo $data[6]; ?>" placeholder="Zip / Postal Code">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" name="province" class="form-control" value="<?php echo $data[7]; ?>" placeholder="Province">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <select name="country" class="form-control" >

                    <option value="<?php echo $data[8]; ?>"  > <?php echo $data[8]; ?> </option>
                    <?php  fill_countary(); ?>
                </select>
            </div>
        </div>

        <div class="btn-group">
            <a href="index.php?vendors" class="btn btn-warning"  ><span class="fa fa-backward"></span> Back</a>
            <button type="reset" name="" class="btn btn-default"  ><span class="fa fa-refresh"></span> Reset</button>
            <button type="submit" name="edit_vendor" class="btn btn-success"  ><span class="fa fa-save"></span> Submit</button>
        </div>
    </form>
</div>