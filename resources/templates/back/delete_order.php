
<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/4/2018
 * Time: 4:53 PM
 */
//"delete from `tbl_order` where order_id = ".$id.";
//            delete from `order_clint` where order_id = ".$id.";
//            delete from `product_order` where order_number = ".$id.";";

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $page = $_GET['page'];

    $sql = "delete from tbl_order where order_id = {escape_string($id)}";
    $query = query($sql);
    confirm($query);
    if ($query) {
        $sql1 = "delete from product_order where order_number = {escape_string($id)}";
        $query1 = query($sql1);
        confirm($query1);
        if ($query1) {
            $sql2 = "delete from order_clint where order_id = {escape_string($id)}";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
                set_message('Order has been deleted','success');
                redirect('index.php?'.$page);
            } else {
                set_message('Some Issues to delete Order','danger');
                redirect('index.php?'.$page);
            }
        } else {
            set_message('Some Issues to delete Order','danger');
            redirect('index.php?'.$page);
        }
    } else {
        set_message('Some Issues to delete Order','danger');
        redirect('index.php?'.$page);
    }


}