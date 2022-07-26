<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/27/2018
 * Time: 11:23 AM
 */


//add products to admin_invoice
if(isset($_GET['add_to_invoice'])){

    $Id = escape_string($_GET['product_id']);
    $store_id = $_SESSION['admin_store_'.$Id] ;
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    $sql = '';
    if($user_role == 'admin'){
        $sql = "select product_id,product_quantity from tbl_products_store where product_id = 
                        (
                        select product_id from products where product_id like '{$Id}'  and publish_status = 'public'
                        )
                        and store_id like  '{$store_id}' ";

    }else{
        $sql = "select product_id,product_quantity from tbl_products_store where product_id = 
                        (
                        select product_id from products where product_id like '{$Id}'  and publish_status = 'public'
                        )
                        and store_id like  '{$store_id}' ";
    }


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){

        if($row['product_quantity'] != $_SESSION['admin_product_'.$Id]){
            $_SESSION['admin_product_'.$Id] += 1;
            redirect("index.php?start_invoice");
        }else{
            set_message('We only have '.$row['product_quantity'].' available selected product','warning');
            redirect("index.php?start_invoice");
        }
    }

}

//remove products from invoice
if(isset($_GET['admin_remove'])){

    $product_id = escape_string($_GET['product_id']);

    if($_SESSION['admin_product_'.$product_id] > 0 ){
        $_SESSION['admin_product_'.$product_id]--;

        unset($_SESSION['admin_amount_totals']);
        unset($_SESSION['admin_items_totals']);

        redirect('index.php?start_invoice');
    }else{
        redirect('index.php?start_invoice');
    }

}


//remove product from invoice
if(isset($_GET['delete_from_invoice'])){
    $product_id = escape_string($_GET['product_id']);
    $_SESSION['admin_product_'.$product_id]='0';

    unset($_SESSION['admin_amount_totals']);
    unset($_SESSION['admin_items_totals']);

    redirect('index.php?start_invoice');

}


//unset all session in index.php?start_invoice
if(isset($_GET['reset_invoice'])){

    foreach ($_SESSION as $name => $value){
        if(substr($name , 0,14) == 'admin_product_'){
            $length = strlen($name);
            $id = substr($name,14,$length); //getting id
            unset( $_SESSION['admin_product_'.$id]);
        }
    }

    unset($_SESSION['admin_amount_totals']);
    unset($_SESSION['admin_items_totals']);
    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_address']);
    unset($_SESSION['customer_phone']);
    unset($_SESSION['customer_email']);
    unset( $_SESSION['invoice_no']);

    redirect('index.php?start_invoice');

}


//submit invoice to database
if(isset($_POST['proceed_invoice'])){

    $arr_serial_number = array();
    $arr_product_id = array();

    $user_id          = $_SESSION['user_id'];
    $customer_id      = $_SESSION['customer_id'];
    $invoice_no       = $_SESSION['invoice_no'];
    $total_amount     = $_SESSION['admin_amount_totals'];
    $total_items      = $_SESSION['admin_items_totals'];
    $received_amount  = escape_string($_POST['received_amount']);
    $remaning_amount = $total_amount - $received_amount;
    $store_id         = $_SESSION['store_id']  ;

    $serial_product   = $_POST['serial_product'];
    $serial_productId = $_POST['serial_product_id'];


    $sql_invoice      = "INSERT into tbl_invoice(invoice_no,customer_id,total_amount,received_amount,remaining_amount,total_items,user_id,store_id)
            VALUES ({$invoice_no},{$customer_id},{$total_amount},{$received_amount},{$remaning_amount},{$total_items},{$user_id},{$store_id})";

    $query_invoice = query($sql_invoice);
    confirm($query_invoice);
    if($query_invoice){

//        update into bill management
        $sql_bill_summary = "update customer_bill_summary
                                set total_purchased_itoms = total_purchased_itoms + {$total_items},
                                    total_amount = total_amount + {$total_amount},
                                    total_paid_amount = total_paid_amount + {$received_amount},
                                    outstanding_amount = outstanding_amount + {$remaning_amount},
                                    user_id =  {$user_id}
                                where customer_id = {$customer_id}";

        $query_bill_management = query($sql_bill_summary);
        confirm($query_bill_management);

//update in stores_summary_report
        $sql_store_summary = "update stores_summary_report
                                set total_invoice_sale_products = total_invoice_sale_products + {$total_items},
                                    total_cash_on_sale = total_cash_on_sale + {$total_amount},
                                    cash_received = cash_received + {$received_amount} ,
                                    cash_receivable = cash_receivable + {$remaning_amount} 
                                where store_id = {$store_id}";
        $query_store_management = query($sql_store_summary);
        confirm($query_store_management);



//        insert to product
        foreach ($_SESSION as $name => $value){
            if(substr($name , 0,14) == 'admin_product_'){
                $length = strlen($name);
                $id = substr($name,14,$length);

//                echo $_SESSION['admin_store_'.$id];
//                return;
                $sql_invoice_products = "insert into tbl_invoice_products(customer_id,product_id,quantity,invoice_no,sale_price,discount_price,store_id) 
                                         VALUES({$customer_id},{$id},{$value},{$invoice_no},(select product_price from products where products.product_id = {$id}),
                                                (select product_disc_price from products where products.product_id = {$id}),{$store_id})";
                $query_invoice_products = query($sql_invoice_products);
                confirm($query_invoice_products);
                if($query_invoice_products){
                    $updateSQL = "update products
                                    set product_quantity = product_quantity-{$value}
                                    where product_id = {$id}";

                    $update_query = query($updateSQL);
                    confirm($update_query);
                    if($update_query){
                        $update_store_quantitySQL = "update tbl_products_store
                                                        set product_quantity = product_quantity -{$value} 
                                                        where store_id = {$store_id} and product_id = {$id}";

                        $update_store_quantity_query = query($update_store_quantitySQL);
                        confirm($update_store_quantity_query);
                        if($update_store_quantity_query){
                            unset( $_SESSION['admin_product_'.$id]);
                            unset( $_SESSION['admin_store_'.$id]);
                        }

                    }
                }

            }
        }

        //       insert to serial
        foreach ($serial_product as $serial){
            array_push($arr_serial_number,$serial);
        }
        foreach ($serial_productId as $product_id){
            array_push($arr_product_id,$product_id);
        }

        for ($i = 0; $i< sizeof($arr_serial_number); $i++){

            $query_o = query("insert into products_serial (product_serial,product_id,invoice_no)
                           values ('{$arr_serial_number[$i]}',{$arr_product_id[$i]},{$invoice_no})");
            confirm($query_o);
        }

        unset($_SESSION['admin_amount_totals']);
        unset($_SESSION['admin_items_totals']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_address']);
        unset($_SESSION['customer_phone']);
        unset($_SESSION['customer_email']);
        unset($_SESSION['invoice_no']);
        unset($_SESSION['store_id']);

        set_message('invoice submited','success');
        redirect('index.php?invoice_history&customer_id='.$customer_id);
    }else{
        set_message('somthing error','danger');
        redirect('index.php?start_invoice');
    }

}