

<?php

if(isset($_GET['action'])){

    if($_GET['action'] == 'delete'){
        if(isset($_GET['id'])) {

            $id = escape_string($_GET['id']);

            $sql = "delete from users where user_id = {escape_string($id)}";

            $query = query($sql);
            confirm($query);
            if ($query) {
                set_message('User has been deleted','success');
                redirect('index.php?users');
            } else {
                set_message('Some Issues to delete User','danger');
                redirect('index.php?users');
            }


        }
    }
    if($_GET['action'] == 'change_role'){
        if(isset($_GET['id'])) {

            $id = escape_string($_GET['id']);
            $role = escape_string($_GET['role']);

            $sql = "update users 
                    set role = '{$role}' 
                    where user_id = {escape_string($id)}";

            $query = query($sql);
            confirm($query);
            if ($query) {
                set_message('User Role has been changed','success');
                redirect('index.php?users');
            } else {
                set_message('Some Issues to delete User','danger');
                redirect('index.php?users');
            }


        }
    }
    if($_GET['action'] == 'change_status'){
            if(isset($_GET['id'])) {

                $id = escape_string($_GET['id']);
                $status = escape_string($_GET['status']);

                $sql = "update users 
                        set status = '{$status}' 
                        where user_id = {escape_string($id)}";

                $query = query($sql);
                confirm($query);
                if ($query) {
                    set_message('User Status has been changed','success');
                    redirect('index.php?users');
                } else {
                    set_message('Some Issues to delete User','danger');
                    redirect('index.php?users');
                }


            }
        }


}

