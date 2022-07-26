<style>

    @media print {
        .col-md-12 {
            width: 33%;
        }
    }


</style>
<?php
if (isset($_GET['invoice_no'])) {

    $invoice_no = $_GET['invoice_no'];


}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'invoice_history';
}

if ($page == 'invoice_history') {
    $customer_id = $_GET['customer_id'];
    $page = 'invoice_history&customer_id=' . $customer_id;
}

$data = get_customer_data($invoice_no);



?>


<div class="row">

    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>
        /<a href="index.php?start_invoice"> Invoice </a>
        / Invoice Summary </h4>
</div>


<div class="col-md-12"><?php display_message(); ?></div>


<div class="row col-md-12" style="margin-top: 15px;margin-left: 4px;">
    <table class="table table-responsive table-bordered ">
        <thead>
        <th colspan="8" class="btn-primary">
            <span class="fa fa-calendar"></span> <?php echo $data[0]; ?>
            <p class="pull-right"><span class="glyphicon glyphicon-list-alt"></span> Invoice No.
                <strong> <?php echo $invoice_no; ?></strong></p>
        </th>
        </thead>
        <tbody>
        <tr>

            <td colspan="1">
                <span class="fa fa-id-badge"></span> <span class="label label-success"> <a target="_blank"
                                                                                           href="index.php?customer_view&customer_id=<?php echo $data[1]; ?>"
                                                                                           style="color: #ffffff"> <?php echo $data[1]; ?></a> </span>
            </td>
            <td colspan="7">
                <span class="fa fa-user"></span> <a target="_blank"
                                                    href="index.php?customer_view&customer_id=<?php echo $data[1]; ?>"> <?php echo $data[2]; ?></a>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <span class="fa fa-address-book"></span> <?php echo $data[3]; ?>
            </td>


        </tr>

        <tr>
            <td colspan="4">
                <span class="fa fa-envelope"></span> <?php echo $data[4]; ?>
            </td>
            <td colspan="4">
                <span class="fa fa-phone"></span> <?php echo $data[5]; ?>
            </td>

        </tr>
        <tr class="btn-success">
            <th class="col-md-1">No.</th>
            <th class="col-md-1">Product&nbsp;ID</th>
            <th class="col-md-2">Product Name</th>
            <th class="col-md-2">Serial No.</th>
            <th class="col-md-1">Quantity</th>
            <th class="col-md-1">Price</th>
            <th class="col-md-1">Discount Price</th>
            <th class="col-md-1">Sub&nbsp;Total</th>

        </tr>

        <?php history_display_invoice($invoice_no); ?>
        <tr class="bg-warning">
            <th colspan="4"><strong>Total</strong></th>

            <th><strong> <?php echo $data[10]; ?></strong> Items</th>
            <td colspan="2"></td>
            <td>Rs. <strong><?php echo $data[7]; ?>/-</strong></td>

        </tr>
        <tr class="bg-success">
            <th colspan="7"><strong>Received</strong></th>
            <td>Rs. <strong><?php echo $data[8]; ?>/-</strong></td>

        </tr>
        <tr class="bg-danger">
            <th colspan="7"><strong>Payable</strong></th>

            <td>Rs. <strong><?php echo $data[9]; ?>/-</strong></td>
        </tr>

        </tbody>
    </table>
</div>
<div class="col-md-12 btn-group">

    <a href="index.php?<?php echo $page; ?>" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
    <a href="" class="btn btn-danger"><span class="fa fa-print"></span> Print</a>
</div>


