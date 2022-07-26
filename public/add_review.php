<?php require_once ('../resources/config.php'); ?>


<?php

if(isset($_POST['post_review'])){
    $userName = escape_string($_POST['userName']);
    $email = escape_string($_POST['email']);
    $product_id = escape_string($_POST['product_id']);
    $comment = escape_string($_POST['comment']);

    $sql = "insert into reviews (name,email,comment,product_id)
                values ('{$userName}','{$email}','{$comment}',{$product_id})";

    $query = query($sql);
    confirm($query);
    if ($query){
        set_message('Submit your Comment','success');
        redirect("item.php?id=".$product_id);
    }else{
        set_message('Some Erors to post comment','danger');
        redirect("item.php?id=".$product_id);
    }

}else{
    set_message('Some Erors to post comment','danger');
}











?>
