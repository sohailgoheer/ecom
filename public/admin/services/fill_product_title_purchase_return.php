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


if (isset($_GET['vendor_id'])) {

    $sql = '';
    $vendor_id = escape_string($_GET['vendor_id']);
    $invoice_no = escape_string($_GET['invoice_no']);

    $sql = "select 
(SELECT distinct product_title from products where products.product_id = tbl_purchase_from_vendor.product_id) product_title,
 product_id from tbl_purchase_from_vendor where vendor_id = {$vendor_id} and invoice_number = '{$invoice_no}'";


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