<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/15/2018
 * Time: 12:45 PM
 */

if(isset($_GET['cart_delete_customer'])){


    $email = escape_string($_GET['customer_email']);


    $sql = "delete from order_clint where email = '{$email}' ";

    $query = query($sql);
    confirm($query);
    if($query){

        set_message('Customer has been deleted','success');
        redirect('index.php?cart_customers');


    }else{
        set_message('Internet Issue Customer not delete','danger');
        redirect('index.php?cart_customers');
    }




}