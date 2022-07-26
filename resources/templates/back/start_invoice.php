<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / Invoice </h4>
</div>


<div class="col-lg-12">
    <?php

    if (isset($_GET['customer_id'])) {


        $customer_id = escape_string($_GET['customer_id']);
        $_SESSION['store_id'] = escape_string($_GET['store_id']);
        $sql_customer = "select * from customers where customer_id ={$customer_id} ";
        $query = query($sql_customer);
        confirm($query);
        while ($row = fetch_array($query)) {

            $_SESSION['customer_id'] = $customer_id;
            $_SESSION['customer_name'] = $row['f_name'] . ' ' . $row['l_name'];
            $_SESSION['customer_address'] = $row['house_street'] . ' , ' . $row['town_city'] . ' , ' . $row['province'] . ' , ' . $row['country'];
            $_SESSION['customer_phone'] = $row['phone'];
            $_SESSION['customer_email'] = $row['email'];
        }
    }

    if (!isset($_SESSION['customer_id'])) {

        $user_button = <<<DELIMITER
                <div class='alert alert-warning col-md-12'>
                            <!--<button type='button' class='close' data-dismiss='alert'>&times;</button>-->
                            <strong>Required !</strong> Please first select customer.
                        </div>
               
                 <div class="btn-group" style="min-height: 25em;" >
                    <a href="index.php?customers" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span> Add Old Customer</a>
                    <a href="index.php?add_customer" class="btn btn-success"><span class="fa fa-user-plus"></span> Add New Customer</a>
                </div>
                <hr>
                <hr>
       
DELIMITER;
        echo $user_button;
        echo "   </div>";
    } else {
    ?>
</div>
<?php //session_destroy(); ?>
<form action="" method="post" enctype="multipart/form-data">
    <?php add_product_to_invoice(); ?>
    <div class="col-md-12">
        <?php display_message(); ?>
    </div>


    <div class="form-group col-md-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <select    name="product_Id" id="product_Id_invoice" class="form-control selectpicker" required data-live-search="true" onchange="refershInvoice_dropdown_id();">
                <option value="%">Product ID</option>
                <?php fill_products_ids_in_invoice(); ?>
            </select>
        </div>
    </div>

    <div class="form-group col-md-2">
        <div class="input-group">

            <button disabled type="submit" id="add_product_invoice" name="add_product" class="btn btn-success" value=""><span
                        class="fa fa-hand-o-down"></span> Add to Invoice
            </button>

        </div>
    </div>

</form>

<div class="col-md-12">
    <form action="index.php?services_invoice" method="post">

        <table class="table table-responsive table-bordered ">
            <thead>
            <th colspan="9" class="btn-primary">
                Generate Invoice
                <p class="pull-right"><span class="glyphicon glyphicon-list-alt"></span><strong> Invoice
                        No.</strong> <?php get_invoice_number(); ?></p>
            </th>
            </thead>
            <tbody>
            <tr>
                <td colspan="1">
                    <span class="fa fa-id-badge"></span>
                    <div class="label label-default"><?php if (isset($_SESSION['customer_id'])) : echo $_SESSION['customer_id']; endif; ?></div>
                </td>
                <td colspan="8">
                    <span class="fa fa-user"></span> <?php if (isset($_SESSION['customer_name'])) : echo $_SESSION['customer_name']; endif; ?>
                </td>
            </tr>

            <tr>
                <td colspan="9">
                    <span class="fa fa-address-book"></span> <?php if (isset($_SESSION['customer_address'])) : echo $_SESSION['customer_address']; endif; ?>
                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <span class="fa fa-envelope"></span> <?php if (isset($_SESSION['customer_email'])) : echo $_SESSION['customer_email']; endif; ?>
                </td>
                <td colspan="5">
                    <span class="fa fa-phone"></span> <?php if (isset($_SESSION['customer_phone'])) : echo $_SESSION['customer_phone']; endif; ?>
                </td>

            </tr>

            <tr class="btn-success">
                <th class="col-md-1">No.</th>
                <th class="col-md-1">Product&nbsp;ID</th>
                <th class="col-md-2">Product Name</th>
                <th class="col-md-1">Serial No.</th>
                <th class="col-md-1">Quantity</th>
                <th class="col-md-1">Sale Price</th>
                <th class="col-md-1">Disc. Price</th>
                <th class="col-md-2">Sub&nbsp;Total</th>
                <th class="col-md-2"></th>
            </tr>

            <?php display_invoice(); ?>
            <tr class="bg-warning">
                <th><strong>Total</strong></th>
                <td></td>
                <td></td>
                <td></td>
                <th><strong>
                        <?php
                        if (isset($_SESSION['admin_items_totals'])) : echo $_SESSION['admin_items_totals'];
                        else: echo '0'; endif;
                        ?>

                    </strong> Items
                </th>
                <td></td>
                <td></td>
                <th><input type="number" disabled class="form-control" id="total_sub_id" name="total_sub"
                           value="<?php if (isset($_SESSION['admin_amount_totals'])) : echo $_SESSION['admin_amount_totals']; else: echo '00'; endif; ?>"
                    / >


                </th>
                <td></td>
            </tr>
            <tr class="bg-success">
                <th colspan="7"><strong>Received</strong></th>
                <th><input type="number" class="form-control" id="received_amount_id" name="received_amount"
                           value="00" / >
                </th>
                <td></td>
            </tr>
            <tr class="bg-danger">
                <th colspan="7"><strong>Remaining</strong></th>
                <th><input type="number" disabled class="form-control" id="renain_amount_id"
                           name="renain_amount" value="00" / >
                </th>
                <td><span onclick="update_remain_total();" class="btn btn-warning"><span
                                class="fa fa-retweet"></span> Update</span></td>
            </tr>
            <tr>
                <th colspan="9">
                    <div class="btn-group">
                        <a href="index.php?services_invoice&reset_invoice" class="btn btn-default"><span
                                    class="fa fa-refresh"></span> Reset Invoice</a>
                        <button type="submit" class="btn btn-success" name="proceed_invoice"><span
                                    class="fa fa-mail-forward"></span> Proceed
                        </button>


                    </div>
                </th>

            </tr>
            </tbody>
        </table>

    </form>
</div>
<?php } ?>

