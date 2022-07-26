<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  <a href="index.php?cart_customers"> Cart Customers </a> / Customer Profile   </h4>
</div>
<?php display_message(); ?>
<div class="col-lg-12">
<?php

if(isset($_GET['customer_email'])){
    $customer_email = escape_string($_GET['customer_email']);
}


?>


        <table class="table table-hover table-responsive table-striped">
            <thead>
            <tr class="btn-primary">
                <th colspan="2">Customer Profile</th>

            </tr>

            </thead>
            <tbody>
            <?php display_cart_customer_profile($customer_email); ?>
            <tr>
                <td colspan="2">

                    <a href="index.php?cart_customers" class="btn btn-warning"><span class="fa fa-backward"></span> Back</a>
                </td>

            </tr>
            </tbody>
        </table> <!--End of Table-->


</div>

