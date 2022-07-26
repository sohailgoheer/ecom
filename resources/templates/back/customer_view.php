<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  <a href="index.php?customers">  Customers </a> / Customer Profile   </h4>
</div>
<?php display_message(); ?>
<div class="col-lg-12">

    <div class="col-md-12">

        <table class="table table-hover table-responsive table-striped">
            <thead>
                <tr class="bg-primary">
                    <th colspan="2">
                        <span class="fa fa-user"></span> Customer Profile
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php display_customer_profile(); ?>
                <tr>
                    <td colspan="2">
                        <div class="btn-group">
                            <a href="index.php?customers" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>
                            <a href="index.php?edit_customer&customer_id=<?php echo $_GET['customer_id'];?>" class="btn btn-success"><span class="fa fa-pencil"></span> Edit </a>

                        </div>

                    </td>
                </tr>
            </tbody>
        </table> <!--End of Table-->


    </div>


</div>









