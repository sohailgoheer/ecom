<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 10/5/2018
 * Time: 12:40 PM
 */


if(isset($_GET['order_id'])){

    $order_id = escape_string($_GET['order_id']);
    $user_id = $_SESSION['user_id'];


    $sql = "update tbl_order
            set  order_status = 'Canceled' ,effecte_by_user = {$user_id}
            where order_id = {$order_id}";



    $query = query($sql);
    confirm($query);
    if($query){
        set_message("Order Canceled", 'success');
        redirect('index.php?order_cancel');
    }else{
        set_message("Some error for process" ,'danger');
        redirect('index.php?order_pending');
    }


}