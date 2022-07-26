<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?products"> Products </a> / Assigned Stores </h4>
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
            <th>Store ID.</th>
            <th>Location</th>
            <th>Quantity</th>
            <th>Updated</th>


        </tr>
        </thead>
        <tbody>
        <?php display_assined_store_products($product_id); ?>
        </tbody>
    </table>

    <a href="index.php?products" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
</div>





