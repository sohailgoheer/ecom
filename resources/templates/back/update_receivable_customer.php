<?php

if(isset($_GET['customer_id'])){

    $customer_id = escape_string($_GET['customer_id']);
    $invoice_no = escape_string($_GET['invoice_no']);


    $data =  get_customer_invoice_receivable($customer_id,$invoice_no);

}
?>
<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>  / <a href="index.php?invoice_customers">   Invoice Customers   </a> /
        <a href="index.php?invoice_history&customer_id=<?php echo $customer_id; ?>">   Invoice History </a> / Update Receivable</h4>
</div>
<div class="col-md-12">
    <?php display_message(); ?>
</div>




<div class="col-md-12">
    <div class="col-md-12">
        <h4><span class="fa fa-barcode"></span>   <strong><?php echo $data[4]; ?></strong></h4>
        <h4><span class="fa fa-user"></span> <strong><?php echo $data[3]; ?></strong></h4>
        <hr>
        <strong>Total Bill: </strong><span class="label label-info" style="font-size: medium"> Rs. <?php echo $data[0]; ?>/-</span>
        <strong>Received Bill: </strong><span class="label label-success" style="font-size: medium"> Rs. <?php echo $data[1]; ?>/-</span>
        <strong>Receivable Bill: </strong><span class="label label-danger" style="font-size: medium"> Rs. <?php echo $data[2]; ?>/-</span>
        <hr>
    </div>
    <div class="col-md-6">
        <form action="" method="post">
            <?php update_customer_invoice($customer_id,$invoice_no); ?>

            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    <input type="number" name="received_amount" class="form-control" placeholder="00" required>

                </div>
            </div>

            <div class="btn-group">
                <a class="btn btn-warning" href="index.php?invoice_history&customer_id=<?php echo $customer_id; ?>"><span class="fa fa-backward"></span> Back</a>
                <button class="btn btn-success" name="submit_customer_invoice"><span class="fa fa-save"></span> Submit</button>
            </div>

        </form>
    </div>
</div>



