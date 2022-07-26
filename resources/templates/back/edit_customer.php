<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i>
            Dashboard </a> / <a href="index.php?customers">Customers</a>  / New Customer
    </h4>
</div>
<?php
if (isset($_GET['customer_id'])){
    $is_vendor = 0;
    $customer_id = escape_string($_GET['customer_id']);
    $sql = "select * from customers where customer_id = {$customer_id}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){
            $f_name       = $row['f_name'];
            $l_name       = $row['l_name'];
            $email        = $row['email'];
            $phone        = $row['phone'];
            $house_street = $row['house_street'];
            $town_city    = $row['town_city'];
            $province     = $row['province'];
            $countary      = $row['country'];
            $zip_postal_code = $row['zip_postal_code'];
            $is_vendor       = $row['is_vendor'];
            $vendor_id       = $row['vendor_id'];
    }



}

?>

<form action="" method="post" enctype="multipart/form-data">
    <?php update_customer(); ?>
    <div class="col-md-6">
        <!--        <div class="form-group">-->
        <!--            <input type="file" name="file">-->
        <!--        </div>-->
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="f_name" value="<?php echo $f_name; ?>" class="form-control" placeholder="First Name*" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="l_name" value="<?php echo $l_name; ?>" class="form-control" placeholder="Last Name*" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" name="email"  value="<?php echo $email; ?>" class="form-control"  placeholder="Email@gmail.com">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control"  placeholder="+923331234567">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                <input type="text" name="house_street" value="<?php echo $house_street; ?>" class="form-control"  placeholder="House / Street">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" name="town_city" value="<?php echo $town_city; ?>" class="form-control"  placeholder="Town / City">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                <input type="text" name="zip_postal_code" value="<?php echo $zip_postal_code; ?>" class="form-control"  placeholder="Zip / Postal Code">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" name="province" value="<?php echo $province; ?>" class="form-control"  placeholder="Province">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <select name="country" class="form-control" >
                    <option value="<?php echo $countary; ?>"><?php echo $countary; ?></option>
                    <?php  fill_countary(); ?>
                </select>
            </div>
        </div>

        <div class="btn-group">
            <a href="index.php?customers"  class="btn btn-warning" ><span class="fa fa-backward"></span> Back </a>
            <button type="submit" name="update_customer" class="btn btn-success" ><span class="fa fa-save"></span> Update</button>

        </div>


    </div>


</form>





