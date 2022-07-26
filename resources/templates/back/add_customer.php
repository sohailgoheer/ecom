<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i>
            Dashboard </a> / <a href="index.php?customers">Customers</a>  / New Customer
    </h4>
</div>


<form action="" method="post" enctype="multipart/form-data">
    <?php add_customers(); ?>
    <div class="col-md-6">

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                <select name="store_id" id="store_name" class="form-control selectpicker" data-live-search="true">
                    <option value="0">Select Store</option>
                        <?php fill_stores_customer(); ?>
                </select>
            </div>
        </div>


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
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" name="email" class="form-control"  placeholder="Email@gmail.com">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="phone" class="form-control"  placeholder="+923331234567">
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
                        <input checked type="radio"   name="type" value="customer"> Only Customer
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="radio"   name="type" value="vendor/customer"> Customer / Vendor
                    </label>
                </div>

            </div>
        </div>
        <div class="btn-group">
            <a href="index.php?customers"  class="btn btn-warning" ><span class="fa fa-backward"></span> Back </a>
            <button type="reset" class="btn btn-default"  ><span class="fa fa-refresh"></span> Reset</button>
            <button type="submit" name="add_customer" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>

        </div>


    </div>


</form>





