

<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Products    </h4>

</div>



<div class="row col-md-12">
    <?php display_message();  ?>
    <?php if($_SESSION['user_role'] == 'admin'): ?>
        <div class="row">
            <a class="btn btn-success pull-right" style="margin-right:20px;" href="index.php?add_product"><span class="fa fa-plus"></span> Add Product</a>
        </div>
    <?php endif; ?>
    <br>



<!--    <table class="table table-hover table-responsive table-striped">-->
        <table  class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
            <thead>
                <tr class="btn-primary">
                    <th>Product ID</th>
                    <th>Product</th>
                    <th>Quantity </th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Vendor</th>
                    <th>Store</th>
                    <th>Status</th>
                    <th class="col-md-2"> </th>
                </tr>
            </thead>
            <tbody>
                <?php display_products_in_admin(); ?>
            </tbody>
        </table>

</div>
