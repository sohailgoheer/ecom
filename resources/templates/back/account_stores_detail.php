<?php

if (isset($_GET['store_id'])) {
    $store_id = escape_string($_GET['store_id']);
    $data = fetch_stores_balance($store_id);
    $user_role = $_SESSION['user_role'];
} else {
    no_record_found();
    return;
}

if(isset($_GET['page'])){

    $page = $_GET['page'];

}
?>

<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>/
        <a href="index.php?account_stores">Account Stores </a> / Details Store
    </h4>
</div>

<div class="col-md-12">
    <table class="table table-responsive">
        <thead>
        <tr class="btn-default">
            <td colspan="3"><span class="fa fa-bank"></span> <?php echo $data[1]; ?></a></td>

        </tr>
        </thead>

        <tbody>
        <tr class="bg-primary">
            <th>1</th>
            <th>Sold Products</th>
            <td><?php echo $data[4]; ?></td>
        </tr>
        <tr class="bg-primary">
            <th>2</th>
            <th>Cash Sold Products</th>
            <td>Rs. <?php echo $data[5]; ?></td>
        </tr>

        <tr class="">
            <th></th>
            <th></th>
            <td></td>
        </tr>

        <tr class="bg-info">
            <th>3</th>
            <th>Cart Products</th>
            <td><?php echo $data[2]; ?></td>
        </tr>
        <tr class="bg-info">
            <th>4</th>
            <th>Cash Cart Products</th>
            <td>Rs. <?php echo $data[3]; ?></td>
        </tr>
        <tr class="">
            <th></th>
            <th></th>
            <td></td>
        </tr>
        <tr class="bg-danger">
            <th>5</th>
            <th>Sold Products (Cart + Store)</th>
            <td><?php echo $data[12]; ?></td>
        </tr>
        <tr class="bg-danger">
            <th>6</th>
            <th>Cash (Cart + Store)</th>
            <td>Rs. <?php echo $data[13]; ?></td>
        </tr>
        <tr class="">
            <th></th>
            <th></th>
            <td></td>
        </tr>
        <tr class="bg-warning">
            <th>7</th>
            <th>Cash Received</th>
            <td>Rs. <?php echo $data[10]; ?></td>
        </tr>
        <tr class="bg-warning">
            <th>8</th>
            <th>Cash Receivable</th>
            <td>Rs. <?php echo $data[11]; ?></td>
        </tr>
        <tr class="">
            <th></th>
            <th></th>
            <td></td>
        </tr>
        <tr class="bg-primary">
            <th>9</th>
            <th>Sale Returns Products</th>
            <td><?php echo $data[6]; ?></td>
        </tr>
        <tr class="bg-primary">
            <th>10</th>
            <th>Sale Returns Cash</th>
            <td>Rs. <?php echo $data[7]; ?></td>
        </tr>
        <tr class="">
            <th></th>
            <th></th>
            <td></td>
        </tr>
        <tr class="bg-success">
            <th>11</th>
            <th>Amount Paid to Admin</th>
            <td>Rs. <?php echo $data[14]; ?></td>
        </tr>

        <tr class="bg-danger">
            <th>12</th>
            <th>Amount Payable by Store</th>
            <td>Rs. <?php echo $data[15]; ?></td>
        </tr>

        <tr class="bg-warning">
            <th>13</th>
            <th>Last Amount Sent to Admin</th>
            <td>Rs. <?php echo $data[16]; ?></td>
        </tr>
        <tr class="">
            <th></th>
            <th></th>
            <td></td>
        </tr>
        <?php if ($user_role == 'admin'): ?>
            <form method="post" action="index.php?service_add_received_by_store">
                <tr>
                    <th>14</th>
                    <th>Cash Paid</th>
                    <td>

                        <div class="form-group">
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input type="number" name="amount_payable" class="form-control" placeholder="00"
                                       required>
                            </div>
                        </div>
                        <input type="hidden"
                               value="<?php if (isset($_GET['store_id'])): echo $_GET['store_id']; endif; ?>"
                               name="store_id"/>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="btn-group">
                            <a href="index.php?<?php echo $page; ?>" class="btn btn-warning"><span
                                        class="fa fa-backward"></span> Back</a>
                            <button type="reset" class="btn btn-default"><span class="fa fa-refresh"></span> Reset
                            </button>
                            <button type="submit" name="send_money" class="btn btn-success"><span
                                        class="fa fa-save"></span> Submit
                            </button>

                        </div>
                    </td>

                </tr>
            </form>
        <?php endif; ?>
        </tbody>
    </table>
</div>
