<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Stores Account
    </h4>
    <?php display_message(); ?>
</div>

<div class="col-md-12">
    <table class="table table-striped  display responsive nowrap " >
        <thead>
        <tr class="btn-primary">
            <th>Store Id.</th>
            <th>Store Name</th>
            <th>Sold Cart Items</th>
            <th>Cash Cart Items</th>
            <th>Sold Store Items </th>
            <th>Cash Store Items</th>
            <th>Cash Received </th>
            <th>Cash Receivable</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php store_accoubts(); ?>

        </tbody>
    </table>
</div>



