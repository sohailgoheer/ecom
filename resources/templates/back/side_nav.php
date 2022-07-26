<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
<?php
$url = '/workspace/boutique/public/admin/';

?>
<!--        index.php-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php'
        ):?>
                    <li class="active"><a href="index.php"><i class="fa fa-fw fa-dashboard "></i> <strong>Dashboard</strong></a></li>
        <?php else:  ?>
                    <li class=""><a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <?php endif; ?>
        <!------------------------------------------------------------->
        <!--        index.php?reports-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?reports'):?>
            <li class="active"><a href="index.php?reports"><i class="fa fa-bar-chart"></i> <strong> Reports</strong></a></li>
        <?php else:  ?>
            <li class=""><a href="index.php?reports"><i class="fa fa-bar-chart"></i> Reports</a></li>
        <?php endif; ?>


        <!------------------------------------------------------------->
        <!--        index.php?accounts-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?account_receivable'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?account_payable'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?account_stores'
            || isset($_GET['received_receivable'])
            || isset($_GET['paid_payable'])
            || isset($_GET['account_stores_detail'])
        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_7" aria-expanded="true" style="color: #eea236" ><i class="fa fa-calculator"></i> Accounts</a>
                <ul id="firstLink_7"   class="collapse in" aria-expanded="true">
                    <?php if ( $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?account_receivable'
                        || isset($_GET['received_receivable']) ): ?>
                        <li class="active"><a href="index.php?account_receivable" style="background-color: #080808;color: #ffffff"><i class="fa fa-indent"></i><strong> Receivable</strong></a></li>
                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                             <li><a href="index.php?account_payable"><i class="fa fa-outdent"></i> Payable</a></li>
                        <?php endif; ?>
                        <!--                    end user_role-->
                        <li><a href="index.php?account_stores"><i class="fa fa-bank"></i> Stores</a></li>
                    <?php endif; ?>

<!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>

                        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?account_payable'
                            || isset($_GET['paid_payable'])
                        ):?>
                            <li><a href="index.php?account_receivable"><i class="fa fa-indent"></i> Receivable</a></li>
                            <li class="active"><a href="index.php?account_payable" style="background-color: #080808; color: #ffffff"><i class="fa fa-outdent"></i> <strong> Payable</strong></a></li>
                            <li><a href="index.php?account_stores"><i class="fa fa-bank"></i> Stores</a></li>
                        <?php endif; ?>

                    <?php endif; ?>
<!--                    end user_role-->

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?account_stores'
                        || isset($_GET['account_stores_detail'])
                    ):?>
                        <li><a href="index.php?account_receivable"><i class="fa fa-indent"></i> Receivable</a></li>
<!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li ><a href="index.php?account_payable" ><i class="fa fa-outdent"></i>  Payable</a></li>
                    <?php endif; ?>
