<div class="col-md-12">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Vendors   </h4>
</div>


<div class="col-md-12">
    <?php display_message(); ?>
</div>


<div class="col-md-12">
    <a href="index.php?add_vendor"   class="btn btn-success pull-right" style=""><span class="fa fa-plus"></span> Add Vendor</a>
    <hr>
</div>


<div class="col-md-12">
    <table class="table table-striped  display responsive nowrap " style="width:100%"  id="table_id">
        <thead>
        <tr class="btn-primary">
            <th>Vendor ID.</th>
            <th>As&nbsp;Customer&nbsp;ID.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Phone</th>
            <th>Email</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
                <?php display_vendors(); ?>
        </tbody>
    </table>
</div>





