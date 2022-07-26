
<?php

if(isset($_GET['id'])) {

    $id = escape_string($_GET['id']);

    $sql = "delete from products where product_id = {escape_string($id)}";

    $query = query($sql);
    confirm($query);
    if ($query) {
        set_message('Product has been deleted','success');
        redirect('index.php?products');
    } else {
        set_message('Some Issues to delete Product','danger');
        redirect('index.php?products');
    }


}