<!--                    end user_role-->
                        <li class="active"><a href="index.php?account_stores" style="background-color: #080808; color: #ffffff"><i class="fa fa-bank"></i><strong> Stores </strong></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_7" aria-expanded="false" class="collapsed"><i class="fa fa-calculator"></i> Accounts</a>
                <ul id="firstLink_7" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?account_receivable"><i class="fa fa-indent"></i> Receivable</a></li>
                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li><a href="index.php?account_payable"><i class="fa fa-outdent"></i> Payable</a></li>
                    <?php endif; ?>
                    <li><a href="index.php?account_stores"><i class="fa fa-bank"></i> Stores</a></li>
                </ul>
            </li>
        <?php endif; ?>

        <!------------------------------------------------------------->
        <!--        index.php?orders-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?orders'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?order_placed'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?order_pending'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?order_cancel'
            || isset($_GET['order_received'])
            || isset($_GET['orders_pending'])
            || isset($_GET['orders_placed'])
            || isset($_GET['orders_canceled'])
        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_2" aria-expanded="true" style="color: #eea236" ><i class="fa fa-shopping-cart"></i> Cart Orders</a>
                <ul id="firstLink_2"   class="collapse in" aria-expanded="true">


                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?orders'
                            || isset($_GET['order_received'])
                        ):?>
                            <li class="active"><a href="index.php?orders" style="background-color: #080808;color: #ffffff"><i class="fa fa-fw fa-barcode"></i> <strong> Orders Received </strong></a></li>
                            <li><a href="index.php?order_pending"><i class="fa fa-exclamation-triangle"></i> Orders Pending</a></li>
                            <li><a href="index.php?order_placed"><i class="fa fa-fw fa-thumbs-o-up  "></i> Orders Placed</a></li>
                            <li><a href="index.php?order_cancel"><i class="fa fa-remove"></i> Orders Canceled</a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <!--                    end role-->


                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?order_placed'
                        || isset($_GET['orders_placed'])
                    ):?>
                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li><a href="index.php?orders"><i class="fa fa-fw fa-barcode"></i> Orders Received</a></li>
                    <?php endif; ?>
                        <li><a href="index.php?order_pending"><i class="fa fa-exclamation-triangle"></i> Orders Pending</a></li>
                        <li class="active"><a href="index.php?order_placed" style="background-color: #080808; color: #ffffff"><i class="fa fa-fw fa-thumbs-o-up"></i> <strong>Orders Placed </strong></a></li>
                        <li><a href="index.php?order_cancel"><i class="fa fa-remove"></i> Orders Canceled</a></li>
                    <?php endif; ?>

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?order_pending'
                        || isset($_GET['orders_pending'])

                    ):?>
                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li><a href="index.php?orders"><i class="fa fa-fw fa-barcode"></i> Orders Received</a></li>
                    <?php endif; ?>
                        <li class="active"><a href="index.php?order_pending" style="background-color: #080808; color: #ffffff"><i class="fa fa-exclamation-triangle"></i> <strong>Orders Pending </strong></a></li>
                        <li><a href="index.php?order_placed"><i class="fa fa-fw fa-thumbs-o-up"></i> <strong>Orders Placed </strong></a></li>
                        <li><a href="index.php?order_cancel"><i class="fa fa-remove"></i> Orders Canceled</a></li>
                    <?php endif; ?>

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?order_cancel'
                        || isset($_GET['orders_canceled'])
                    ):?>
                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li><a href="index.php?orders"><i class="fa fa-fw fa-barcode"></i> Orders Received</a></li>
                    <?php endif; ?>
                        <li class="active"><a href="index.php?order_pending" ><i class="fa fa-exclamation-triangle"></i> Orders Pending </a></li>
                        <li><a href="index.php?order_placed"><i class="fa fa-fw fa-thumbs-o-up"></i> <strong>Orders Placed </strong></a></li>
                        <li><a href="index.php?order_cancel" style="background-color: #080808; color: #ffffff"><i class="fa fa-remove"></i> <strong> Orders Canceled </strong></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_2" aria-expanded="false" class="collapsed"><i class="fa fa-shopping-cart"></i> Cart Orders</a>
                <ul id="firstLink_2" class="collapse" aria-expanded="false" style="height: 0px;">
                    <!--                    start user_role-->
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                         <li><a href="index.php?orders"><i class="fa fa-fw fa-barcode"></i> Orders Received</a></li>
                    <?php endif; ?>
                    <li><a href="index.php?order_pending"><i class="fa fa-exclamation-triangle"></i> Orders Pending</a></li>
                    <li><a href="index.php?order_placed"><i class="fa fa-fw fa-thumbs-o-up  "></i> Orders Placed</a></li>
                    <li><a href="index.php?order_cancel"><i class="fa fa-remove"></i> Orders Canceled</a></li>
                </ul>
            </li>
        <?php endif; ?>


        <!------------------------------------------------------------->


        <!--        index.php?customers-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?cart_customers'
            || isset($_GET['cart_customer_view'])
            || isset($_GET['cart_customers_history'])
            || isset($_GET['cart_customer_order_detail'])
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?customers'
            || isset($_GET['add_customer'])
            || isset($_GET['customer_history'])
            || isset($_GET['customer_view'])
            || isset($_GET['edit_customer'])

        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_1" aria-expanded="true" style="color: #eea236" ><i class="fa fa-user-plus"></i> Customers</a>
                <ul id="firstLink_1"   class="collapse in" aria-expanded="true">
                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?cart_customers'
                        || isset($_GET['cart_customer_view'])
                        || isset($_GET['cart_customers_history'])
                        || isset($_GET['cart_customer_order_detail'])
                    ):?>
                        <li class="active"><a href="index.php?cart_customers" style="background-color: #080808;color: #ffffff"><i class="fa fa-user-secret"></i><strong> Cart Customers</strong></a></li>
                        <li><a href="index.php?customers"><i class="fa fa-user"></i> Store Customers</a></li>
                    <?php endif; ?>

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?customers'
                        || isset($_GET['add_customer'])
                        || isset($_GET['customer_history'])
                        || isset($_GET['customer_view'])
                        || isset($_GET['edit_customer'])
                    ):?>
                        <li><a href="index.php?cart_customers"><i class="fa fa-user-secret"></i> Cart Customers</a></li>
                        <li class="active"><a href="index.php?customers" style="background-color: #080808; color: #ffffff"><i class="fa fa-user"></i> <strong> Store Customers</strong></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_1" aria-expanded="false" class="collapsed"><i class="fa fa-user-plus"></i> Customers</a>
                <ul id="firstLink_1" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?cart_customers"><i class="fa fa-user-secret"></i> Cart Customers</a></li>
                    <li><a href="index.php?customers"><i class="fa fa-user"></i> Store Customers</a></li>
                </ul>
            </li>
        <?php endif; ?>

        <!------------------------------------------------------------->


        <!------------------------------------------------------------->


        <!--        index.php?invoice-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?start_invoice'
            || isset($_GET['start_invoice'])
            || isset($_GET['display_invoice'])

            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?invoice_customers'
            || isset($_GET['display_invoice'])
            || isset($_GET['invoice_history'])

        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_5" aria-expanded="true" style="color: #eea236" ><i class="fa fa-list-alt"></i> Invoice</a>
                <ul id="firstLink_5"   class="collapse in" aria-expanded="true">
                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?start_invoice'
                        || isset($_GET['start_invoice'])
                    ):?>
                        <li class="active"><a href="index.php?start_invoice" style="background-color: #080808;color: #ffffff"><i class="fa fa-file-text-o"></i> <strong> New Invoice </strong></a></li>
                        <li><a href="index.php?invoice_customers"><i class="fa fa-users"></i> Invoice Customers</a></li>

                    <?php endif; ?>

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?invoice_customers'
                        || isset($_GET['invoice_history'])
                        || isset($_GET['display_invoice'])
                    ):?>
                        <li><a href="index.php?start_invoice"><i class="fa fa-file-text-o"></i> New Invoice</a></li>
                        <li class="active"><a href="index.php?invoice_customers" style="background-color: #080808; color: #ffffff"><i class="fa fa-users"></i> <strong> Invoice Customers</strong></a></li>

                    <?php endif; ?>
                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_5" aria-expanded="false" class="collapsed"><i class="fa fa-list-alt"></i> Invoice</a>
                <ul id="firstLink_5" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?start_invoice"><i class="fa fa-file-text-o"></i> New Invoice</a></li>
                    <li><a href="index.php?invoice_customers"><i class="fa fa-users"></i> Invoice Customers</a></li>
                </ul>
            </li>
        <?php endif; ?>


        <!------------------------------------------------------------->
        <!--        index.php?returns-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?sale_return_history'
            || isset($_GET['add_sale_return'])
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?purchase_return_history'
            || isset($_GET['add_purchase_return'])
        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_6" aria-expanded="true" style="color: #eea236" ><i class="fa fa-undo"></i> Returns</a>
                <ul id="firstLink_6"   class="collapse in" aria-expanded="true">
                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?sale_return_history'
                        || isset($_GET['add_sale_return'])
                    ):?>
                        <li class="active"><a href="index.php?sale_return_history" style="background-color: #080808;color: #ffffff"><i class="fa fa-mail-forward"></i><strong> Sales Return</strong></a></li>

                        <?php if($_SESSION['user_role'] == 'admin'): ?>
                                <li><a href="index.php?purchase_return_history"><i class="fa fa-mail-reply"></i> Purchase Return</a></li>
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?purchase_return_history'
                            || isset($_GET['add_purchase_return'])
                        ):?>
                            <li><a href="index.php?sale_return_history"><i class="fa fa-mail-forward"></i> Sales Return</a></li>
                            <li class="active"><a href="index.php?purchase_return_history" style="background-color: #080808; color: #ffffff"><i class="fa fa-mail-reply"></i> <strong> Purchase Return</strong></a></li>
                        <?php endif; ?>
                    <?php endif; ?>

                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_6" aria-expanded="false" class="collapsed"><i class="fa fa-undo"></i> Returns</a>
                <ul id="firstLink_6" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?sale_return_history"><i class="fa fa-mail-forward"></i> Sales Return</a></li>

                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li><a href="index.php?purchase_return_history"><i class="fa fa-mail-reply"></i> Purchase Return</a></li>
                    <?php endif; ?>

                </ul>
            </li>
        <?php endif; ?>


        <!------------------------------------------------------------->






        <!------------------------------------------------------------->
