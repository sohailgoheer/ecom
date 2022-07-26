<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 8/28/2018
 * Time: 5:14 PM
 */

/***********************************************************************************************************************/
/***********************************************************HELPER FUNCTION*********************************************/
/***********************************************************************************************************************/
$upload_directory = 'uploads';

function display_image($picture)
{
    global $upload_directory;
    return $upload_directory . DS . $picture;
}

function last_id()
{

    global $connection;

    return mysqli_insert_id($connection);


}

function set_message($msg, $class)
{
    if (!empty($msg)) {
        $alert_msg = "<div class='alert alert-" . $class . " col-md-12'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Alert !</strong> " . $msg . "
                        </div>";
        $_SESSION['message'] = $alert_msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
//    session_start();
    if (isset($_SESSION['message'])) {
//        echo "<div class='alert alert-".$class." col-md-12'>".$_SESSION['message']."</div>";
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function no_record_found()
{
    echo "<div class='alert alert-danger col-md-12'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Alert !</strong> No Record Found
                        </div>";
    return;
}

function redirect($location)
{
    header("location:$location");
}

function query($sql)
{

    global $connection;
    return mysqli_query($connection, $sql);

}

function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    }

}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function fetch_assoc($result)
{
    return mysqli_fetch_assoc($result);
}

function check_parameters_upload($file_name, $size)
{
    $_SESSION['return_msg_image'] = '';

    $supported_image_format = array('gif', 'jpg', 'jpeg', 'png');
    if ($size > '2000000') {
        $_SESSION['return_msg_image'] = 'Image Size greater than 1 MB';
        return false;
    }
    $image_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
    if (in_array($image_ext, $supported_image_format)) {
    } else {
        $_SESSION['return_msg_image'] = 'upload not in acceptable format';
        return false;
    }
    return true;
}


/****************************************************************************************************/
/****************************************************************************************************/
/******************************************FRONT END FUNCTIONS***************************************/
/****************************************************************************************************/
/****************************************************************************************************/


/************************************************************/
//index.php
/************************************************************/
function get_new_in_products()
{
    $sql = "SELECT * ,SUBSTRING(product_short_description, 1, 20) as sub_description  
              FROM products where publish_status = 'public' order by date_time desc limit 3";
    $query = query($sql);
    confirm($query);

    $heading = true;
    while ($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        if ($row['product_disc_price'] != '0') {
            $discount_button = "<span class='pull-right'><span class='label label-danger blink'> Sale</span> <strong>  Rs. {$row['product_disc_price']}</strong></span>";
            $sale_price = "<s style='color: #adadad'>Rs. {$row['product_price']}</s>";
        } else {
            $discount_button = '';
            $sale_price = "Rs. {$row['product_price']}";
        }

        if ($heading == true) {
            echo '<h4 class="breadcrumb"><span class="glyphicon glyphicon-share-alt"><span> NEW ARRIVALS</h4>';
            $heading = false;
        }

        $product = <<<DELIMETER
                        
                        <div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='thumbnail'>
                                <a href='item.php?id={$row['product_id']}'><img style="height: 300px" class="img-responsive img-thumbnail" src='../resources/{$product_image}' alt=''></a>
                                <div class='caption'>                                                    
                                    <h4 class='pull-right'>{$sale_price}</h4>
                                    <h4><a href='item.php?id={$row['product_id']}'>{$row['product_title']}</a> </h4>
                                    

                                    <a class='btn btn-primary pull-left'   href='../resources/cart.php?add={$row['product_id']}&page=index'> Add to <span class="glyphicon glyphicon-shopping-cart"><span></a>
                                    
                                    {$discount_button}
                                    
                                      
                                </div>            
                            </div>
                        </div> 
DELIMETER;

        echo $product;
    }
}

function get_recommend_products()
{
    $heading = true;

    $sql = "SELECT *,SUBSTRING(product_short_description, 1, 20) as sub_description 
            FROM products where publish_status = 'public' and recommend = 'top' order by date_time desc limit 3";
    $query = query($sql);
    confirm($query);

    while ($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        if ($row['product_disc_price'] != '0') {
            $discount_button = "<span class='pull-right '><span class='label label-danger blink'> Sale</span> Rs. {$row['product_price']}</span>";
            $sale_price = "<s style='color: #adadad'>Rs. {$row['product_price']}</s>";
        } else {
            $discount_button = '';
            $sale_price = "Rs. {$row['product_price']}";
        }
        if ($heading == true) {
            echo '<h4 class="breadcrumb"><span class="glyphicon glyphicon-bullhorn"><span> We Recommend</h4>';
            $heading = false;
        }
        $product = <<<DELIMETER
                        <div class='col-sm-4 col-lg-4 col-md-4'>
                                                <div class='thumbnail'>
                                                    <a href='item.php?id={$row['product_id']}'><img style="height: 300px" class="img-responsive img-thumbnail" src='../resources/{$product_image}' alt=''></a>
                                                    <div class='caption'>
                                                        <h4 class='pull-right'>                                                         
                                                            {$sale_price}
                                                          </h4>
                                                        <h4><a href='item.php?id={$row['product_id']}'>{$row['product_title']}</a> </h4>
                                                        

                                                        <a class='btn btn-primary pull-left'   href='../resources/cart.php?add={$row['product_id']}&page=index'> Add to <span class="glyphicon glyphicon-shopping-cart"><span></a>
                                                        {$discount_button}
                                                        
                                                          
                                                    </div>            
                                                </div>
                                            </div> 
DELIMETER;
        echo $product;
    }
}

function get_fan_favorit_products()
{

    $heading = true;

    $sql = "select foo.*,SUBSTRING(foo.product_short_description, 1, 20) as sub_description from
                (select * FROM products where publish_status = 'public' ) foo 
                INNER JOIN  
                (select distinct product_id from product_order order by date_time desc limit 3)foo2
                on foo.product_id = foo2.product_id
                order by foo.product_id desc";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);
        if ($row['product_disc_price'] != '0') {
            $discount_button = "<span class='pull-right '><span class='label label-danger blink'> Sale</span> Rs. {$row['product_disc_price']}</span>";
            $sale_price = "<s style='color: #adadad'>Rs. {$row['product_price']}</s>";
        } else {
            $discount_button = '';
            $sale_price = "Rs. {$row['product_price']}";
        }
        if ($heading == true) {
            echo '<h4 class="breadcrumb"><span class="glyphicon glyphicon-heart"><span> Fan Favorites</h4> ';
            $heading = false;
        }
        $product = <<<DELIMETER
                        <div class='col-sm-4 col-lg-4 col-md-4'>
                                                <div class='thumbnail'>
                                                    <a href='item.php?id={$row['product_id']}'><img style="height: 300px" class="img-responsive img-thumbnail" src='../resources/{$product_image}' alt=''></a>
                                                    <div class='caption'>
                                                        <h4 class='pull-right'>                                                         
                                                            {$sale_price}
                                                          </h4>
                                                        <h4><a href='item.php?id={$row['product_id']}'>{$row['product_title']}</a> </h4> 

                                                        <a class='btn btn-primary pull-left'   href='../resources/cart.php?add={$row['product_id']}&page=index'> Add to <span class="glyphicon glyphicon-shopping-cart"><span></a>
                                                        {$discount_button}
                                                        
                                                          
                                                    </div>            
                                                </div>
                                            </div> 
DELIMETER;
        echo $product;
    }
}

function get_on_sale_products()
{

    $heading = true;
    $sql = "SELECT *,SUBSTRING(product_short_description, 1, 20) as sub_description 
            FROM products where publish_status = 'public' and product_disc_price != 0 order by date_time desc limit 3";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);

        if ($row['product_disc_price'] != '0') {
            $discount_button = "<span class='pull-right '><span class='label label-danger blink'> Sale</span> Rs. {$row['product_disc_price']}</span>";
            $sale_price = "<s style='color: #adadad'>Rs. {$row['product_price']}</s>";
        } else {
            $discount_button = '';
            $sale_price = "Rs. {$row['product_price']}";
        }
        if ($heading == true) {
            echo '<h4 class="breadcrumb"><span class="glyphicon glyphicon-fire"><span> On Sale</h4>';
            $heading = false;
        }
        $product = <<<DELIMETER
                        <div class='col-sm-4 col-lg-4 col-md-4'>
                                                <div class='thumbnail'>
                                                    <a href='item.php?id={$row['product_id']}'><img style="height: 300px" class="img-responsive img-thumbnail" src='../resources/{$product_image}' alt=''></a>
                                                    <div class='caption'>
                                                        <h4 class='pull-right'>                                                         
                                                            {$sale_price}
                                                          </h4>
                                                        <h4><a href='item.php?id={$row['product_id']}'>{$row['product_title']}</a> </h4> 

                                                        <a class='btn btn-primary pull-left'   href='../resources/cart.php?add={$row['product_id']}&page=index'> Add to <span class="glyphicon glyphicon-shopping-cart"><span></a>
                                                        {$discount_button}
                                                        
                                                          
                                                    </div>            
                                                </div>
                                            </div> 
DELIMETER;
        echo $product;
    }
}


/************************************************************/
//index.php?admin_content
/************************************************************/
function get_notification()
{
    $sql = "";
    $arr_data = array();
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $sql = "select foo.orders,foo2.products,foo3.categories,foo4.brands
            from
            (select 'xxx' join_row, count(*) orders from tbl_order where order_status = 'pending') foo
            INNER JOIN
            (select 'xxx' join_row, count(*) products from products ) foo2
            ON foo.join_row = foo2.join_row
            INNER JOIN
            (select  count(distinct product_category_id) categories, 'xxx' join_row from products) foo3
            ON foo.join_row = foo3.join_row
            INNER JOIN
            (select  count(distinct product_brand_id) brands, 'xxx' join_row from products) foo4
            ON foo.join_row = foo4.join_row";
    } else {
        $sql = "select foo.orders,foo2.products,foo3.categories,foo4.brands
                    from
                    (select 'xxx' join_row, count(*) orders from tbl_order where order_status = 'pending' and store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    )) foo
                    INNER JOIN
                    (select sum(product_quantity) products,'xxx' join_row  from tbl_products_store where store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    )) foo2
                    ON foo.join_row = foo2.join_row
                    INNER JOIN
                    (select  count(distinct product_category_id) categories, 'xxx' join_row from products WHERE product_id in (
                    select DISTINCT product_id  from tbl_products_store where store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    )
                    )) foo3
                    ON foo.join_row = foo3.join_row
                    INNER JOIN
                    (select  count(distinct product_brand_id) brands, 'xxx' join_row from products where product_id in(
                    select DISTINCT product_id  from tbl_products_store where store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    )
                    )) foo4
                    ON foo.join_row = foo4.join_row";
    }


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $arr_data[0] = $row['orders'];
        $arr_data[1] = $row['products'];
        $arr_data[2] = $row['categories'];
        $arr_data[3] = $row['brands'];

    }
    return $arr_data;


}

function display_online_transactions()
{

    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    if ($user_role == 'admin') {
        $sql = "select order_number,sum(quantity) quantity,date_time,
                CASE
                    WHEN discount_price = 0 THEN sale_price
                    ELSE discount_price
                END as amount  from product_order where order_number in(
                select order_id from tbl_order where order_status = 'Placed'
                ) group by order_number order by date_time desc limit 8";

    } else {
        $sql = "select order_number,sum(quantity) quantity,date_time,
                CASE
                    WHEN discount_price = 0 THEN sale_price
                    ELSE discount_price
                END as amount  from product_order where order_number in(
                select order_id from tbl_order where store_id in ( 
                select store_id from store_users where user_id = {$user_id} 
                ) and order_status = 'Placed'
                ) group by order_number order by date_time desc limit 8";
    }

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $transaction = <<<DELIMITER
            <tr>
                <td><div  style="font-size: medium"><a href="index.php?order_detail&order_id={$row['order_number']}">{$row['order_number']}</a></div></td>
                <td>{$row['date_time']}</td>
                <td>{$row['quantity']}</td>
                <td>Rs.{$row['amount']}/-</td>
             
            </tr>
DELIMITER;
        echo $transaction;

    }

}


function display_store_transactions()
{


    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    if ($user_role == 'admin') {
        $sql = "select invoice_no, SUM(quantity) total_items,date_time,
                    CASE
                    WHEN discount_price = 0 THEN sale_price
                    ELSE discount_price
                    END as total_amount	
                    from tbl_invoice_products  
                    GROUP BY invoice_no ORDER BY date_time desc limit 8";

    } else {
        $sql = "select invoice_no, SUM(quantity) total_items,date_time,
                    CASE
                        WHEN discount_price = 0 THEN sale_price
                        ELSE discount_price
                    END as total_amount
                        
                     from tbl_invoice_products where  invoice_no in(
                        select invoice_no  from tbl_invoice where store_id in(
                            select store_id from store_users where user_id = 3
                        )
                    ) GROUP BY invoice_no ORDER BY date_time desc limit 8";
    }

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $transaction = <<<DELIMITER
            <tr>
                <td><div  style="font-size: medium"><a href="index.php?display_invoice&page=invoice_history&invoice_no={$row['invoice_no']}">{$row['invoice_no']}</a></div></td>
                <td>{$row['date_time']}</td>
                <td>{$row['total_items']}</td>
                <td>Rs.{$row['total_amount']}/-</td>
             
            </tr>
DELIMITER;
        echo $transaction;

    }

}


/************************************************************/
//side_nav.php (template)
/************************************************************/
function get_categories()
{
    $style = "";
    $icon = "";
    $cat_id = "";

    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
    }

    $sql = "select * from categories";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {

        if ($cat_id == $row['cat_id']) {
            $style = "style='color: #3c763d;  font-weight: bold'";
            $icon = "<span class='glyphicon glyphicon-forward'></span>";
        } else {
            $style = "";
            $icon = "";
        }

        $category_link = <<<DELIMETER
                <a {$style} href='category.php?cat_id={$row['cat_id']}' class='list-group-item'>{$icon} {$row['cat_title']} </a>
DELIMETER;
        echo $category_link;
    }


}

function get_sub_categories($cat_id)
{
    $sub_cat_id = '';
    $style = "";
    $icon = "";
    if (isset($_GET['sub_cat_id'])) {
        $sub_cat_id = $_GET['sub_cat_id'];
    }

    $heading = true;
    $sql = "select *, (select cat_title from categories where categories.cat_id={$cat_id} ) cat_name from sub_categories where sub_category_id in (
              select product_sub_category_id from products where product_category_id =  {$cat_id})";
//    $sql = "select *, (select cat_title from categories where categories.cat_id=sub_categories.category_id ) cat_name from sub_categories where category_id= {$cat_id}";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {

        if ($sub_cat_id == $row['sub_category_id']) {
            $style = "style='color: #3c763d;  font-weight: bold'";
            $icon = "<span class='glyphicon glyphicon-forward'></span>";
        } else {
            $style = "";
            $icon = "";
        }

        if ($heading == true) {
            echo "<li class='list-group-item btn-success'><span class='glyphicon glyphicon-chevron-down'></span><strong> {$row['cat_name']}</strong></li>";
            $heading = false;
        }
        $sub_category_link = <<<DELIMETER
                <a $style href='category.php?cat_id={$cat_id}&sub_cat_id={$row['sub_category_id']}' class='list-group-item'>{$icon} {$row['sub_category_name']}</a>
DELIMETER;
        echo $sub_category_link;
    }


}


function post_subscriber_user(){

    if (isset($_GET['subscriber'])){
        $email = escape_string($_GET['newsletter_subscribe_email']);
        $whatsapp = escape_string($_GET['newsletter_subscribe_cell']);

        $sql = "insert into tbl_subscriber_user (email,whatsapp)
            values('{$email}','{$whatsapp}')";
        $query = query($sql);
        confirm($query);
        if($query){
            set_message('Thanks for subscription we will send you our brand news and details. You can contact us by whastapp or directly message','success');
            redirect('contact.php');
        }else{
            set_message('Try later for subscription','warning');
            redirect('contact.php');
        }
    }


}

/************************************************************/
//side_nav.php (template)
/************************************************************/
function get_brands()
{

    $style = "";
    $icon = "";
    $brand_id = "";
    if (isset($_GET['brand_id'])) {
        $brand_id = $_GET['brand_id'];
    }

    $sql = "select * from brands order by brand_name";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        if ($brand_id == $row['brand_id']) {
            $style = "style='color: #3c763d;  font-weight: bold'";
            $icon = "<span class='glyphicon glyphicon-forward'></span>";
        } else {
            $style = "";
            $icon = "";
        }
        $brand_link = <<<DELIMETER
                <a $style href='category.php?brand_id={$row['brand_id']}' class='list-group-item'>{$icon} {$row['brand_name']}</a>
DELIMETER;
        echo $brand_link;
    }


}


/*************************************************************/
//category.php
/************************************************************/
function get_products_in_cat_page()
{

    if (isset($_GET['product_title'])) {
        $product_title = escape_string($_GET['product_title']);
    } else {
        $product_title = '%';
    }

    if (isset($_GET['cat_id'])) {
        $category_id = escape_string($_GET['cat_id']);
    } else {
        $category_id = '%';
    }


    if (isset($_GET['sub_cat_id'])) {
        $sub_cat_id = escape_string($_GET['sub_cat_id']);
    } else {
        $sub_cat_id = '%';
    }

    if (isset($_GET['brand_id'])) {
        $brand_id = escape_string($_GET['brand_id']);
    } else {
        $brand_id = '%';
    }

    if (isset($_GET['range'])) {
        $range = escape_string($_GET['range']);
        $range = explode("-", $range);
        $min_range = $range[0];
        $max_range = $range[1];

        if ($min_range == 'min') {
            $min_range = "(select min(product_price) from products)";
        }
        if ($max_range == 'max') {
            $max_range = "(select max(product_price) from products)";
        }

    } else {
        $min_range = "(select min(product_price) from products)";
        $max_range = "(select max(product_price) from products)";
    }

    $sql = "SELECT *,SUBSTRING(product_short_description, 1, 20) as sub_description 
                FROM products 
                where publish_status = 'public'   
                and product_category_id LIKE '" . $category_id . "' 
                and product_sub_category_id LIKE '" . $sub_cat_id . "' 
                and product_brand_id    LIKE '" . $brand_id . "' 
                and product_title LIKE '" . $product_title . "'
                and product_price  BETWEEN $min_range  AND $max_range
                order by date_time desc";



    $query = query($sql);

    confirm($query);
    if (mysqli_num_rows($query) != 0) {
        while ($row = fetch_array($query)) {
            $product_image = display_image($row['product_image']);
            if ($row['product_disc_price'] != '0') {
                $discount_button = "<span class='pull-right '><span class='label label-danger blink'> Sale</span> Rs. {$row['product_disc_price']}</span>";
                $sale_price = "<s style='color: #adadad'>Rs. {$row['product_price']}</s>";
            } else {
                $discount_button = '';
                $sale_price = "Rs. {$row['product_price']}";
            }
            $product_by_cat = <<<DELIMETER
                      <div class='col-sm-4 col-lg-4 col-md-4'>
                                                <div class='thumbnail'>
                                                    <a href='item.php?id={$row['product_id']}'><img style="height: 300px" class="img-responsive img-thumbnail" src='../resources/{$product_image}' alt=''></a>
                                                     
                                                    
                                                    <div class='caption'>                                                    
                                                        <h4 class='pull-right'>{$sale_price}</h4>
                                                        <h4 style="text-align: left;"><a href='item.php?id={$row['product_id']}'>{$row['product_title']}</a> </h4>
                                                        <a class='btn btn-primary pull-left'   href='../resources/cart.php?add={$row['product_id']}&page=index'> Add to <span class="glyphicon glyphicon-shopping-cart"><span></a>
                                                        
                                                        {$discount_button}
                                                    </div>        
                                                </div>
                                            </div> 
DELIMETER;

            echo $product_by_cat;
        }
    } else {
        set_message('Selected Product not Avaliable in store', 'danger');
    }


}

function get_search_type_name()
{

    if (isset($_GET['product_title'])) {
        $sql = "select '" . $_GET['product_title'] . "' as type_name from products where product_title like '%{$_GET['product_title']}%' limit 1";

    }

    if (isset($_GET['cat_id'])) {
        $sql = "select cat_title as type_name from categories where cat_id = {$_GET['cat_id']}";
    }

    if (isset($_GET['sub_cat_id'])) {

        $sql = "select CONCAT(type_name,' >> ',sub_cat_name) type_name from(
                select (select sub_category_name as sub_type_name from sub_categories where sub_category_id = {$_GET['sub_cat_id']}) sub_cat_name,
                cat_title as type_name from categories where cat_id = {$_GET['cat_id']}
                ) foo";
    }

    if (isset($_GET['brand_id'])) {
        $sql = "select brand_name as type_name from brands where brand_id = {$_GET['brand_id']}";
    }
    if (isset($_GET['range'])) {
        $range = escape_string($_GET['range']);
        $range = explode("-", $range);
        $min_range = $range[0];
        $max_range = $range[1];

        if ($min_range == 'min') {
            $min_range = "00";
        }
        if ($max_range == 'max') {
            $max_range = ">>";
        }

        $sql = "SELECT '" . $min_range . " - " . $max_range . "' as type_name FROM products limit 1";

    }



    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $type_name = $row['type_name'];
        $get_search_type_name = <<<DELIMETER

                        <h4 class="breadcrumb"> Home >> Search >> <strong>{$type_name}</strong> </h4>


DELIMETER;

        echo $get_search_type_name;


    }


}


