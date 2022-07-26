<div class="row">
    <h4 class="breadcrumb"><a href="index.php">Home</a> /   <a href="index.php?stores">Stores</a>  / Add Store</h4>
</div>

<?php display_message(); ?>
<div class="col-md-4">
    <form action="" method="post">
        <?php add_stores_in_admin(); ?>
        <div class="form-group">
            <label for="category-title">Store Name</label>
            <input type="text" name="location_loc" class="form-control" required placeholder="i.e Pakistan">
        </div>
        <div class="btn-group">
            <a href="index.php?stores"   class="btn btn-warning" ><span class="fa fa-backward" ></span> Back </a>
            <button type="submit" name="add_store" class="btn btn-success" value=""><span class="fa fa-save"></span> Add Store</button>
        </div>
    </form>
</div>



