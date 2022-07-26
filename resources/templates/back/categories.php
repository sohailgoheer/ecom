<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Categories & Sub Categories   </h4>
</div>
<?php display_message(); ?>
<div class="row">
<!--    categories-->
    <div class="col-md-5">
        <form action="" method="post">
            <?php add_categories_in_admin(); ?>
            <div class="form-group">

                <input type="text" name="cat_title" class="form-control" required placeholder="Category Name">
            </div>
            <div class="form-group">
                <button type="submit" name="add_cat" class="btn btn-primary"  ><span class="fa fa-plus"></span> Add  Category</button>
            </div>
        </form>

        <hr>
        <table class="table table-responsive table-hover ">
            <thead>
            <tr class="btn-primary">

                <th>ID.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Category Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                <th>  </th>

            </tr>
            </thead>
            <tbody>
            <?php show_categories_in_admin(); ?>
            </tbody>
        </table>
    </div>


<!--    subcategories-->
    <div class="col-md-5  col-md-offset-1">
        <form action="" method="post">
            <?php add_sub_categories_in_admin(); ?>

<!--            <div class="form-group">-->
<!---->
<!---->
<!--                <select   name="cat_title" class="form-control" required>-->
<!--                    <option value="">Select Category</option>-->
<!--                    --><?php //show_categories_in_sub_cat_dropdown() ; ?>
<!--                </select>-->
<!--            </div>-->
            <div class="form-group">
                <input type="text" name="sub_cat_title" class="form-control" required placeholder="Sub Category Name">
            </div>



                <div class="input-group">
                    <button type="submit" name="add_sub_cat" class="btn btn-success"  ><span class="fa fa-plus"></span> Sub Category</button>
                </div>

        </form>
        <hr>
        <table class="table table-responsive   table-hover">
            <thead>
            <tr class="btn-primary">

                <th>ID.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Sub&nbsp;Category&nbsp;Title&nbsp;&nbsp;&nbsp;&nbsp;</th>

                <th> </th>

            </tr>
            </thead>
            <tbody>
            <?php show_sub_categories_in_admin(); ?>
            </tbody>
        </table>
    </div>

</div>


