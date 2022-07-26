<?php require_once('../resources/config.php'); ?>
<!--header-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">

<div class="breadcrumb">
        <h4 ><a href="index.php"> Home </a>/ Shop  </h4>
</div>

    <hr>

    <!-- Page Features -->
    <div class="row">
        <?php get_products_in_shop_page(); ?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<!--footer-->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
