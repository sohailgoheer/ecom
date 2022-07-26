<?php

if(isset($_GET['store_id'])){
    $store_id = escape_string($_GET['store_id']);
    $product_id = escape_string($_GET['product_id']);

}

?>

<div class="row">
    <h4 class="breadcrumb"><a href="index.php">Home</a> /  <a href="index.php?stores">Stores </a> /  <a href="index.php?products_in_store&store_id=<?php echo $store_id; ?>">Products </a> / History </h4>
</div>

<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr class="btn-primary">
            <th>Product Title</th>
            <th>Status</th>
            <th>Quantity </th>
            <th>User Date </th>
            <th>Database Date </th>

        </tr>
        </thead>
        <tbody>
        <?php  history_products_in_stores_in_admin($store_id,$product_id); ?>
        </tbody>
    </table>
</div>
<div class="btn-group col-md-12">
    <a href="index.php?products_in_store&store_id=<?php echo $store_id; ?>"   class="btn btn-warning" ><span class="fa fa-backward" ></span> Back </a>

</div>




