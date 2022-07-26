<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Invoice Customers   </h4>
</div>


<div class="col-md-12">
    <?php display_message(); ?>
</div>




<div class="col-md-12">
    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>
        <tr class="btn-primary">
            <th>Store</th>
            <th>Customer ID.</th>
            <th>As&nbsp;Vendor&nbsp;ID.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Phone</th>
            <th>Email</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php display_invoice_customers(); ?>
        </tbody>
    </table>
</div>