<!--        set role-->
        <?php if($_SESSION['user_role'] == 'admin'): ?>

        <!--        index.php?products-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?add_product'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?products'
            || isset($_GET['view_product'])
            || isset($_GET['edit_product'])
            || isset($_GET['display_vendor_to_product'])
            || isset($_GET['edit_vendor_serial'])
            || isset($_GET['view_vendor_serial'])
            || isset($_GET['display_stores_to_product'])
            || isset($_GET['assign_product_quantity'])


        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_4" aria-expanded="true" style="color: #eea236" ><i class="fa fa-cubes"></i> Products</a>
                <ul id="firstLink_4"   class="collapse in" aria-expanded="true">
                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?add_product'):?>
                        <li class="active"><a href="index.php?add_product" style="background-color: #080808;color: #ffffff"><i class="fa fa-pencil-square"></i><strong> Add Product</strong></a></li>
                        <li><a href="index.php?products"><i class="fa fa-cube"></i> Display Products</a></li>
                    <?php endif; ?>

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?products'
                        || isset($_GET['view_product'])
                        || isset($_GET['edit_product'])
                        || isset($_GET['display_vendor_to_product'])
                        || isset($_GET['edit_vendor_serial'])
                        || isset($_GET['view_vendor_serial'])
                        || isset($_GET['display_stores_to_product'])
                        || isset($_GET['assign_product_quantity'])
                    ):?>
                        <li><a href="index.php?add_product"><i class="fa fa-pencil-square"></i> Add Product</a></li>
                        <li class="active"><a href="index.php?products" style="background-color: #080808; color: #ffffff"><i class="fa fa-cube"></i> <strong> Display Products</strong></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_4" aria-expanded="false" class="collapsed"><i class="fa fa-cubes"></i> Products</a>
                <ul id="firstLink_4" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?add_product"><i class="fa fa-pencil-square"></i> Add Product</a></li>
                    <li><a href="index.php?products"><i class="fa fa-cube"></i> Display Products</a></li>
                </ul>
            </li>
        <?php endif; ?>


        <!------------------------------------------------------------->

        <!--        index.php?vendors-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?vendors'
                || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?add_vendor'
                || isset($_GET['history_vendor'])
                || isset($_GET['edit_vendor'])
                || isset($_GET['update_payable_vendor'])
                || isset($_GET['vendor_invoice'])
                || isset($_GET['add_vendor_in_product'])

            ):?>
            <li class="active"><a href="index.php?vendors" style="background-color: #080808;color: #ffffff"><i class="fa fa-user-secret"></i><strong> Vendors</strong></a></li>
        <?php else:?>
            <li><a href="index.php?vendors"><i class="fa fa-user-secret"></i> Vendors</a></li>
        <?php endif; ?>







        <!------------------------------------------------------------->
        <!------------------------------------------------------------->

        <!--        index.php?stores-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?stores'
                || isset($_GET['add_store'])
                || isset($_GET['store_users'])
                || isset($_GET['products_in_store'])
                || isset($_GET['add_product_to_store'])
                || isset($_GET['history_product_to_store'])

            ):?>
            <li class="active"><a href="index.php?stores" style="background-color: #080808;color: #ffffff"><i class="fa fa-globe"></i><strong> Stores</strong></a></li>
        <?php else:?>
            <li><a href="index.php?stores"><i class="fa fa-globe"></i> Stores</a></li>
        <?php endif; ?>

        <!------------------------------------------------------------->




        <!------------------------------------------------------------->

        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?categories'
            || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?brands'
        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_0" aria-expanded="true" style="color: #eea236" ><i class="fa fa-sitemap"></i> Components</a>
                <ul id="firstLink_0"   class="collapse in" aria-expanded="true">
                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?categories'):?>
                        <li class="active"><a href="index.php?categories" style="background-color: #080808;color: #ffffff"><i class="fa fa-object-group"></i><strong> Categories</strong></a></li>
                        <li> <a href="index.php?brands"><i class="fa fa-apple"></i> Brands</a> </li>

                    <?php elseif ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?brands'):?>
                        <li><a href="index.php?categories" ><i class="fa fa-object-group"></i> Categories</a></li>
                        <li class="active"> <a href="index.php?brands" style="background-color: #080808;color: #ffffff"><i class="fa fa-apple"></i><strong>  Brands </strong></a> </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#accordion1" aria-expanded="false" class="collapsed"><i class="fa fa-sitemap"></i> Components</a>
                <ul id="accordion1" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?categories"><i class="fa fa-object-group"></i> Categories</a></li>
                    <li> <a href="index.php?brands"><i class="fa fa-apple"></i> Brands</a> </li>
                </ul>
            </li>
        <?php endif; ?>

        <!------------------------------------------------------------->


        <!--        index.php?public-->
        <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?slides'
        || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?users'
        || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?web_profile'
        || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?web_message'
            || isset($_GET['add_user'])
        ):?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_3" aria-expanded="true" style="color: #eea236" ><i class="fa fa-wrench"></i> Web Settings</a>
                <ul id="firstLink_3"   class="collapse in" aria-expanded="true">

                    <?php if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?slides'):?>
                        <li class="active"><a href="index.php?slides" style="background-color: #080808;color: #ffffff"><i class="fa fa-image"></i><strong> Front Slides</strong></a></li>
                        <li> <a href="index.php?users"><i class="fa fa-users"></i> CMS Users</a> </li>
                        <li> <a href="index.php?web_profile"><i class="fa fa-laptop"></i> Web Profile</a> </li>
                        <li> <a href="index.php?web_message"><i class="fa fa-bell-o"></i> Web Messages</a> </li>
                    <?php elseif ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?users'
                        || isset($_GET['add_user'])
                    ):?>
                        <li><a href="index.php?slides" ><i class="fa fa-image"></i> Front Slides</a></li>
                        <li class="active"> <a href="index.php?users" style="background-color: #080808;color: #ffffff"><i class="fa fa-users"></i><strong>  CMS Users </strong></a> </li>
                        <li> <a href="index.php?web_profile"><i class="fa fa-laptop"></i> Web Profile</a> </li>
                        <li> <a href="index.php?web_message"><i class="fa fa-bell-o"></i> Web Messages</a> </li>
                   <?php elseif ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?web_profile'):?>
                        <li><a href="index.php?slides" ><i class="fa fa-image"></i> Front Slides</a></li>
                        <li > <a href="index.php?users" ><i class="fa fa-users"></i> CMS Users </a> </li>
                        <li class="active"> <a href="index.php?web_profile" style="background-color: #080808;color: #ffffff"><i class="fa fa-laptop"></i><strong>  Web Profile</strong></a> </li>
                        <li> <a href="index.php?web_message"><i class="fa fa-bell-o"></i> Web Messages</a> </li>
                    <?php elseif ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php?web_message'):?>
                        <li><a href="index.php?slides" ><i class="fa fa-image"></i> Front Slides</a></li>
                        <li > <a href="index.php?users" ><i class="fa fa-users"></i>  CMS Users </a> </li>
                        <li class="active"> <a href="index.php?web_profile"><i class="fa fa-laptop"></i> Web Profile</a> </li>
                        <li> <a href="index.php?web_message"  style="background-color: #080808;color: #ffffff"><i class="fa fa-bell-o"></i><strong> Web Messages</strong></a> </li>
                    <?php endif; ?>


                </ul>
            </li>
        <?php else:  ?>
            <li>
                <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink_3" aria-expanded="false" class="collapsed"><i class="fa fa-wrench"></i> Web Settings</a>
                <ul id="firstLink_3" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="index.php?slides"><i class="fa fa-image"></i> Front Slides</a></li>
                    <li> <a href="index.php?users"><i class="fa fa-users"></i> CMS Users</a> </li>
                    <li> <a href="index.php?web_profile"><i class="fa fa-laptop"></i> Web Profile</a> </li>
                    <li> <a href="index.php?web_message"><i class="fa fa-bell-o"></i> Web Messages</a> </li>
                </ul>
            </li>


        <?php endif; ?>


        <!------------------------------------------------------------->
<!--      set role end-->
        <?php endif; ?>
    </ul>
</div>
