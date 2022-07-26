<div class="col-md-3">
    <div class="text-center">
        <h1 style="font-family: Jazz LET, fantasy">
            <?php if(isset($data[0])) echo $data[0] ; ?>
        </h1>
        <p style="font-family: Brush Script MT, Brush Script Std, cursive; font-size: large">
            <?php if(isset($data[0])) echo $data[1] ; ?>
        </p>
    </div>

    <br>

    <div class="list-group" style="padding-bottom: 40px;">
        <form class="navbar-search " method="get" action="category.php">
            <div class="col-lg-10 col-md-10 col-sm-11 col-xs-10" style="padding: 0px">
                <input placeholder="Search" class="searchProductsInput search-query form-control"  name="product_title" type="text" >
            </div>
            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2" style="padding: 0px;">
                <button type="submit"  class="searchProductsSubmit btn btn-primary" >
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>
    </div>

    <!--    sub categories-->
    <?php if(isset($_GET['cat_id'])):?>

        <div class="list-group">

            <?php
            get_sub_categories($_GET['cat_id']);
            ?>

        </div>

    <?php endif;?>



    <div class="list-group">
        <li class='list-group-item active'><span class="glyphicon glyphicon-th"></span><strong> CATEGORIES</strong></li>
        <?php  get_categories();  ?>

    </div>





    <div class="list-group">
        <li class='list-group-item active'><span class="glyphicon glyphicon-th"></span><strong> BRANDS </strong></li>
        <?php get_brands(); ?>

    </div>
    <div class="list-group">

        <li class='list-group-item active'><span class="glyphicon glyphicon-th"></span><strong> RANGE</strong></li>
        <!--        <li class='list-group-item text-center active'> RANGE</li>-->
        <a class='list-group-item' href="category.php?range=min-5000">Rs: 00 - 5000</a>
        <a class='list-group-item' href="category.php?range=5001-10000">Rs: 5001 - 10000</a>
        <a class='list-group-item' href="category.php?range=10001-20000">Rs: 10001 - 20000</a>
        <a class='list-group-item' href="category.php?range=20001-50000">Rs: 20001 - 50000</a>
        <a class='list-group-item' href="category.php?range=50001-max">Rs: 50001 - >> </a>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php display_message(); ?>
        </div>

    </div>

    <div class="list-group">

        <li class='list-group-item active'><span class="glyphicon glyphicon-th"></span><strong> NEWSLETTER</strong></li>
        <!--        <li class='list-group-item text-center active'> RANGE</li>-->

        <form class="navbar-search" method="get" action="">

            <?php post_subscriber_user(); ?>

            <div class="list-group-item"  >

                <input placeholder="E-mail" class="form-control"  name="newsletter_subscribe_email" type="text" >
                <br>
                <input placeholder="WhatsApp" class="form-control"  name="newsletter_subscribe_cell" type="text" >
                <br>
                <button type="submit" name="subscriber"  class="btn btn-primary " ><span class="fa fa-save"></span> Submit
                </button>
                <br>

            </div>


        </form>

    </div>

</div>