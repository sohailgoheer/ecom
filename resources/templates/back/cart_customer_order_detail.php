<?php
if (isset($_GET['email'])){
    $mail =  escape_string($_GET['email']);

}
?>
<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?cart_customers"> Cart Customers </a> /
        <a href="index.php?cart_customers_history&email=<?php echo $mail;?>"> Orders History </a> /
        Order Details
    </h4>
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
    <a href="index.php?cart_customers_history&email=<?php echo $mail;?>" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>

</div>


