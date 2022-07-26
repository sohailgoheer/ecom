<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?products"> Products </a> / Vendor Invoices </h4>
</div>
<?php

if (isset($_GET['product_id'])) {

    $product_id = escape_string($_GET['product_id']);

}


?>

<div class="col-md-12">
    <?php display_message(); ?>
</div>


<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">

        <thead>
        <tr class="btn-default">
            <th>Invoice No.</th>
            <th>Vendor</th>
            <th>Purchase Price</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Updated On</th>
            <th>Updated By</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php display_vendors_products($product_id); ?>
        </tbody>
    </table>

    <a href="index.php?products" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
</div>





