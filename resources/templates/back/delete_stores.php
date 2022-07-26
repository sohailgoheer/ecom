<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/14/2018
 * Time: 12:12 AM
 */

if(isset($_GET['delete_stores'])){


    if(isset($_GET['store_id'])){

        $store_id = escape_string($_GET['store_id']);


        $sql1 = "select count(*) store_count from tbl_products_store  where store_id = {$store_id}";
        $query1 = query($sql1);
        confirm($query1);
        while ($row = fetch_array($query1)){
            if($row['store_count'] != 0 ){
                set_message('Store have some products please delete first products','warning');
                redirect('index.php?stores');
                return;
            }
        }


        $sql3 = "delete from store_users where store_id = {$store_id}";
        $query3 = query($sql3);
        confirm($query3);



        $sql = "delete from stores where store_id = {$store_id}";
        $query = query($sql);
        confirm($query);
        if($query){

            set_message('Store has been deleted','success');
            redirect('index.php?stores');


        }else{
            set_message('Some issues in network','danger');
            redirect('index.php?stores');
        }



    }






}