<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Account Receivable
    </h4>
    <?php display_message(); ?>
</div>






<div class="col-md-12">
    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>
            <tr class="btn-primary">
                <th></th>
                <th>Store</th>
                <th>Customer id</th>
                <th>Name</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Paid Amount</th>
                <th>Receivable as Customer</th>
                <th>payable as Vendor</th>
                <th>Final Balance</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
          <?php add_customers_for_outstanding(); ?>

        </tbody>
    </table>
</div>



