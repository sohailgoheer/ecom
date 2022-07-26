<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 9/13/2018
 * Time: 10:48 AM
 */
if(isset($_POST['submit_order'])){

    $arr_serial_number = array();
    $arr_product_id = array();

    $order_number       = escape_string($_POST['order_id']);
    $serial_number      = $_POST['serial'];
    $serial_product_id  = $_POST['serial_product_id'];
    $user_id =  $_SESSION['user_id'];

    foreach ($serial_number as $serial){
        array_push($arr_serial_number,$serial);
    }
    foreach ($serial_product_id as $product_id){
        array_push($arr_product_id,$product_id);
    }

    for ($i = 0; $i< sizeof($arr_serial_number); $i++){

        $query_o = query("insert into products_serial (product_serial,product_id,online_order_number)
                           values ('{$arr_serial_number[$i]}',{$arr_product_id[$i]},{$order_number})");
        confirm($query_o);


        $update_store_sql = "update tbl_products_store  
                                INNER JOIN
                                (
                                    select p.product_id,p.quantity,p.order_number,o.store_id
                                    FROM (select * from product_order where product_id = {$arr_product_id[$i]} and order_number = {$order_number}) p
                                    INNER JOIN (select * from tbl_order where order_id = {$order_number}) o
                                    on o.order_id = p.order_number
                                ) as foo
                                ON tbl_products_store.store_id = foo.store_id
                                set product_quantity = tbl_products_store.product_quantity - 1
                                where tbl_products_store.product_id = foo.product_id
                                and tbl_products_store.store_id = foo.store_id";
        $update_store_query = query($update_store_sql);
        confirm($update_store_sql);

    }
    if($update_store_sql){

        $sql = "update stores_summary_report summary
                    INNER JOIN
                    (select  orders.store_id,products_order.quantity,products_order.sold_price_products
                    from
                    (select order_number,sum(quantity) quantity, SUM(sold_price_products) sold_price_products 
                    FROM (
                    SELECT	order_number,quantity,(quantity*(CASE WHEN discount_price = 0 THEN sale_price ELSE	discount_price END)) sold_price_products
                    FROM	product_order where order_number = {$order_number}
                    ) foo) products_order
                    INNER JOIN 
                    (SELECT order_id, store_id from tbl_order where order_id = {$order_number}) orders
                    on orders.order_id = products_order.order_number) report
                    on summary.store_id = report.store_id
                    set  total_order_sale_products_quantity = total_order_sale_products_quantity + report.quantity,
                         total_cash_on_order_products = total_cash_on_order_products + report.sold_price_products 
                    where summary.store_id = (SELECT store_id from tbl_order where order_id = {$order_number})";
//        echo $sql;
//        return;
        $query = query($sql);
        confirm($sql);
        if($query){
            $sql2 = "update tbl_order 
                 set order_status = 'Placed' , effecte_by_user = {$user_id}
                 where order_id = {$order_number}";
            $query2 = query($sql2);
            confirm($sql2);
            if($query2){
                $sql3 ="update products AS p
                        INNER JOIN
                        (
                            select original_product.product_id_orginal, (original_product.product_quantity_orginal-order_products.quantity) remain_products
                            from(
                            select product_id product_id_orginal,product_quantity product_quantity_orginal from products where product_id in (
                             select product_id from product_order where order_number = {$order_number}
                            )) original_product
                            INNER JOIN
                            (select product_id,quantity from product_order where order_number = {$order_number}) order_products
                            on order_products.product_id = original_product.product_id_orginal
                        ) as foo
                        on p.product_id = foo.product_id_orginal
                        set product_quantity = foo.remain_products
                        WHERE p.product_id = foo.product_id_orginal";
                $query3 = query($sql3);
                confirm($sql3);
                if($query3) {

                    set_message('Order send to Clint','success');
                    redirect('index.php?order_placed');
                }else{
                    set_message('Error in Network','danger');
                    redirect('index.php?orders');
                }
            }else{
                set_message('Error in Network','danger');
                redirect('index.php?orders');
            }
        }else{
            set_message('Error in Network','danger');
            redirect('index.php?orders');
        }
    }else{
        set_message('Error in Network','danger');
        redirect('index.php?orders');
    }

}