/*************************************************************/
//shop.php
/************************************************************/
function get_products_in_shop_page()
{
    $sql = " SELECT *,SUBSTRING(product_short_description, 1, 20) as sub_description FROM products where publish_status = 'public' ";
    $per_page = 12;

    $query = query($sql);
    confirm($query);
    $rows = mysqli_num_rows($query); // Get total of mumber of rows from the database
    if ($rows == 0) {
        echo "<h3> No Record Found</h3>";
        return;
    }

    if (isset($_GET['page'])) { //get page from URL if its there

        $page = preg_replace('#[^0-9]#', '', $_GET['page']);//filter everything but numbers

    } else {// If the page url variable is not present force it to be number 1

        $page = 1;

    }

    $perPage = $per_page; // Items per page here
    $lastPage = ceil($rows / $perPage); // Get the value of the last page


// Be sure URL variable $page(page number) is no lower than page 1 and no higher than $lastpage
    if ($page < 1) { // If it is less than 1

        $page = 1; // force if to be 1

    } elseif ($page > $lastPage) { // if it is greater than $lastpage

        $page = $lastPage; // force it to be $lastpage's value

    }

    $middleNumbers = ''; // Initialize this variable

// This creates the numbers to click in between the next and back buttons
    $sub1 = $page - 1;
    $sub2 = $page - 2;
    $add1 = $page + 1;
    $add2 = $page + 2;
    if ($page == 1) {

        $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a></li>';

    } elseif ($page == $lastPage) {

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';

    } elseif ($page > 2 && $page < ($lastPage - 1)) {

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub2 . '">' . $sub2 . '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a></li>';

        $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add2 . '">' . $add2 . '</a></li>';

    } elseif ($page > 1 && $page < $lastPage) {

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page= ' . $sub1 . '">' . $sub1 . '</a></li>';

        $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a></li>';

    }
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query

    $limit = 'LIMIT ' . ($page - 1) * $perPage . ',' . $perPage;

// $query2 is what we will use to to display products with out $limit variable

    $sql2 = $sql . ' ' . $limit;
    $query2 = query($sql2);
    confirm($query2);

    $outputPagination = ""; // Initialize the pagination output variable

    // If we are not on page one we place the back link

    if ($page != 1) {

        $prev = $page - 1;

        $outputPagination .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $prev . '">Back</a></li>';
    }

    // Lets append all our links to this variable that we can use this output pagination

    $outputPagination .= $middleNumbers;


// If we are not on the very last page we the place the next link

    if ($page != $lastPage) {

        $next = $page + 1;

        $outputPagination .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $next . '">Next</a></li>';

    }
// Doen with pagination
// Remember we use query 2 below :)

    while ($row = fetch_array($query2)) {
        $product_display_images = display_image($row['product_image']);

        if ($row['product_disc_price'] != '0') {
            $discount_button = "<span class=' pull-right '><span class='label label-danger blink'> Sale</span> Rs {$row['product_disc_price']}.00</span>";
            $sale_price = "<s style='color: #adadad'>Rs {$row['product_price']}.00</s>";
        } else {
            $discount_button = '';
            $sale_price = "Rs {$row['product_price']}.00";
        }

        $product_title = $row['product_title'];
        $product_id = $row['product_id'];
        $sub_description = $row['sub_description'];

        $product = <<<DELIMETER


                        <div class='col-md-3 col-sm-6 hero-feature'>
                            <div class='thumbnail'>
                                <a href='item.php?id={$product_id}'><img style="height: 300px" class="img-responsive img-thumbnail" src='../resources/{$product_display_images}' alt=''></a>
                                <div class='caption'>
                                    <h4 class='pull-right'>                                                         
                                        {$sale_price}
                                      </h4>
                                    <h4 class=""><a href='item.php?id={$product_id}'>{$product_title}</a> </h4> 
                            
                                    <a class='btn btn-primary pull-left'   href='../resources/cart.php?add={$product_id}&page=index'> Add to <span class="glyphicon glyphicon-shopping-cart"><span></a>
                                    {$discount_button}
                                    
                                      
                                </div>            
                            </div>
                        </div> 

DELIMETER;

        echo $product;

    }

    echo " <div class='text-center col-xs-12'><ul class='pagination'>{$outputPagination}</ul></div>";
}


/*************************************************************/
//user.php
/************************************************************/
function login_user()
{

    if (isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' limit 1";
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            if (mysqli_num_rows($query) == 0) {
                set_message("Your UserName or Password is wrong", 'danger');
                redirect('login.php');
            } elseif ($row['status'] == 'Ban') {
                set_message("Your Status Is Deactivated by Admin", 'warning');
                redirect('login.php');
            } else {
                $_SESSION['user_id'] = $row['user_id'];

                $_SESSION['user'] = $username;
                $_SESSION['user_role'] = $row['role'];
                redirect('admin');
            }
        }

    }

}


/*************************************************************/
//contectUs
/************************************************************/
function send_message()
{

    if (isset($_POST['submit'])) {

        $name = escape_string($_POST['name']);
        $email = escape_string($_POST['email']);
        $subject = escape_string($_POST['subject']);
        $message = escape_string($_POST['message']);

        $sql = "INSERT INTO user_messages(username,email,subject,message) values ('{$name}','{$email}','{$subject}','{$message}')";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message($name . '! Your Message Sent to Admin', 'success');
            redirect('contact.php');
        } else {
            set_message('Internet Issue please contact later', 'daanger');
            redirect('contact.php');
        }


    }


}

function get_shop_detail()
{

    $data = array();
    $sql = "select * from shop_profile ";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $data[0] = $row['email'];
        $data[1] = $row['contact_no'];
        $data[2] = $row['whatsapp'];
        $data[3] = $row['address'];
        $data[5] = $row['message'];
        $data[6] = $row['facebook_link'];
        $data[7] = $row['tweeter_link'];
        $data[8] = $row['youtube_link'];
        $data[9] = $row['insta_link'];
    }

    return $data;
}
/*************************************************************/
//item.php
/************************************************************/


function get_reviews()
{

    if (isset($_GET['id'])) {
        $product_id = escape_string($_GET['id']);
    }
    $sql = "select * from reviews where product_id = " . $product_id . " order by date_time desc";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $reviews = <<<DELIMETER
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-12">                        
                               
                               
                                <p>{$row['comment']}</p>
                                 <strong>{$row['name']}</strong>
                                 <span class="pull-right text-primary">{$row['date_time']}</span>
                            </div>
                        </div>
DELIMETER;

        echo $reviews;

    }


}


/***************************************************************************************************/
/***************************************************************************************************/
/******************************************Admin FUNCTIONS***************************************/
/***************************************************************************************************/
/***************************************************************************************************/


/*************************************************************/
//index.php?reports
/*************************************************************/
function fill_store_drop_down_reports()
{

    $role = "";
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $role = "";
    } else {
        $role = "where store_id in (
                    select store_id from store_users where user_id = {$user_id}
                    )";
    }

    $sql = "select store_id,store_location from stores {$role} order by store_location";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELEMITER
    
                        <option value="{$row['store_id']}">{$row['store_location']}</option>


DELEMITER;

        echo $stores;

    }
}

function search_report()
{
    $role = "";
    $arr_data = array();
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];


    if (isset($_POST['search_report'])) {
        $role = "";
        $start_date = escape_string($_POST['start_date']);
        $end_date = escape_string($_POST['end_date']);
        $store_id = escape_string($_POST['store_name']);

        if ($store_id == '%') {
            if ($user_role == 'admin') {
                $role = " like '%' ";
            } else {
                $role = " in (select store_id from store_users where user_id = {$user_id}) ";
            }
        } else {
            $role = " = {$store_id}";
        }


        $sql2 = "select (select store_location  from stores where stores.store_id = '{$store_id}') store_n,'{$store_id}' store_id,'{$start_date}' as start_d,'{$end_date}' as end_d,
                    IFNULL(online_order.order_quantity,0) as order_quantity,
                    IFNULL(online_order.order_clint_cash_on_sold_items,0) as order_clint_cash_on_sold_items,
                    
                    IFNULL(invoice.invoice_quantity,0) as invoice_quantity,
                    IFNULL(invoice.invoice_cash_on_sold_items,0) as invoice_cash_on_sold_items,
                    
                    IFNULL((online_order.order_quantity + invoice.invoice_quantity),0) as combine_quantity,
                    IFNULL((online_order.order_clint_cash_on_sold_items + invoice.invoice_cash_on_sold_items),0) as combine_cash
                    from
                    (	 
                        select 'x' as for_join, IFNULL(SUM(foo.quantity),0) as order_quantity,(IFNULL(SUM(foo.cash_on_sold_items),0) * IFNULL(SUM(foo.quantity),0)) order_clint_cash_on_sold_items
                        FROM(
                            select IFNULL(quantity,0) as quantity , 
                            CASE
                                    WHEN discount_price = 0 THEN sale_price
                                     
                                    ELSE discount_price
                            END
                            as cash_on_sold_items  
                            from product_order where order_number in(
                            select order_id from tbl_order 
                            where order_status = 'Placed' 
                            and store_id {$role}
                            and DATE(date_time) BETWEEN  '{$start_date}' and '{$end_date}'
                            )
                        )foo
                    ) online_order
                    INNER JOIN 
                    (	 
                        SELECT 'x' as for_join,IFNULL(SUM(foo.quantity),0) invoice_quantity, (IFNULL(SUM(foo.cash_on_sold_items),0) * IFNULL(SUM(foo.quantity),0)) invoice_cash_on_sold_items
                        from (
                            select IFNULL(quantity,0) as quantity, 
                                CASE
                                        WHEN discount_price = 0 THEN sale_price			 
                                        ELSE discount_price
                                END
                                as cash_on_sold_items
                             from tbl_invoice_products
                                where store_id {$role}
                                AND   DATE(date_time) BETWEEN  '{$start_date}' and '{$end_date}'
                             
                        ) foo
                    ) invoice
                    on invoice.for_join = online_order.for_join";

        $query2 = query($sql2);
        confirm($query2);
        while ($row2 = fetch_array($query2)) {
            $arr_data[0] = $row2['order_quantity'];
            $arr_data[1] = $row2['order_clint_cash_on_sold_items'];

            $arr_data[2] = $row2['invoice_quantity'];
            $arr_data[3] = $row2['invoice_cash_on_sold_items'];

            $arr_data[4] = $row2['combine_quantity'];
            $arr_data[5] = $row2['combine_cash'];


            $arr_data[6] = $row2['start_d'];
            $arr_data[7] = $row2['end_d'];

            $arr_data[8] = $row2['store_n'];
            $arr_data[9] = $row2['store_id'];


        }
    } else {

        if ($user_role == 'admin') {
            $role = " like '%' ";
        } else {
            $role = " in (select store_id from store_users where user_id = {$user_id}) ";
        }

        $start_date = date("Y-m-d", strtotime("-1 month"));
        $end_date = date("Y-m-d");
        $sql2 = "select '{$start_date}' as start_d,'{$end_date}' as end_d,IFNULL(online_order.order_quantity,0) as order_quantity,IFNULL(online_order.order_clint_cash_on_sold_items,0) as order_clint_cash_on_sold_items,IFNULL(invoice.invoice_quantity,0) as invoice_quantity,IFNULL(invoice.invoice_cash_on_sold_items,0) as invoice_cash_on_sold_items,
                    IFNULL((online_order.order_quantity + invoice.invoice_quantity),0) as combine_quantity,IFNULL((online_order.order_clint_cash_on_sold_items + invoice.invoice_cash_on_sold_items),0) as combine_cash
                    from
                    (	-- online sale
                        select 'x' as for_join, IFNULL(SUM(foo.quantity),0) as order_quantity,IFNULL(SUM(foo.cash_on_sold_items),0) order_clint_cash_on_sold_items
                        FROM(
                            select IFNULL(quantity,0) as quantity, 
                            CASE
                                    WHEN discount_price = 0 THEN sale_price
                                     
                                    ELSE discount_price
                            END
                            as cash_on_sold_items  from product_order where order_number in(
                            select order_id from tbl_order 
                            where order_status = 'Placed' 
                            and store_id {$role}
                            and DATE(date_time) BETWEEN  '{$start_date}' and '{$end_date}'
                            )
                        )foo
                    ) online_order
                    INNER JOIN 
                    (	-- invoice
                        SELECT 'x' as for_join,IFNULL(SUM(foo.quantity),0) invoice_quantity,IFNULL(SUM(foo.cash_on_sold_items),0) invoice_cash_on_sold_items
                        from (
                            select IFNULL(quantity,0) quantity , 
                                CASE
                                        WHEN discount_price = 0 THEN sale_price			 
                                        ELSE discount_price
                                END
                                as cash_on_sold_items
                             from tbl_invoice_products
                                where store_id {$role}
                                AND   DATE(date_time) BETWEEN   '{$start_date}' and '{$end_date}'
                             
                        ) foo
                    ) invoice
                    on invoice.for_join = online_order.for_join";

        $query2 = query($sql2);
        confirm($query2);
        while ($row2 = fetch_array($query2)) {
            $arr_data[0] = $row2['order_quantity'];
            $arr_data[1] = $row2['order_clint_cash_on_sold_items'];

            $arr_data[2] = $row2['invoice_quantity'];
            $arr_data[3] = $row2['invoice_cash_on_sold_items'];

            $arr_data[4] = $row2['combine_quantity'];
            $arr_data[5] = $row2['combine_cash'];


            $arr_data[6] = $row2['start_d'];
            $arr_data[7] = $row2['end_d'];


        }
    }

//    echo $sql2;
//    return;

    return $arr_data;
}


/*************************************************************/
//index.php?start_invoice
/*************************************************************/
function get_invoice_number()
{
    unset($_SESSION['invoice_no']);
    $sql = "select invoice_no from tbl_invoice ORDER BY date_time desc limit 1";
    $query = query($sql);
    confirm($query);

    if (mysqli_num_rows($query) == 0) {
        $_SESSION['invoice_no'] = 1;
        echo $_SESSION['invoice_no'];
        return;
    }
    while ($row = fetch_array($query)) {
        $invoice_num = $row['invoice_no'];
        $invoice_num += 1;

        $_SESSION['invoice_no'] = $invoice_num;
        echo $_SESSION['invoice_no'];

    }
}

function fill_store_name_in_invoice()
{
    $sql = '';
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $sql = "select store_id,store_location from stores order by store_location";

    } else {
        $sql = "select store_id,store_location from stores where store_id in (
                  select DISTINCT store_id from store_users where user_id = {$user_id})";
    }


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELEMITER
    
                        <option value="{$row['store_id']}">{$row['store_location']}</option>


DELEMITER;

        echo $stores;

    }
}

function display_invoice_customers()
{

    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    $role = "";
    if ($user_role == 'admin') {
        $role = " where customer_id in (select customer_id from tbl_invoice) ";
    } else {
        $role = " where store_id in (select store_id from store_users where user_id = {$user_id})  and customer_id in (select customer_id from tbl_invoice)";
    }

    $row_number = 1;
    $sql = "select store_id,vendor_id,(select store_location from stores where stores.store_id  = customers.store_id) store_name,customer_id, 
                CONCAT(f_name,' ',l_name) cus_name, email, phone, is_vendor    
                from customers {$role} 
              ORDER BY store_id";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $type = '';
        if ($row['is_vendor'] == '1') {
            $type = 'Vendor/Customer';
        } else {
            $type = 'Customer';
        }

        $vendors = <<<DELIMITER

                <tr>
                     
                    <td> <span class="fa fa-bank"></span> {$row['store_name']}</td>  
                    <td><div class="label label-primary" style="font-size: medium">{$row['customer_id']}</div></td>  
                    <td><div class="label label-warning" style="font-size: medium">{$row['vendor_id']}</div></td> 
                    <td><a href="index.php?customer_view&customer_id={$row['customer_id']}"> {$row['cus_name']}</a></td> 
                     <td>{$type}</td> 
                    <td>{$row['phone']}</td> 
                    <td>{$row['email']}</td>  
                    <td>
                         <a class="btn btn-success" href="index.php?invoice_history&customer_id={$row['customer_id']}"><i class="fa fa-book"></i> History</a> 
                                                
                    </td>
                </tr>


DELIMITER;

        echo $vendors;
        $row_number++;
    }
}




function fill_products_ids_in_invoice()
{
    $store_id = $_SESSION['store_id'];

    $sql = "select product_id,product_title from products where product_id in (
                            select DISTINCT product_id from tbl_products_store where store_id = {$store_id}
                            ) 
            and publish_status = 'public'
            order by product_title";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $products = <<<DELEMITER
    
                        <option value="{$row['product_id']}">ID: {$row['product_id']} | Title: {$row['product_title']}</option>


DELEMITER;

        echo $products;

    }
}

function add_product_to_invoice()
{
    if (isset($_POST['add_product'])) {


        $product_id = escape_string($_POST['product_Id']);

        $store_id = $_SESSION['store_id'];

        $user_id = $_SESSION['user_id'];
        $user_role = $_SESSION['user_role'];

        $sql = "select product_id,product_quantity from tbl_products_store where product_id = {$product_id}
                   and store_id = {$store_id} 
                   limit 1";


        $query = query($sql);
        confirm($query);
        if (mysqli_num_rows($query) == 0) {
            no_record_found();
        }

        while ($row = fetch_array($query)) {

            if (!isset($_SESSION['admin_product_' . $row['product_id']])) {
                $_SESSION['admin_product_' . $row['product_id']] = 0;
            }

            if ($row['product_quantity'] != $_SESSION['admin_product_' . $row['product_id']]) {

                $_SESSION['admin_store_' . $row['product_id']] = $store_id;

                $_SESSION['admin_product_' . $row['product_id']] += 1;
                set_message('Selected Product Successfully added to invoice ', 'success');

            } else {
                set_message('We only have ' . $row['product_quantity'] . ' available', 'warning');
            }

        }

    }
}

function display_invoice()
{

    $total_amount = 0;
    $total_items = 0;
    $row_number = 1;
    foreach ($_SESSION as $name => $value) {//for getting all products which are under session
        if ($value > 0) {
            if (substr($name, 0, 14) == 'admin_product_') {

                $length = strlen($name);
                $id = substr($name, 14, $length); //getting id

                $sql = "select * from products where product_id = {escape_string($id)}";
                $query = query($sql);
                confirm($query);
                while ($row = fetch_array($query)) {


                    if ($row['product_disc_price'] != '0') {
                        $sub = $row['product_disc_price'] * $value;
                    } else {
                        $sub = $row['product_price'] * $value;
                    }
                    $serial_no = '';
                    for ($i = 1; $i <= $value; $i++) {
                        $serial_no .= "<input type='text' name='serial_product[]' class='form-control' style='margin-bottom: 5px'/>
                                       <input type='hidden' name='serial_product_id[]' value='{$row['product_id']}'/>";
                    }


                    $products = <<<DELIMETER
                    <tr >
                        <td>{$row_number}</td>
                        <td><strong>{$row['product_id']}</strong><input type="hidden" class="form-control" disabled name="product_id" value="{$row['product_id']}" / ></td>
                        <td><a href="index.php?view_product&page=start_invoice&product_id={$row['product_id']}"><strong>{$row['product_title']}</strong></a></td>
                        <td>{$serial_no}</td>
                        <td>{$value}</td>
                        <td>{$row['product_price']}</td>
                        <td>{$row['product_disc_price']}</td>
                        <td>{$sub}</td>
                        <td>
                        <div class="btn-group">
                            <a href="index.php?services_invoice&admin_remove&product_id={$row['product_id']}" class="btn btn-warning"><span class="fa fa-minus-square"></span>  </a>
                            <a href="index.php?services_invoice&add_to_invoice&product_id={$row['product_id']}" class="btn btn-success"><span class="fa fa-plus-square"></span>  </a>
                            <a href="index.php?services_invoice&delete_from_invoice&product_id={$row['product_id']}" class="btn btn-danger"><span class="fa fa-trash"></span>  </a>
                        </div>
                        </td>
        
                    </tr>
DELIMETER;

                    echo $products;
                }
                $_SESSION['admin_amount_totals'] = $total_amount += $sub;
                $_SESSION['admin_items_totals'] = $total_items += $value;
                $row_number++;
            }
        }


    }


}

function invoice_history($customer_id)
{



    $sql = "select foo.*,foo1.* from
                (
                select  customer_id,    (select CONCAT(f_name,'  ',l_name) cus_name from customers where customers.customer_id =tbl_invoice.customer_id) customer_name,
                invoice_no, date(date_time) date_time,total_amount,received_amount, remaining_amount  
                from tbl_invoice 
                 where  customer_id = {$customer_id}
                ORDER BY invoice_no DESC
                )foo
                 INNER JOIN
                (
                select invoice_no,customer_id,DATE(date_time) date_time ,count(*) items,sum(quantity) total_products
                from tbl_invoice_products
                where customer_id = {$customer_id}
                GROUP BY invoice_no
                order by date_time desc
                ) foo1
                on foo.customer_id= foo1.customer_id and foo.invoice_no = foo1.invoice_no 
                order by foo.date_time desc";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $invoices = <<<DELIMITER
         
         
         
         
          <tr>
          
                 
                <td><div class="label label-primary" style="font-size: medium">{$row['invoice_no']}</div></td>  
                <td><a target="_blank" href="index.php?customer_view&customer_id={$row['customer_id']}">{$row['customer_name']}</a></td>              
                 <td>{$row['date_time']}</td>                
                <td>{$row['items']}</td>
                <td>{$row['total_products']}</td>                
                <td>Rs. {$row['total_amount']}</td>
                <td>Rs. {$row['received_amount']}</td>
                <td>Rs. {$row['remaining_amount']}</td>
               
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"   href="index.php?update_receivable_customer&invoice_no={$row['invoice_no']}&customer_id={$row['customer_id']}"><span class="fa fa-dollar"></span> Received</a>
                        <a class="btn btn-warning"   href="index.php?display_invoice&customer_id={$row['customer_id']}&page=invoice_history&invoice_no={$row['invoice_no']}"><span class="fa fa-search-plus"></span> View</a>
                        <a data-toggle="confirmation" class="btn btn-danger"   href="index.php?service_product_customer_invoice&invoice_no={$row['invoice_no']}&customer_id={$row['customer_id']}"><span class="fa fa-trash-o"></span> Delete</a>
                    </div>
                </td>
               
            </tr>

DELIMITER;

        echo $invoices;


    }


}

function history_display_invoice($invoice_no)
{

    $invoice_no = escape_string($invoice_no);
    $row_number = 1;
    $sql = "select foo.*,GROUP_CONCAT(p.product_serial) serial_no
                FROM
                (select product_serial,invoice_no,product_id   from products_serial where invoice_no = {$invoice_no}) p
                RIGHT JOIN
                (select invoice_no,product_id,(select product_title from products where products.product_id = i.product_id) product_title,
                sale_price as product_sale_price,
                discount_price as product_discount
                ,quantity
                from tbl_invoice_products i
                where invoice_no = {$invoice_no}) foo
                on foo.product_id=p.product_id
                GROUP BY foo.product_id";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $quantity = $row['quantity'];
        $sale_price = $row['product_sale_price'];
        $discount_price = $row['product_discount'];

        $sub = 0;
        $display = "";
        if ($discount_price != 0) {
            $sub = $quantity * $discount_price;
            $display = "<td><s style='color: #adadad'>Rs. {$row['product_sale_price']}</s></td>
                         <td>Rs. {$row['product_discount']}</td>";
        } else {
            $sub = $quantity * $sale_price;
            $display = "<td>Rs. {$row['product_sale_price']}</td>
                         <td><s style='color: #adadad'>Rs. {$row['product_discount']}</s></td>";
        }


        $history = <<<DELIMETER

            <tr>
                <td>{$row_number}</td>
                <td>{$row['product_id']}</td>
                <td><a target="_blank" href="index.php?view_product&page=products&product_id={$row['product_id']}">{$row['product_title']}</a></td>
                <td>{$row['serial_no']}</td>
                <td>{$row['quantity']}</td>
                  {$display}      
               
                <td>{$sub}</td>
                
            </tr>


DELIMETER;

        $row_number++;
        echo $history;

    }


}


function get_customer_invoice_receivable($customer_id, $invoice_no)
{

    $data = array();

    $sql = "select (select CONCAT(f_name,' ',l_name) c_name from customers where customers.customer_id = tbl_invoice.customer_id)customer_name ,customer_id,invoice_no,total_amount,
                received_amount,remaining_amount 
                from tbl_invoice
                where customer_id ={$customer_id} and invoice_no={$invoice_no}";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $data[0] = $row['total_amount'];
        $data[1] = $row['received_amount'];
        $data[2] = $row['remaining_amount'];
        $data[3] = $row['customer_name'];
        $data[4] = $row['invoice_no'];
    }

    return $data;
}

