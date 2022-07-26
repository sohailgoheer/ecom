<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?orders"> Orders </a> / Product Serial    </h4>
</div>
<div class="row"><?php  display_message(); ?></div>

<?php $order_id = escape_string($_GET['order_id']); ?>
<div class="col-md-12">
    <div id="order_detai">
        <form action="index.php?working_on_order" method="post">
            <table class="table  table-responsive table-striped" cellspacing="0">
                <thead>
                <tr class="btn-primary">
                    <th>Product ID  <input type="hidden" value="<?php echo $order_id; ?>" name="order_id"/></th>
                    <th>Name </th>
                    <th>Quantity </th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Serial No.</th>
                </tr>
                </thead>
                <tbody>

                    <?php add_serial_online_products(); ?>

                </tbody>
            </table>
            <div class="col-md-12">
                <button type="submit" name="submit_order"  class="btn btn-success"><span class="fa fa-save"></span> Order Submit</button>
            </div>
        </form>
    </div>
</div>
