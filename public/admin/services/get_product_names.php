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


$sql = "select product_id,product_title from products order by product_title";


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

