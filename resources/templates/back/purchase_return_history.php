<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Purchase Return   </h4>
</div>
<div class="col-md-12">
    <?php display_message(); ?>
</div>

<div class="col-md-12">
    <a href="index.php?add_purchase_return" class="btn btn-success pull-right" ><span class="fa fa-plus"></span> Add Purchase Return</a>
    <hr/>
</div>

<div class="col-lg-12">


    <table  class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">

    <thead>
        <tr class="btn-primary">
            <th></th>
            <th>invoice No.</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Vendor</th>
            <th>Serial</th>
            <th>Date</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Reason</th>


        </tr>
        </thead>
        <tbody>
        <?php display_purchase_return(); ?>

        </tbody>
    </table> <!--End of Table-->





</div>









