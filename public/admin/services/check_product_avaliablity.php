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


    $store_id = escape_string($_GET['store_id']);
    $product_id = escape_string($_GET['product_id']);

    $sql = "select  store_name,product_name ,product_quantity from (
                select (select store_location from stores where stores.store_id = tbl_products_store.store_id) as  store_name,
                (select product_title from products where products.product_id = tbl_products_store.product_id) as product_name  ,tbl_products_store.*
                from tbl_products_store where  product_id = {$product_id} and store_id = {$store_id}
                 ) foo limit 1";


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
        echo json_encode('error');

    }


}