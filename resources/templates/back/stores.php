<div class="row">
    <h4 class="breadcrumb"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a> /  Stores </h4>
</div>

<?php display_message(); ?>


<div class="col-md-12">
    <a href="index.php?add_store"   class="btn btn-success pull-right" style=""><span class="fa fa-plus" ></span> Add Store </a>
    <hr>
</div>


<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr class="btn-primary">
            <th>Store ID.</th>
            <th>Store Name</th>
            <th>Categories </th>
            <th>Products </th>
            <th>Start From </th>
            <th> </th>

        </tr>
        </thead>
        <tbody>
        <?php show_stores_in_admin(); ?>
        </tbody>
    </table>
</div>





