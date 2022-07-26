

<?php

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "delete from slides where slide_id = {escape_string($id)}";
    $query = query($sql);
    confirm($query);

    $pic_path = "../../resources/uploads/".escape_string($_GET['imaage_name']);
    unlink($pic_path);
    if ($query) {
        set_message('Slider deleted','success');
        redirect('index.php?slides');
    } else {
        set_message('Some Issues to delete Slider','danger');
        redirect('index.php?slides');
    }
}