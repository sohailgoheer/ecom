<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/29/2018
 * Time: 5:31 PM
 */
if(isset($_GET['vendor_id'])){

    $vendor_id = escape_string($_GET['vendor_id']);

    $sql_update_customer = "update customers
                            set is_vendor = 0, vendor_id = NULL 
                            where vendor_id = {$vendor_id}";
    $query_update_customer = query($sql_update_customer);
    confirm($query_update_customer);
    if($query_update_customer){

        $sql = "delete from vendor where id = {$vendor_id}";
        $query = query($sql);
        confirm($query);
        if($query){
            set_message('Vendor has been deleted','success');
            redirect('index.php?vendors');
        }else{
            set_message('Error to delete vendor','danger');
            redirect('index.php?vendors');
        }
    }



}