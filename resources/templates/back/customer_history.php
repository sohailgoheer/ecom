<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>
        / <a href="index.php?customers">  Customers </a>
        / Customer History    </h4>
</div>
<div class="row"><?php  display_message(); ?></div>
<?php

if(isset($_GET['customer_id'])){

    $customer_id = escape_string($_GET['customer_id']);

    $sql = "select f_name, l_name from customers where customer_id = {$customer_id}";
    $query = query($sql);
    confirm($query);
    while ($row = fetch_array($query)){
        $c_fname = $row['f_name'];
        $c_lname = $row['l_name'];
    }

}



?>

<div class="col-md-12">
<h3 class="alert alert-info"><span class="fa fa-user"></span> <?php echo $c_fname.' '.$c_lname; ?></h3>

    <table class="table table-hover table-striped table-responsive">
        <thead>

        <tr class="btn-primary">
            <th>Invoice No.</th>
            <th>Date</th>
            <th>Itoms</th>
            <th>Total</th>
            <th>Received</th>
            <th>Receivable</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php  customer_history($customer_id); ?>

        <tbody>
        <table>

</div>
<div class="col-md-12">
    <a href="index.php?customers" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
</div>