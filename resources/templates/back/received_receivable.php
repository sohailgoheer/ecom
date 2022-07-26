<?php

if(isset($_GET['customer_id'])){

    $customer_id = escape_string($_GET['customer_id']);
    $status = escape_string($_GET['status']);

    $data = fetch_customer_balance($customer_id,$status);

}
?>
<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Details Receivable
    </h4>
</div>

<div class="col-md-12">
    <table class="table table-responsive table-striped">
        <thead>
            <tr class="btn-default">
                <td colspan="2"><span class="fa fa-user"></span> <a target="_blank" href="index.php?customer_history&customer_id=<?php echo $customer_id;  ?>"><?php echo $data[8];  ?></a></td>

            </tr>
        </thead>

        <tbody>
        <?php if($status == '0'):?>
            <tr>
                <th>Total Purchased Items</th>
                <td><?php echo $data[0];  ?></td>
            </tr>
            <tr>
                <th>Cash On Total Purchased Items</th>
                <td>Rs. <?php echo $data[1];  ?></td>
            </tr>

            <tr>
                <th>Cash Paid by Customer</th>
                <td>Rs. <?php echo $data[6];  ?></td>
            </tr>
            <tr>
                <th>Cash Receivable</th>
                <td><div class="label label-info" style="font-size: medium">Rs. <?php echo $data[7];  ?></div></td>
            </tr>
            <tr>
                <th><div class="label label-default" style="font-size: medium">Returns</div></th>
                <td> </td>
            </tr>
            <tr>
                <th>Return Items</th>
                <td>Rs. <?php echo $data[2];  ?></td>
            </tr>
            <tr>
                <th>Cash on Return Items</th>
                <td>Rs. <?php echo $data[3];  ?></td>
            </tr>
        <?php else: ?>
        <tr>
            <th colspan="2"><div class="label label-primary" style="font-size: medium">This Customer also Vendor</div></th>

        </tr>
        <tr>
            <th>Total Purchased Items</th>
            <td><?php echo $data[0];  ?></td>
        </tr>
        <tr>
            <th>Cash On Total Purchased Items</th>
            <td>Rs. <?php echo $data[1];  ?></td>
        </tr>


        <tr>
            <th>Cash Paid by Customer</th>
            <td>Rs. <?php echo $data[6];  ?></td>
        </tr>
        <tr>
            <th>Sub Total</th>
            <td>Rs. <?php echo $data[66];  ?></td>
        </tr>
        <tr>
            <th>Cash payable from Vendor Account</th>
            <td>Rs. <?php echo $data[666];  ?></td>
        </tr>

        <tr>
            <th>Final Cash Receivable</th>
            <td><div class="label label-info" style="font-size: medium">Rs. <?php echo $data[7];  ?></div></td>
        </tr>
        <tr>
            <th><div class="label label-default" style="font-size: medium">Returns</div></th>
            <td> </td>
        </tr>
            <tr>
                <th>Return Items</th>
                <td><?php echo $data[2];  ?></td>
            </tr>
            <tr>
                <th>Cash on Return Items</th>
                <td>Rs. <?php echo $data[3];  ?></td>
            </tr>
        <?php endif; ?>

        <tr>
            <td colspan="2">
                <div class="btn-group">
                    <a href="index.php?account_receivable" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>

                </div>
            </td>

        </tr>

        </tbody>
    </table>
</div>
