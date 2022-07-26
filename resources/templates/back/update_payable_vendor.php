<?php

if(isset($_GET['vendor_id'])){

    $vendor_id = escape_string($_GET['vendor_id']);
    $invoice_no = escape_string($_GET['invoice_no']);


    $data =  get_vendor_invoice_payable($vendor_id,$invoice_no);

}
?>
<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /
        <a href="index.php?vendors">Vendors </a> /
        <a href="index.php?history_vendor&vendor_id=<?php echo $vendor_id; ?>">History </a> / Update Payable  </h4>
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
        <strong>Paid Bill: </strong><span class="label label-success" style="font-size: medium"> Rs. <?php echo $data[1]; ?>/-</span>
        <strong>Payable Bill: </strong><span class="label label-danger" style="font-size: medium"> Rs. <?php echo $data[2]; ?>/-</span>
        <hr>
    </div>
    <div class="col-md-6">
        <form action="" method="post">
            <?php update_vendor_invoice($vendor_id,$invoice_no); ?>

            <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    <input type="number" name="paid_amount" class="form-control" placeholder="00" required>

                </div>
            </div>

            <div class="btn-group">
                <a href="index.php?history_vendor&vendor_id=<?php echo $vendor_id; ?>" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
                <button class="btn btn-success" name="submit_vendor_invoice"><span class="fa fa-save"></span> Submit</button>
            </div>

        </form>
    </div>
</div>



