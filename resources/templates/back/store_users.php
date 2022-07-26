<?php

if(isset($_GET['store_id'])){
    $store_id = escape_string($_GET['store_id']);

}

?>

<div class="row">
    <h4 class="breadcrumb"><a href="index.php">Home</a> /  <a href="index.php?stores">Stores </a> / Sellers</h4>
</div>

<?php display_message(); ?>

<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr class="btn-primary">
            <th>User ID. </th>
            <th>User Name</th>
            <th>Email</th>
            <th>Status </th>
            <th>Role </th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php  users_in_store($store_id); ?>
        </tbody>
    </table>
</div>
<div class="btn-group col-md-12">
    <a href="index.php?stores"   class="btn btn-warning" ><span class="fa fa-backward" ></span> Back </a>

</div>