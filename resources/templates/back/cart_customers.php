<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Cart Customers   </h4>
</div>
<?php display_message(); ?>
<div class="col-lg-12">

    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>
        <tr class="btn-primary">
            <th></th>
            <th>Store</th>
            <th>Customer Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>City</th>
            <th> </th>

        </tr>
        </thead>
        <tbody>
        <?php display_cart_customers_in_admin(); ?>

        </tbody>
    </table> <!--End of Table-->

</div>









