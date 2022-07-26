<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  <a href="index.php?products"> Products </a> / Product Review   </h4>
</div>
<?php display_message(); ?>
<div class="col-lg-12">




    <div class="col-md-12">

        <table class="table table-hover table-responsive table-striped">
            <thead>
            <tr class="btn-primary">
                <th>Name</th>
                <th>Email</th>

                <th>Date&nbsp;&&nbsp;Time</th>
                <th>Comment</th>
                <th> </th>


            </tr>
            </thead>
            <tbody>
            <?php display_product_reviews(); ?>

            </tbody>
        </table> <!--End of Table-->


    </div>

</div>









