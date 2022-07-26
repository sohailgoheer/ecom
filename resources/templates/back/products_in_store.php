<?php

if(isset($_GET['store_id'])){
    $store_id = escape_string($_GET['store_id']);

}

?>

<div class="row">
    <h4 class="breadcrumb"><a href="index.php">Home</a> /  <a href="index.php?stores">Stores </a> / Products</h4>
</div>

<?php display_message(); ?>
<div class="col-md-12">
    <a href="index.php?add_product_to_store&store_id=<?php echo $store_id; ?> "  class="btn btn-success pull-right" style=""><span class="fa fa-plus" ></span> Add Product </a>
    <hr>
</div>

<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr class="btn-primary">
            <th>Product ID.</th>
            <th>Product Title</th>
            <th>Available</th>

            <th> </th>

        </tr>
        </thead>
        <tbody>
            <?php  show_products_in_stores_in_admin($store_id); ?>
        </tbody>
    </table>
</div>
<div class="btn-group col-md-12">
    <a href="index.php?stores"   class="btn btn-warning" ><span class="fa fa-backward" ></span> Back </a>

</div>




