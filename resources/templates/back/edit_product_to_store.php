<?php

if(isset($_GET['store_id'])){
    $store_id = escape_string($_GET['store_id']);
    $product_id = escape_string($_GET['product_id']);

    $data = get_product_data_from_store($store_id,$product_id);

}

?>

<div class="row">
    <h4 class="breadcrumb"><a href="index.php">Home</a> /  <a href="index.php?stores">Stores </a> / <a href="index.php?products_in_store&store_id=<?php echo $store_id;?>">Products</a> / Add Product </h4>
</div>

<div class="col-md-12">
    <?php display_message(); ?>
</div>

<div class="col-lg-6">

    <form action="" method="post">
        <?php  edit_product_to_store_first_time($store_id,$product_id); ?>

        <div class="form-group col-md-12">
            <label for="product-title">Product Title*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                <select name="product_id" id="" class="form-control selectpicker" required
                        data-live-search="true" >
                    <option value="<?php echo $data[0]; ?>"><?php echo $data[0]; ?> --- <?php echo $data[1]; ?></option>
                    <?php fill_products_for_assign_store($store_id); ?>
                </select>
            </div>
        </div>

        <!-- Product quantity by vendor-->
        <div class="form-group col-md-12">
            <label for="product-title">Product Quantity *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
                <input type="number" name="product_quantity" class="form-control"
                       value="<?php echo $data[2]; ?>"  placeholder="00*" id="product_quantity" required>
            </div>
        </div>



        <div class="form-group col-md-12">
            <label for="product-title">Date*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" name="send_date" class="form-control" value="<?php echo $data[3]; ?>"
                       id="" required>
            </div>
        </div>

        <div class="btn-group col-md-12">

            <a href="index.php?products_in_store&store_id=<?php echo $store_id; ?>"   class="btn btn-warning" ><span class="fa fa-backward" ></span> Back </a>
            <button type="submit" id="add_product_to_invoice" name="edit_product_to_store" class="btn btn-success"
                    value=""><span
                    class="fa fa-save"></span> Update
            </button>

        </div>

    </form>
</div>