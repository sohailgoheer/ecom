<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/15/2018
 * Time: 12:45 PM
 */

if(isset($_GET['customer_id'])){


    $customer_id = escape_string($_GET['customer_id']);


    $sql = "select count(*) cus_count from tbl_invoice where customer_id = $customer_id";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){

        if($row['cus_count'] > 0){

            set_message('selected customer avaliable in invoice first delete invoice of selected customer','danger');
            redirect('index.php?customers');
            return;
        }

    }


    $sql_update_vendor = "update vendor
                            set is_customer = 0, customer_id = NULL 
                            where customer_id ={$customer_id} ";
    $query_update_vendor = query($sql_update_vendor);
    confirm($query_update_vendor);
    if ($query_update_vendor){
        $sql = "delete from customers where customer_id = {$customer_id}";
        $query = query($sql);
        confirm($query);
        if($query){

            set_message('Customer has been deleted','success');
            redirect('index.php?customers');


        }else{
            set_message('Internet Issue Customer not delete','danger');
            redirect('index.php?customers');
        }
    }
}