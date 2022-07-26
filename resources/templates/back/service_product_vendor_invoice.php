<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 10/5/2018
 * Time: 12:40 PM
 */

//remove one product from invoice
if (isset($_GET['remove'])) {

    $product_id = escape_string($_GET['product_id']);
    $vendor_id = escape_string($_GET['vendor_id']);

    unset($_SESSION['vendor_invoice_' . $product_id]);

    set_message('remove product','success');
    redirect('index.php?add_vendor_in_product&vendor_id='.$vendor_id);
}


//remove all sessions of vendor invoice
if (isset($_GET['refresh'])) {

    $vendor_id = escape_string($_GET['vendor_id']);

    unset($_SESSION['ses_vendor']);
    unset($_SESSION['amount_totals_vendor_invoice']);
    unset($_SESSION['items_totals_vendor_invoice']);
    unset($_SESSION['vendor_add_invoice_date']);
    unset($_SESSION['vendor_add_invoice_no']);
    foreach ($_SESSION as $name => $value) {//for getting all products which are under session
        if ($value > 0) {
            if (substr($name, 0, 15) == 'vendor_invoice_') {
                $length = strlen($name);
                $id = substr($name, 15, $length); //getting id
                unset($_SESSION['vendor_invoice_' . $id]);
             }

        }


    }
    redirect('index.php?history_vendor&vendor_id='.$vendor_id);
}




//add invoice to record in differt tables
if(isset($_POST['proceed_vendor_invoice'])){
    $paid = escape_string($_POST['paid_amount']);
    $total_bill = $_SESSION['amount_totals_vendor_invoice'];
    $payable = $total_bill-$paid;
    $total_items = $_SESSION['items_totals_vendor_invoice'];
    $vendor_id = $_SESSION['ses_vendor']['vendor_id'];
    $invoice_date = $_SESSION['vendor_add_invoice_date'];
    $invoice_no = $_SESSION['vendor_add_invoice_no'];
    $user_id = $_SESSION['user_id'];


//    insert into tbl_purchase_from_vendor table
    foreach ($_SESSION as $name => $value) {//for getting all products which are under session
        if ($value > 0) {
            if (substr($name, 0, 15) == 'vendor_invoice_') {

                $length = strlen($name);
                $id = substr($name, 15, $length); //getting id

                $quantity = $value['product_quantity_by_vendor'];
                $purchase_price = $value['product_purchase_price'];
                $sub = $quantity*$purchase_price;

                $sql = "insert INTO tbl_purchase_from_vendor(product_id,vendor_id,invoice_number,quantity,
                        product_purchase_price,total_amount,user_id)
                        VALUES({$id},{$vendor_id},'{$invoice_no}',{$quantity},{$purchase_price},{$sub},{$user_id})";

                $query = query($sql);
                confirm($query);
                if ($query){

                    $p_sql = "update products
                                set product_quantity = product_quantity + {$quantity}
                                where product_id = {$id}";

                    $p_query = query($p_sql);
                    confirm($p_query);

                }
            }
        }
    }


//    insert into tbl_vendor_invoices table
    $sql2 = "insert INTO tbl_vendor_invoices(invoice_id,vendor_id,total_amount,total_items,paid_amount,payable_amount,invoice_date,user_id)
            VALUES('{$invoice_no}',{$vendor_id},{$total_bill},{$total_items},{$paid},{$payable},'{$invoice_date}',{$user_id});";

    $query2 = query($sql2);
    confirm($query2);
    if($query2){

//        update summary table
        $sql3 = "update vendors_bill_summary
                    set total_products = total_products + {$total_items},
                    amount_on_total_produts = amount_on_total_produts + {$total_bill},
                    paid_amount = paid_amount + {$paid},
                    remaining_amount = remaining_amount + {$payable},
                    user_id = {$user_id}
                    where vendor_id = {$vendor_id}";

        $query3 = query($sql3);
        confirm($query3);
        if($query3){
//            unset all sessions
            unset($_SESSION['ses_vendor']);
            unset($_SESSION['amount_totals_vendor_invoice']);
            unset($_SESSION['items_totals_vendor_invoice']);
            unset($_SESSION['vendor_add_invoice_date']);
            unset($_SESSION['vendor_add_invoice_no']);
            foreach ($_SESSION as $name => $value) {//for getting all products which are under session
                if ($value > 0) {
                    if (substr($name, 0, 15) == 'vendor_invoice_') {
                        $length = strlen($name);
                        $id = substr($name, 15, $length); //getting id
                        unset($_SESSION['vendor_invoice_' . $id]);
                    }

                }


            }
            set_message('New invoice generated','success');
            redirect('index.php?history_vendor&vendor_id='.$vendor_id);
        }else{
            set_message('network error to invoice generate','danger');
            redirect('index.php?history_vendor&vendor_id='.$vendor_id);
        }
    }else{
        set_message('network error to invoice generate','danger');
        redirect('index.php?history_vendor&vendor_id='.$vendor_id);
    }


}



//delete parmanent invoice from record
if (isset($_GET['delete_invoice'])){

    $invoice_no = escape_string($_GET['vendor_invoice_no']);
    $vendor_id = escape_string($_GET['vendor_id']);
    $user_id = $_SESSION['user_id'];

//    minous products from store
    $sql = "select product_id ,quantity from tbl_purchase_from_vendor where vendor_id ={$vendor_id} and invoice_number = '{$invoice_no}'";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){
        $sql2 = "update products              
            set product_quantity= product_quantity - {$row['quantity']}
            where product_id = {$row['product_id']} ";
        $query2 = query($sql2);
        confirm($query2);
    }

    //    minous invoice from vendor summary
    $sql3 = "select total_amount,total_items,paid_amount,payable_amount from tbl_vendor_invoices 
            where vendor_id ={$vendor_id} and invoice_id = '{$invoice_no}'";
    $query3 = query($sql3);
    confirm($query3);
    while ($row3 = fetch_array($query3)){
        $sql4 = "UPDATE vendors_bill_summary
                        SET total_products = total_products -  {$row3['total_items']},
                        amount_on_total_produts = amount_on_total_produts - {$row3['total_amount']},
                        paid_amount = paid_amount - {$row3['paid_amount']},
                        remaining_amount = remaining_amount - {$row3['payable_amount']},
                        user_id = {$user_id}
                        WHERE vendor_id = {$vendor_id}";

        $query4 = query($sql4);
        confirm($query4);
    }

//delete from vendor invoice
    $sql5 = "delete from tbl_vendor_invoices 
             where vendor_id ={$vendor_id} and invoice_id = '{$invoice_no}'";
    $query5 = query($sql5);
    confirm($query5);


//    delete from vendor products
    $sql6 = "delete from tbl_purchase_from_vendor 
            where vendor_id ={$vendor_id} and invoice_number = '{$invoice_no}'";
    $query6 = query($sql6);
    confirm($query6);
    if($query6){
        set_message('Invoice deleted from all aspects except purchase returns','success');
        redirect('index.php?history_vendor&vendor_id='.$vendor_id);
    }else{
        set_message('network error','danger');
        redirect('index.php?history_vendor&vendor_id='.$vendor_id);
    }
}