<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <?php
        $sql = "select *   from slides where date_time != (select max(date_time) from slides)";
        $query = query($sql);
        confirm($query);
        $slide_num = 1;
        while ($row = fetch_array($query)):
        ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $slide_num; ?>"></li>

        <?php
            $slide_num++;
            endwhile;
        ?>
<!--        <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="3"></li>-->
    </ol>
    <div class="carousel-inner">
        <?php get_active_slides(); ?>

        <?php get_slides(); ?>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>