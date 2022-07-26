<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Account Payable
    </h4>
    <?php display_message(); ?>
</div>


<div class="col-md-12">
    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>
        <tr class="btn-primary">
            <th>Vendor Id.</th>
            <th>Vendor Name</th>
            <th>Purchased Products</th>
            <th>Cash On Purchased</th>
            <th>Paid Amount</th>
            <th>Receivable as Customer</th>
            <th>Amount Payable</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php add_vendor_for_outstanding(); ?>

        </tbody>
    </table>
</div>