function update_customer_invoice($customer_id, $invoice_no)
{

    if (isset($_POST['submit_customer_invoice'])) {

        $received_amount = escape_string($_POST['received_amount']);
        $customer_id = escape_string($customer_id);
        $invoice_id = escape_string($invoice_no);
        $user_id = $_SESSION['user_id'];

//        invice table
        $sql = "update tbl_invoice
                set received_amount = received_amount+{$received_amount}, 
                remaining_amount = remaining_amount-{$received_amount}
                where 	customer_id = {$customer_id} and invoice_no = {$invoice_id}";
        $query = query($sql);
        confirm($query);


//        store summary
        $sql2 = "update stores_summary_report
                set cash_received = cash_received+{$received_amount}, 
                cash_receivable = cash_receivable-{$received_amount}
                where 	store_id = (select store_id from customers where customer_id ={$customer_id})";
        $query2 = query($sql2);
        confirm($query2);


//        customer summary
        $sql_cus_summary = "UPDATE customer_bill_summary   
                                    set total_paid_amount = total_paid_amount +{$received_amount}, 
                                    outstanding_amount = outstanding_amount - {$received_amount}, 
                                    user_id = {$user_id}
                                    WHERE
                                    customer_id = {$customer_id}";

        $query_cus_summary = query($sql_cus_summary);
        confirm($query_cus_summary);

        if ($query_cus_summary) {
            set_message('invoice Receivable updated','success' );
            redirect('index.php?invoice_history&customer_id=' . escape_string($customer_id));
        }else{
            set_message('internet issue', 'warning');
            redirect('index.php?invoice_history&customer_id=' . escape_string($customer_id));
        }


    }


}
///////////////////////////////////////////////////
/// account payable and receivable/////////////
/// /////////////////////////////////////////////

//customers
function add_customers_for_outstanding()
{

    $role = "";
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $role = "";
    } else {
        $role = "and store_id in( select store_id from store_users where user_id = {$user_id})";
    }

    $sql = "select final.*, 
                        (SELECT store_location from stores where store_id = (select store_id from customers where customers.customer_id = final.customer_id)) as store_name,
                        (SELECT CONCAT(f_name,' ',l_name) cus_name from customers where customers.customer_id = final.customer_id) as customer_name
                from (
                -- customer not vendor
                (
                        select 0 as status ,customer_id,total_purchased_itoms as total_items, total_amount as total_price, 
                         total_paid_amount , outstanding_amount as receivable_customer,
                        0 as vendor_balnce,(total_amount - total_paid_amount) final_balnce
                        from customer_bill_summary where customer_id in (
                        select customer_id from customers where is_vendor = 0  {$role}
                        )
                )
                union ALL
                -- customer with vendor
                (
                        select 1 as status ,c.customer_id,c.total_items,c.total_price,c.total_paid_amount,c.receivable_customer,IFNULL(v.vendor_balance,0) as vendor_balance, IFNULL((c.receivable_customer - v.vendor_balance),0) as final_balnce 
                        from(
                        select customer_id,total_purchased_itoms as total_items, total_amount as total_price, 
                        total_paid_amount, outstanding_amount as receivable_customer
                        from customer_bill_summary where customer_id in (
                                select customer_id from customers where is_vendor = 1  {$role}
                                )
                        ) c
                        LEFT JOIN 
                        (select foo.* ,foo2.*
                        from(
                        select vendor_id as v_id,remaining_amount as vendor_balance  from vendors_bill_summary where vendor_id in(
                                select id from vendor where is_customer = 1
                                )
                        ) foo
                        INNER JOIN (select id as vendor_id,customer_id from vendor where is_customer = 1 ) foo2
                        on foo.v_id = foo2.vendor_id) v
                        on v.customer_id = c.customer_id
                )
                ) final";
    $query = query($sql);
    confirm($query);
    if (mysqli_num_rows($query) == 0) {
        no_record_found();
        return;
    }

    $vendor = "";
    while ($row = fetch_array($query)) {


        if ($row['status'] == '1') {
            $vendor = "<div class='label label-default' style='font-size: medium'>{$row['vendor_balnce']}</div>";
        } else {
            $vendor = "<div>{$row['vendor_balnce']}</div>";
        }

        $outstanding = <<<DELIMITER
                 <tr>
                 <td></td>
                    <td><strong><span class="fa fa-bank"></span> {$row['store_name']}<strong></td>
                    <td><div class="label label-primary" style="font-size: medium">{$row['customer_id']}</div></td>
                    <td>{$row['customer_name']}</td>
                    
                    <td>{$row['total_items']}</td>
                    <td>{$row['total_price']}</td>
                    <td>{$row['total_paid_amount']}</td>
                    <td>{$row['receivable_customer']}</td>
                    <td>{$vendor}</td>
                    <td>{$row['final_balnce']}</td>
                    <td><a href="index.php?received_receivable&customer_id={$row['customer_id']}&status={$row['status']}" class="btn btn-success"><span class="fa fa-info-circle"></span> Details </a> </td>
                    
                </tr>
 
DELIMITER;

        echo $outstanding;
    }


}

function fetch_customer_balance($customer_id, $status)
{
    $data = array();
    $sql = "";

    if ($status == '0') {
        $sql = "select (SELECT CONCAT(f_name,' ',l_name) cus_name from customers where customers.customer_id = customer_bill_summary.customer_id) as customer_name,
                    total_purchased_itoms,
                    total_amount,
                    return_items_quantity,
                    return_amount ,
                    total_paid_amount, 
                    outstanding_amount as receivable_by_customer
                    from customer_bill_summary where customer_id = {$customer_id}";
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $data[0] = $row['total_purchased_itoms'];
            $data[1] = $row['total_amount'];
            $data[2] = $row['return_items_quantity'];
            $data[3] = $row['return_amount'];
            $data[6] = $row['total_paid_amount'];
            $data[7] = $row['receivable_by_customer'];
            $data[8] = $row['customer_name'];
        }
    } elseif ($status == '1') {
        $sql = "select (SELECT CONCAT(f_name,' ',l_name) cus_name from customers where customers.customer_id = c.customer_id) as customer_name,
                c.customer_id,
                c.total_purchased_itoms,
                c.total_amount,
                c.return_items_quantity,
                c.return_amount, 
                c.total_paid_amount,
                c.receivable_customer,
                IFNULL(v.vendor_balance,0) as vendor_balance, 
                IFNULL((c.receivable_customer - v.vendor_balance),0) as final_balnce 
                from(
                select customer_id,total_purchased_itoms,total_amount,return_items_quantity,return_amount, 
                total_paid_amount, outstanding_amount as receivable_customer
                from customer_bill_summary where customer_id = {$customer_id}
                ) c
                INNER JOIN  
                (select foo.* ,foo2.*
                from(
                select vendor_id as v_id, remaining_amount as vendor_balance  from vendors_bill_summary where vendor_id in(
                                select id from vendor where is_customer = 1
                                )
                ) foo
                INNER JOIN (select id as vendor_id,customer_id from vendor where is_customer = 1 ) foo2
                on foo.v_id = foo2.vendor_id) v
                on v.customer_id = c.customer_id";
//        echo $sql;
//        return;
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $data[0] = $row['total_purchased_itoms'];
            $data[1] = $row['total_amount'];
            $data[2] = $row['return_items_quantity'];
            $data[3] = $row['return_amount'];
            $data[6] = $row['total_paid_amount'];
            $data[66] = $row['receivable_customer'];
            $data[666] = $row['vendor_balance'];
            $data[7] = $row['final_balnce'];
            $data[8] = $row['customer_name'];
        }
    }


    return $data;
}

//vendors
function add_vendor_for_outstanding()
{

    $sql = "(select '0' as status, vendor_id,
                    (select CONCAT(f_name,' ',l_name) name_v from vendor where vendor.id = vendors_bill_summary.vendor_id) vendor_name,
                    total_products as purchased_products,
                    amount_on_total_produts as cash_on_purchased_products,
                    paid_amount,		 
                    0 as customer_balance,
                    remaining_amount as amount_payable
                     from vendors_bill_summary WHERE vendor_id in(
                    select id from vendor where is_customer = 0
                    )
            )
            union all
            (
            
                    select f.status,f.vendor_id,f.vendor_name,f.purchased_products,f.cash_on_purchased_products,f.paid_amount,
                    s.as_cus_balnce as customer_balance,(f.amount_payable - s.as_cus_balnce) as amount_payable
                    from 
                    ( 
                            select '1' as status, vendor_id,
                                (select CONCAT(f_name,' ',l_name) name_v from vendor where vendor.id = vendors_bill_summary.vendor_id) vendor_name,
                                total_products as purchased_products,
                                amount_on_total_produts as cash_on_purchased_products,
                                paid_amount,		 
                                0 as customer_balance,
                                remaining_amount as amount_payable 
                             from vendors_bill_summary WHERE vendor_id in(
                            select id from vendor where is_customer = 1
                            )
                    ) f
                    INNER JOIN 
                    (
                             SELECT foo2.vendor_id,foo.as_cus_balnce
                            from
                            (SELECT customer_id,((total_amount - total_paid_amount) - return_amount) as_cus_balnce from customer_bill_summary where customer_id in( 
                            select customer_id from customers where is_vendor = 1
                            )) foo
                            INNER JOIN
                            (select customer_id, vendor_id from customers where is_vendor = 1) foo2
                            on foo.customer_id = foo2.customer_id
                    ) s
                    ON f.vendor_id = s.vendor_id
            )";
    $query = query($sql);
    confirm($query);
    if (mysqli_num_rows($query) == 0) {
        no_record_found();
        return;
    }

    $customer = "";
    while ($row = fetch_array($query)) {

        if ($row['status'] == '1') {
            $customer = "<div class='label label-default' style='font-size: medium'>{$row['customer_balance']}</div>";
        } else {
            $customer = "<div>{$row['customer_balance']}</div>";
        }

        $outstanding = <<<DELIMITER
                 <tr>
                    <td><div class="label label-primary" style="font-size: medium">{$row['vendor_id']}</div></td>
                    <td>{$row['vendor_name']}</td>
                    <td>{$row['purchased_products']}</td>
                    <td>{$row['cash_on_purchased_products']}</td>
                    <td>{$row['paid_amount']}</td> 
                    <td>{$customer}</td>
                    <td>{$row['amount_payable']}</td>
                    <td><a href="index.php?paid_payable&vendor_id={$row['vendor_id']}&status={$row['status']}" class="btn btn-success"><span class="fa fa-info-circle"></span> Details </a> </td>
                    
                </tr>
 
DELIMITER;

        echo $outstanding;
    }


}


function fetch_vendor_balance($vendor_id, $status)
{
    $data = array();
    $sql = "";

    if ($status == '0') {
        $sql = " select  vendor_id,
                    (select CONCAT(f_name,' ',l_name) name_v from vendor where vendor.id = vendors_bill_summary.vendor_id) vendor_name,
                    total_products,
                    amount_on_total_produts,
                    total_return_products,
                    amount_return_products, 
                    paid_amount, 
                    remaining_amount as amount_payable
                 from vendors_bill_summary WHERE vendor_id  = {$vendor_id}";
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $data[0] = $row['total_products'];
            $data[1] = $row['amount_on_total_produts'];
            $data[2] = $row['total_return_products'];
            $data[3] = $row['amount_return_products'];
            $data[6] = $row['paid_amount'];
            $data[7] = $row['amount_payable'];
            $data[8] = $row['vendor_name'];
        }
    } elseif ($status == '1') {
        $sql = "select f.status,f.vendor_id,
                    f.total_products,
                    f.amount_on_total_produts,
                    f.total_return_products,
                    f.amount_return_products,
                    f.vendor_name,
					f.paid_amount,
                    f.sub_total,
					s.as_cus_balnce as customer_balance,
					(f.sub_total - s.as_cus_balnce) as amount_payable
                    from 
                    ( 
                        select '1' as status, vendor_id,
                       (select CONCAT(f_name,' ',l_name) name_v from vendor where vendor.id = vendors_bill_summary.vendor_id) vendor_name,
                        total_products,
                        amount_on_total_produts,
                        total_return_products,
                        amount_return_products,                         
                        paid_amount, 
                        remaining_amount as sub_total
                         from vendors_bill_summary WHERE vendor_id = {$vendor_id}
                    ) f
                    INNER JOIN 
                    (
                         SELECT foo2.vendor_id,foo.as_cus_balnce
                        from
                        (SELECT customer_id,((total_amount - total_paid_amount) - return_amount) as_cus_balnce from customer_bill_summary where customer_id in( 
                        select customer_id from customers where is_vendor = 1
                        )) foo
                        INNER JOIN
                        (select customer_id, vendor_id from customers where is_vendor = 1) foo2
                        on foo.customer_id = foo2.customer_id
                    ) s
                    ON f.vendor_id = s.vendor_id";

        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $data[0] = $row['total_products'];
            $data[1] = $row['amount_on_total_produts'];
            $data[2] = $row['total_return_products'];
            $data[3] = $row['amount_return_products'];
            $data[6] = $row['paid_amount'];
            $data[66] = $row['sub_total'];
            $data[666] = $row['customer_balance'];
            $data[7] = $row['amount_payable'];
            $data[8] = $row['vendor_name'];
        }
    }


    return $data;
}


//stores account
function store_accoubts()
{
    $role = "";
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $role = "";
    } else {
        $role = "where store_id in (
                    select store_id from store_users  where user_id ={$user_id} 
                    )";
    }

    $sql = "select store_id,
                (select store_location from stores where stores.store_id = stores_summary_report.store_id) store_name,
                total_order_sale_products_quantity,
                total_cash_on_order_products,
                total_invoice_sale_products as  sold_products,
                total_cash_on_sale as cash_on_sold_products,
                cash_received as cash_received_on_store_sale,
                cash_receivable as cash_receivable_on_store_sale
                from stores_summary_report {$role}";
    $query = query($sql);
    confirm($query);
    if (mysqli_num_rows($query) == 0) {
        no_record_found();
        return;
    }
    $customer = "";
    while ($row = fetch_array($query)) {
        $outstanding = <<<DELIMITER
                 <tr>
                    <td><div class="label label-primary" style="font-size: medium">{$row['store_id']}</div></td>
                    <td><span class="fa fa-bank"></span> {$row['store_name']}</td>
                    <td>{$row['total_order_sale_products_quantity']}</td>
                    <td>{$row['total_cash_on_order_products']}</td>
                    <td>{$row['sold_products']}</td>
                    <td>{$row['cash_on_sold_products']}</td>
                    <td>{$row['cash_received_on_store_sale']}</td> 
                    <td>{$row['cash_receivable_on_store_sale']}</td>
                    <td><a href="index.php?account_stores_detail&page=account_stores&store_id={$row['store_id']}" class="btn btn-success"><span class="fa fa-info-circle"></span> Details </a> </td>
                    
                </tr>
 
DELIMITER;

        echo $outstanding;
    }


}

function fetch_stores_balance($store_id)
{
    $data = array();

    $sql = "select foo.store_id,
                foo.store_name,
                foo.last_sent_amount_to_admin,
                foo.total_order_sale_products_quantity,
                foo.total_cash_on_order_products,
                
                foo.total_sold_products,
                foo.total_cash_on_sold_store,
                foo.sales_return_products,
                foo.sales_return_amount,
                
                foo.cash_received_on_store_sale,
                foo.cash_receivable_on_store_sale,
                
                (foo.total_order_sale_products_quantity + foo.total_sold_products) as combined_sold_products,
                (foo.total_cash_on_order_products + foo.total_cash_on_sold_store) as cash_on_combined_sold_products,
                IFNULL(foo.total_sent_amount_to_admin,0) total_sent_amount_to_admin,
                IFNULL(((foo.total_cash_on_order_products + foo.total_cash_on_sold_store) - total_sent_amount_to_admin ),0) remaining_pavable_to_admin
                from
                (	
                    select store_id,total_sent_amount_to_admin,	last_sent_amount_to_admin,
                    (select store_location from stores where stores.store_id = stores_summary_report.store_id) store_name,
                    total_order_sale_products_quantity,
                    total_cash_on_order_products,                
                    total_invoice_sale_products as total_sold_products,
                    total_cash_on_sale as total_cash_on_sold_store,
                    sales_return_products,
                    sales_return_amount, 
                    cash_received as cash_received_on_store_sale,
                     cash_receivable as cash_receivable_on_store_sale                
                    from stores_summary_report
                    where store_id ={$store_id}
                ) foo";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $data[0] = $row['store_id'];
        $data[1] = $row['store_name'];

        $data[2] = $row['total_order_sale_products_quantity'];
        $data[3] = $row['total_cash_on_order_products'];

        $data[4] = $row['total_sold_products'];
        $data[5] = $row['total_cash_on_sold_store'];
        $data[6] = $row['sales_return_products'];
        $data[7] = $row['sales_return_amount'];

        $data[10] = $row['cash_received_on_store_sale'];
        $data[11] = $row['cash_receivable_on_store_sale'];

        $data[12] = $row['combined_sold_products'];
        $data[13] = $row['cash_on_combined_sold_products'];

        $data[14] = $row['total_sent_amount_to_admin'];
        $data[15] = $row['remaining_pavable_to_admin'];
        $data[16] = $row['last_sent_amount_to_admin'];

    }
    return $data;
}

/*************************************************************/
//index.php?display_invoice
/*************************************************************/
function get_customer_data($invoice_no)
{

    $invoice_no = escape_string($invoice_no);
    $data = array();


    $sql = "select  date_time,
                     customer_id,
                    (select CONCAT(f_name,'  ',l_name) cus_name from customers where customers.customer_id =i.customer_id) customer_name,
                    (select CONCAT(house_street, ' '  ,town_city ,' ', province  , ' ', country) cus_add from customers where customers.customer_id =i.customer_id) customer_address,
                    (select email from customers where customers.customer_id =i.customer_id) customer_email,
                    (select phone from customers where customers.customer_id =i.customer_id) customer_phone,
                    (select username from users where users.user_id =i.user_id) user_name,				 				 
                    total_amount,received_amount,(total_amount-received_amount) as  remaining_amount,total_items
 
                from tbl_invoice i
                where invoice_no ={$invoice_no} ";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {


        $data[0] = $row['date_time'];
        $data[1] = $row['customer_id'];
        $data[2] = $row['customer_name'];
        $data[3] = $row['customer_address'];
        $data[4] = $row['customer_email'];
        $data[5] = $row['customer_phone'];
        $data[6] = $row['user_name'];
        $data[7] = $row['total_amount'];
        $data[8] = $row['received_amount'];
        $data[9] = $row['remaining_amount'];
        $data[10] = $row['total_items'];


    }

    return $data;

}


/************************************************************/
//index.php?orders
/************************************************************/
function display_orders()
{


    $sql2 = "select foo.order_id,foo.order_status,SUM(foo.order_amount) order_amount, count(foo.quantity) product_types,
                    sum(foo.quantity) products_count,foo.date_time
                    from
                (select po.product_id,po.sale_price,po.discount_price,
                CASE
                    WHEN po.discount_price = 0 THEN po.sale_price*po.quantity
                    ELSE po.discount_price*po.quantity
                END as order_amount,
                    po.quantity,o.order_id,o.date_time,o.order_status 
                from (select product_id,quantity,order_number,sale_price,discount_price from product_order ) po
                INNER JOIN (select order_id,order_status,date_time from tbl_order where store_id is NULL and order_status = 'pending'  ) o
                on po.order_number = o.order_id  
                ) foo
                    where foo.order_status = 'pending'
                    GROUP BY foo.order_id 
                    order by foo.date_time DESC";


    $query2 = query($sql2);
    confirm($query2);

    while ($row = fetch_array($query2)) {


        $order = <<<DELIMETER
                <tr>
                     <td></td>
                    <td><div class="label label-danger" style="font-size: medium">{$row['order_id']}</div></td>
                    <td>Rs. {$row['order_amount']}</td>     
                    <td>{$row['product_types']}</td>
                    <td>{$row['products_count']}</td>
                    <td>{$row['date_time']}</td>
                   <td><span class="label label-danger">{$row['order_status']}</span></td>
                    
                    <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?order_detail&order_received&order_id={$row['order_id']}"><i class="fa fa-info-circle"></i> Details</a></li>                                     
                                   <li class="divider"></li>
                                    <li><a data-toggle="confirmation" href="index.php?delete_order&page=orders&id={$row['order_id']}"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>                           
                                </ul>    
                            </div>                        
                        </td>
                </tr>
DELIMETER;

        echo $order;

    }


}

function display_orders_assign()
{

    $add_query = '';

    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];


    if ($user_role == 'admin') {

    } else {
        $add_query = "and store_id in(
                    SELECT store_id FROM store_users where user_id = {$user_id})";
    }


    $sql2 = "select order_id,order_status,date_time,
                (select store_location from stores where  stores.store_id = tbl_order.store_id  ) store_name,
                (select username from users where users.user_id = tbl_order.effecte_by_user) assigned_by_user_name
                from tbl_order where 
                store_id is NOT NULL 
                and order_status = 'Assigned'
                {$add_query}
                ORDER BY date_time desc";

    $query2 = query($sql2);
    confirm($query2);
    while ($row = fetch_array($query2)) {


        $order = <<<DELIMETER
                <tr>
                <td></td>
                 <td><span class="fa fa-bank"></span>{$row['store_name']}</td>
                    <td><div class="label label-warning" style="font-size: medium">{$row['order_id']}</div></td>                    
                    <td>{$row['date_time']}</td>
                   <td><span class="label label-warning">{$row['order_status']}</span></td>
                   
                    <td>{$row['assigned_by_user_name']}</td>
                    <td>
                    <a class="btn btn-warning" href="index.php?order_detail&orders_pending&order_id={$row['order_id']}"><i class="fa fa-info-circle"></i> Details</a>
                                                  
                        </td>
                </tr>
DELIMETER;

        echo $order;

    }
    echo "</tbody>
          </table>";


}

function display_orders_canceled()
{

    $add_query = "";

    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];


    if ($user_role == 'admin') {
        $add_query = "";
    } else {
        $add_query = "and store_id in(
                    SELECT store_id FROM store_users where user_id = {$user_id})";
    }


    $sql2 = "select order_id,order_status,date_time,
                (select store_location from stores where  stores.store_id = tbl_order.store_id  ) store_name,
                (select username from users where users.user_id = tbl_order.effecte_by_user) cancel_by_user_name
                from tbl_order where 
                store_id is NOT NULL 
                and order_status = 'Canceled'
                {$add_query}
                ORDER BY date_time desc";

    $query2 = query($sql2);
    confirm($query2);

    while ($row = fetch_array($query2)) {

        $delete = "";
        if ($user_role == 'admin') {
            $delete = "<li class='divider'></li>
                                    <li><a data-toggle='confirmation' href='index.php?delete_order&page=order_cancel&id={$row['order_id']}'><i class='glyphicon glyphicon-trash'></i> Delete</a></li>";
        } else {
            $delete = "";
        }


        $order = <<<DELIMETER
                <tr>
                <td></td>
                <td>{$row['store_name']}</td>
                    <td><div class="label label-default" style="font-size: medium">{$row['order_id']}</div></td>                    
                    <td>{$row['date_time']}</td>
                   <td><span class="label label-default">{$row['order_status']}</span></td>
                    
                    <td>{$row['cancel_by_user_name']}</td>
                    <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a  href="index.php?order_detail&orders_canceled&order_id={$row['order_id']}"><i class="fa fa-info-circle"></i> Details</a></li>                                     
                                        {$delete}                      
                                </ul>    
                            </div>                        
                        </td>
                </tr>
DELIMETER;

        echo $order;

    }


}

