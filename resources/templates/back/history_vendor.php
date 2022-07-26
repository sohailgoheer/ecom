<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?vendors">Vendors </a> / History  </h4>
</div>
<?php

$vendor_id = escape_string($_GET['vendor_id']);

?>

<div class="col-md-12">
    <?php display_message(); ?>
</div>



<div class="col-md-12">

    <a href="index.php?add_vendor_in_product&vendor_id=<?php echo $vendor_id; ?>" class="btn btn-success pull-right" style=""><span class="fa fa-plus"></span>
        Add Invoice</a>
    <hr>
</div>


<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr class="btn-primary">
            <th>Invoice No.</th>
            <th>V_ID</th>
            <th>Vendor</th>
            <th>Date</th>
            <th>Items</th>
            <th>Products</th>
            <th>Total Bill</th>
            <th>Paid</th>
            <th>Payable</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php display_vendors_history($vendor_id); ?>
        </tbody>
    </table>

</div>
<div class="col-md-12">
    <a href="index.php?vendors" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
</div>




