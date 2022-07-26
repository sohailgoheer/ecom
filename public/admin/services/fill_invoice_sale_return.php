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
    $customer_id = escape_string($_GET['customer_id']);

    $sql = "select distinct invoice_no from tbl_invoice where  customer_id ={$customer_id}  and store_id = {$store_id}";


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