function display_orders_Placed()
{
    $add_query = "";

    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];


    if ($user_role == 'admin') {
        $add_query = "";
    } else {
        $add_query = "and store_id in(
                    SELECT store_id FROM store_users where user_id = {$user_id})";
    }

    $sql2 = "select order_id,order_status,date_time,
                (select store_location from stores where  stores.store_id = tbl_order.store_id  ) store_name,
                (select username from users where users.user_id = tbl_order.effecte_by_user) placed_by_user_name
                from tbl_order where 
                store_id is NOT NULL 
                and order_status = 'Placed'
                {$add_query}
                ORDER BY date_time desc";

    $query2 = query($sql2);
    confirm($query2);
    while ($row = fetch_array($query2)) {


        $order = <<<DELIMETER
                <tr>
                <td></td>
                <td>{$row['store_name']}</td>
                    <td><div class="label label-success" style="font-size: medium">{$row['order_id']}</div></td>                    
                    <td>{$row['date_time']}</td>
                   <td><span class="label label-success">{$row['order_status']}</span></td>
                   
                   <td>{$row['placed_by_user_name']}</td>
                    
                    <td><a class="btn btn-success" href="index.php?order_detail&orders_placed&order_id={$row['order_id']}"><i class="fa fa-info-circle"></i> Details</a>                 </td>
                </tr>
DELIMETER;

        echo $order;

    }


}


/************************************************************/
//index.php?order_detail
/************************************************************/
function order_detail_status()
{
    if (isset($_GET['order_id'])) {
        $order_id = escape_string($_GET['order_id']);

        $sql = "select o.date_time,p.order_id,p.order_status
                    from (select date_time,order_number from product_order WHERE order_number = {$order_id}) o
                    INNER JOIN (select order_status,order_id from tbl_order WHERE order_id = {$order_id}) p
                    on o.order_number = p.order_id
                    limit 1";

        $query = query($sql);
        confirm($query);
        $status = '';
        while ($row = fetch_array($query)) {

            if ($row['order_status'] == 'pending') {
                $status = "<span class='label label-danger'> Pending </span>";
            }

            if ($row['order_status'] == 'Assigned') {
                $status = "<span class='label label-warning'> Assigned </span>";
            }

            if ($row['order_status'] == 'Placed') {
                $status = "<span class='label label-success'> Placed </span>";
            }

            if ($row['order_status'] == 'Canceled') {
                $status = "<span class='label label-default'> Canceled </span>";
            }

            $order_status = <<<DELIMETER
                                
                                <tr class="cart-subtotal">
                                    <th>ORDER ID </th>
                                    <th> {$order_id}</th>
                                </tr>                                
                                <tr class="cart-subtotal">
                                    <th>Order Status </th>
                                    <td>{$status}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Received </th>
                                    <td> {$row['date_time']}</td>
                                </tr>
DELIMETER;

            echo $order_status;
        }
    }


}

function order_detail_products()
{
    if (isset($_GET['order_id'])) {
        $order_id = escape_string($_GET['order_id']);
        $sub_total = 0;
        $total = 0;
        $sql = "select distinct product_id as p_id ,
                    (select product_title from products where product_id = p_id) product_name,
                    (select product_image from products where product_id = p_id) product_image,
                    (select (select cat_title from categories where cat_id = product_category_id) product_category_name from products where product_id = p_id) order_category_name,
                    (select (select brand_name from brands where brand_id = product_brand_id) product_brand_name from products where product_id = p_id) order_brand_name, 
                    sale_price,discount_price,quantity 
                    from product_order where order_number ={$order_id}";
//        echo $sql;
//        return;
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $sale_dom = '';
            $discount_dom = '';

            if ($row['discount_price'] == '0') {
                $sub_total = $row['sale_price'] * $row['quantity'];
                $discount_dom = "<s style='color: #adadad'> Rs. 00  </s>";
                $sale_dom = "Rs. {$row['sale_price']}";
            } else {
                $sub_total = $row['discount_price'] * $row['quantity'];
                $discount_dom = "Rs. {$row['discount_price']}";
                $sale_dom = "<s style='color: #adadad'> Rs. {$row['sale_price']}  </s>";
            }


            $total += $sub_total;


            $product_image = display_image($row['product_image']);
            $order_status = <<<DELIMETER
                            
                            <tr class="cart-subtotal">
                                                               
                                <td>{$row['p_id']} 
                                <input type="hidden" name="products_id" value="{$row['p_id']}" / >
                                <input type="hidden" name="products_names" value="{$row['product_name']}" / >
                                </td>                                                                          
                                <td>
                                    <img class="img-responsive img-thumbnail" style="width: 130px" src="../../resources/{$product_image} " />
                                    <br/>
                                    <a href="index.php?view_product&page=products&product_id={$row['p_id']}" target="_blank">{$row['product_name']}</a>
                                </td>                                    
                                <td>{$row['order_category_name']} </td>                                                                          
                                <td>{$row['order_brand_name']} </td>   
                                <td>
                                    {$row['quantity']} 
                                     <input type="hidden" name="products_quantity" value="{$row['quantity']}" / >
                                </td>                                   
                                <td>{$discount_dom} </td>    
                                <td>{$sale_dom}</td>   
                                
                                <td>Rs. {$sub_total} </td>                          
                            </tr>
                            
DELIMETER;

            echo $order_status;
        }

        echo "<tr class='cart-subtotal'>
                    <th colspan='7'><strong class='pull-left'>Total</strong></th>
                    
                    <th>Rs. {$total}</th>
                </tr>";


    }


}

function fill_store_drop_down()
{

    $sql = "select store_id,store_location from stores order by store_location";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELEMITER
    
                        <option value="{$row['store_id']}">{$row['store_location']}</option>


DELEMITER;

        echo $stores;

    }
}

function assign_store_order()
{

    if (isset($_POST['btn_assign_store'])) {
        $order_id = escape_string($_POST['order_id']);
        $store_id = escape_string($_POST['store_id']);
        $status = 'Assigned';
        $user_id = $_SESSION['user_id'];


        $sql = "update tbl_order 
                set order_status = '{$status}',store_id ={$store_id}, effecte_by_user = {$user_id}
                where order_id = {$order_id}";
        $query = query($sql);
        confirm($query);
        if ($query) {
            $sql2 = "update order_clint 
                set store_id = {$store_id}
                where order_id = {$order_id}";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
                set_message('Store assign to place order', 'success');
                redirect('index.php?order_pending');
            } else {
                set_message('some thing wrong', 'danger');
                redirect('index.php?order_detail&order_id=' . $store_id);
            }
        } else {
            set_message('some thing wrong', 'danger');
            redirect('index.php?order_detail&order_id=' . $store_id);
        }

    }

}

function add_serial_online_products()
{
    if (isset($_GET['order_id'])) {
        $order_id = escape_string($_GET['order_id']);

        $sql = "select distinct product_id as p_id ,
                    (select product_title from products where product_id = p_id) product_name,
                    (select product_image from products where product_id = p_id) product_image,
                    (select (select cat_title from categories where cat_id = product_category_id) product_category_name from products where product_id = p_id) order_category_name,
                    (select (select brand_name from brands where brand_id = product_brand_id) product_brand_name from products where product_id = p_id) order_brand_name, 
                    (select product_price from products where product_id = p_id) product_price,
                    (select product_disc_price from products where product_id = p_id) product_disc_price,
                    quantity 
                    from product_order where order_number ={$order_id}";
        $query = query($sql);
        confirm($query);
        $dom = '';
        while ($row = fetch_array($query)) {


            for ($i = 1; $i <= $row['quantity']; $i++) {
                $dom .= "<div class='form-group'>
                            <div class='input-group'>
                                <span class='input-group-addon'><i class='glyphicon glyphicon-barcode'></i></span>
                                <input type='text' name='serial[]' class='form-control'  value=''   placeholder='Serial'>
                                <input type='hidden' name='serial_product_id[]' class='form-control'  value='{$row['p_id']}'>
                            </div>
                        </div>";
            }


            $product_image = display_image($row['product_image']);
            $serial_online_order = <<<DELIMETER
                            
                            <tr class="cart-subtotal">
                                                               
                                                         
                                <td>{$row['p_id']} </td>                                    
                                <td>{$row['product_name']} </td>                                    
                                <td>{$row['quantity']} </td>                                    
                                <td><img class="img-responsive img-thumbnail" style="width: 130px" src="../../resources/{$product_image} "></img></td>                                    
                                <td>{$row['order_category_name']} </td>                                    
                                <td>{$row['order_brand_name']} </td>                                    
                                  
                                <td>{$dom} </td>                                         
                                                    
                            </tr>
                            
                            
DELIMETER;
            $dom = '';


            echo $serial_online_order;
        }


    }


}

function order_detail_clint()
{
    if (isset($_GET['order_id'])) {
        $order_id = escape_string($_GET['order_id']);
        $sql = "select * from order_clint where order_id ={$order_id}";
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $order_clint = <<<DELIMETER
                                
                                <tr class="cart-subtotal">
                                    <th>First Name </th>
                                    <td> {$row['f_name']}</td>
                                </tr>
                
                                <tr class="cart-subtotal">
                                    <th>Last Name </th>
                                    <td>{$row['l_name']}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Email </th>
                                    <td> {$row['email']}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Phone </th>
                                    <td> {$row['phone']}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>House/Street </th>
                                    <td> {$row['house_street']}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Town/City </th>
                                    <td> {$row['town_city']}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Province </th>
                                    <td> {$row['province']}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Countary </th>
                                    <td> Pakistan</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Comments </th>
                                    <td> {$row['comment']}</td>
                                </tr>
DELIMETER;

            echo $order_clint;
        }
    }


}


/************************************************************/
//index.php/purchase_return_history
/************************************************************/

function display_purchase_return()
{

    $sql = "select id,date_time,product_id,user_id,reason,quantity,vendor_id,serial_no,invoice_no,
                (select product_title from products where products.product_id = purchase_return.product_id) product_name,
                (select username from users where users.user_id = purchase_return.user_id) user_name,
                (select CONCAT(f_name,' ',l_name) vendor_name from vendor where vendor.id = purchase_return.vendor_id) vendor_name,return_amount,date(date_time) date_time
                from purchase_return ORDER BY date_time desc";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $reason =substr($row['reason'],7);


        $return = <<<DELIMITER
                    
                    <tr>
                    <td></td>
                        <td> <a style="font-size: medium" target="_blank" href="index.php?vendor_invoice&invoice_no={$row['invoice_no']}&vendor_id={$row['vendor_id']}"><strong>{$row['invoice_no']}</strong></a> </td>
                        <td>{$row['product_id']}</td>
                        <td><a target="_blank" href="index.php?view_product&page=purchase_return_history&product_id={$row['product_id']}"> {$row['product_name']} </a></td>
                        <td><a target="_blank" href="index.php?history_vendor&vendor_id={$row['vendor_id']}">{$row['vendor_name']}</a></td>
                        <td>{$row['serial_no']}</td>
                        <td>{$row['date_time']}</td>
                        <td>{$row['quantity']}</td> 
                        <td>Rs. {$row['return_amount']}</td> 
                        <td>{$reason}</td> 
                        
                                          
                    </tr>
DELIMITER;

        echo $return;
    }

}

function fill_vendor()
{

    $sql = "select id,f_name , l_name from vendor order by id";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $vendore = <<<DELIMITER
                    <option value="{$row['id']}"> {$row['f_name']}   {$row['l_name']}  </option>

DELIMITER;

        echo $vendore;


    }
}

function add_purchase_return()
{

    if (isset($_POST['add_purchase_return'])) {
        $vendor_id = escape_string($_POST['vendor_id']);
        $invoice_no = escape_string($_POST['invoice_no']);
        $product_id = escape_string($_POST['product_id']);
        $quantity = escape_string($_POST['quantity']);
        $serial_no = escape_string($_POST['serial_no']);
        $reason = escape_string($_POST['reason']);
        $user_id = $_SESSION['user_id'];


//check return products not increase in invoice quantity
        $sql_quantity = "select quantity from tbl_purchase_from_vendor 
                          where vendor_id =  {$vendor_id} and invoice_number = '{$invoice_no}' and product_id = {$product_id}";

        $query_quantity = query($sql_quantity);
        confirm($query_quantity);
        while ($row = fetch_array($query_quantity)) {
            if ($quantity > $row['quantity']) {
                set_message('Increasing limit then Invoice quantity', 'danger');
                redirect('index.php?add_purchase_return');
                return;
            }
        }


//insert in purchase return table
        $sql = "insert into purchase_return(product_id,vendor_id,serial_no,reason,user_id,quantity,return_amount,invoice_no)
                values ({$product_id},{$vendor_id},'{$serial_no}','{$reason}',{$user_id},{$quantity},
                 (select (product_purchase_price * {$quantity}) amount from tbl_purchase_from_vendor 
                            where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}') ,
                '{$invoice_no}')";

        $query = query($sql);
        confirm($query);
        if ($query) {

            $sql_vendor_summary = "UPDATE vendors_bill_summary
                            SET total_return_products = total_return_products +  {$quantity},
                            
                            amount_return_products = amount_return_products + 
                            (select (product_purchase_price * {$quantity}) amount from tbl_purchase_from_vendor 
                            where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}'),
                            
                            total_products = total_products -    {$quantity},                         
                            amount_on_total_produts = amount_on_total_produts -    
                            (select (product_purchase_price * {$quantity}) amount from tbl_purchase_from_vendor 
                            where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}'),                      
                            
                            remaining_amount = remaining_amount -
                            (select (product_purchase_price * {$quantity}) amount from tbl_purchase_from_vendor 
                            where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}'),                      
                            
                            user_id = {$user_id}                            
                            WHERE vendor_id = {$vendor_id}";

            $query_vendor_summary = query($sql_vendor_summary);
            confirm($query_vendor_summary);


//minous from main store
            $sql2 = "update products
                    set product_quantity = product_quantity - {$quantity}
                    where product_id = {$product_id} ";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
//minous products from vendor product table
                $sql3 = "update tbl_purchase_from_vendor
                    set quantity = quantity - {$quantity},
                    total_amount = total_amount - (product_purchase_price * {$quantity})                     
                    where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}' ";

                $query3 = query($sql3);
                confirm($query3);
                if ($query3) {
//minous from vendor invoice table
                    $sql4 = "update tbl_vendor_invoices
                    set total_amount = total_amount -  
                    (select (product_purchase_price * {$quantity}) amount from tbl_purchase_from_vendor 
                            where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}'),
                     payable_amount = payable_amount -
                     (select (product_purchase_price * {$quantity}) amount from tbl_purchase_from_vendor 
                            where product_id = {$product_id} and vendor_id ={$vendor_id} and invoice_number ='{$invoice_no}')       
                    where  vendor_id ={$vendor_id} and invoice_id ='{$invoice_no}' ";
                    $query4 = query($sql4);
                    confirm($query4);
                    if ($query4) {


                        set_message('Product as Purchase Return Added', 'success');
                        redirect('index.php?purchase_return_history');
                    } else {
                        set_message('Some error to submit data', 'danger');
                        redirect('index.php?purchase_return_history');
                    }

                } else {
                    set_message('Some error to submit data', 'danger');
                    redirect('index.php?purchase_return_history');
                }

            } else {
                set_message('Some error to submit data', 'danger');
                redirect('index.php?purchase_return_history');
            }

        } else {
            set_message('Some error to submit data', 'danger');
            redirect('index.php?purchase_return_history');
        }

    }
}


/************************************************************/
//index.php?sales_return
/************************************************************/
function add_stores()
{
    $sql = "";

    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $sql = "select store_id,store_location from stores order by store_location";
    } else {
        $sql = "select store_id,store_location from stores where store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    )
                    order by store_location";
    }


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELEMITER
    
                        <option value="{$row['store_id']}">{$row['store_location']}</option>


DELEMITER;

        echo $stores;

    }
}

function add_sales_return()
{

    if (isset($_POST['add_sale_return'])) {
        $store_id = escape_string($_POST['store_name']);
        $customer_id = escape_string($_POST['customer_name']);
        $invoice_no = escape_string($_POST['invoice_no']);
        $product_id = escape_string($_POST['product_id']);
        $quantity = escape_string($_POST['quantity']);
        $serial_no = escape_string($_POST['serial_no']);
        $reason_comments = escape_string($_POST['reason_comments']);
        $user_id = $_SESSION['user_id'];

        //check return products not increase in invoice quantity
        $sql_quantity = "select quantity from tbl_invoice_products 
                          where customer_id =  {$customer_id} and invoice_no = {$invoice_no} and product_id = {$product_id}";

        $query_quantity = query($sql_quantity);
        confirm($query_quantity);
        while ($row = fetch_array($query_quantity)) {
            if ($quantity > $row['quantity']) {
                set_message('Increasing limit then Invoice quantity', 'danger');
                redirect('index.php?add_sale_return');
                return;
            }
        }




        $sql = "insert into sales_return(product_id,invoice_no,serial_products,reason_comments,user_id,quantity,store_id,customer_id,return_amount)
                values ({$product_id},{$invoice_no},'{$serial_no}','{$reason_comments}',{$user_id},{$quantity},{$store_id},{$customer_id},(
                                        select (foo.amount * {$quantity} ) amoun from (
                        SELECT discount_price,sale_price,CASE
                                 WHEN discount_price = 0 THEN sale_price
                                 ELSE discount_price
                               END AS amount 
                        from tbl_invoice_products
                        where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id}
                        ) foo))";

        $query = query($sql);
        confirm($query);
        if ($query) {
            $sql2 = "update tbl_products_store
                        set product_quantity = product_quantity + {$quantity}
                        where product_id = {$product_id} and store_id = {$store_id} ";

            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
                $sql3 = "insert into tbl_products_store_history(product_id,store_id,product_quantity,status,user_id)
                          values( {$product_id},{$store_id},{$quantity},'Sales Return',{$user_id})";


                $query3 = query($sql3);
                confirm($query3);
                if ($query3) {
                    $sql4 = "update products
                                set product_quantity = product_quantity + {$quantity}
                                where product_id = {$product_id} ";

                    $query4 = query($sql4);
                    confirm($query4);
                    if ($query4) {
/////////change to update also store summary
                        $sql50 = "update stores_summary_report
                                    set sales_return_products = sales_return_products + {$quantity} ,
                                    
                                    sales_return_amount = sales_return_amount + ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} )),
                                    
                                    total_invoice_sale_products = total_invoice_sale_products - {$quantity} ,
                                    
                                    total_cash_on_sale = total_cash_on_sale - ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} )),                              
                                     
                                    cash_receivable = cash_receivable - ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} ))
                                    
                                    where store_id = {$store_id}";

                        $query50 = query($sql50);
                        confirm($query50);


                        $sql5 = "update customer_bill_summary
                                    set return_items_quantity = return_items_quantity + {$quantity} ,                                    
                                    return_amount = return_amount + ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} )),
                                    
                                    total_purchased_itoms = total_purchased_itoms - {$quantity} ,
                                    
                                    total_amount = total_amount - ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} )),                                     
                                    
                                     outstanding_amount = outstanding_amount - ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} ))
                                    where customer_id = {$customer_id}";

                        $query5 = query($sql5);
                        confirm($query5);


                        $sql110 = "update tbl_invoice
                                    set total_items = total_items - {$quantity},
                                    total_amount = total_amount - ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} )),                                 
                                    
                                    
                                    remaining_amount = remaining_amount - ({$quantity}*(SELECT CASE
                                                         WHEN discount_price = 0 THEN sale_price
                                                         ELSE discount_price
                                                 END AS amount
                                    from tbl_invoice_products
                                    where invoice_no = {$invoice_no} and product_id = {$product_id} and store_id = {$store_id} ))
                                    
                                    where  invoice_no = {$invoice_no} and customer_id = {$customer_id} and store_id = {$store_id}";


                        $query110 = query($sql110);
                        confirm($query110);



                        $sql11 = "update tbl_invoice_products
                                    set quantity = quantity - {$quantity}
                                    where invoice_no = {$invoice_no}  and product_id = {$product_id} and customer_id = {$customer_id} and store_id = {$store_id}";
                        $query11 = query($sql11);
                        confirm($query11);



                        if ($query5) {
                            set_message('Product as Sale Return Added', 'success');
                            redirect('index.php?sale_return_history');
                        } else {
                            set_message('Some error to submit data', 'danger');
                            redirect('index.php?sale_return_history');
                        }
                    } else {
                        set_message('Some error to submit data', 'danger');
                        redirect('index.php?sale_return_history');
                    }
                } else {
                    set_message('Some error to submit data', 'danger');
                    redirect('index.php?sale_return_history');
                }
            } else {
                set_message('Some error to submit data', 'danger');
                redirect('index.php?sale_return_history');
            }

        } else {
            set_message('Some error to submit data', 'danger');
            redirect('index.php?sale_return_history');
        }

    }
}

function display_sales_return()
{
    $role = "";

    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $role = "";
    } else {
        $role = "where store_id in (select store_id from store_users where user_id = {$user_id})";
    }

    $sql = " select customer_id,(select store_location from stores where stores.store_id = sales_return.store_id ) store_name, id,date(date_time) date_time ,product_id,
                    invoice_no,serial_products,  reason_comments,quantity,return_amount,customer_id,
                (select CONCAT(f_name,' ',l_name) cus from customers where customers.customer_id = sales_return.customer_id) customer_name,
                (select product_title from products where products.product_id = sales_return.product_id) product_name,
                (select username from users where users.user_id= sales_return.user_id) user_name
                from sales_return {$role} order by date_time desc ";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $reason =substr($row['reason_comments'],7);

        $return = <<<DELIMITER
                    <tr>
                    <td></td>
                    <td><span class="fa fa-bank"></span> {$row['store_name']}</td>
                        <td><div class="label label-warning" style="font-size: medium"><a target="_blank" href="index.php?display_invoice&customer_id={$row['customer_id']}&page=sale_return_history&invoice_no={$row['invoice_no']}">{$row['invoice_no']}</a></div></td>
                        <td>{$row['product_id']}</td>
                        <td><a href="index.php?view_product&page=sale_return_history&product_id={$row['product_id']}">{$row['product_name']}</a></td>
                        <td><a target="_blank" href="index.php?customer_view&customer_id={$row['customer_id']}">{$row['customer_name']}</a></td>
                        <td>{$row['date_time']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['return_amount']}</td>
                        <td>{$reason}</td>
                        <td> {$row['user_name']} </td> 
                     </tr>
DELIMITER;


        echo $return;
    }


}


