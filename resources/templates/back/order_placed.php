<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Placed Orders    </h4>
</div>
<div class="col-md-12"><?php  display_message(); ?></div>


<div class="col-md-12">
    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>

        <tr class="btn-success">
            <th></th>
            <th>Store</th>
            <th>Order No.</th>
            <th>Date & Time</th>
            <th>Status</th>

            <th>Action By</th>

            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php  display_orders_Placed(); ?>
        </tbody>
    </table>

</div>
