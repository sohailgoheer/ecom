<?php require_once('../resources/config.php'); ?>

    <!--header-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <div class="container">
        <div class="col-md-12">
            <?php display_message(); ?>
        </div>
        <div class="col-md-12 ">

            <table class="table table-bordered" cellspacing="0">
                <tr class="cart-subtotal">
                    <th>ORDER ID:</th>
                    <th><?php
                        if (isset($_GET['order_id'])) {
                            echo $_GET['order_id'];
                        }

                        ?></th>
                </tr>

                <tr class="cart-subtotal">
                    <th>Total Items:</th>
                    <td><span class="amount">
                            <?php
                            echo isset($_SESSION['items_totals']) ? $_SESSION['items_totals'] : $_SESSION['items_totals'] = '0';
                            ?>
                        </span></td>
                </tr>


                <tr class="order-total">
                    <th>Total Amount</th>
                    <td>
                        <strong>
                            <span class="amount">Rs.
                                <?php
                                echo isset($_SESSION['amount_totals']) ? $_SESSION['amount_totals'] : $_SESSION['amount_totals'] = '0';
                                ?>
                            </span>
                        </strong>
                    </td>
                </tr>
                <tr class="cart-subtotal">
                    <th>DATE:</th>
                    <td><?php
                        if (isset($_GET['date_time'])) {
                            echo $_GET['date_time'];
                        }

                        ?></td>
                </tr>


                <tr class="shipping">
                    <th>Cash on Delivery</th>
                    <td>
                        <strong>
                            <span class="amount">Rs.
                                <?php
                                echo isset($_SESSION['cash_on_delivery']) ? $_SESSION['cash_on_delivery'] : $_SESSION['cash_on_delivery'] = '0';
                                ?>
                            </span>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><a class="btn btn-primary" href="index.php"><span
                                    class="glyphicon glyphicon-backward"></span> Back to Shop</a></td>

                </tr>

            </table>
        </div>
    </div>

<?php session_destroy(); ?>
    <!-- /.container -->
    <!--footer-->

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>