<?php
if (isset($_GET['invoice_no'])) {

    $invoice_no = $_GET['invoice_no'];
    $vendor_id = $_GET['vendor_id'];

}

$data = get_vendor_invoice($invoice_no,$vendor_id);



?>


<div class="row">

    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>
        /<a href="index.php?history_vendor&vendor_id=<?php echo $vendor_id; ?>"> Vendor Invoices </a>
        / Vendor Invoice Summary </h4>
</div>


<div class="col-md-12"><?php display_message(); ?></div>


<div class="row col-md-12" style="margin-top: 15px;margin-left: 4px;">
    <table class="table table-responsive table-bordered ">
        <thead>
        <th colspan="6" class="btn-primary">
            <span class="fa fa-calendar"></span> <?php echo $data[5]; ?>
            <p class="pull-right"><span class="glyphicon glyphicon-list-alt"></span> Invoice No.
                <strong> <?php echo $invoice_no; ?></strong></p>
        </th>
        </thead>
        <tbody>
        <tr>

            <td colspan="1">
                <span class="fa fa-id-badge"></span> <span class="label label-success"> <a target="_blank"
                                                                                           href="index.php?customer_view&customer_id=<?php echo $data[9]; ?>"
                                                                                           style="color: #ffffff"> <?php echo $data[9]; ?></a> </span>
            </td>
            <td colspan="5">
                <span class="fa fa-user"></span> <a target="_blank"
                                                    href="index.php?customer_view&customer_id=<?php echo $data[9]; ?>"> <?php echo $data[0]; ?></a>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <span class="fa fa-address-book"></span> <?php echo $data[1]; ?>
            </td>


        </tr>

        <tr>
            <td colspan="3">
                <span class="fa fa-envelope"></span> <?php echo $data[2]; ?>
            </td>
            <td colspan="3">
                <span class="fa fa-phone"></span> <?php echo $data[3]; ?>
            </td>

        </tr>
        <tr class="btn-success">
            <th class="col-md-1">No.</th>
            <th class="col-md-1">Product&nbsp;ID</th>
            <th class="col-md-2">Product Name</th>
            <th class="col-md-1">Quantity</th>
            <th class="col-md-1">Price</th>
            <th class="col-md-1">Sub&nbsp;Total</th>

        </tr>

        <?php purchase_from_vendors($invoice_no,$vendor_id); ?>
        <tr class="bg-warning">
            <th colspan="3"><strong>Total</strong></th>

            <th><strong> <?php echo $data[10]; ?></strong> Items</th>
            <td colspan="1"></td>
            <td>Rs. <strong><?php echo $data[6]; ?>/-</strong></td>

        </tr>
        <tr class="bg-success">
            <th colspan="5"><strong>Paid</strong></th>
            <td>Rs. <strong><?php echo $data[7]; ?>/-</strong></td>

        </tr>
        <tr class="bg-danger">
            <th colspan="5"><strong>Payable</strong></th>

            <td>Rs. <strong><?php echo $data[8]; ?>/-</strong></td>
        </tr>

        </tbody>
    </table>
</div>
<div class="btn-group col-md-12">

    <a href="index.php?history_vendor&vendor_id=<?php echo $vendor_id; ?>" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
    <a href="" class="btn btn-danger"><span class="fa fa-print"></span> Print</a>
</div>


