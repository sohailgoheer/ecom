<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/13/2018
 * Time: 3:50 PM
 */

if(isset($_GET['brand_id'])){

    $brand_id = escape_string($_GET['brand_id']);

    $sqly = "SELECT count(product_brand_id) cat_count from products where product_brand_id = {$brand_id}";
    $queryy = query($sqly);
    confirm($queryy);
    while ($rowy = fetch_array($queryy)){
        if($rowy['cat_count'] > 0){
            set_message('This Brand using in Products first delete product','danger');
            redirect('index.php?brands');
            return;
        }
    }



    $sql = "delete from brands where brand_id = {$brand_id}";
    $query = query($sql);
    confirm($query);
    if($query){
        set_message('Brand has been deleted','success');
        redirect('index.php?brands');
    }else{
        set_message('some issues in network','danger');
        redirect('index.php?brands');
    }





}