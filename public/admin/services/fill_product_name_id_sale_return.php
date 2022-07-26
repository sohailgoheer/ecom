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

    $sql = "select DISTINCT
                (select CONCAT(f_name,' ' ,l_name) customer_name from customers WHERE customers.customer_id = tbl_invoice.customer_id) customer
                ,customer_id from tbl_invoice where store_id = {$store_id} order by invoice_no";


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