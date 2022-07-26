<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / <a href="index.php?products">Products</a> / Product Detail    </h4>
</div>
<div class="row"><?php  display_message(); ?></div>
<?php
if (isset($_GET['page'])){
    $go_to = $_GET['page'];
}


?>

<div class="col-md-12">
<table class="table  table-responsive table-hover table-striped" cellspacing="0">
    <thead>
        <tr class="btn-primary">
            <th colspan="3">Prodect Detail</th>
        </tr>
    </thead>
    <tbody>


    <?php display_product_detail(); ?>
    <tr>
        <td colspan='3'><a class='btn btn-warning' href='index.php?<?php echo $go_to; ?>' ><span class="fa fa-backward"></span> Back </a> </td>
    </tr>
    </tbody>

</table>
</div>