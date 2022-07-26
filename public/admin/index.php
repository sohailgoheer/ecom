<?php include_once('../../resources/config.php'); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>
<?php
if (!isset($_SESSION['user'])){
    redirect('../../public/login.php');
}

?>


<div id="page-wrapper">

        <div class="container-fluid">
            <!-- FIRST ROW WITH PANELS -->

            <?php
//            if($_SERVER['REQUEST_URI'] == "/admin/" || $_SERVER['REQUEST_URI'] == "/admin/index.php")  {
            if ($_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/' || $_SERVER['REQUEST_URI'] == '/workspace/boutique/public/admin/index.php') {
                include(TEMPLATE_BACK . "/admin_content.php");
            }
            if (isset($_GET['profile_setting'])) {
                include(TEMPLATE_BACK . "/profile_setting.php");
            }
            if (isset($_GET['reports'])) {
                            include(TEMPLATE_BACK . "/reports.php");
            }
            if (isset($_GET['account_receivable'])) {
                include(TEMPLATE_BACK . "/account_receivable.php");
            }
            if (isset($_GET['received_receivable'])) {
                include(TEMPLATE_BACK . "/received_receivable.php");
            }
             if (isset($_GET['account_payable'])) {
                            include(TEMPLATE_BACK . "/account_payable.php");
             }
             if (isset($_GET['paid_payable'])) {
                            include(TEMPLATE_BACK . "/paid_payable.php");
             }
             if (isset($_GET['service_add_received_by_store'])) {
                            include(TEMPLATE_BACK . "/service_add_received_by_store.php");
             }
            if (isset($_GET['add_store'])) {
                           include(TEMPLATE_BACK . "/add_store.php");
            }
            if (isset($_GET['account_stores'])) {
                include(TEMPLATE_BACK . "/account_stores.php");
            }
            if (isset($_GET['account_stores_detail'])) {
                           include(TEMPLATE_BACK . "/account_stores_detail.php");
            }
            if (isset($_GET['products_in_store'])) {
                           include(TEMPLATE_BACK . "/products_in_store.php");
            }
             if (isset($_GET['add_product_to_store'])) {
                           include(TEMPLATE_BACK . "/add_product_to_store.php");
             }
             if (isset($_GET['store_users'])) {
                           include(TEMPLATE_BACK . "/store_users.php");
             }
             if (isset($_GET['edit_product_to_store'])) {
                           include(TEMPLATE_BACK . "/edit_product_to_store.php");
             }
             if (isset($_GET['delete_product_to_store'])) {
                           include(TEMPLATE_BACK . "/delete_product_to_store.php");
             }

            if (isset($_GET['orders'])) {
                include(TEMPLATE_BACK . "/orders.php");
            }
            if (isset($_GET['order_pending'])) {
                include(TEMPLATE_BACK . "/order_pending.php");
            }
            if (isset($_GET['service_cancel_online_order'])) {
                include(TEMPLATE_BACK . "/service_cancel_online_order.php");
            }
            if (isset($_GET['order_cancel'])) {
                include(TEMPLATE_BACK . "/order_cancel.php");
            }
            if (isset($_GET['order_detail'])) {
                include(TEMPLATE_BACK . "/order_detail.php");
            }
            if (isset($_GET['delete_order'])) {
                include(TEMPLATE_BACK . "/delete_order.php");
            }
            if (isset($_GET['add_serial_online_order'])) {
                include(TEMPLATE_BACK . "/add_serial_online_order.php");
            }
            if (isset($_GET['working_on_order'])) {
                include(TEMPLATE_BACK . "/working_on_order.php");
            }
            if (isset($_GET['order_placed'])) {
                include(TEMPLATE_BACK . "/order_placed.php");
            }
            if (isset($_GET['start_invoice'])) {
                include(TEMPLATE_BACK . "/start_invoice.php");
            }
            if (isset($_GET['invoice_customers'])) {
                include(TEMPLATE_BACK . "/invoice_customers.php");
            }
            if (isset($_GET['update_receivable_customer'])) {
                include(TEMPLATE_BACK . "/update_receivable_customer.php");
            }
            if (isset($_GET['service_product_customer_invoice'])) {
                include(TEMPLATE_BACK . "/service_product_customer_invoice.php");
            }
            if (isset($_GET['invoice_history'])) {
                include(TEMPLATE_BACK . "/invoice_history.php");
            }
            if (isset($_GET['display_invoice'])) {
                include(TEMPLATE_BACK . "/display_invoice.php");
            }
            if (isset($_GET['services_invoice'])) {
                include(TEMPLATE_BACK . "/services_invoice.php");
            }
            if (isset($_GET['add_sale_return'])) {
                include(TEMPLATE_BACK . "/add_sale_return.php");
            }
            if (isset($_GET['sale_return_history'])) {
                include(TEMPLATE_BACK . "/sale_return_history.php");
            }
            if (isset($_GET['purchase_return_history'])) {
                include(TEMPLATE_BACK . "/purchase_return_history.php");
            }
            if (isset($_GET['add_purchase_return'])) {
                include(TEMPLATE_BACK . "/add_purchase_return.php");
            }
            if (isset($_GET['categories'])) {
                include(TEMPLATE_BACK . "/categories.php");
            }
            if (isset($_GET['delete_category'])) {
                include(TEMPLATE_BACK . "/delete_category.php");
            }
            if (isset($_GET['brands'])) {
                include(TEMPLATE_BACK . "/brands.php");
            }
            if (isset($_GET['delete_brands'])) {
                include(TEMPLATE_BACK . "/delete_brands.php");
            }
            if (isset($_GET['products'])) {
                include(TEMPLATE_BACK . "/products.php");
            }
            if (isset($_GET['display_vendor_to_product'])) {
                include(TEMPLATE_BACK . "/display_vendor_to_product.php");
            }
            if (isset($_GET['service_product_vendor_invoice'])) {
                include(TEMPLATE_BACK . "/service_product_vendor_invoice.php");
            }
            if (isset($_GET['edit_vendor_serial'])) {
                include(TEMPLATE_BACK . "/edit_vendor_serial.php");
            }
            if (isset($_GET['add_vendor_in_product'])) {
                include(TEMPLATE_BACK . "/add_vendor_in_product.php");
            }
            if (isset($_GET['display_stores_to_product'])) {
                include(TEMPLATE_BACK . "/display_stores_to_product.php");
            }
            if (isset($_GET['add_product'])) {
                include(TEMPLATE_BACK . "/add_product.php");
            }
            if (isset($_GET['edit_product'])) {
                include(TEMPLATE_BACK . "/edit_product.php");
            }
            if (isset($_GET['delete_products'])) {
                include(TEMPLATE_BACK . "/delete_products.php");
            }
            if (isset($_GET['view_product'])) {
                include(TEMPLATE_BACK . "/view_product.php");
            }
            if (isset($_GET['change_status_products'])) {
                include(TEMPLATE_BACK . "/change_status_products.php");
            }
            if (isset($_GET['product_reviews'])) {
                include(TEMPLATE_BACK . "/product_reviews.php");
            }
            if (isset($_GET['delete_review'])) {
                include(TEMPLATE_BACK . "/delete_review.php");
            }
            if (isset($_GET['web_profile'])) {
                include(TEMPLATE_BACK . "/web_profile.php");
            }
            if (isset($_GET['users'])) {
                include(TEMPLATE_BACK . "/users.php");
            }
            if (isset($_GET['add_user'])) {
                include(TEMPLATE_BACK . "/add_user.php");
            }
            if (isset($_GET['user_action'])) {
                include(TEMPLATE_BACK . "/user_action.php");
            }
            if (isset($_GET['edit_user'])) {
                include(TEMPLATE_BACK . "/edit_user.php");
            }
            if (isset($_GET['vendors'])) {
                include(TEMPLATE_BACK . "/vendors.php");
            }
            if (isset($_GET['history_vendor'])) {
                include(TEMPLATE_BACK . "/history_vendor.php");
            }
            if (isset($_GET['vendor_invoice'])) {
                include(TEMPLATE_BACK . "/vendor_invoice.php");
            }
            if (isset($_GET['update_payable_vendor'])) {
                            include(TEMPLATE_BACK . "/update_payable_vendor.php");
            }
            if (isset($_GET['delete_vendor'])) {
                include(TEMPLATE_BACK . "/delete_vendor.php");
            }
            if (isset($_GET['stores'])) {
                include(TEMPLATE_BACK . "/stores.php");
            }
            if (isset($_GET['history_product_to_store'])) {
                include(TEMPLATE_BACK . "/history_product_to_store.php");
            }
            if (isset($_GET['delete_stores'])) {
                include(TEMPLATE_BACK . "/delete_stores.php");
            }
            if (isset($_GET['add_customer'])) {
                include(TEMPLATE_BACK . "/add_customer.php");
            }
            if (isset($_GET['edit_customer'])) {
                include(TEMPLATE_BACK . "/edit_customer.php");
            }
            if (isset($_GET['customer_view'])) {
                include(TEMPLATE_BACK . "/customer_view.php");
            }
            if (isset($_GET['customers'])) {
                include(TEMPLATE_BACK . "/customers.php");
            }
            if (isset($_GET['customer_history'])) {
                include(TEMPLATE_BACK . "/customer_history.php");
            }
            if (isset($_GET['delete_customer'])) {
                include(TEMPLATE_BACK . "/delete_customer.php");
            }
            if (isset($_GET['cart_customers'])) {
                include(TEMPLATE_BACK . "/cart_customers.php");
            }
            if (isset($_GET['cart_delete_customer'])) {
                include(TEMPLATE_BACK . "/cart_delete_customer.php");
            }
            if (isset($_GET['cart_customer_view'])) {
                include(TEMPLATE_BACK . "/cart_customer_view.php");
            }
            if (isset($_GET['cart_customers_history'])) {
                include(TEMPLATE_BACK . "/cart_customers_history.php");
            }
            if (isset($_GET['cart_customer_order_detail'])) {
                include(TEMPLATE_BACK . "/cart_customer_order_detail.php");
            }
            if (isset($_GET['slides'])) {
                include(TEMPLATE_BACK . "/slides.php");
            }
            if (isset($_GET['delete_slider'])) {
                include(TEMPLATE_BACK . "/delete_slider.php");
            }
            if (isset($_GET['add_vendor'])) {
                include(TEMPLATE_BACK . "/add_vendor.php");
            }
            if (isset($_GET['edit_vendor'])) {
                include(TEMPLATE_BACK . "/edit_vendor.php");
            }
            if (isset($_GET['web_message'])) {
                include(TEMPLATE_BACK . "/web_message.php");
            }

            if (isset($_GET['delete_web_user'])) {
                include(TEMPLATE_BACK . "/delete_web_user.php");
            }

            ?>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php"); ?>