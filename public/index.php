<?php require_once ('../resources/config.php'); ?>
<!--header-->
<?php include(TEMPLATE_FRONT.DS."header.php")?>
<!-- Page Content -->
<div class="container">
    <div class="row">
<!--side navigation-->
        <?php include(TEMPLATE_FRONT.DS."side_nav.php")?>
        <div class="col-md-9">
            <div class="row carousel-holder">
                <div class="col-md-12">
<!--                    top slider left to right-->
                    <?php include(TEMPLATE_FRONT.DS."slider.php")?>
                </div>
            </div>


            <!--            products-->
            <div class="row">
                <?php get_new_in_products();?>
            </div>

            <div class="row">
                <?php get_recommend_products();?>
            </div>

            <div class="row">
                <?php get_fan_favorit_products();?>
            </div>

            <div class="row">
                <?php get_on_sale_products();?>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->
<!--footer-->
<?php include(TEMPLATE_FRONT.DS."footer.php")?>