<?php
 if(isset($_GET['customer_id'])){


     $customer_id = escape_string($_GET['customer_id']);
 }

?>

<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>  / <a href="index.php?invoice_customers">   Invoice Customers   </a> /  Invoice History </h4>
</div>
<div class="col-md-12"><?php  display_message(); ?></div>


<div class="col-md-12">

        <table class="table table-striped  display responsive nowrap "    >
            <thead>

            <tr class="btn-primary">

                <th>Invoice No.</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Items</th>
                <th>Products</th>
                <th>Total</th>
                <th>Received</th>
                <th>Receivable</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

                <?php  invoice_history($customer_id); ?>

            <tbody>
        <table>

</div>
<div class="col-md-12">

    <a class="btn btn-warning" href="index.php?invoice_customers"><span class="fa fa-backward"></span> Back</a>

</div>