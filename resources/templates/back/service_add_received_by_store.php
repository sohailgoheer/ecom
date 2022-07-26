<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 10/5/2018
 * Time: 12:40 PM
 */


if(isset($_POST['send_money'])){

    $store_id = escape_string($_POST['store_id']);

    $amount = escape_string($_POST['amount_payable']);
    $user_id = $_SESSION['user_id'];

    $sql = "update stores_summary_report
                set last_sent_amount_to_admin = {$amount},
                total_sent_amount_to_admin = total_sent_amount_to_admin +{$amount}
                where store_id = {$store_id}";
    $query = query($sql);
    confirm($query);

    $sql2 = "insert into amount_received_by_admin(store_id,amount,user_id)
                     values ({$store_id},{$amount},{$user_id})";
    $query2 = query($sql2);
    confirm($query2);



    if($query2){
        set_message("Amount Rs.{$amount}/- has been Added", 'success');
        redirect('index.php?account_stores');
    }else{
        set_message("Some error for process" ,'danger');
        redirect('index.php?account_stores');
    }


}