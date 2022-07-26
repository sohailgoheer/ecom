
<?php
//session_destroy();
if (isset($_GET['vendor_id'])) {
    $vendor_id = escape_string($_GET['vendor_id']);
   fill_invoice_vendor_name($vendor_id);

}



?>

<div class="col-md-12">

    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?vendors">Vendors </a> / <a
                href="index.php?history_vendor&vendor_id=<?php echo $vendor_id; ?>"> Vendor Invoices </a> / Add invoice
    </h4>
</div>
<div class="col-md-12">    <?php display_message(); ?>   </div>

<div class="col-lg-12">

    <form action="" method="post">
        <?php  submit_vendor_products($vendor_id); ?>



        <!--invoice date-->

        <div class="form-group col-md-6">
            <label for="product-title">Vendor Invoice Date</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="date" value="<?php if (isset($_SESSION['vendor_add_invoice_date'])) : echo $_SESSION['vendor_add_invoice_date']; endif; ?>" name="vendor_invoice_date" value="" class="form-control"
                       id="" required>
            </div>
        </div>

        <!--          vendor invoice-->
        <div class="form-group col-md-6">
            <label for="product-title">Invoice No.* </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                <input type="text" name="vendor_invoice" class="form-control" value="<?php if (isset($_SESSION['vendor_add_invoice_no'])) : echo $_SESSION['vendor_add_invoice_no']; endif; ?>" placeholder="Invoice No. got by vendor"
                       id="" required>
            </div>
        </div>


        <div class="form-group col-md-4">
            <label for="product-title">Product Title*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                <select name="product_id" id="product_Id_invoice" class="form-control selectpicker" required
                        data-live-search="true" >
                    <option value="%">Product ID --- Title</option>
                    <?php fill_products_for_vendor_invoice(); ?>
                </select>
            </div>
        </div>

        <!-- Product quantity by vendor-->
        <div class="form-group col-md-4">
            <label for="product-title">Product Quantity *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
                <input type="number" name="product_quantity_by_vendor" class="form-control" value=""
                       placeholder="00*" id="product_quantity_by_vendor" required>
            </div>
        </div>
        <!--purchase purice-->
        <div class="form-group col-md-4">
            <label for="product-title">Purchase Price per Product *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input type="number" name="product_purchase_price" value="" class="form-control" size="60"
                       placeholder="00*" id="product_purchase_price" required>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="product-title"> &nbsp; &nbsp;</label>
            <div class="input-group">

                <button type="submit" id="add_product_to_invoice" name="add_product_to_invoice" class="btn btn-success"
                        value=""><span
                            class="fa fa-hand-o-down"></span> Add to Invoice
                </button>

            </div>
        </div>

    </form>
</div>

<div class="col-md-12">
    <form action="index.php?service_product_vendor_invoice" method="post">

        <table class="table table-responsive table-bordered ">
            <thead>
            <th colspan="9" class="btn-primary">
                <span class="fa fa-calendar"></span> <?php if (isset($_SESSION['vendor_add_invoice_date'])) : echo $_SESSION['vendor_add_invoice_date']; endif; ?>
                <p class="pull-right">
                    <strong> <?php if (isset($_SESSION['vendor_add_invoice_no'])) : echo $_SESSION['vendor_add_invoice_no']; endif; ?></strong> <span class="glyphicon glyphicon-list-alt"></span></p>
            </th>
            </thead>
            <tbody>
            <tr>
                <td colspan="1">
                    <span class="fa fa-id-badge"></span>
                    <div class="label label-default"><?php if (isset($_SESSION['ses_vendor']['vendor_id'])) : echo $_SESSION['ses_vendor']['vendor_id']; endif; ?></div>
                </td>
                <td colspan="8">
                    <span class="fa fa-user"></span> <?php if (isset($_SESSION['ses_vendor']['vendor_name'])) : echo $_SESSION['ses_vendor']['vendor_name']; endif; ?>
                </td>
            </tr>

            <tr>
                <td colspan="9">
                    <span class="fa fa-address-book"></span> <?php if (isset($_SESSION['ses_vendor']['address'])) : echo $_SESSION['ses_vendor']['address']; endif; ?>
                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <span class="fa fa-envelope"></span> <?php if (isset($_SESSION['ses_vendor']['email'])) : echo $_SESSION['ses_vendor']['email']; endif; ?>
                </td>
                <td colspan="5">
                    <span class="fa fa-phone"></span> <?php if (isset($_SESSION['ses_vendor']['phone'])) : echo $_SESSION['ses_vendor']['phone']; endif; ?>
                </td>

            </tr>

            <tr class="btn-success">
                <th class="col-md-1">No.</th>
                <th class="col-md-1">Product&nbsp;ID</th>
                <th class="col-md-2">Product Title</th>
                <th class="col-md-2">Quantity</th>
                <th class="col-md-2">Purchase Price</th>
                <th class="col-md-2">Sub&nbsp;Total</th>
                <th class="col-md-2"></th>
            </tr>

            <?php display_vendor_invoice($vendor_id); ?>
            <tr class="bg-warning">
                <th><strong>Total</strong></th>
                <td></td>
                <td></td>
                <th><strong>
                        <?php
                        if (isset($_SESSION['items_totals_vendor_invoice'])) : echo $_SESSION['items_totals_vendor_invoice'];
                        else: echo '0'; endif;
                        ?>

                    </strong> Items
                </th>
                <td></td>
                <th><input type="number" disabled class="form-control" id="total_sub_id" name="total_sub"
                           value="<?php if (isset($_SESSION['amount_totals_vendor_invoice'])) : echo $_SESSION['amount_totals_vendor_invoice']; else: echo '00'; endif; ?>"
                    / >


                </th>
                <td></td>
            </tr>
            <tr class="bg-success">
                <th colspan="5"><strong>Paid to Vendor</strong></th>
                <th> <input type="number" class="form-control" id="received_amount_id" name="paid_amount"
                           value="00" / >
                </th>
                <td></td>
            </tr>
            <tr class="bg-danger">
                <th colspan="5"><strong>Remaining</strong></th>
                <th><input type="number" disabled class="form-control" id="renain_amount_id"
                           name="renain_amount" value="00" / >
                </th>
                <td><span onclick="update_remain_total();" class="btn btn-primary"><span
                                class="fa fa-retweet"></span> Update</span></td>
            </tr>
            <tr>
                <th colspan="7">
                    <div class="btn-group">
                        <a href="index.php?service_product_vendor_invoice&refresh&vendor_id=<?php echo $vendor_id; ?>"
                           class="btn btn-default"><span class="fa fa-backward"></span> Back</a>

                        <button type="submit" class="btn btn-success" name="proceed_vendor_invoice"><span
                                    class="fa fa-mail-forward"></span> Proceed
                        </button>

                    </div>
                </th>

            </tr>
            </tbody>
        </table>

    </form>
</div>






