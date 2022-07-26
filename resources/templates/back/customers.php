<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Customers </h4>
</div>

<div class="col-md-12">
    <?php display_message(); ?>
</div>


<div class="col-md-12">
    <a href="index.php?add_customer" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Add Customer</a>
    <hr>
</div>


<div class="col-lg-12">

    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>
        <tr class="btn-primary">
            <th></th>
            <th>Store</th>
            <th>Customer ID.</th>
            <th>As Vendor ID.</th>
            <th>Customer Name</th>
            <th>Phone</th>

            <th>Type</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php display_customers_in_admin(); ?>

        </tbody>
    </table> <!--End of Table-->

</div>









