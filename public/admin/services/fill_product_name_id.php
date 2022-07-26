<?php include_once('../../../resources/config.php'); ?>

<?php
if (!isset($_SESSION['user'])) {
    redirect('../../../public/login.php');
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 10/18/2018
 * Time: 12:23 PM
 */


if (isset($_GET['store_id'])) {

    $sql = '';
    $store_id = escape_string($_GET['store_id']);
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if($user_role == 'admin'){
        $sql = "select product_id,product_title from products where product_id in (
                      select DISTINCT product_id from tbl_products_store where store_id   = {$store_id}
                    )                            
                     
                    order by product_title";

    }else{
        $sql = "select product_id,product_title from products where product_id in (
                                select DISTINCT product_id from tbl_products_store where store_id in (
                                    select DISTINCT store_id from store_users 
                                    where user_id = {$user_id}
                                    and store_id = {$store_id}
                                    
                                    )
                                ) 
                
                order by product_title";
    }


    $query = query($sql);
    confirm($query);
    $result = array();
    $counter = 0;
    while ($row = fetch_assoc($query)) {
        $result[$counter] = $row;
        $counter++;
    }
    if ($result) {

        echo json_encode($result);
    } else {
        echo "error";

    }


}