/************************************************************/
//index.php?products
/************************************************************/
function display_products_in_admin()
{
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $sql2 = "select product_id,product_title,
            (select cat_title from categories where cat_id = product_category_id) product_category,
            (select sub_category_name from sub_categories where sub_category_id = product_sub_category_id) sub_product_category,
            (select brand_name from brands where brand_id = product_brand_id) brand_name,
            product_image ,date_time,product_quantity, publish_status,
            (select count(*) from tbl_purchase_from_vendor where tbl_purchase_from_vendor.product_id =products.product_id ) vendors_count,
            (select count(store_id) store_id from tbl_products_store where tbl_products_store.product_id =products.product_id ) store_count,
            (select count(*) from reviews where reviews.product_id =products.product_id ) reviews_count
            from products 
            ORDER BY date_time DESC ";

    } else {
        $sql2 = "select product_id,product_title,
            (select cat_title from categories where cat_id = product_category_id) product_category,
            (select sub_category_name from sub_categories where sub_category_id = product_sub_category_id) sub_product_category,
            (select brand_name from brands where brand_id = product_brand_id) brand_name,
            product_image ,date_time,product_quantity, publish_status,
            (select count(*) from tbl_purchase_from_vendor where tbl_purchase_from_vendor.product_id =products.product_id ) vendors_count,
            (select count(store_id) store_id from tbl_products_store where tbl_products_store.product_id =products.product_id ) store_count,
            (select count(*) from reviews where reviews.product_id =products.product_id ) reviews_count
            from products where product_id in 
              ( 
			select distinct product_id from tbl_products_store where store_id in( 
						select store_id from store_users where user_id = {$user_id} 
                            )
                 ) 
                ORDER BY date_time DESC   ";
    }


    $query = query($sql2);
    confirm($query);


    while ($row = fetch_array($query)) {
        $display_status = '';
        $product_image = display_image($row['product_image']);
        if ($row['publish_status'] == 'public') {
            $change_status = 'Draft';
            $display_status = "<td><span class='label label-success' style='font-size:revert'>Published</span></td>";
        } else {
            $change_status = 'Published';
            $display_status = "<td><span class='label label-warning' style='font-size: revert'>Draft</span></td>";
        }

        $role_assign = '';

        $vendors = '';
        if ($row['vendors_count'] == '0') {
            $vendors = "<td><span class='fa fa-remove'></span></td>";
        } else {
            $vendors = "<td>{$row['vendors_count']}</td>";
        }

        $stores = '';
        if ($row['store_count'] == '0') {
            $stores = "<td><span class='fa fa-remove'></span></td>";
        } else {
            $stores = "<td>{$row['store_count']}</td>";
        }


        if ($_SESSION['user_role'] == 'admin') {
            $role_assign = <<<DELIMITER
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="index.php?view_product&page=products&product_id={$row['product_id']}"><i class="glyphicon glyphicon-zoom-in"></i> View</a></li>
                                <li class="divider"></li>
                                <li><a href="index.php?edit_product&id={$row['product_id']}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                                <li class="divider"></li>
                                <li><a data-toggle="confirmation" href="index.php?delete_products&id={$row['product_id']}"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                 <li class="divider"></li>   
                                <li><a data-toggle="confirmation" href="index.php?change_status_products&id={$row['product_id']}&status={$row['publish_status']}"><i class="glyphicon glyphicon-retweet"></i> Status ({$change_status})</a></li>
                                <li class="divider"></li>                               
                                <li><a href="index.php?display_vendor_to_product&product_id={$row['product_id']}"><i class="fa fa-user-secret"></i> Vendors </a></li>                           
                                <li class="divider"></li>
                                <li><a href="index.php?display_stores_to_product&product_id={$row['product_id']}"><i class="fa fa-globe"></i> Stores </a></li>                           
                                <li class="divider"></li>
                                <li><a href="index.php?product_reviews&id={$row['product_id']}"><i class="glyphicon glyphicon-list-alt"></i> Reviews ({$row['reviews_count']})</a></li>                           
                                <li class="divider"></li>
                                
                            </ul>    
                        </div>                        
                    </td>
DELIMITER;

        } else {
            $role_assign = <<<DELIMITER
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                  
                                <li><a href="index.php?view_product&page=products&product_id={$row['product_id']}"><i class="glyphicon glyphicon-zoom-in"></i> View</a></li>
                                <li class="divider"></li>
                                <li><a href="index.php?product_reviews&id={$row['product_id']}"><i class="glyphicon glyphicon-list-alt"></i> Reviews ({$row['reviews_count']})</a></li>                           
                                 <li class="divider"></li>
                            </ul>    
                        </div>                        
                    </td>
DELIMITER;
        }


        $products_admin = <<<DELIMETER
                <tr >
                    <td class="col-md-1">
                        <div class="label label-primary" style="font-size: medium">{$row['product_id']}</div>
                        <br/>
                        <br/>
                        <a target="_blank" href="../../resources/apis/barcode/generate.php?text={$row['product_id']}"> <img src="../../resources/images/barcode.png" style="width: 70px;" class="img-responsive"></a>
                    </td>  
                    <td  >
                        
                         {$row['product_title']}
                          <br/>
                         <img class="img-responsive img-thumbnail" style="width:80px;height: 50px" src="../../resources/{$product_image}" alt=""/> 
                        
                    </td>
                    
                    
                    <td>{$row['product_quantity']}</td>
                    <td>{$row['brand_name']}</td>         
                    <td>{$row['product_category']}</td>                     
                    {$vendors}                   
                       {$stores}         
                    {$display_status}
                    {$role_assign}
                   
                </tr>
DELIMETER;

        echo $products_admin;

    }

}

function display_vendors_products($product_id)
{


    $sql = "select id, (select CONCAT(f_name,' ',l_name) from vendor where vendor.id = tbl_purchase_from_vendor.vendor_id) vendor_name,
                vendor_id,invoice_number,quantity,product_purchase_price,total_amount,date_time ,
                (select username from users where users.user_id = tbl_purchase_from_vendor.user_id) user_name
                from tbl_purchase_from_vendor 
                where product_id = {$product_id}
                ORDER BY date_time DESC";


    $query = query($sql);
    confirm($query);
    if (mysqli_num_rows($query) == 0) {
        no_record_found();
    }
    while ($row = fetch_array($query)) {

        $vendor = <<<DELIMITER
 
            <tr>
                <td> 
                <a target="_blank" style="font-size: medium" href="index.php?vendor_invoice&invoice_no={$row['invoice_number']}&vendor_id={$row['vendor_id']}">    {$row['invoice_number']}</a>
                 </td>
                <td>{$row['vendor_name']}</td>
                <td>{$row['product_purchase_price']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['total_amount']}</td>
                <td>{$row['date_time']}</td>
                <td>{$row['user_name']}</td>
                
            </tr>
                        
DELIMITER;

        echo $vendor;

    }
}

function fill_store_name_in_assign_product($product_id)
{

    $product_id = escape_string($product_id);

    $sql = "select store_id,store_location from stores 
            where store_id not in (select distinct store_id from tbl_products_store where product_id = {$product_id})
            order by store_location ";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELEMITER
    
                        <option value="{$row['store_id']}">{$row['store_location']}</option>


DELEMITER;

        echo $stores;

    }
}

function display_assined_store_products($product_id)
{


    $sql = "select store_id,
                (select store_location from stores WHERE stores.store_id = tbl_products_store.store_id) store_name,
                product_quantity,date_send_return  from tbl_products_store    
                                where product_id = {$product_id}
                                ORDER BY date_time DESC";


    $query = query($sql);
    confirm($query);
    if (mysqli_num_rows($query) == 0) {
        no_record_found();
    }
    while ($row = fetch_array($query)) {
        $quantity = '';
        if ($row['product_quantity'] == '0') {
            $quantity = "<td><span class='fa fa-lock fa-2x'></span></td>";
        } else {
            $quantity = "<td>{$row['product_quantity']}</td>";
        }


        $stores = <<<DELIMITER
 
            <tr>
                <td><span class="label label-primary" style="font-size: medium">{$row['store_id']}</span></td>
                <td>{$row['store_name']}</td>
                
                 {$quantity}
                <td>{$row['date_send_return']}</td>
             
            </tr>
                        
DELIMITER;

        echo $stores;

    }
}




/************************************************************/
//index.php?add_product
/************************************************************/

//fill dropdown vendors
function get_vendor_for_product()
{

    $sql = "select   * from vendor order by f_name,l_name ";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $vendor_name = <<<DELIMETER
               <option value="{$row['id']}">{$row['id']} :: {$row['f_name']} {$row['l_name']}</option>
DELIMETER;
        echo $vendor_name;
    }


}

function fill_stores_in_add_product()
{

    $sql = "select store_id,store_location from stores where store_id in (SELECT distinct store_id 	FROM store_users)";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $stores = <<<DELIMETER
                 
                <tr>
                    <th class="col-md-1">
                        <h4  style="margin-top:10px;">{$row['store_location']}</h3>
                    </th>
                    <td class="col-md-1">

                        <input type="checkbox" id="store_id_{$row['store_id']}" class="form-control" name="store[]" value="{$row['store_id']}"  onchange="active_quantity({$row['store_id']})"/>
                    </td>
                    <td class="col-md-6">

                        <div class="input-group" style="margin-top: 5px;">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                            <input   type="number" name="assign_quantity_store[]" class="form-control quantity" placeholder="Quantity" id="Product_quantity_{$row['store_id']}" value="0" data-validation-required-message="Please enter product Quantity" disabled>
                        </div>
                    </td>
                </tr>        
DELIMETER;

        echo $stores;


    }


}

function add_product()
{

    if (isset($_POST['publish'])) {

        add_new_product('public');
    }

    if (isset($_POST['draft'])) {

        add_new_product('pvt');
    }

}

function add_new_product($product_publish_status)
{

    $store_location = array();
    $store_quantity = array();

    $publish_status = escape_string($product_publish_status);
    $use_id = $_SESSION['user_id'];

    $product_title = escape_string($_POST['product_title']);

    $product_short_description = escape_string($_POST['product_short_description']);

    $product_price = escape_string($_POST['product_price']);
    $product_disc_price = escape_string($_POST['product_disc_price']);
    $recommend = escape_string($_POST['recommend']);

    $product_description = escape_string($_POST['product_description']);

    $product_category_id = escape_string($_POST['product_category']);
    $product_sub_category_id = escape_string($_POST['product_sub_category']);
    $product_brand_id = escape_string($_POST['product_brand']);

    $cash_on_delivery = escape_string($_POST['cash_on_delivery']);
    $condition = escape_string($_POST['condition']);
    $sale_type = escape_string($_POST['sale_type']);

    $product_path_for_db = '';
    if ($_FILES['file']['size'] != 0) {
        $image_name = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);
        $image_size = escape_string($_FILES['file']['size']);

        $msg = check_parameters_upload($image_name, $image_size);// check parameters
        if ($msg == false) {
            set_message($_SESSION['return_msg_image'], 'danger');
            unset($_SESSION['return_msg_image']);
            return;
        } elseif ($msg == true) {
            $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));//get image format
            $newname_image = date('YmdHis', time()) . mt_rand() . '.' . $ext; //create new name for iamge
            copy($image_temp_location, UPLOAD_DIRECTORY . DS . $newname_image); // move to folder
            $product_path_for_db = $newname_image;
        }
    }


    $sql = "INSERT INTO products(sale_type,product_title,product_category_id,product_sub_category_id,product_brand_id,
                                  product_price,product_disc_price,product_description,product_short_description,
                                  product_image,user_Id,recommend,publish_status,cash_on_delivery,product_condition) 
            values ('{$sale_type}','{$product_title}',{$product_category_id},{$product_sub_category_id},{$product_brand_id},
                     {$product_price},{$product_disc_price},'{$product_description}','{$product_short_description}',
                     '{$product_path_for_db}',{$use_id},'{$recommend}','{$publish_status}',{$cash_on_delivery},'{$condition}')";


    $query = query($sql);
    $last_id = last_id();
    confirm($query);
    if ($query) {

        set_message("New Product with id {$last_id} Added as " . $publish_status, 'success');
        redirect("index.php?products");

    } else {
        set_message("internet issue", 'danger');
        redirect("index.php?add_product");
    }


}

//fill dropdown categories
function get_categories_at_add_product()
{

    $sql = "select * from categories order by cat_title ";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $category_options = <<<DELIMETER
               <option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETER;
        echo $category_options;
    }


}

//fill dropdown sub categories
function get_sub_categories_at_add_product()
{

    $sql = "select * from sub_categories order by sub_category_name ";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $sub_category_options = <<<DELIMETER
               <option value="{$row['sub_category_id']}">{$row['sub_category_name']}</option>
DELIMETER;
        echo $sub_category_options;
    }


}

//fill dropdown brands
function get_brands_at_add_product()
{

    $sql = "select * from brands order by brand_name ";
    $send_query = query($sql);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $brands_options = <<<DELIMETER
               <option value="{$row['brand_id']}">{$row['brand_name']}</option>
DELIMETER;
        echo $brands_options;
    }


}

function display_vendor_serial_detail($product_id, $vendor_invoice_no, $vendor_id)
{

    $sql = "select  (select product_title from products where products.product_id = tbl_purchase_from_vendor.product_id) product_name,
                (select CONCAT(f_name,' ',l_name) v_name from vendor where vendor.id = tbl_purchase_from_vendor.vendor_id) vendor_name,
                product_purchase_price,quantity,total_amount,date_time,invoice_number,
                (select username from users where users.user_id = tbl_purchase_from_vendor.user_id) user_name
                 from tbl_purchase_from_vendor where product_id = {$product_id} and invoice_number = '{$vendor_invoice_no}' and vendor_id = {$vendor_id} limit 1";

// echo $sql;
// return;
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $vendor = <<<DELIMITER
                <tbody>
                   <tr>
                        <th>Invoice No.</th>
                        <td><span  class="label label-primary" style="font-size:medium">{$row['invoice_number']}</span></td>
                    </tr>
                    <tr>
                        <th>Product Title</th>
                        <td>{$row['product_name']}</td>
                    </tr>
                    <tr>
                        <th>Vendor Name</th>
                        <td>{$row['vendor_name']}</td>
                    </tr>
                    
    
                    <tr>
                        <th>Product Quantity</th>
                        <td>{$row['quantity']}</td>
                    </tr>
                    <tr>
                        <th>Purchase Price</th>
                        <td>{$row['product_purchase_price']}</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>{$row['total_amount']}</td>
                    </tr>
                    
                   
                    <tr>
                        <th>Updated On</th>
                        <td>{$row['date_time']}</td>
                    </tr>
                    <tr>
                        <th>Added by</th>
                        <td>{$row['user_name']}</td>
                    </tr>
                </tbody>
DELIMITER;

        echo $vendor;
    }


}


/************************************************************/
//index.php?edit_product
/************************************************************/
function display_in_edit_product()
{
    if (isset($_GET['id'])) {

        $data = array();


        $sql = "select sale_type,product_id,product_title,cash_on_delivery,product_condition,
            (select cat_title from categories where categories.cat_id = products.product_category_id) product_category_name,product_category_id,
            (select sub_category_name from sub_categories where sub_categories.sub_category_id = products.product_sub_category_id) product_sub_category_name,product_sub_category_id,
            (select brand_name from brands where brands.brand_id = products.product_brand_id) product_brand_name,product_brand_id,
            product_price,product_disc_price,product_description,product_short_description,
            product_image,recommend,publish_status,(select username from users where users.user_id = products.user_Id) user_name,user_id
            FROM products where product_id = " . escape_string($_GET['id']);
//        echo $sql;
//        return;
        $query = query($sql);
        confirm($query);

        while ($row = fetch_array($query)) {
            $data[100] = escape_string($row['publish_status']);

            $data[0] = escape_string($row['product_title']);
            $data[1] = escape_string($row['product_short_description']);
            $data[2] = escape_string($row['product_description']);
            $data[3] = escape_string($row['product_price']);
            $data[4] = escape_string($row['product_disc_price']);

            $data[12] = escape_string($row['product_category_name']);
            $data[13] = escape_string($row['product_category_id']);
            $data[14] = escape_string($row['product_sub_category_name']);
            $data[15] = escape_string($row['product_sub_category_id']);
            $data[16] = escape_string($row['product_brand_name']);
            $data[17] = escape_string($row['product_brand_id']);
            $data[18] = escape_string($row['recommend']);
            $data[19] = escape_string($row['cash_on_delivery']);
            $data[21] = escape_string($row['product_condition']);
            $data[20] = display_image($row['product_image']);
            $data[22] = escape_string($row['sale_type']);

        }
        return $data;
    }
}

function fill_stores_in_edit_product()
{
    $store_id = array();
    $store_name = array();
    $store_quantity = array();

    if (isset($_GET['id'])) {

        $product_id = escape_string($_GET['id']);

        $SQL1 = "select (select store_location from stores s where s.store_id = p.store_id) store_location, 
                          store_id,product_quantity
                        from tbl_products_store p where product_id ={$product_id}";
        $query1 = query($SQL1);
        confirm($query1);
        while ($row1 = fetch_array($query1)) {
            array_push($store_id, $row1['store_id']);
            array_push($store_name, $row1['store_location']);
            array_push($store_quantity, $row1['product_quantity']);
        }

//print_r(array_push);
    }


    $textbox = '';

    $sql = "select store_id,store_location from stores where store_id in (SELECT	distinct store_id 	FROM store_users)";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        for ($i = 0; $i <= sizeof($store_id) - 1; $i++) {
            if ($row['store_id'] == $store_id[$i]) {
                $textbox = "<tr>
                    <th class=\"col-md-1\">
                        <h4  style=\"margin-top:10px;\">{$row['store_location']}</h3>
                    </th>
                    <td class=\"col-md-1\">
                         <input checked type=\"checkbox\" id=\"store_id_{$row['store_id']}\" class=\"form-control\" name=\"store[]\" value=\"{$row['store_id']}\"  onchange=\"active_quantity({$row['store_id']})\"/>        
                    </td>
                    <td class=\"col-md-6\">

                        <div class=\"input-group\" style=\"margin-top: 5px;\">
                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-plus\"></i></span>
                            <input type=\"number\" name=\"assign_quantity_store[]\" class=\"form-control\" placeholder=\"Quantity\" id=\"Product_quantity_{$row['store_id']}\" value=\"{$store_quantity[$i]}\">
                        </div>
                    </td>
                </tr>";
                break;
            } else {
                $textbox = "<tr>
                    <th class=\"col-md-1\">
                        <h4  style=\"margin-top:10px;\">{$row['store_location']}</h3>
                    </th>
                    <td class=\"col-md-1\">
                         <input  type=\"checkbox\" id=\"store_id_{$row['store_id']}\" class=\"form-control\" name=\"store[]\" value=\"{$row['store_id']}\"  onchange=\"active_quantity({$row['store_id']})\"/>        
                    </td>
                    <td class=\"col-md-6\">

                        <div class=\"input-group\" style=\"margin-top: 5px;\">
                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-plus\"></i></span>
                            <input type=\"number\" name=\"assign_quantity_store[]\" class=\"form-control\" placeholder=\"Quantity\" id=\"Product_quantity_{$row['store_id']}\" value=\"0\" disabled>
                        </div>
                    </td>
                </tr>";
            }
        }
        echo $textbox;
    }
}


function edit_product()
{

    if (isset($_POST['publish'])) {
        process_edit_product('public');
    }

    if (isset($_POST['draft'])) {
        process_edit_product('pvt');
    }


}

function process_edit_product($status)
{

    $store_location = array();
    $store_quantity = array();

    $product_id = escape_string($_GET['id']);
    $publish_status = escape_string($status);
    $user_id = $_SESSION['user_id'];

    $product_title = escape_string($_POST['product_title']);
    $product_short_description = escape_string($_POST['product_short_description']);
    $product_price = escape_string($_POST['product_price']);
    $product_disc_price = escape_string($_POST['product_disc_price']);
    $recommend = escape_string($_POST['recommend']);
    $cash_on_delivery = escape_string($_POST['cash_on_delivery']);
    $product_description = escape_string($_POST['product_description']);
    $product_condition = escape_string($_POST['condition']);


    $product_category_id = escape_string($_POST['product_category']);
    $product_sub_category_id = escape_string($_POST['product_sub_category']);
    $product_brand_id = escape_string($_POST['product_brand']);


//    image

    $product_path_for_db = '';
    if (empty($product_image)) {
        $get_pic = "select product_image from products where product_id =" . escape_string($_GET['id']);
        $query_pic = query($get_pic);
        confirm($query_pic);
        while ($pic = fetch_array($query_pic)) {
            $product_path_for_db = $pic['product_image'];
        }
    } elseif ($_FILES['file']['size'] != 0) {

        $image_name = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);
        $image_size = escape_string($_FILES['file']['size']);

        $msg = check_parameters_upload($image_name, $image_size);// check parameters
        if ($msg == false) {
            set_message($_SESSION['return_msg_image'], 'danger');
            unset($_SESSION['return_msg_image']);
            return;
        } elseif ($msg == true) {
            $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));//get image format
            $newname_image = date('YmdHis', time()) . mt_rand() . '.' . $ext; //create new name for iamge
            copy($image_temp_location, UPLOAD_DIRECTORY . DS . $newname_image); // move to folder
            $product_path_for_db = $newname_image;
        }

    }


    $sql = "update products set ";
    $sql .= "product_title             = '{$product_title}', ";
    $sql .= "product_short_description = '{$product_short_description}', ";
    $sql .= "product_price             =  {$product_price}, ";
    $sql .= "product_disc_price        =  {$product_disc_price}, ";
    $sql .= "recommend                 =  '{$recommend}', ";
    $sql .= "cash_on_delivery          =  {$cash_on_delivery}, ";
    $sql .= "product_description       = '{$product_description}', ";

    $sql .= "product_category_id       =  {$product_category_id}, ";
    $sql .= "product_sub_category_id   =  {$product_sub_category_id}, ";
    $sql .= "product_brand_id          =  {$product_brand_id}, ";
    $sql .= "product_condition          =  '{$product_condition}', ";


    $sql .= "user_Id                   = {$user_id}, ";
    $sql .= "publish_status            = '{$publish_status}', ";
    $sql .= "product_image             = '{$product_path_for_db}' ";
    $sql .= "where product_id          =" . $product_id;


    $query = query($sql);
    confirm($query);
    if ($query) {
        set_message("Product Updated", 'success');
        redirect("index.php?products");
    } else {
        set_message("Some error to update", 'danger');
        redirect("index.php?edit_product");
    }
}


/************************************************************/
//index.php?product_reviews
/************************************************************/
function display_product_reviews()
{

    if (isset($_GET['id'])) {
        $product_id = escape_string($_GET['id']);
    }

    $sql = "select * from reviews  where product_id =" . $product_id . " order by date_time";

    $query = query($sql);
    confirm($query);
    if (mysqli_num_rows($query) == 0) {
        no_record_found();
    }

    while ($row = fetch_array($query)) {


        $reviews = <<<DELIMETER
                    <tr>
                        <td>{$row['name']}</td>               
                        <td>{$row['email']}</td>
                       
                        <td>{$row['date_time']}</td>
                         <td>{$row['comment']}</td>
                        <td><a  class="btn btn-danger" href="index.php?delete_review&review_id={$row['id']}&product_id={$row['product_id']}"><span class="glyphicon glyphicon-trash"> Delete</span> </a></td>
                         
                         
                    </tr>
DELIMETER;

        echo $reviews;

    }


}


