<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/18/2018
 * Time: 2:15 PM
 */

 if(isset($_GET['review_id'])){


     $review_id = escape_string($_GET['review_id']);
     $product_id = escape_string($_GET['product_id']);

     $sql = "delete from reviews where id = {$review_id} and product_id = {$product_id}";

     $query = query($sql);
     confirm($query);
     if($query){

         set_message('Review has been deleted','success');
         redirect('index.php?product_reviews&id='.$product_id);


     }else{
         set_message('internet Issue','danger');
         redirect('index.php?product_reviews&id='.$product_id);
     }






 }