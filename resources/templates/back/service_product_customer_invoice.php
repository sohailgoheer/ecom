<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 3/17/2019
 * Time: 1:22 AM
 */

if (isset($_GET['service_product_customer_invoice'])){

    $invoice_no = escape_string($_GET['invoice_no']);
    $customer_id = escape_string($_GET['customer_id']);
    $user_id = $_SESSION['user_id'];

//    minous products from store
    $sql = "select product_id ,quantity from tbl_invoice_products where customer_id ={$customer_id} and invoice_no = {$invoice_no}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){
        $sql2 = "update products              
            set product_quantity= product_quantity + {$row['quantity']}
            where product_id = {$row['product_id']} ";
        $query2 = query($sql2);
        confirm($query2);
    }

    //    minous invoice from vendor summary
    $sql3 = "select total_amount,total_items,received_amount,received_amount,remaining_amount from tbl_invoice 
            where customer_id ={$customer_id} and invoice_no = {$invoice_no}";
    $query3 = query($sql3);
    confirm($query3);
    while ($row3 = fetch_array($query3)){
        $sql4 = "UPDATE customer_bill_summary
                        SET total_purchased_itoms = total_purchased_itoms -  {$row3['total_items']},
                        total_amount = total_amount - {$row3['total_amount']},
                        total_paid_amount = total_paid_amount - {$row3['received_amount']},
                        outstanding_amount = outstanding_amount - {$row3['remaining_amount']},
                        user_id = {$user_id}
                        WHERE customer_id = {$customer_id}";

        $query4 = query($sql4);
        confirm($query4);


        $sqlx = "UPDATE stores_summary_report
                        SET total_invoice_sale_products = total_invoice_sale_products -  {$row3['total_items']},
                        total_cash_on_sale = total_cash_on_sale - {$row3['total_amount']},
                        cash_received = cash_received - {$row3['received_amount']},
                        cash_receivable = cash_receivable - {$row3['remaining_amount']} 
                        WHERE store_id = (select store_id from customers where customer_id = {$customer_id})";

        $queryx = query($sqlx);
        confirm($queryx);
    }

//delete from vendor invoice
    $sql5 = "delete from tbl_invoice 
             where customer_id ={$customer_id} and invoice_no = {$invoice_no}";
    $query5 = query($sql5);
    confirm($query5);


//    delete from vendor products
    $sql6 = "delete from tbl_invoice_products 
            where customer_id ={$customer_id} and invoice_no = {$invoice_no}";
    $query6 = query($sql6);
    confirm($query6);
    if($query6){
        set_message('Invoice deleted from all aspects except purchase returns','success');
        redirect('index.php?invoice_history&customer_id='.$customer_id);
    }else{
        set_message('network error','danger');
        redirect('index.php?invoice_history&customer_id='.$customer_id);
    }
}