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
    $invoice_no = escape_string($_GET['invoice_no']);

    $sql = "select (SELECT product_title from products where products.product_id = tbl_invoice_products.product_id) product_title,product_id,quantity 
                from tbl_invoice_products where invoice_no = {$invoice_no} and store_id = {$store_id}";


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