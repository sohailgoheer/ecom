<?php
if(isset($_GET['email'])) {
    $customer_email = escape_string($_GET['email']);
}
?>
<div class="row">

    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>
        /<a href="index.php?cart_customers">  Cart Customers </a>

        /   Orders History  </h4>
</div>
<div class="row"><?php  display_message(); ?></div>


<div class="col-md-12">
    <table  class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>

        <tr class="btn-primary">
            <th></th>
            <th>Order No</th>
            <th>Amount</th>
            <th>Items</th>
            <th>Date & Time</th>
            <th>Status</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>

        <?php  display_cart_customers_History_orders($customer_email); ?>

        </tbody>
    </table>


</div>
<div class="col-md-12">
    <a href="index.php?cart_customers" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>

</div>
