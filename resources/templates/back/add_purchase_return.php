<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i>
            Dashboard </a> / <a href="index.php?purchase_return_history">Purchase Return</a>  / Add Purchase Return
    </h4>
</div>
<div class="col-md-12"><?php  display_message() ?></div>
<div class="col-md-12">


    <form action="" method="post" enctype="multipart/form-data">
        <?php add_purchase_return(); ?>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select  name="vendor_id" id="vendor_id" class="form-control selectpicker" data-live-search="true"  required onchange="fill_invoice_no_vendor()">
                        <option value="">Select Vendor</option>
                        <?php fill_vendor(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <select  name="invoice_no" id="invoice_no" class="form-control selectpicker" data-live-search="true"  required onchange="fill_product_title_purchase_return()">
                        <option value="">Select Invoice</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                    <select  name="product_id" id="product_id" class="form-control selectpicker" data-live-search="true"  required>
                        <option value="">Product Title</option>

                    </select>
                </div>
            </div>



            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-calculator"></i></span>
                    <input type="number" name="quantity" class="form-control"  placeholder="Quantity">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                    <input type="text" name="serial_no" class="form-control"  placeholder="Serial No. with qoma separated">
                </div>
            </div>

            <div class="form-group">
                <textarea name="reason" id=""  cols="50" rows="10" class="form-control" >Reason: </textarea>
            </div>

            <div class="btn-group">
                <a href="index.php?purchase_return_history"  class="btn btn-warning" > <span class="fa fa-backward"></span> Back </a>
                <button type="reset" class="btn btn-default" ><span class="fa fa-refresh"></span> Reset </button>
                <button type="submit" name="add_purchase_return" class="btn btn-success"  ><span class="fa fa-save"></span> Submit</button>

            </div>


        </div>


    </form>




</div>

