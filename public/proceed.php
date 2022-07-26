<?php require_once('../resources/config.php'); ?>

    <!--header-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <div class="container">
        <div class="breadcrumb">
            <h4 ><a href="index.php"> Home </a>/ Processing  </h4>
        </div>
        <div class="col-md-12 text-center">
            <?php display_message(); ?>

        </div>


        <div class="col-md-6">
            <h3>Shipping Address</h3>
            <form name="sentMessage" id="contactForm" method="post">
                <?php place_order(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" placeholder="Your First Name *"
                                   id="name" required data-validation-required-message="Please enter First your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" placeholder="Your Last Name *"
                                   id="lname" required >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email"
                                   required >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone *" id="phone"
                                   required>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="street" class="form-control"
                                   placeholder="House Number and Street Number *" id="street" required>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="town" class="form-control" placeholder="Town/City *" id="street">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="province" class="form-control" placeholder="Province *" id="street" required>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Further Comment *" id="comment"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button type="submit" name="place_order" class="btn btn-xl">Place Order</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-xs-4 col-md-push-2 ">
            <h2>Order Summary</h2>

            <table class="table table-bordered" cellspacing="0">
                <tr class="cart-subtotal bg-primary">
                    <th>Products</th>
                    <th>Total</th>
                </tr>

                <?php cart_proceed(); ?>
                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount">
                            <?php
                            echo isset($_SESSION['items_totals']) ? $_SESSION['items_totals'] : $_SESSION['items_totals'] = '0';
                            ?>
                        </span></td>
                </tr>

                <tr class="order-total bg-success">
                    <th>Order Sub Total</th>
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
                <tr class="shipping">
                    <th>Cash on Delivery</th>
                    <td><span class="amount">
                            <?php
                            echo isset($_SESSION['cash_on_delivery']) ? $_SESSION['cash_on_delivery'] : $_SESSION['cash_on_delivery'] = '0';
                            ?>
                        </span></td>
                </tr>
                <tr class="order-total bg-danger">
                    <th>Total</th>
                    <td>
                        <strong>
                            <span class="amount">Rs.
                                <?php
                                echo isset($_SESSION['amount_totals']) ? $_SESSION['amount_totals'] + $_SESSION['cash_on_delivery']: $_SESSION['amount_totals'] = '0';
                                ?>
                            </span>
                        </strong>
                    </td>
                </tr>
                <tr class="bg-warning">
                    <th colspan="2">
                        <p>
                            Your personal data will be used to process your order, support your experience throughout
                            this website, and for other purposes described in our privacy policy.
                        </p>
                    </th>
                </tr>

            </table>
        </div>


    </div>


    <!-- /.container -->
    <!--footer-->

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>