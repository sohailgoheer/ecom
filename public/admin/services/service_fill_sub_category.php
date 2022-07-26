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


if (isset($_GET['category_id'])) {

    $res = '';

    $id = escape_string($_GET['category_id']);

    $sql = "select sub_category_id,sub_category_name from sub_categories where category_id ={$id} order by sub_category_name";

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