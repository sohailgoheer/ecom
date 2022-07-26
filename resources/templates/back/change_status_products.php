

<?php

if(isset($_GET['id'])) {

    $id = escape_string($_GET['id']);
    $status = escape_string($_GET['status']);


    if($status == 'public'){
        $status = 'pvt';
    }else {
        $status = 'public';
    }


    $sql = "update products 
            set publish_status = '{$status}'
                where product_id = {escape_string($id)}";


    $query = query($sql);
    confirm($query);
    if ($query) {
        set_message('Status Changed','success');
        redirect('index.php?products');
    } else {
        set_message('Some Issues to delete Product','danger');
        redirect('index.php?products');
    }


}