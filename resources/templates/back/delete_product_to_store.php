<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 3/15/2019
 * Time: 4:26 PM
 */

if(isset($_GET['delete_product_to_store'])){


    $store_id = escape_string($_GET['store_id']);
    $product_id = escape_string($_GET['product_id']);
    $quantity = escape_string($_GET['quantity']);
    $user_id = $_SESSION['user_id'];

    //        history maintain
    $sql = "insert into tbl_products_store_history(product_id,store_id,user_id,status,product_quantity)
                VALUES({$product_id},{$store_id},{$user_id},'Delete',{$quantity})";
    $query = query($sql);
    confirm($query);
    if ($query) {
//            insert into store table
        $sql2 = "delete from tbl_products_store 
                     where product_id = {$product_id}
                     and store_id = {$store_id}";
        $query2 = query($sql2);
        confirm($query2);
        if ($query2) {
            set_message('Product delete successfully', 'success');
            redirect('index.php?products_in_store&store_id=' . $store_id);

        } else {
            set_message('issue to add product', 'danger');
            redirect('index.php?products_in_store&store_id=' . $store_id);
        }
    }

}