/************************************************************/
//index.php?product_detail
/************************************************************/
function display_product_detail()
{
    if (isset($_GET['product_id'])) {
        $product_id = escape_string($_GET['product_id']);
        $user_id = '';

        if ($_SESSION['user_role'] == 'admin') {
            $user_id = '%';
        } else {
            $user_id = $_SESSION['user_id'];
        }

        $sql = "select product_id,product_title,cash_on_delivery,product_condition,
                    (select cat_title from categories where categories.cat_id = products.product_category_id) product_category_name,
                    (select sub_category_name from sub_categories where sub_categories.sub_category_id = products.product_sub_category_id) product_sub_category_name,
                    (select brand_name from brands where brands.brand_id = products.product_brand_id) product_brand_name,
                    product_purchase_price,product_price,product_disc_price,product_quantity,product_short_description,product_description,
                    product_image,date_time,(select username from users where users.user_id = products.user_Id) user_name,recommend,publish_status,
                    (select GROUP_CONCAT(product_at_store)   from ( 
												select CONCAT(store_location, ': ', product_quantity, ' ') product_at_store	from (
                        select product_quantity,(select store_location from stores where stores.store_id=tbl_products_store.store_id) store_location 
                        from tbl_products_store where tbl_products_store.product_id = {$product_id}
                        and tbl_products_store.store_id in (select store_id from store_users where user_id like '{$user_id}')
                         ) xx
                        ) foo) store_location_and_quantity
                            FROM products
                            where product_id = {$product_id}";
        $query = query($sql);
        confirm($query);


        while ($row = fetch_array($query)) {
            $product_image = display_image($row['product_image']);

            $admin_data = '';
            if ($_SESSION['user_role'] == 'admin') {
                $admin_data = <<<DELIMITER
                                <tr>
                                    <th>Purchase Price </th>
                                    <td> {$row['product_purchase_price']}</td>
                                </tr>
                                 <tr >
                                    <th>Quantity in Store </th>
                                    <td colspan="2"> {$row['product_quantity']}</td>
                                </tr>
                                <tr >
                                    <th>Publish Status</th>
                                    <td colspan="2"> {$row['publish_status']}</td>
                                </tr>
DELIMITER;

            } else {
                $admin_data = '';
            }


            $product_detail = <<<DELIMETER
                                 
                                
                                 <tr >
                                    <th class="col-md-4">Product ID </th>
                                    <th class="col-md-5"> {$row['product_id']}</th>
                                    <td class="col-md-3" rowspan="6"><img src="../../resources/{$product_image}" class="img-responsive img-thumbnail" style="width: 230px" /></td>
                                </tr>
                
                                <tr >
                                    <th>Product Name </th>
                                    <td>{$row['product_title']}</span></td>
                                </tr>
                                 {$admin_data}
                                <tr >
                                    <th>Category </th>
                                    <td> {$row['product_category_name']}</td>
                                </tr>
                                <tr>
                                    <th>Sub Category </th>
                                    <td> {$row['product_sub_category_name']}</td>
                                </tr>
                                <tr>
                                    <th>Brand </th>
                                    <td> {$row['product_brand_name']}</td>
                                </tr>
                               
                                <tr >
                                    <th>Sale Price </th>
                                    <td colspan="2"> {$row['product_price']}</td>
                                </tr>
                                <tr >
                                    <th>Discount Price </th>
                                    <td colspan="2">{$row['product_disc_price']}  </td>
                                </tr>
                                
                                <tr >
                                    <th>Upload Time </th>
                                    <td colspan="2"> {$row['date_time']}</td>
                                </tr>
                                <tr >
                                    <th>Upload by</th>
                                    <td colspan="2"> {$row['user_name']}</td>
                                </tr>                                 
                                <tr >
                                    <th>Recommend For</th>
                                    <td colspan="2"> {$row['recommend']}</td>
                                </tr>
                                <tr >
                                    <th>Condition</th>
                                    <td colspan="2">{$row['product_condition']}</td>
                                </tr>
                                <tr >
                                    <th>Cash on Delivery</th>
                                    <td colspan="2">Rs. {$row['cash_on_delivery']}</td>
                                </tr>
                                
                                <tr >
                                    <th>Product Location and Quantity</th>
                                    <td colspan="2"> {$row['store_location_and_quantity']}</td>
                                </tr>
                                 <tr >
                                    <th>Short Description </th>
                                    <td colspan="2"> {$row['product_short_description']}</td>
                                </tr>
                               
DELIMETER;

            echo $product_detail;
            echo "<tr >
                        <th>Long Description </th>
                        <td colspan=\"2\"> 
                            <table class='table table-responsive table-hover table-bordered table-striped'>
                                <tbody>";
            $description = $row['product_description'];
            $des_pieces = explode("|", $description);
            foreach ($des_pieces as $obj) {
                $des_final = explode("=", $obj);
                $display_description = "<tr>
                                                                     <th>{$des_final[0]}</th>
                                                                     <td><p>{$des_final[1]}</p></td>
                                                                </tr>";
                echo $display_description;
            }
            echo "                </tbody>
                             </table>
                        </td>
                  </tr>";
        }

    }


}


/************************************************************/
//index.php?categories
/************************************************************/
function show_categories_in_admin()
{

    $sql = "select * from categories order by cat_id  ";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $category = <<<DELIMETER
                    <tr>                        
                        <td><span class="label label-primary" style="font-size: medium">{$row['cat_id']}</span> </td>
                        <td class="bg-warning"> {$row['cat_title']} </td>
                        <td>
                        <a class="btn btn-danger" data-toggle="confirmation" href="index.php?delete_category&id={$row['cat_id']}&type=categories" ><span class="glyphicon glyphicon-trash"></span> Delete</a>
                        </td>
                    </tr>
DELIMETER;
        echo $category;

    }

}

function add_categories_in_admin()
{
    if (isset($_POST['add_cat'])) {

        $new_cat = escape_string($_POST['cat_title']);
        $sql = "insert into categories (cat_title) values ('{$new_cat}')";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('New Category added', 'success');
            redirect('index.php?categories');
        } else {
            set_message('Internet issue', 'danger');
        }

    }
}


/************************************************************/
//subcategories
/************************************************************/
function show_categories_in_sub_cat_dropdown()
{
    $sql = "select * from categories order by cat_id";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $category = <<<DELIMETER
         <option value="{$row['cat_id']}">{$row['cat_title']}</option>

DELIMETER;
        echo $category;

    }
}

function show_sub_categories_in_admin()
{

    $sql = "select sub_category_id,sub_category_name           
            from sub_categories order by sub_category_id  ;";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $sub_category = <<<DELIMETER
                    <tr>
                        
                        <td><span class="label label-success" style="font-size: medium"> {$row['sub_category_id']} </span> </td>
                        <td class="bg-success"> {$row['sub_category_name']} </td>
                        
                        <td>
                             <a class="btn btn-danger" data-toggle="confirmation" href="index.php?delete_category&id={$row['sub_category_id']}&type=sub_cat" ><span class="glyphicon glyphicon-trash"></span> Delete</a>
                        </td>
                    </tr>
                    
DELIMETER;
        echo $sub_category;

    }

}

function add_sub_categories_in_admin()
{
    if (isset($_POST['add_sub_cat'])) {

        $cat_title = escape_string($_POST['cat_title']);
        $sub_cat_title = escape_string($_POST['sub_cat_title']);

        $sql = "insert into sub_categories (sub_category_name,category_id) values ('{$sub_cat_title}','{$cat_title}')";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('New Sub Category added', 'success');
            redirect('index.php?categories');
        } else {
            set_message('Internet issue');
            redirect('index.php?categories', 'danger');
        }

    }
}


/************************************************************/
//index.php?brands
/************************************************************/
function show_brands_in_admin()
{
    $row_num = 1;
    $sql = "select * from brands order by brand_id";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $category = <<<DELIMETER
                    <tr>
                        <td><span class="label label-primary" style="font-size: medium">{$row['brand_id']}</span></td>
                        <td>{$row['brand_name']}</td>
                        <td>
                        <a class="btn btn-danger" data-toggle="confirmation" href="index.php?delete_brands&brand_id={$row['brand_id']}" ><span class="glyphicon glyphicon-trash"></span> Delete</a>
                        </td>
                    </tr>
DELIMETER;
        echo $category;
        $row_num++;
    }

}

function add_brands_in_admin()
{
    if (isset($_POST['add_brand'])) {

        $brand_name = escape_string($_POST['brand_name']);
        $sql = "insert into brands (brand_name) values ('{$brand_name}')";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('New Brand added', 'success');
            redirect('index.php?brands');
        } else {
            set_message('Internet issue', 'danger');
        }

    }
}


/***********************************************************/
//index.php?users
/************************************************************/
function display_users_in_admin()
{
    $change_role = '';
    $change_status = '';
    $status_class = '';
    $user_name = '';
    $role = '';
    $status = '';
    $email = '';
    $store_location = '';
    $sql = "select tbl_users.*,tbl_store.store_location
            from
            (select * from users order by user_id) tbl_users
            LEFT OUTER JOIN 
            (SELECT foo.user_id,GROUP_CONCAT(foo.store_id) store_location
							FROM(
							select  user_id, (select store_location from stores WHERE stores.store_id = store_users.store_id) store_id  
							from store_users  
							order by store_id
							) foo
							GROUP BY foo.user_id) tbl_store
            on tbl_store.user_id =tbl_users.user_id";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        if ($row['role'] == 'admin') {
            $change_role = 'saler';
        } else {
            $change_role = 'admin';
        }

        if ($row['status'] == 'Ban') {
            $change_status = 'Active';
            $status_class = 'glyphicon glyphicon-check';
            $user_name = " <del>{$row['username']}</del>";
            $role = "<del>{$row['role']}</del>";
            $status = "<del>{$row['status']}</del>";
            $useremail = "<del>{$row['useremail']}</del>";
            $store_location = "<del>{$row['store_location']}</del>";
        } else {
            $change_status = 'Ban';
            $status_class = 'glyphicon glyphicon-ban-circle';
            $user_name = $row['username'];
            $role = $row['role'];
            $status = $row['status'];
            $useremail = $row['useremail'];
            $store_location = $row['store_location'];
        }

        $users = <<<DELIMETER
                    <tr>
                        <td><span class="label label-primary" style="font-size: medium">{$row['user_id']}</span></td>               
                        <td><strong>{$user_name}</strong></td>
                        <td>{$role}</td>
                        <td>{$status}</td>
                        <td>{$useremail}</td>
                        <td>{$store_location}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?edit_user&id={$row['user_id']}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                                     <li class="divider"></li>                                    
                                    <li><a href="index.php?user_action&id={$row['user_id']}&action=change_status&status={$change_status}"><i class="{$status_class}"></i> {$change_status}</a></li>
                                    <li class="divider"></li>
                                    <li><a href="index.php?user_action&id={$row['user_id']}&action=change_role&role={$change_role}"><strong>  Make {$change_role}</strong></a></li>
                                </ul>
    
                            </div>                        
                        </td>
                    </tr>
DELIMETER;
        echo $users;


//        <li><a data-toggle="confirmation" href="index.php?user_action&id={$row['user_id']}&action=delete"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
//                                    <li class="divider"></li>

    }

}


function add_users()
{

    if (isset($_POST['add_user'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_role = $_POST['role'];
        $user_status = $_POST['user_status'];
        $store_location = $_POST['store'];

        $sql = "insert into users (username,useremail,password,role,status) values ('{$username}','{$email}','{$password}','{$user_role}','{$user_status}')";
        $query = query($sql);
        $user_id = last_id();
        confirm($query);

        if ($query) {
            foreach ($store_location as $store_id) {
                $sql2 = "insert into store_users (store_id,user_id) values ({$store_id},{$user_id})";
                $query2 = query($sql2);
            }
            confirm($query2);
            if ($query2) {
                set_message('New User with name ' . $username . ' added', 'success');
                redirect('index.php?users');
            } else {
                set_message('Internet Issue', 'danger');
                redirect('index.php?users');
            }
        } else {
            set_message('Internet Issue', 'danger');
            redirect('index.php?users');
        }

    }


}

function fill_stores_in_add_users()
{

    $sql = "select store_id,store_location from stores";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELIMETER
         
                 <div class="checkbox">
                    <label>
                        <input type="checkbox" name="store[]" value="{$row['store_id']}"> {$row['store_location']}                        
                    </label>
                </div>
                    
DELIMETER;

        echo $stores;

    }


}

function update_users($user_id,$go)
{

    if (isset($_POST['update_user'])) {
        $user_id = escape_string($user_id);

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_role = $_POST['role'];
        $status = $_POST['status'];
        $store_location = $_POST['store'];

        $sql = "update users set username = '{$username}' , useremail = '{$email}',password = '{$password}',role = '{$user_role}',status = '{$status}' where user_id = {$user_id}";
        $query = query($sql);
        confirm($query);
        if ($query) {

            $sql2 = "delete from store_users where user_id = {$user_id}";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {

                foreach ($store_location as $store_id) {
                    $sql3 = "insert into store_users (store_id,user_id) values ({$store_id},{$user_id})";
                    $query3 = query($sql3);
                }
                confirm($query3);
                if ($query3) {
                    set_message('User Detail Updated', 'success');
                    redirect('index.php?'.$go);

                } else {
                    set_message('Internet Issue', 'danger');
                    redirect('index.php?'.$go);
                }

            } else {
                set_message('Internet Issue', 'danger');
                redirect('index.php?'.$go);
            }

        } else {
            set_message('Internet Issue', 'danger');
            redirect('index.php?'.$go);
        }

    }


}

function fill_stores_in_update_users($user_id)
{

    $checkBoxValue = 'checked';

    $sql = "select tbl_store.*,IFNULL(tbl_users.store_id,0) AS store_id_one_2_one, IFNULL(tbl_users.user_id,0) AS user_id_one_2_one
                from
                (select store_id,store_location from stores) tbl_store
                LEFT OUTER JOIN
                (select * from store_users where user_id = {$user_id}) tbl_users
                on tbl_store.store_id = tbl_users.store_id";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        if ($row['store_id'] == $row['store_id_one_2_one']) {
            $checkBoxValue = 'checked';
        } else {
            $checkBoxValue = '';
        }
        $stores = <<<DELIMETER
         
                 <div class="checkbox">
                    <label>
                        <input type="checkbox" {$checkBoxValue}  name="store[]" value="{$row['store_id']}"> {$row['store_location']}                        
                    </label>
                </div>
                    
DELIMETER;

        echo $stores;

    }


}

function fill_stores_in_new_users()
{


    $sql = "select store_id,store_location from stores";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $stores = <<<DELIMETER
         
                 <div class="checkbox">
                    <label>
                        <input type="checkbox"   name="store[]" value="{$row['store_id']}"> {$row['store_location']}                        
                    </label>
                </div>
                    
DELIMETER;

        echo $stores;

    }


}


/************************************************************/
//index.php?vendors
/************************************************************/

function add_vendor()
{

    if (isset($_POST['add_vendor'])) {

        $is_customer = 0;
        $f_name = escape_string($_POST['f_name']);
        $l_name = escape_string($_POST['l_name']);
        $phone = escape_string($_POST['phone']);
        $email = escape_string($_POST['mail']);
        $house_street = escape_string($_POST['house_street']);
        $town_city = escape_string($_POST['town_city']);
        $zip_postal_code = escape_string($_POST['zip_postal_code']);
        $province = escape_string($_POST['province']);
        $country = escape_string($_POST['country']);
        $type = escape_string($_POST['type']);
        $store_id = escape_string($_POST['store_id']);
        $user_id = $_SESSION['user_id'];

        if ($type == 'vendor') {

//           insert vendor as simple vendor

            $sql = "insert into vendor(f_name,l_name,phone,email,user_id,is_customer,house_street,town_city,zip_code_postal,province,countary)
                        values ('{$f_name}','{$l_name}','{$phone}','{$email}',{$user_id},{$is_customer},'{$house_street}','{$town_city}','{$zip_postal_code}','{$province}','{$country}')";

            $query = query($sql);
            confirm($query);
            $vendor_id = last_id();
            if ($query) {
                $sql22 = "insert into vendors_bill_summary(vendor_id,user_id)
                          values ({$vendor_id},{$user_id})";

                $query22 = query($sql22);
                confirm($query22);
                if ($query22) {
                    set_message('New Vendor Added', 'success');
                    redirect('index.php?vendors');
                } else {
                    set_message('Error to Add Vendor', 'danger');
                    redirect('index.php?vendors');
                }

            } else {
                set_message('Error to Add Vendor', 'danger');
                redirect('index.php?vendors');
            }
        } else {

            $is_customer = 1;
            $customer_id = 0;
            $vendor_id = 0;
//insert vendor in customer table and return customer id
            $add_customer = "INSERT into customers(f_name,l_name,email,phone,house_street,town_city,province,country,zip_postal_code,added_by,is_vendor,store_id)
                VALUES('{$f_name}','{$l_name}','{$email}','{$phone}','{$house_street}','{$town_city}','{$province}','{$country}',
                               '{$zip_postal_code}',{$user_id},{$is_customer},{$store_id})";
            $add_customer_query = query($add_customer);
            $customer_id = last_id();
            confirm($add_customer_query);
            if ($add_customer_query) {
                $sql_bill = "INSERT into customer_bill_summary(customer_id,user_id)
                                VALUES({$customer_id},{$user_id})";
                $query_bill = query($sql_bill);
                confirm($query_bill);
//               insert vonder in vendor table with customer id
                $sql_add_vendor_customer = "insert into vendor(f_name,l_name,phone,email,user_id,is_customer,house_street,town_city,zip_code_postal,province,countary,customer_id)
                        values ('{$f_name}','{$l_name}','{$phone}','{$email}',{$user_id},{$is_customer},'{$house_street}','{$town_city}','{$zip_postal_code}','{$province}','{$country}',{$customer_id})";
                $query_add_vendor_customer = query($sql_add_vendor_customer);
                confirm($query_add_vendor_customer);
                $vendor_id = last_id();
                if ($query_add_vendor_customer) {
//                   update customer table reterning from vendor id of above query
                    $sql_update_customer = "update customers
                                            set vendor_id = {$vendor_id}
                                            where customer_id = {$customer_id}";

                    $query_update_customer = query($sql_update_customer);
                    confirm($query_update_customer);

                    $sql_update_customer22 = "insert into vendors_bill_summary(vendor_id,user_id)
                                              values ({$vendor_id},{$user_id})";

                    $query_update_customer22 = query($sql_update_customer22);
                    confirm($query_update_customer22);

                    if ($query_update_customer22) {
                        set_message('New Vendor Added', 'success');
                        redirect('index.php?vendors');
                    } else {
                        set_message('Error to Add Vendor', 'danger');
                        redirect('index.php?vendors');
                    }
                }
            }
        }
    }
}

function display_vendors()
{
    $row_number = 1;
    $sql = "select * from vendor order by date_time desc";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $type = '';
        if ($row['is_customer'] == '1') {
            $type = 'Vendor/Customer';
        } else {
            $type = 'Vendor';
        }

        $vendors = <<<DELIMITER

                <tr>
                    <td><div class="label label-primary" style="font-size: medium">{$row['id']}</div></td> 
                    <td><div class="label label-default" style="font-size: medium">{$row['customer_id']}</div></td>  
                    <td>{$row['f_name']} {$row['l_name']}</td> 
                     <td>{$type}</td> 
                    <td>{$row['phone']}</td> 
                    <td>{$row['email']}</td>  
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?history_vendor&vendor_id={$row['id']}"><i class="fa fa-edit"></i> Invoices</a></li> 
                                 <li class="divider"></li>
                                 <li><a href="index.php?edit_vendor&vendor_id={$row['id']}"><i class="glyphicon glyphicon-pencil"></i> Edit Profile</a></li>
                                 <li class="divider"></li>
                                <li><a data-toggle="confirmation" href="index.php?delete_vendor&vendor_id={$row['id']}"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                
                            </ul>

                        </div>                        
                    </td>
                </tr>


DELIMITER;

        echo $vendors;
        $row_number++;
    }
}

function fill_vendor_for_edit($vendor_id)
{

    $arr_data = array();
    $sql = "select * from vendor where id = {$vendor_id}";
    $query = query($sql);
    confirm($query);

    while ($row = fetch_array($query)) {

        $arr_data[0] = $row['f_name'];
        $arr_data[1] = $row['l_name'];
        $arr_data[2] = $row['phone'];
        $arr_data[3] = $row['email'];
        $arr_data[4] = $row['house_street'];
        $arr_data[5] = $row['town_city'];
        $arr_data[6] = $row['zip_code_postal'];
        $arr_data[7] = $row['province'];
        $arr_data[8] = $row['countary'];
        $arr_data[9] = $row['is_customer'];


    }

    return $arr_data;
}

function edit_vendor()
{

    if (isset($_POST['edit_vendor'])) {

        $f_name = escape_string($_POST['f_name']);
        $l_name = escape_string($_POST['l_name']);
        $phone = escape_string($_POST['phone']);
        $email = escape_string($_POST['mail']);
        $house_street = escape_string($_POST['house_street']);
        $town_city = escape_string($_POST['town_city']);
        $zip_postal_code = escape_string($_POST['zip_postal_code']);
        $province = escape_string($_POST['province']);
        $country = escape_string($_POST['country']);
        $user_id = $_SESSION['user_id'];
        $vendor_id = escape_string($_GET['vendor_id']);
        //          insert vendor as simple vendor
        $sql = "UPDATE vendor
                        SET f_name ='{$f_name}',l_name = '{$l_name}', phone = '{$phone}', email = '{$email}',user_id = {$user_id},
                            house_street = '{$house_street}',town_city = '{$town_city}',
                            zip_code_postal ='{$zip_postal_code}', province ='{$province}',countary ='{$country}' 
                        where id ={$vendor_id}";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('New Vendor Added', 'success');
            redirect('index.php?vendors');
        } else {
            set_message('Error to Add Vendor', 'danger');
            redirect('index.php?vendors');
        }

    }
}

function fill_products_for_vendor_invoice()
{
    $store_id = $_SESSION['store_id'];

    $sql = "select product_id,product_title from products  
            order by product_title";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $products = <<<DELEMITER
    
                        <option value="{$row['product_id']}">{$row['product_id']} --- {$row['product_title']}</option>


DELEMITER;

        echo $products;

    }
}

