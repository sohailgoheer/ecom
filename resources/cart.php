<?php require_once('config.php'); ?>

<?php

//add products to cart
if(isset($_GET['add'])){
    $location = $_GET['page'];
    $query = query("select * from products where product_id =".escape_string($_GET['add']));
    confirm($query);
    while ($row = fetch_array($query)){

        if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
            $_SESSION['product_'.$_GET['add']] += 1;
            redirect("../public/{$location}.php");
        }else{
            set_message('We only have '.$row['product_quantity'].' '.$row['product_title'].' avaliable');
            redirect('../public/checkout.php');
        }
    }



}

//remove products from cart
if(isset($_GET['remove'])){


    if($_SESSION['product_'.$_GET['remove']] > 0 ){
        $_SESSION['product_'.$_GET['remove']]--;

        unset($_SESSION['amount_totals']);
        unset($_SESSION['items_totals']);
        unset($_SESSION['cash_on_delivery']);

        redirect('../public/checkout.php');
    }else{
        redirect('../public/checkout.php');
    }

}

//remove product
if(isset($_GET['delete'])){

    $_SESSION['product_'.$_GET['delete']]='0';

    unset($_SESSION['amount_totals']);
    unset($_SESSION['items_totals']);
    unset($_SESSION['cash_on_delivery']);
    redirect('../public/checkout.php');

}


/************************Front Functions***********************/

//making cart {checkout.php}
function cart(){
    $total_amount = 0;
    $total_items = 0;
    $sub=0;
    $cash_on_delivery = 0;
    $delivery_amount = 0;
    foreach ($_SESSION as $name => $value){//for getting all products which are under session
        if($value>0){
            if(substr($name , 0,8) == 'product_'){

                $length = strlen($name);
                $id = substr($name,8,$length); //getting id

                $sql = "select * from products where product_id = {escape_string($id)}";
                $query = query($sql);
                confirm($query);
                while ($row = fetch_array($query)) {
                    $product_image = display_image($row['product_image']);
                    $discount = '';
                    $original = '';
                    if($row['product_disc_price'] != '0'){
                        $sub = $row['product_disc_price']*$value;
                        $discount = "Rs. {$row['product_disc_price']}";
                        $original = "<s style='color: #adadad'>Rs. {$row['product_price']}   </s>";
                    }else{
                        $sub = $row['product_price']*$value;
                        $discount = "<s style='color: #adadad'>Rs. 00   </s>";
                        $original = "Rs. {$row['product_price']}";
                    }

                    $delivery_amount = $row['cash_on_delivery'];


                    $product = <<<DELIMETER
                    <tr>
                        <td><a href="item.php?id={$row['product_id']}">{$row['product_title']} </a></td>
                        <td><img style="width: 100px; height: 50px;" src="../resources/{$product_image}" class="img-thumbnail img-responsive"></td>
                        <td> {$discount}</td>
                        <td>{$original}</td>
                        <td>{$value}</td>
                        <td>Rs. {$sub}</td>
                        <td>
                            <a class="btn btn-warning" href="../resources/cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"></span></a> 
                            <a class="btn btn-success" href="../resources/cart.php?add={$row['product_id']}&page=checkout"><span class="glyphicon glyphicon-plus"></span></a> 
                            <a class="btn btn-danger" href="../resources/cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>  
                        </td>
                                    
                    </tr>
DELIMETER;

                    echo $product;
                 }
                $_SESSION['amount_totals'] = $total_amount += $sub;
                $_SESSION['items_totals'] = $total_items += $value;
                if($delivery_amount > $cash_on_delivery){
                    $_SESSION['cash_on_delivery'] = $cash_on_delivery = $delivery_amount;
                }else{
                    $_SESSION['cash_on_delivery'] = $cash_on_delivery ;
                }


            }
        }


    }
}

//fill form {proceed.php}
function cart_proceed(){
    foreach ($_SESSION as $name => $value){//for getting all products which are under session
        if($value>0){
            if(substr($name , 0,8) == 'product_'){
                $length = strlen($name);
                $id = substr($name,8,$length); //getting id
                $sql = "select * from products where product_id = {escape_string($id)}";
                $query = query($sql);
                confirm($query);
                while ($row = fetch_array($query)) {

                    $product_proceed = <<<DELIMETER
                    <tr class="cart-subtotal">
                            <th>{$row['product_title']} <span class="glyphicon glyphicon-remove"></span> {$value}</th>
                            <td><span class="amount"> Rs. {$row['product_price']} </span></td>
                    </tr>
                    
DELIMETER;

                    echo $product_proceed;
                }
            }
        }
    }
}

//submit form {thank_you.php}
function place_order(){

    if(isset($_POST['place_order'])){
        $order_primary_id = '';
        $date_time = '';
        $fname      =  escape_string($_POST['fname']);
        $lname      =  escape_string($_POST['lname']);
        $email      =  escape_string($_POST['email']);
        $phone      =  escape_string($_POST['phone']);
        $street     =  escape_string($_POST['street']);
        $town       =  escape_string($_POST['town']);
        $province   =  escape_string($_POST['province']);
        $comment    =  escape_string($_POST['comment']);

        $sql0 = "INSERT INTO tbl_order (order_status)
                VALUES ('pending')";
        $query0 = query($sql0);
        if($query0){
            $sql = "Select order_id,date_time from tbl_order order by date_time DESC LIMIT 1;";
            $query = query($sql);
            confirm($query);
            if ($query){
                while ($id = fetch_array($query)) {
                    $order_primary_id = $id['order_id'];
                    $date_time = $id['date_time'];
                    $sql2 = "INSERT INTO order_clint (order_id,f_name,l_name,email,phone,house_street,town_city,province,comment)
                    VALUES ({$order_primary_id},'{$fname}','{$lname}','{$email}','{$phone}','{$street}','{$town}','{$province}','{$comment}'); ";
                    $query2 = query($sql2);
                    confirm($query2);
                    if ($query2){
                        foreach ($_SESSION as $name => $value){//for getting all products which are under session
                            if($value>0){
                                if(substr($name , 0,8) == 'product_'){
                                    $length = strlen($name);
                                    $id = substr($name,8,$length); //getting id
                                    $sql3 = "select *  from products where product_id = {escape_string($id)}";
                                    $query3 = query($sql3);
                                    confirm($query3);
                                    while ($row = fetch_array($query3)) {

                                        $sql4 = "INSERT INTO product_order (order_number,product_id,quantity,sale_price,discount_price)
                                            VALUES({$order_primary_id},{$row['product_id']},{$value},{$row['product_price']},{$row['product_disc_price']})";
                                        $query4 = query($sql4);
                                        confirm($query4);
                                        if ($query4){
                                            set_message('Thank you. Your order has been received.','success');
                                            redirect("thank_you.php?date_time={$date_time}&order_id={$order_primary_id}");
                                        }else{
                                            set_message('Internet Issue please contact later','danger');
                                        }

                                    }
                                }
                            }
                        }
                    }
                }

            }else{
                set_message('Internet Issue please try later');
            }

        }
    }

}



?>
