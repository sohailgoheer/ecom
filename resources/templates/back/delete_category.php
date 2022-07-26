

<?php

if(isset($_GET['delete_category'])) {
    if(isset($_GET['type']) == 'categories'){
        $id = escape_string($_GET['id']);



        $sqlx = "SELECT count(product_category_id) cat_count from products where product_category_id = {$id}";
        $queryx = query($sqlx);
        confirm($queryx);
        while ($row = fetch_array($queryx)){
            if($row['cat_count'] > 0){
                set_message('This Category using in Products first delete product','danger');
                redirect('index.php?categories');
                return;
            }
        }



        $sql = "delete from categories where cat_id = {$id}";
        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('Category has been deleted','success');
            redirect('index.php?categories');
        } else {
            set_message('Some Issues to delete Category','danger');
            redirect('index.php?categories');
        }
    }

    if(isset($_GET['type']) == 'sub_cat'){
        $id = escape_string($_GET['id']);


        $sqly = "SELECT count(product_sub_category_id) cat_count from products where product_sub_category_id = {$id}";
        $queryy = query($sqly);
        confirm($queryy);
        while ($rowy = fetch_array($queryy)){
            if($rowy['cat_count'] > 0){
                set_message('This Sub-Category using in Products first delete product','danger');
                redirect('index.php?categories');
                return;
            }
        }



        $sql = "delete from sub_categories where sub_category_id = {$id}";

        $query = query($sql);
        confirm($query);
        if ($query) {
            set_message('Sub Category has been deleted','success');
            redirect('index.php?categories');
        } else {
            set_message('Some Issues to delete Sub Category','danger');
            redirect('index.php?categories');
        }
    }

}
