<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 3/15/2019
 * Time: 11:01 PM
 */


if(isset($_GET['user_id'])){


    $user_id = escape_string($_GET['user_id']);


    $sql = "delete from user_messages where id = {$user_id}";

    $query = query($sql);
    confirm($query);
    if($query){

        set_message("Message deleted","success");
        redirect("index.php?web_message");


    }else{

        set_message("Some thing wrong","warning");
        redirect("index.php?web_message");

    }







}