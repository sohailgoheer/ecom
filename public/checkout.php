<?php require_once ('../resources/config.php'); ?>

<!--header-->
<?php include(TEMPLATE_FRONT.DS."header.php")?>
    <!-- Page Content -->
<div class="container">
<!-- /.row -->
    <div class="breadcrumb">
        <h4 ><a href="index.php"> Home </a>/ Checkout  </h4>
    </div>
    <div class="col-md-12">
         <?php display_message();   ?>
        <h2>Order Detail</h2>
        <?php
//            if(isset($_SESSION['product_1'])){
//                echo $_SESSION['product_1'];
//            }
        ?>
        <form action="">
            <table class="table table-striped">
                <thead>
                    <tr>
                       <th>Product</th>
                       <th>Image</th>
                       <th>Disc. Price</th>
                       <th>Sale Price</th>
                       <th>Quantity</th>
                       <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php cart();  ?>
                </tbody>
            </table>
        </form>
<!--  ***********CART TOTALS*************-->
        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>

            <table class="table table-bordered" cellspacing="0">
                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount">
                            <?php
                            echo isset($_SESSION['items_totals'])? $_SESSION['items_totals']:$_SESSION['items_totals']='0';
                            ?>
                        </span></td>
                </tr>
                <tr class="shipping">
                   <th>Shipping Amount</th>
                    <td>
                        <span class="amount">Rs.
                            <?php
                            echo isset($_SESSION['cash_on_delivery'])? $_SESSION['cash_on_delivery']:$_SESSION['cash_on_delivery']='0';
                            ?>
                            </span>
                    </td>
                </tr>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td>
                        <strong>
                            <span class="amount">Rs.
                                <?php
                                    echo isset($_SESSION['amount_totals'])? $_SESSION['amount_totals']:$_SESSION['amount_totals']='0';
                                ?>
                            </span>
                        </strong>
                    </td>
                </tr>
                <?php if($_SESSION['amount_totals']!='0'){?>


                <tr class="order-total">

                    <td colspan="2">

                            <a   class="btn btn-primary" name="proceed"  href="proceed.php"><span class="glyphicon glyphicon-forward"></span> Proceed to Checkout</a>
                        </form>
                    </td>
                </tr>
                <?php  } ?>
            </table>
        </div><!-- CART TOTALS-->
    </div><!--Main Content-->
<!--    checkout-->


</div>
    <!--footer-->
<?php include(TEMPLATE_FRONT.DS."footer.php")?>