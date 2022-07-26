<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Brands   </h4>
</div>
<?php display_message(); ?>
<div class="col-md-4">
    <form action="" method="post">
        <?php add_brands_in_admin(); ?>
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="brand_name" class="form-control" required placeholder="i.e DELL">
        </div>
        <div class="form-group">
            <button type="submit" name="add_brand" class="btn btn-primary"  ><span class="fa fa-plus"></span> Add Brand</button>
        </div>
    </form>
</div>
<div class="col-md-8">
    <table class="table table-striped table-responsive">
        <thead>
        <tr class="btn-primary">
            <th>Brand ID.</th>
            <th>Brand Title</th>
            <th> </th>

        </tr>
        </thead>
        <tbody>
        <?php show_brands_in_admin(); ?>
        </tbody>
    </table>
</div>