function fill_invoice_vendor_name($vendor_id)
{

    $vendor_id = escape_string($vendor_id);

    $sql = "select id,CONCAT(f_name,' ' ,l_name) vendor_name,
            phone,email,CONCAT(house_street, ', ' ,province, ', ' ,countary) address  
            from vendor 
            where id = {$vendor_id};";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $_SESSION['ses_vendor']['vendor_id'] = $row['id'];
        $_SESSION['ses_vendor']['vendor_name'] = $row['vendor_name'];
        $_SESSION['ses_vendor']['phone'] = $row['phone'];
        $_SESSION['ses_vendor']['email'] = $row['email'];
        $_SESSION['ses_vendor']['address'] = $row['address'];

    }

//    unset($_SESSION['ses_vendor']);

}

function submit_vendor_products($vendor_id)
{

    if (isset($_POST['add_product_to_invoice'])) {

        $vendor_invoice = escape_string($_POST['vendor_invoice']);

        $sql_chek_invoice = "select count(id) row_count_invoice from tbl_vendor_invoices where  invoice_id = '{$vendor_invoice}' and vendor_id = {$vendor_id}";


        $query_invoice_check = query($sql_chek_invoice);
        confirm($query_invoice_check);
        while ($row = fetch_array($query_invoice_check)) {


            if ($row['row_count_invoice'] > '0') {

                set_message('this invoice number already available with this vendor', 'danger');
                redirect('index.php?add_vendor_in_product&vendor_id=' . $vendor_id);
                return;
            }
        }


        $product_id = escape_string($_POST['product_id']);
        $vendor_invoice_date = escape_string($_POST['vendor_invoice_date']);
        $vendor_invoice = escape_string($_POST['vendor_invoice']);
        $product_quantity_by_vendor = escape_string($_POST['product_quantity_by_vendor']);
        $product_purchase_price = escape_string($_POST['product_purchase_price']);

        $_SESSION['vendor_invoice_' . $product_id]['product_quantity_by_vendor'] = $product_quantity_by_vendor;
        $_SESSION['vendor_invoice_' . $product_id]['product_purchase_price'] = $product_purchase_price;

        unset($_SESSION['vendor_add_invoice_date']);
        if (!isset($_SESSION['vendor_add_invoice_date'])) {
            $_SESSION['vendor_add_invoice_date'] = $vendor_invoice_date;
        }

        unset($_SESSION['vendor_add_invoice_no']);
        if (!isset($_SESSION['vendor_add_invoice_no'])) {
            $_SESSION['vendor_add_invoice_no'] = $vendor_invoice;
        }

        set_message('product add to invoice', 'success');
        redirect('index.php?add_vendor_in_product&vendor_id=' . $vendor_id);
    }

}

function get_vendor_invoice($invoice_no, $vendor_id)
{
    $invoice_no = escape_string($invoice_no);
    $vendor_id = escape_string($vendor_id);

    $data = array();
    $sql = "SELECT  (SELECT sum(quantity) total_products from tbl_purchase_from_vendor 
                where invoice_number ='{$invoice_no}'
                AND vendor_id = {$vendor_id}
                ) sub_total_products,
                (SELECT SUM(total_amount) total_amount from tbl_purchase_from_vendor 
                where invoice_number ='{$invoice_no}'
                AND vendor_id = {$vendor_id}
                ) sub_total_amount,
                
                (select CONCAT(f_name,'  ',l_name) ven_name from vendor where vendor.id =i.vendor_id) vendor_name,
            (select CONCAT(house_street, ' '  ,town_city ,' ', province  , ' ', countary) v_add from vendor where vendor.id =i.vendor_id) vendor_address,
            (select email from vendor where vendor.id =i.vendor_id) vendor_email,
            (select phone from vendor where vendor.id =i.vendor_id) vendor_phone, 		
            invoice_id, vendor_id, date_time,invoice_date, total_amount, paid_amount, payable_amount            
            from tbl_vendor_invoices i
            where invoice_id ='{$invoice_no}'
            AND vendor_id = {$vendor_id}";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $data[0] = $row['vendor_name'];
        $data[1] = $row['vendor_address'];
        $data[2] = $row['vendor_email'];
        $data[3] = $row['vendor_phone'];
        $data[4] = $row['invoice_id'];
        $data[5] = $row['invoice_date'];
        $data[6] = $row['sub_total_amount'];
        $data[7] = $row['paid_amount'];
        $data[8] = $row['payable_amount'];
        $data[9] = $row['vendor_id'];
        $data[10] = $row['sub_total_products'];


    }

    return $data;
}

function display_vendor_invoice($vendor_id)
{

    $total_amount = 0;
    $total_items = 0;
    $row_number = 1;
    foreach ($_SESSION as $name => $value) {//for getting all products which are under session
        if ($value > 0) {
            if (substr($name, 0, 15) == 'vendor_invoice_') {

                $length = strlen($name);
                $id = substr($name, 15, $length); //getting id

                $sql = "select product_id,product_title from products where product_id = {$id}";

                $query = query($sql);
                confirm($query);

                while ($row = fetch_array($query)) {

                    $quantity = $value['product_quantity_by_vendor'];
                    $purchase_price = $value['product_purchase_price'];

                    $sub = $quantity * $purchase_price;

                    $products = <<<DELIMETER
                    <tr >
                        <td>{$row_number}</td>
                        <td><strong>{$row['product_id']}</strong><input type="hidden" class="form-control" disabled name="product_id" value="{$row['product_id']}" / ></td>
                        <td><a href="index.php?view_product&page=start_invoice&product_id={$row['product_id']}"><strong>{$row['product_title']}</strong></a></td>
                         
                        <td>{$quantity}</td>
                        <td>{$purchase_price}</td> 
                        <td>{$sub}</td>
                        <td>
                        <div class="btn-group">
                             <a href="index.php?service_product_vendor_invoice&remove&vendor_id={$vendor_id}&product_id={$row['product_id']}" class="btn btn-danger"><span class="fa fa-remove"></span>  </a>
                        </div>
                        </td>
        
                    </tr>
DELIMETER;

                    echo $products;
                }

                $_SESSION['amount_totals_vendor_invoice'] = $total_amount += $sub;
                $_SESSION['items_totals_vendor_invoice'] = $total_items += $quantity;
                $row_number++;

            }

        } else {
//            $_SESSION['amount_totals_vendor_invoice'] = 00;
//            $_SESSION['items_totals_vendor_invoice'] = 00;
        }


    }

}


function purchase_from_vendors($invoice_no, $vendor_id)
{

    $invoice_no = escape_string($invoice_no);
    $vendor_id = escape_string($vendor_id);
    $row_number = 1;
    $sql = "select product_id,
            (select product_title from products where products.product_id = tbl_purchase_from_vendor.product_id) product_title,
             quantity,product_purchase_price ,(quantity*product_purchase_price) sub_total
            from tbl_purchase_from_vendor 
            where invoice_number ='{$invoice_no}'
            AND vendor_id = {$vendor_id}";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        if ($row['quantity'] == 0) {
            $qu = "All returns";
            $pric = '-';
            $sub = '-';
            $cls = "bg-info";
        } else {
            $qu = $row['quantity'];
            $pric = $row['product_purchase_price'];
            $sub = $row['sub_total'];
            $cls = "";
        }

        $history = <<<DELIMETER

            <tr class={$cls}>
                <td>{$row_number}</td>
                <td>{$row['product_id']}</td>
                <td><a target="_blank" href="index.php?view_product&page=products&product_id={$row['product_id']}">{$row['product_title']}</a></td>
                <td>{$qu} </td>
                <td>{$pric} </td>
                <td>{$sub}</td>                 
                
            </tr>


DELIMETER;

        $row_number++;
        echo $history;

    }


}

function display_vendors_history($vendor_id)
{


    $sql = "select foo1.* , foo.*
            FROM
            (SELECT date_time,(select CONCAT(f_name,' ',l_name) v_name from vendor where vendor.id = tbl_vendor_invoices.vendor_id)vendor_name,
                vendor_id, invoice_id, paid_amount, payable_amount,invoice_date 
                from tbl_vendor_invoices 
                where vendor_id = {$vendor_id}
            ) foo
            inner join
            (SELECT invoice_number,vendor_id,DATE(date_time) date_time ,
              count(*) items,sum(quantity) total_products,SUM(total_amount) total_amount
            from tbl_purchase_from_vendor 
            where vendor_id = {$vendor_id}
            GROUP BY invoice_number
            order by date_time desc) foo1
            on foo.vendor_id= foo1.vendor_id and foo.invoice_id = foo1.invoice_number 
            order by foo.date_time desc ";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {


        $vendors = <<<DELIMITER

                <tr>
                <td><div class="label label-primary" style="font-size: medium">{$row['invoice_number']}</div></td>
                    <td>{$row['vendor_id']}</td>
                    <td>{$row['vendor_name']}</td>                    
                    <td>{$row['invoice_date']}</td>                    
                    <td>{$row['items']}</td>
                    <td>{$row['total_products']}</td>
                    <td>Rs. {$row['total_amount']}</td>                   
                    <td>Rs. {$row['paid_amount']}</td>                   
                    <td>Rs. {$row['payable_amount']}</td>                   
                    <td>
                        <div class="btn-group">
                        <a href="index.php?update_payable_vendor&invoice_no={$row['invoice_number']}&vendor_id={$row['vendor_id']}" class="btn btn-success"><span class="fa fa-dollar"></span> Pay</a>
                        <a href="index.php?vendor_invoice&invoice_no={$row['invoice_number']}&vendor_id={$row['vendor_id']}" class="btn btn-warning"><span class="fa fa-search-plus"></span> View</a>                                                 
                        <a data-toggle="confirmation" href="index.php?service_product_vendor_invoice&delete_invoice&vendor_invoice_no={$row['invoice_number']}&vendor_id={$row['vendor_id']}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Delete</a>
                        </div>
                         
                     </td>
                    
                     
                </tr>


DELIMITER;

        echo $vendors;

    }


}


function get_vendor_invoice_payable($vendor_id, $invoice_no)
{

    $data = array();

    $sql = "SELECT (select CONCAT(f_name,' ',l_name) v_name from vendor where vendor.id = tbl_vendor_invoices.vendor_id)vendor_name,vendor_id, invoice_id,total_amount, paid_amount,payable_amount 
            FROM	tbl_vendor_invoices	WHERE	vendor_id = {$vendor_id} AND invoice_id= '{$invoice_no}'";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $data[0] = $row['total_amount'];
        $data[1] = $row['paid_amount'];
        $data[2] = $row['payable_amount'];
        $data[3] = $row['vendor_name'];
        $data[4] = $row['invoice_id'];
    }

    return $data;
}


function update_vendor_invoice($vendor_id, $invoice_no)
{

    if (isset($_POST['submit_vendor_invoice'])) {

        $paid = escape_string($_POST['paid_amount']);
        $v_id = escape_string($vendor_id);
        $invoice_id = escape_string($invoice_no);
        $user_id = $_SESSION['user_id'];

        $sql = "update tbl_vendor_invoices
                set payable_amount = payable_amount-{$paid}, paid_amount = paid_amount+{$paid}
                where 	vendor_id = {$v_id} and invoice_id = '{$invoice_id}'";
        $query = query($sql);
        confirm($query);


        $sql_vendor_summary = "UPDATE vendors_bill_summary   
                                    set paid_amount = paid_amount +{$paid}, 
                                    remaining_amount = remaining_amount - {$paid}, 
                                    user_id = {$user_id}
                                    WHERE
                                    vendor_id = {$v_id}";

        $query_vendor_summary = query($sql_vendor_summary);
        confirm($query_vendor_summary);

        if ($query_vendor_summary) {
            set_message('invoice payable updated','success');
            redirect('index.php?history_vendor&vendor_id=' . escape_string($vendor_id));
        }


    }


}


/************************************************************/
//index.php?stores
/************************************************************/
function add_stores_in_admin()
{
    if (isset($_POST['add_store'])) {

        $location_loc = escape_string($_POST['location_loc']);
        $sql = "insert into stores (store_location) values ('{$location_loc}')";
        $query = query($sql);
        confirm($query);
        $store_id = last_id();

        if ($query) {

            $sql2 = "insert into stores_summary_report (store_id) values ({$store_id})";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
                set_message('New Store added', 'success');
                redirect('index.php?stores');

            } else {
                set_message('Internet issue', 'danger');
                redirect('index.php?stores');
            }

        } else {
            set_message('Internet issue', 'danger');
            redirect('index.php?stores');
        }

    }
}

function show_stores_in_admin()
{

    $sql = "select foo.*, IFNULL(foo1.product_type, 0) product_type, IFNULL(foo1.products_count, 0) products_count 
            from
            (select store_id , store_location, DATE(date_time) start_from from stores) foo
            left OUTER join 
            (select store_id,count(*) product_type, SUM(product_quantity) products_count from tbl_products_store GROUP BY store_id) foo1 
            on foo.store_id = foo1.store_id
            order by store_id";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELIMETER
                    <tr>
                        <td><span class="label label-primary" style="font-size: medium"> {$row['store_id']} </span></td>
                        <td><strong>{$row['store_location']}</strong></td>
                        <td>{$row['product_type']} </td>
                        <td>{$row['products_count']} </td>
                        <td>{$row['start_from']} </td>
                         
                       
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?products_in_store&store_id={$row['store_id']}"><i class="fa fa-cubes"></i> Products</a></li> 
                                     <li class="divider"></li>
                                     <li><a href="index.php?account_stores_detail&page=stores&store_id={$row['store_id']}"><i class="fa fa-calculator"></i> Accounts</a></li>
                                     <li class="divider"></li>
                                     <li><a href="index.php?store_users&store_id={$row['store_id']}"><i class="fa fa-users"></i> Sellers</a></li>
                                     <li class="divider"></li>
                                    <li><a data-toggle="confirmation" href="index.php?delete_stores&store_id={$row['store_id']}"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>                                    
                                </ul>
                            </div>   
                        </td>
                    </tr>
DELIMETER;
        echo $stores;

    }

}


function show_products_in_stores_in_admin($store_id)
{

    $sql = "select product_id, (select product_title from products where products.product_id = tbl_products_store.product_id) product_title,product_quantity from tbl_products_store
              where store_id  = {$store_id}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $products = <<<DELIMETER
                    <tr>
                        <td><span class="label label-primary" style="font-size: medium"> {$row['product_id']} </span></td>
                        <td><a target="_blank" href="index.php?view_product&page=products&product_id={$row['product_id']}"> {$row['product_title']} </a></td>
                        <td>{$row['product_quantity']} </td>
                        
                        <td>
                            <div class="btn-group">
                                <a href="index.php?history_product_to_store&store_id={$store_id}&product_id={$row['product_id']} "  class="btn btn-primary" style=""><span class="fa fa-folder" ></span> History </a>
                                <a href="index.php?edit_product_to_store&store_id={$store_id}&product_id={$row['product_id']} "  class="btn btn-warning" style=""><span class="fa fa-edit" ></span> Edit </a>
                                <a data-toggle="confirmation" href="index.php?delete_product_to_store&store_id={$store_id}&product_id={$row['product_id']}&quantity={$row['product_quantity']} "  class="btn btn-danger" style=""><span class="fa fa-trash" ></span> Delete </a>
                            </div>
                            
                        </td>
                    </tr>
DELIMETER;
        echo $products;

    }

}

function fill_products_for_assign_store($store_id)
{
    $store_id = escape_string($store_id);

    $sql = "select product_id,product_title 
            from products  
            where product_id not in (select product_id from tbl_products_store where store_id = {$store_id})
            order by product_title";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $products = <<<DELEMITER
    
                        <option value="{$row['product_id']}">{$row['product_id']} --- {$row['product_title']}</option>


DELEMITER;

        echo $products;

    }
}

function history_products_in_stores_in_admin($store_id,$product_id)
{


    $sql = "select product_id ,date(date_time_db) date_time_db ,(select product_title from products where products.product_id = tbl_products_store_history.product_id) product_name, 
                product_quantity,date_send_return,status from tbl_products_store_history where product_id = {$product_id} and store_id = {$store_id} order by date_time_db";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $submit_products = <<<DELEMITER
    
                      <tr>
                        <td><strong>{$row['product_name']}</strong></td>
                        <td><span class="label label-primary" style="font-size: medium">{$row['status']}</span></td>
                        <td>{$row['product_quantity']}</td>
                        <td>{$row['date_send_return']} </td>
                        <td>{$row['date_time_db']} </td>
                        
                    </tr>


DELEMITER;

        echo $submit_products;

    }
}

function users_in_store($store_id)
{
    $store_id = escape_string($store_id);

    $sql = "SELECT * from users where user_id in (select user_id  from store_users where store_id = {$store_id}) order by username";


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $users = <<<DELEMITER
    
                         
                    <tr>
                        <td><span class="label label-primary" style="font-size: medium">{$row['user_id']}</span></td>
                        <td><strong>{$row['username']}</strong></td>
                        <td>{$row['useremail']}</td>
                        <td>{$row['status']} </td>
                        <td>{$row['role']} </td>
                        <td> <a class="btn btn-warning" href="index.php?edit_user&store_id={$store_id}&id={$row['user_id']}"><span class="fa fa-edit"></span> Update </a> </td>
                      
                    </tr>

DELEMITER;

        echo $users;

    }
}

function add_product_to_store_first_time($store_id)
{

    if (isset($_POST['add_product_to_store'])) {
        $product_id = escape_string($_POST['product_id']);
        $product_date = escape_string($_POST['send_date']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $user_id = $_SESSION['user_id'];

//        check product in main store
        $sql_check_quantity = "select  (product_quantity-(select IFNULL(SUM(product_quantity),0) from tbl_products_store where product_id = {$product_id})) as product_quantity
                                from products where product_id = {$product_id}";


        $query_check_quantity = query($sql_check_quantity);
        confirm($query_check_quantity);
        while ($rowx = fetch_array($query_check_quantity)){

            if($rowx['product_quantity'] < $product_quantity){

                set_message("Your entered Product quantity increasing then store quantity, in store products count is = {$rowx['product_quantity']}", 'warning');
                redirect('index.php?add_product_to_store&store_id=' . $store_id);
                return;
            }

        }


        $sql = "insert into tbl_products_store_history(product_id,store_id,product_quantity,user_id,date_send_return,status)
                VALUES({$product_id},{$store_id},{$product_quantity},{$user_id},'{$product_date}','Send')";
        $query = query($sql);
        confirm($query);
        if ($query) {
            $sql2 = "insert into tbl_products_store (product_id,store_id,product_quantity,user_id,date_send_return)
                      VALUES({$product_id},{$store_id},{$product_quantity},{$user_id},'{$product_date}') ";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
                set_message('product added to store', 'success');
                redirect('index.php?products_in_store&store_id=' . $store_id);

            } else {
                set_message('issue to add produc', 'danger');
                redirect('index.php?products_in_store&store_id=' . $store_id);
            }
        }


    }


}

function edit_product_to_store_first_time($store_id,$product_id)
{

    if (isset($_POST['edit_product_to_store'])) {

        $product_date = escape_string($_POST['send_date']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $user_id = $_SESSION['user_id'];

//        check product in main store
        $sql_check_quantity = "select  (product_quantity-(select SUM(product_quantity) from tbl_products_store where product_id = {$product_id})) as product_quantity
                                from products where product_id = {$product_id}";

        $query_check_quantity = query($sql_check_quantity);
        confirm($query_check_quantity);
        while ($rowx = fetch_array($query_check_quantity)){

            if($rowx['product_quantity'] < $product_quantity){

                set_message("Your entered Product quantity increasing then store quantity, in store products count is = {$rowx['product_quantity']}", 'warning');
                redirect('index.php?products_in_store&store_id=' . $store_id);
                return;
            }

        }


//        history maintain
        $sql = "insert into tbl_products_store_history(product_id,store_id,product_quantity,user_id,date_send_return,status)
                VALUES({$product_id},{$store_id},{$product_quantity},{$user_id},'{$product_date}','Update')";
        $query = query($sql);
        confirm($query);
        if ($query) {


//            insert into store table
            $sql2 = "update tbl_products_store
                     set product_quantity  = {$product_quantity},
                     date_send_return = '{$product_date}',
                     user_id = {$user_id}
                     where product_id = {$product_id}
                     and store_id = {$store_id}";
            $query2 = query($sql2);
            confirm($query2);
            if ($query2) {
                set_message('product update for store', 'success');
                redirect('index.php?products_in_store&store_id=' . $store_id);

            } else {
                set_message('issue to add product', 'danger');
                redirect('index.php?products_in_store&store_id=' . $store_id);
            }
        }


    }


}

function get_product_data_from_store($store_id,$product_id){
    $data = array();
    $sql = "select product_id,(select product_title from products WHERE products.product_id= tbl_products_store.product_id) product_title, store_id, product_quantity,date_send_return
            from tbl_products_store 
            where store_id = {$store_id} and product_id ={$product_id}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){
        $data[0] = $row['product_id'];
        $data[1] = $row['product_title'];
        $data[2] = $row['product_quantity'];
        $data[3] = $row['date_send_return'];
    }

    return $data;

}

/************************************************************/
//index.php?customers
/************************************************************/
function fill_countary()
{
    $sql = "select * from countary order by countary_name";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $countary = <<<DELEMITER
                    <option value="{$row['countary_name']}" > {$row['countary_name']} </option>
DELEMITER;

        echo $countary;
    }

}

function fill_stores_customer()
{
    $sql = '';
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {
        $sql = "select * from stores ORDER BY store_location";
    } else {
        $sql = "select * from stores where store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    )
                    ORDER BY store_location";
    }
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $stores = <<<DELEMITER
                    <option value="{$row['store_id']}" > {$row['store_location']} </option>
DELEMITER;

        echo $stores;
    }

}

