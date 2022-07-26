<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>   / Slides   </h4>
</div>
<?php display_message(); ?>
<div class="row">



    <div class="col-md-3">

        <form action="" method="post" enctype="multipart/form-data">
            <?php add_slides(); ?>
            <div class="form-group col-md-12">

                <input class="btn btn-success" type="file" name="file">

            </div>

            <div class="form-group col-md-12">
                <label for="title">Slide Title</label>
                <input type="text" name="slide_title" class="form-control" placeholder="Slide one" required>

            </div>

            <div class="form-group col-md-12">

                <button class="btn btn-primary" type="submit" name="add_slider"><span class="fa fa-upload"></span> Upload</button>

            </div>

        </form>

    </div>


    <div class="col-md-8">

        <?php get_active_slide_in_admin(); ?>
    </div>

</div><!-- ROW-->

<hr>

<table class="table table-responsive col-md-12">
    <thead>
        <th class="btn-warning"> Slides Available </th>
    </thead>
</table>

<div class="row">
    <?php get_slides_thumbnails_in_admin(); ?>
</div>


