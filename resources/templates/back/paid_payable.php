<?php

if(isset($_GET['vendor_id'])){

    $vendor_id = escape_string($_GET['vendor_id']);
    $status = escape_string($_GET['status']);

    $data = fetch_vendor_balance($vendor_id,$status);

}


?>




<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>/
        <a href="index.php?account_payable">Account Payable </a> / Details Payable
    </h4>
</div>

<div class="col-md-12">
    <table class="table table-responsive table-striped">
        <thead>
        <tr class="btn-default">
            <td colspan="2"><span class="fa fa-user"></span> <a target="_blank" href="index.php?history_vendor&vendor_id=<?php echo $vendor_id;  ?>"><?php echo $data[8];  ?></a></td>

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
                <th>Cash Paid to Vendor</th>
                <td>Rs. <?php echo $data[6];  ?></td>
            </tr>
            <tr>
                <th>Cash Payable</th>
                <td><div class="label label-warning" style="font-size: medium">Rs. <?php echo $data[7];  ?></div></td>
            </tr>
            <tr>
                <th><span class="label label-default" style="font-size: medium">Returns</span></th>
                <td> </td>
            </tr>
            <tr >
                <th>Return Items</th>
                <td>Rs. <?php echo $data[2];  ?></td>
            </tr>
            <tr>
                <th>Cash on Return Items</th>
                <td>Rs. <?php echo $data[3];  ?></td>
            </tr>




        <?php else: ?>
            <tr>
                <th colspan="2"><div class="label label-info" style="font-size: medium">This Vendor is also Customer</div></th>
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
                <th>Cash Paid To Vendor</th>
                <td>Rs. <?php echo $data[6];  ?></td>
            </tr>
            <tr>
                <th>Sub Payable</th>
                <td>Rs. <?php echo $data[66];  ?></td>
            </tr>
            <tr>
                <th>Receivable as Customer </th>
                <td>Rs. <?php echo $data[666];  ?></td>
            </tr>
            <tr>
                <th>Now Cash Payable</th>
                <td><div class="label label-warning" style="font-size: medium">Rs. <?php echo $data[7];  ?></div></td>
            </tr>
            <tr>
                <th><span class="label label-default" style="font-size: medium">Returns</span></th>
                <td> </td>
            </tr>
            <tr>
                <th>Return Products</th>
                <td>Rs. <?php echo $data[2];  ?></td>
            </tr>

            <tr>
                <th>Cash on Return Items</th>
                <td>Rs. <?php echo $data[3];  ?></td>
            </tr>


        <?php endif; ?>
            <tr>
                <td colspan="2">
                        <a href="index.php?account_payable" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