function add_customers()
{
    if (isset($_POST['add_customer'])) {
        $is_vendor = 0;
        $added_by = $_SESSION['user_id'];
        $store_id = escape_string($_POST['store_id']);
        $f_name = escape_string($_POST['f_name']);
        $l_name = escape_string($_POST['l_name']);
        $email = escape_string($_POST['email']);
        $phone = escape_string($_POST['phone']);
        $house_street = escape_string($_POST['house_street']);
        $town_city = escape_string($_POST['town_city']);
        $province = escape_string($_POST['province']);
        $country = escape_string($_POST['country']);
        $zip_postal_code = escape_string($_POST['zip_postal_code']);
        $type = escape_string($_POST['type']);

        if ($type == 'customer') {
            $sql = "INSERT into customers(f_name,l_name,email,phone,house_street,town_city,province,country,zip_postal_code,added_by,is_vendor,store_id)
                VALUES('{$f_name}','{$l_name}','{$email}','{$phone}','{$house_street}','{$town_city}','{$province}','{$country}',
                '{$zip_postal_code}',{$added_by},{$is_vendor},{$store_id})";


            $query = query($sql);
            confirm($query);
            $customer_id = last_id();
            if ($query) {
                $sql_bill = "INSERT into customer_bill_summary(customer_id,user_id)
                                VALUES({$customer_id},{$added_by})";
                $query_bill = query($sql_bill);
                confirm($query_bill);
                if ($query_bill) {
                    set_message('New Customer added', 'success');
                    redirect('index.php?customers');
                } else {
                    set_message('Internet Issue');
                    redirect('index.php?customers', 'danger');
                }
            } else {
                set_message('Internet Issue');
                redirect('index.php?customers', 'danger');
            }
        } else {
            $is_vendor = 1;
            $customer_id = 0;
            $vendor_id = 0;
            //insert vendor in vendor table
            $sql_add_vendor_customer = "insert into vendor(f_name,l_name,phone,email,user_id,is_customer,house_street,town_city,zip_code_postal,province,countary)
                        values ('{$f_name}','{$l_name}','{$phone}','{$email}',{$added_by},{$is_vendor},'{$house_street}','{$town_city}','{$zip_postal_code}','{$province}','{$country}')";
            $query_add_vendor_customer = query($sql_add_vendor_customer);
            confirm($query_add_vendor_customer);
            $vendor_id = last_id();
            if ($query_add_vendor_customer) {

                $sql22 = "insert into vendors_bill_summary(vendor_id,user_id)
                          values ({$vendor_id},{$added_by})";

                $query22 = query($sql22);
                confirm($query22);

                $add_customer = "INSERT into customers(f_name,l_name,email,phone,house_street,town_city,province,country,zip_postal_code,added_by,is_vendor,vendor_id,store_id)
                VALUES('{$f_name}','{$l_name}','{$email}','{$phone}','{$house_street}','{$town_city}','{$province}','{$country}',
                               '{$zip_postal_code}',{$added_by},{$is_vendor},{$vendor_id},{$store_id})";
                $add_customer_query = query($add_customer);
                $customer_id = last_id();
                confirm($add_customer_query);
                if ($add_customer_query) {
                    $sql_update_vendor = "update vendor
                                            set customer_id = {$customer_id}
                                            where id = {$vendor_id}";
                    $query_update_vendor = query($sql_update_vendor);
                    confirm($query_update_vendor);
                    if ($query_update_vendor) {
                        $sql_bill = "INSERT into customer_bill_summary(customer_id,user_id)
                                VALUES({$customer_id},{$added_by})";
                        $query_bill = query($sql_bill);
                        confirm($query_bill);
                        if ($query_bill) {
                            set_message('New Customer added', 'success');
                            redirect('index.php?customers');
                        } else {
                            set_message('Internet Issue');
                            redirect('index.php?customers', 'danger');
                        }
                    } else {
                        set_message('Internet Issue');
                        redirect('index.php?customers', 'danger');
                    }
                }
            }
        }


    }


}

function display_customers_in_admin()
{
    $sql = '';
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];


    if (isset($_GET['store_id'])) {

        $sql = "select (select store_location from stores where stores.store_id = customers.store_id) store,customers.* from customers where store_id = {$_GET['store_id']} order by date_time desc";

    } elseif ($user_role == 'admin') {
        $sql = "select (select store_location from stores where stores.store_id = customers.store_id) store, customers.* from customers order by date_time desc";
    } else {
        $sql = "select (select store_location from stores where stores.store_id = customers.store_id) store, customers.* from customers where store_id in(
                    select store_id from store_users where user_id = {$user_id}
                    ) order by date_time desc";
    }

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $type = '';
        if ($row['is_vendor'] == '1') {
            $type = 'Vendor/Customer';
        } else {
            $type = 'Customer';
        }
        $users = <<<DELIMETER
                    <tr>
                        <td><a  class="btn btn-warning" href="index.php?start_invoice&customer_id={$row['customer_id']}&store_id={$row['store_id']}"><span class="fa fa-list-alt"></span> Invoice  </a> </td>               
                         <td>{$row['store']}</td>
                        <td><div class="label label-primary" style="font-size: medium">{$row['customer_id']}</div></td> 
                        <td><div class="label label-info" style="font-size: medium">{$row['vendor_id']}</div></td>     
                        <td>{$row['f_name']} {$row['l_name']}</td>                         
                        <td>{$row['phone']}</td>
                       
                        <td>{$type}</td>                         
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?invoice_history&customer_id={$row['customer_id']}"><i class="fa fa-cart-plus"></i> History</a></li>
                                     <li class="divider"></li>
                                     <li><a href="index.php?customer_view&customer_id={$row['customer_id']}"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                                     <li class="divider"></li>
                                     <li><a href="index.php?edit_customer&customer_id={$row['customer_id']}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                                     <li class="divider"></li>
                                    <li><a data-toggle="confirmation" href="index.php?delete_customer&customer_id={$row['customer_id']}"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                    
                                </ul>
    
                            </div>                        
                        </td>
                    </tr>
DELIMETER;
        echo $users;

    }

}

function update_customer()
{

    if (isset($_POST['update_customer'])) {

        $customer_id = escape_string($_GET['customer_id']);
        $f_name = escape_string($_POST['f_name']);
        $l_name = escape_string($_POST['l_name']);
        $email = escape_string($_POST['email']);
        $phone = escape_string($_POST['phone']);
        $house_street = escape_string($_POST['house_street']);
        $town_city = escape_string($_POST['town_city']);
        $province = escape_string($_POST['province']);
        $country = escape_string($_POST['country']);
        $zip_postal_code = escape_string($_POST['zip_postal_code']);


        $sql = "update customers
            SET  f_name='{$f_name}' ,l_name= '{$l_name}' ,email='{$email}'  ,phone= '{$phone}' ,house_street='{$house_street}'  ,
            town_city= '{$town_city}' ,province= '{$province}' ,country= '{$country}'  ,zip_postal_code= '{$zip_postal_code}' 
            where customer_id = {$customer_id}";
        $query = query($sql);
        confirm($query);
        if ($query) {
            $sql_update_vendor = "update vendor
            set is_customer = 0, customer_id = NULL 
            where customer_id={$customer_id}";
            $query_update_vendor = query($sql_update_vendor);
            confirm($query_update_vendor);
            if ($query_update_vendor) {
                set_message('Customer Profile Updated', 'success');
                redirect('index.php?customers');
            } else {
                set_message('Some Issues to update profile', 'danger');
                redirect('index.php?customers');
            }
        }

    }

}

function display_customer_profile()
{
    $customer_id = escape_string($_GET['customer_id']);

    $sql = "select * , (select username from users where user_id = added_by) user_name   from customers where customer_id ={$customer_id} ";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $profile = <<<DELIMETER
                    <tr>
                        <th class="col-md-3">Customer ID</th>               
                        <td class="col-md-9">{$row['customer_id']}</td>    
                    </tr>  
                    <tr>
                        <th>First Name</th>
                        <td>{$row['f_name']}</td>
                    </tr> 
                     <tr>
                        <th>Last Name</th>
                        <td>{$row['l_name']}</td>
                    </tr> 
                     <tr>
                        <th>Phone No</th>
                        <td>{$row['phone']}</td>
                    </tr> 
                     <tr>
                        <th>E-Mail</th>
                        <td>{$row['email']}</td>
                    </tr> 
                     <tr>
                        <th>House / Street</th>
                        <td>{$row['house_street']}</td>
                    </tr> 
                    <tr>
                        <th>Zip / Postal Code</th>
                        <td>{$row['zip_postal_code']}</td>
                    </tr> 
                    <tr>
                        <th>Province</th>
                        <td>{$row['province']}</td>
                    </tr> 
                    <tr>
                        <th>Country</th>
                        <td>{$row['country']}</td>
                    </tr> 
                    
                    <tr>
                        <th>Added on</th>
                        <td>{$row['date_time']}</td>
                    </tr> 
                     <tr>
                        <th>Added By</th>
                        <td>{$row['user_name']}</td>
                    </tr> 
                            
                        
DELIMETER;
        echo $profile;

    }

}

function customer_history($customer_id)
{

    $sql = "select customer_id,invoice_no, date_time,total_amount,received_amount,remaining_amount,total_items 
                from tbl_invoice where   customer_id = {$customer_id}
                ORDER BY invoice_no DESC";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $invoices = <<<DELIMITER
         
          <tr>
                <td><div class="label label-primary" style="font-size: medium">{$row['invoice_no']}</div></td>
                <td>{$row['date_time']}</td>                
                <td>{$row['total_items']}</td>
                <td>Rs. {$row['total_amount']}</td>
                <td>{$row['received_amount']}</td>
                <td>{$row['remaining_amount']}</td>
                <td><a class="btn btn-success" href="index.php?display_invoice&page=customer_history&customer_id={$customer_id}&invoice_no={$row['invoice_no']}"><span class="glyphicon glyphicon-zoom-in"></span> View</a></td>
               
            </tr>

DELIMITER;

        echo $invoices;


    }


}


/************************************************************/
//index.php?cart_customers
/************************************************************/

function display_cart_customers_in_admin()
{
    $sql = "";
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    if ($user_role == 'admin') {

        $sql = "select  distinct email ,(select (select store_location from stores where stores.store_id = tbl_order.store_id) store_n from tbl_order where tbl_order.order_id = order_clint.order_id) store_name,clint_id, f_name,l_name,email,phone,house_street,town_city,province 
            from order_clint GROUP BY email ORDER BY f_name,l_name";
    } else {
        $sql = "select distinct email ,(select (select store_location from stores where stores.store_id = tbl_order.store_id) store_n from tbl_order where tbl_order.order_id = order_clint.order_id) store_name,order_id,clint_id, f_name,l_name,email,phone,house_street,town_city,province 
                            from order_clint 
                where order_id in (select order_id from  tbl_order where store_id in (select store_id from store_users where user_id = {$user_id}))
                GROUP BY email ORDER BY f_name,l_name";
    }


    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $users = <<<DELIMETER
                    <tr>
                    <td></td>
                        <td>{$row['store_name']}</td>               
                        <td>{$row['clint_id']}</td>               
                        <td>{$row['f_name']}</td>
                        <td>{$row['l_name']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['town_city']}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-cog icon-white"></i> Settings</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?cart_customer_view&customer_email={$row['email']}"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                                     <li class="divider"></li>    
                                     <li><a href="index.php?cart_customers_history&email={$row['email']}"><i class="glyphicon glyphicon-shopping-cart"></i> Orders </a></li>
                                     <li class="divider"></li>                                     
                                    <!--<li><a  href="index.php?cart_delete_customer&customer_email={$row['email']}"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>-->
                                    
                                </ul>
    
                            </div>                        
                        </td>
                    </tr>
DELIMETER;
        echo $users;

    }

}

function display_cart_customer_profile($customer_email)
{


    $sql = "select distinct email,clint_id,order_id,f_name,l_name,email,phone,house_street,
                town_city,province,comment,date_time,
                zip_postal_code,country
                from order_clint where email ='{$customer_email}' 
                GROUP BY email ";

    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $profile = <<<DELIMETER
                      
                   
                     <tr>
                        <th>First Name</th>
                        <td>{$row['f_name']}</td>
                    </tr> 
                     <tr>
                        <th>Last Name</th>
                        <td>{$row['l_name']}</td>
                    </tr> 
                     <tr>
                        <th>Phone No</th>
                        <td>{$row['phone']}</td>
                    </tr> 
                     <tr>
                        <th>E-Mail</th>
                        <td>{$row['email']}</td>
                    </tr> 
                     <tr>
                        <th>House / Street</th>
                        <td>{$row['house_street']}</td>
                    </tr> 
                    <tr>
                        <th>Zip / Postal Code</th>
                        <td>{$row['zip_postal_code']}</td>
                    </tr> 
                    <tr>
                        <th>Province</th>
                        <td>{$row['province']}</td>
                    </tr> 
                    <tr>
                        <th>Country</th>
                        <td>{$row['country']}</td>
                    </tr> 
                    
                    <tr>
                        <th>Added on</th>
                        <td>{$row['date_time']}</td>
                    </tr> 
                      
                            
                        
DELIMETER;
        echo $profile;

    }

}

function display_cart_customers_History_orders($customer_email)
{


    $sql2 = "select foo.* , foo2.*
                from(
                    select order_number, sum(quantity) quantity, SUM(sold_price_per_product * quantity) sold_price
                    from(
                    select order_number,quantity, 
                    CASE 
                        WHEN discount_price = 0 THEN sale_price
                        ELSE discount_price
                    END as sold_price_per_product
                     from product_order  where order_number in (select order_id  from order_clint where  email = '{$customer_email}')
                    ) foo GROUP BY order_number ORDER BY order_number DESC
                ) foo
                INNER JOIN(
                select order_status,order_id,date_time from tbl_order  
                ) foo2 
                on foo.order_number = foo2.order_id";


    $query2 = query($sql2);
    confirm($query2);


    while ($row = fetch_array($query2)) {

        if ($row['order_status'] == 'pending') {
            $order_status = "<span class='label label-danger'>{$row['order_status']}</span>";
        } else {
            $order_status = "<span class='label label-success'>{$row['order_status']}</span>";
        }

        $order = <<<DELIMETER
                <tr>
                <td></td>
                    <td><div class="label label-primary" style="font-size: medium">{$row['order_id']}</div></td>
                    <td>Rs. {$row['sold_price']}</td>    
                    <td>{$row['quantity']}</td>
                    <td>{$row['date_time']}</td>
                   <td>{$order_status}</td>
                   <td><a class="btn btn-primary" href="index.php?cart_customer_order_detail&order_id={$row['order_id']}&email={$customer_email}"><i class="glyphicon glyphicon-zoom-in"></i> View</a> </td>
                    
                 </tr>
DELIMETER;

        echo $order;

    }


}

function order_history_detail_status($order_id)
{

    $sql = "select * from tbl_order where order_id ={escape_string($order_id)}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        if ($row['order_status'] == 'pending') {
            $order_status_class = "warning";
        } else {
            $order_status_class = "success";
        }

        $order_status = <<<DELIMETER
                                <tr class="btn-primary">
                                    <th colspan="2" > 
                                         Status 
                                    </th>                                     
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>ORDER ID </th>
                                    <th> {$order_id}</th>
                                </tr>                                
                                <tr class="cart-subtotal">
                                    <th>Order Status </th>
                                    <td><span class="label label-{$order_status_class}">{$row['order_status']}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Received </th>
                                    <td> {$row['date_time']}</td>
                                </tr>
DELIMETER;

        echo $order_status;
    }


}


function history_order_detail_products($order_id)
{
    $sub_total = 0;
    $total = 0;
    $sql = "select GROUP_CONCAT(s.product_serial) serial_number,foo.*
                from
                (select product_serial,product_id from products_serial where online_order_number = {escape_string($order_id)}) s
                RIGHT JOIN
                (select distinct product_id as p_id ,
                (select product_title from products where product_id = p_id) product_name,
                (select product_image from products where product_id = p_id) product_image,
                (select (select cat_title from categories where cat_id = product_category_id) product_category_name from products where product_id = p_id) order_category_name,
                (select (select brand_name from brands where brand_id = product_brand_id) product_brand_name from products where product_id = p_id) order_brand_name, 
                 sale_price, quantity 
                from product_order where order_number = {escape_string($order_id)}) foo
                ON foo.p_id = s.product_id
                GROUP BY foo.p_id
                ORDER BY foo.quantity";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {

        $sub_total = $row['sale_price'] * $row['quantity'];
        $total += $sub_total;


        $serial_print = '';
        $serial_number = explode(',', $row['serial_number']);

        foreach ($serial_number as $serial) {

            $serial_print .= "<p>" . $serial . "</p>";


        }

        $product_image = display_image($row['product_image']);
        $order_status = <<<DELIMETER
                            
                            <tr class="cart-subtotal">
                                 <td> $serial_print</td>                 
                                <td>{$row['p_id']} </td>                                    
                                <td>{$row['product_name']} </td>                                    
                                <td>{$row['quantity']} </td>                                    
                                <td><img class="img-responsive img-thumbnail" style="width: 130px" src="../../resources/{$product_image} "></img></td>                                    
                                <td>{$row['order_category_name']} </td>                                    
                                <td>{$row['order_brand_name']} </td>                                    
                                                             
                                <td>Rs. {$row['sale_price']} </td>     
                                <td>Rs. {$sub_total} </td>                          
                                                           
                            </tr>
                            
DELIMETER;

        echo $order_status;
    }

    echo "<tr class='bg-warning'>
                    <th colspan='8'><strong class='pull-left'>Total</strong></th>
                    
                    <th>Rs. {$total}</th>
                </tr>";


}


/************************************************************/
//index.php?slides
/************************************************************/
///public
function get_active_slides()
{
    $sql = "select * from slides order by slide_id desc limit 1";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);
        $active_slides = <<<DELEMITER

                   <div class="item active">
                        <img style="height: 300px; width: 850px" class="slide-image" src="../resources/{$slide_image}" alt="">
                    </div>


DELEMITER;
        echo $active_slides;

    }
}

function get_slides()
{
    $sql = "select * from slides ";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);
        $slides = <<<DELEMITER

                   <div class="item">
                        <img style="width: 850px; height: 300px; " class="slide-image" src="../resources/{$slide_image}" alt="">
                    </div>


DELEMITER;
        echo $slides;

    }
}

//admin
function add_slides()
{

    if (isset($_POST['add_slider'])) {

        $slide_title = escape_string($_POST['slide_title']);
        $slide_image = escape_string(($_FILES['file']['name']));
        $slide_image_temp = escape_string(($_FILES['file']['tmp_name']));

        if (empty($slide_title) || empty($slide_image)) {
            echo "<p class='bg-danger'> this field cannot be empty </p>";
        } else {

            copy($slide_image_temp, UPLOAD_DIRECTORY . DS . $slide_image);

            $sql = "insert into slides (slide_title,slide_image)
                    values ('{$slide_title}','{$slide_image}')";
            $query = query($sql);
            confirm($query);
            if ($query) {
                set_message('New Slider Added', 'success');
                redirect('index.php?slides');
            } else {
                set_message('not add Slider Internet or Image size Issue', 'danger');
                redirect('index.php?slides');
            }

        }


    }


}

function get_active_slide_in_admin()
{
    $sql = "select * from slides order by slide_id desc limit 1";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);
        $active_slides_in_admin = <<<DELEMITER
                  
                <img style="height: 300px; width: 800px; margin-left: 60px" src="../../resources/{$slide_image}" class="img-responsive img-rounded"/ >

DELEMITER;
        echo $active_slides_in_admin;

    }
}

function get_slides_thumbnails_in_admin()
{
    $sql = "select * from slides order by slide_id asc ";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);
        $slides_thumb_in_admin = <<<DELEMITER

            <div class="col-xs-6 col-md-3 ">
             
                <a href="index.php?delete_slider&id={$row['slide_id']}&imaage_name={$row['slide_image']}">
                     <img data-toggle="confirmation" style="height: 100px; width: 200px; margin-bottom: 15px;" src="../../resources/{$slide_image}" class="img-responsive img-thumbnail"/ ></a>
                </a>
               <div class="caption">
                     <h4 class="text-center">{$row['slide_title']}</h4>
                </div>
            </div>
           
            
               

DELEMITER;
        echo $slides_thumb_in_admin;

    }
}

////////////////////////////////////////////////////////////////////////////////////////
/// user profile setting///////////////////////////////////////////////////
///


function fill_user_profile_data()
{

    $data = array();
    $user_id = $_SESSION['user_id'];


    $sql = "select username, useremail,password from users where user_id = {$user_id}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $data[0] = $row['username'];
        $data[1] = $row['useremail'];
        $data[2] = $row['password'];
    }

    return $data;

}

function update_user_profile()
{

    if (isset($_POST['add_user_profile'])) {

        $user_name = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        $user_id = $_SESSION['user_id'];

        $sql = "update users
                set username = '{$user_name}',
                useremail = '{$email}',
                password = '{$password}'
                where user_id = {$user_id}    ";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('profile update', 'success');
            redirect('index.php?profile_setting');
        } else {
            set_message('internet issue', 'danger');
            redirect('index.php?profile_setting');
        }


    }


}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// web profile
/// /////////////////////////////////////////////////////////////////////////////


function web_profile()
{

    $data = array();
    $sql = "select * from shop_profile";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $data[0] = $row['shop_name'];
        $data[1] = $row['slogan'];
        $data[2] = $row['email'];
        $data[3] = $row['contact_no'];
        $data[4] = $row['whatsapp'];
        $data[5] = $row['address'];

        $data[6] = $row['facebook_link'];
        $data[7] = $row['tweeter_link'];
        $data[8] = $row['youtube_link'];
        $data[9] = $row['insta_link'];
        $data[10] = $row['message'];
    }

    return $data;

}

function update_web_profile()
{

    if (isset($_POST['add_web_profile'])) {

        $shop_name = escape_string($_POST['shop_name']);
        $slogan = escape_string($_POST['slogan']);
        $email = escape_string($_POST['email']);
        $contact_no = escape_string($_POST['contact_no']);
        $whatsapp = escape_string($_POST['whatsapp']);
        $address = escape_string($_POST['address']);
        $message = escape_string($_POST['message']);
        $user_id = $_SESSION['user_id'];

        $fb = escape_string($_POST['fb']);
        $youtube = escape_string($_POST['youtube']);
        $tweeter = escape_string($_POST['tweeter']);
        $instagram = escape_string($_POST['instagram']);


//        check shop iis already avaliable
        $sql = "select count(*) rows_count from shop_profile";
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)) {
            $cout_row = $row['rows_count'];
        }

        if ($cout_row > 0) {

            $sql = "update shop_profile
                set shop_name = '{$shop_name}',
                slogan = '{$slogan}',
                email = '{$email}',
                contact_no = '{$contact_no}',
                whatsapp = '{$whatsapp}',
                address = '{$address}', 
                message = '{$message}',
                
                facebook_link = '{$fb}',
                youtube_link = '{$youtube}',
                tweeter_link = '{$tweeter}',
                insta_link = '{$instagram}'
                where user_id = {$user_id}";
            $query = query($sql);
            confirm($query);
            if ($query) {
                set_message('profile update', 'success');
                redirect('index.php?web_profile');
            } else {
                set_message('internet issue', 'danger');
                redirect('index.php?web_profile');
            }
        } else {
            $sql = "insert into shop_profile(shop_name,slogan,email,contact_no,whatsapp,address,message,user_id,facebook_link,youtube_link,tweeter_link,insta_link)

                values ('{$shop_name}','{$slogan}','{$email}','{$contact_no}','{$whatsapp}','{$address}','{$message}', {$user_id}, {$fb}, {$youtube}, {$tweeter}, {$instagram})";
            $query = query($sql);
            confirm($query);
            if ($query) {
                set_message('profile Added', 'success');
                redirect('index.php?web_profile');
            } else {
                set_message('internet issue', 'danger');
                redirect('index.php?web_profile');
            }
        }
    }


}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// web msg
function web_messages()
{

    $sql = "select id,username,email, subject,message,date_time from user_messages order by date_time desc";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)) {
        $stores = <<<DELIMETER
                    <tr>
                        <td><strong>{$row['username']}</strong></td>
                        <td>{$row['email']} </td>
                        <td><span class="label label-warning" style="font-size: medium"> {$row['subject']} </span></td>                        
                        <td>{$row['message']} </td>
                        <td>{$row['date_time']} </td> 
                        <td>
                            <a class="btn btn-danger" data-toggle="confirmation" href="index.php?delete_web_user&user_id={$row['id']}"><i class="glyphicon glyphicon-trash"></i> Delete</a> 
                        </td>
                    </tr>
DELIMETER;
        echo $stores;

    }

}

