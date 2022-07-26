<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / <a
                href="index.php?orders"> Orders </a> / Order Details </h4>
</div>
<div class="col-md-12"><?php display_message(); ?></div>

<div class="col-md-12">

    <table class="table table-bordered table-striped table-responsive" cellspacing="0">
        <thead>
            <tr class="btn-primary">
                <th colspan="2">
                    Order Status
                </th>
            </tr>
        </thead>
        <tbody>
        <?php order_detail_status(); ?>

        </tbody>

    </table>
</div>

<div class="col-md-12" id="order_detai">

        <table class="table table-bordered table-responsive table-striped" cellspacing="0">
            <thead>
            <tr class="btn-success">
                <th>Product ID</th>

                <th>Details</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Discount Price</th>
                <th>Sale Price</th>
                <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
            <?php order_detail_products(); ?>

            </tbody>

        </table>

</div>
<div class="col-md-12">
    <table class="table table-bordered table-striped table-responsive" cellspacing="0">
        <thead>
        <tr class="btn-warning">
            <th colspan="2"> Clint Address</th>

        </tr>
        </thead>
        <tbody>
        <?php order_detail_clint(); ?>

        </tbody>


    </table>

</div>


<?php

$status='';
 $sql = "select order_status from tbl_order where order_id =".escape_string($_GET['order_id']);
 $query = query($sql);
 confirm($query);
 if($row = fetch_array($query) ){
     $status = $row['order_status'];
 }

$user_role = $_SESSION['user_role'];

if($user_role == 'admin' && $status == 'pending'):

?>
<div class="col-md-12">
    <div class="well col-md-12">
        <form method="post" >
            <?php assign_store_order(); ?>
            <div class="alert alert-info">Assign order to store for place product</div>

            <div class="form-group col-md-4">
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                    <select name="store_id" id="store_name" class="form-control selectpicker" data-live-search="true" onchange="check_product_avaliablity(this)">
                        <option value="%">Store Name</option>
                        <?php fill_store_drop_down(); ?>

                    </select>
                    <input type="hidden"  value="<?php if (isset($_GET['order_id'])) {
                        echo $_GET['order_id'];
                    } ?>" name="order_id" />
                </div>


            </div>
            <div class="col-md-3">
                <button type="submit" disabled id="btn_assign_store_id" name="btn_assign_store" class="btn btn-primary"> Assign Store <span class="fa fa-flag"></span></button>
            </div>
        </form>

            <div class="col-md-5">
                <div class="col-md-4" style="margin-bottom: 10px; display: none" id="alert_assignment_id">
                    <div  class="label label-warning">Please Assign All products to selected Store  <a href="index.php?products"> Go for Assignment </a></div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="btn-default">
                            <th>Product Title</th>
                            <th>Order Quantity</th>
                            <th>Quantity in Store</th>
                        </tr>
                    </thead>
                    <tbody id="add_products_availability">

                    </tbody>
                </table>
            </div>

    </div>
    <a href="index.php?orders" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>
</div>

<?php elseif($status == 'Canceled'): ?>
<div class="col-md-12">
    <a href="index.php?order_cancel" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>

</div>

<?php elseif($status == 'Placed'): ?>
<div class="col-md-12">
    <a href="index.php?order_placed" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>

</div>


<?php else:?>

<div class="col-md-12 btn-group">
    <a href="index.php?order_pending" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>

    <a href="index.php?service_cancel_online_order&order_id=<?php if (isset($_GET['order_id'])) {
        echo $_GET['order_id'];
    } ?>" class="btn btn-danger">Order  Cancel <span class="fa fa-remove"></span></a>

    <a href="index.php?add_serial_online_order&order_id=<?php if (isset($_GET['order_id'])) {
        echo $_GET['order_id'];
    } ?>" class="btn btn-success"> Order Proceed <span class="fa fa-forward"></span></a>


</div>
<?php endif; ?>