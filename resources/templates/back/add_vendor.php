<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?vendors">   Vendors </a> / Add Vendor </h4>
</div>

<?php display_message(); ?>
<div class="col-md-6">
    <form action="" method="post">
        <?php add_vendor(); ?>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="f_name" class="form-control" placeholder="First Name*" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" name="l_name" class="form-control" placeholder="Last Name*" required>
            </div>
        </div>



        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="phone" class="form-control" placeholder="Phone*" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" name="mail" class="form-control" placeholder="E-Mail*" required>
            </div>
        </div>



        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                <input type="text" name="house_street" class="form-control"  placeholder="House / Street">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" name="town_city" class="form-control"  placeholder="Town / City">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                <input type="text" name="zip_postal_code" class="form-control"  placeholder="Zip / Postal Code">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" name="province" class="form-control"  placeholder="Province">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <select name="country" class="form-control selectpicker" data-live-search="true" >
                    <option value="0">Select Countary</option>
                    <?php  fill_countary(); ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <p><strong>Vendor Type</strong> </p>

                <div class="checkbox">
                    <label>
                        <input checked type="radio"   name="type" value="vendor" onclick="document.getElementById('customer_store').style.display = 'none'"> Only Vendor
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="radio"   name="type" value="vendor/customer" onclick="document.getElementById('customer_store').style.display = 'inline-block'"> Vendor / Customer
                    </label>
                </div>

            </div>
        </div>
        <div class="form-group" style="display:none" id="customer_store">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                <select name="store_id" id="store_name" class="form-control selectpicker" data-live-search="true" required>
                    <option value="0">Select Store</option>
                    <?php fill_stores_customer(); ?>
                </select>
            </div>
        </div>

        <div class="btn-group">
            <a href="index.php?vendors" class="btn btn-warning"  ><span class="fa fa-backward"></span> Back</a>
            <button type="reset" name="" class="btn btn-default"  ><span class="fa fa-refresh"></span> Reset</button>
            <button type="submit" name="add_vendor" class="btn btn-primary"  ><span class="fa fa-save"></span> Submit</button>
        </div>
    </form>
</div>