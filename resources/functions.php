<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 8/28/2018
 * Time: 5:14 PM
 */

//helper functions

function redirect($location){
    header("location:$location");
}

function query($sql){

    global $connection;
    return mysqli_query($connection, $sql);

}

function confirm($result){
    global $connection;
    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }

}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

//get products

function get_products(){
    $sql = "SELECT * FROM products";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){

        $product = <<<DELIMETER
                        <div class='col-sm-4 col-lg-4 col-md-4'>
                                                <div class='thumbnail'>
                                                    <a href='item.php?id={$row['product_id']}'><img src='{$row['product_image']}' alt=''></a>
                                                    <div class='caption'>
                                                        <h4 class='pull-right'>{$row['product_price']}</h4>
                                                        <h4><a href='product.html'>{$row['product_title']}</a>
                                                        </h4>
                                                        <p>See more snippets like this online store item at <a target='_blank' href='http://www.bootsnipp.com'>Bootsnipp - http://bootsnipp.com</a>.</p>
                                                        <a class='btn btn-primary' target='_blank' href='item.php?id={$row['product_id']}'>Add to cart</a>
                                                    </div>            
                                                </div>
                                            </div> 
DELIMETER;

        echo $product;
    }
}


function get_categories(){

    $sql = "select * from categories";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)){
            $category_link = <<<DELIMETER
                <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETER;
            echo $category_link;
    }
    

}





