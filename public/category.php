<?php require_once ('../resources/config.php'); ?>
<!--header-->
<?php include(TEMPLATE_FRONT.DS."header.php")?>
    <!-- Page Content -->
    <div class="container">

        <?php include(TEMPLATE_FRONT.DS."side_nav.php")?>
        <div class="col-md-9">

            <!-- Title -->
            <div class="row">
                <div class="col-lg-12">
                    <?php get_search_type_name(); ?>
                </div>
            </div>
            <!-- /.row -->



            <!-- Page Features -->
            <div class="row">

                <?php  get_products_in_cat_page(); ?>

            </div>
            <?php  display_message(); ?>
        </div>

        <!-- /.row -->
    </div>
    <!-- /.container -->
<!--footer-->
<?php include(TEMPLATE_FRONT.DS."footer.php")?>
