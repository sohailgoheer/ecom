<?php require_once('../resources/config.php'); ?>
    <!--header-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Side Navigation -->

        <!--side navigation-->
        <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

        <?php


        $sql = "SELECT *,product_description desc_detail FROM products WHERE product_id={escape_string($_GET[id])}";
        $query = query($sql);
        confirm($query);
        while ($row = fetch_array($query)):



            $product_image = display_image($row['product_image']);
            ?>

            <div class="col-md-9">

                <!--Row For Image and Short Description-->
                <?php display_message(); ?>
                <div class="row">

                    <div class="col-md-7">
                        <img class="img-responsive" style=" width: 600px"
                             src="../resources/<?php echo $product_image; ?>" alt="">
                        <hr>
                    </div>

                    <div class="col-md-5">

                        <div class="thumbnail">


                            <div class="caption-full">
                                <h4><a href="#"><?php echo $row['product_title']; ?></a></h4>
                                <hr>

                                <?php if ($row['product_disc_price'] != '0') { ?>
                                    <h4 class=""><s style='color: #adadad'>Rs. <?php echo $row['product_price']; ?></s>
                                    </h4>
                                    <div class="row" style="padding-left: 15px;">
                                        <span class='btn btn-warning'><span
                                                    class='label label-danger blink'> Sale</span>   Rs <?php echo $row['product_disc_price']; ?>
                                            .00</span>
                                    </div>
                                <?php } else { ?>
                                    <h4 class="">Rs. <?php echo $row['product_price']; ?></h4>
                                <?php } ?>

                                <br>
                                <p><?php echo $row['product_short_description']; ?></p>
                                <div class="form-group">
                                    <a class="btn btn-primary"
                                       href="../resources/cart.php?page=checkout&add=<?php echo $row['product_id']; ?>">Add
                                        to <span class="glyphicon glyphicon-shopping-cart"></span></a>
                                </div>


                            </div>

                        </div>

                    </div>


                </div><!--Row For Image and Short Description-->


                <hr>


                <!--Row for Tab Panel-->

                <div class="row">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                      data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                       data-toggle="tab">Reviews</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">

                                <table class="table table-bordered table-responsive">
                                    <?php

                                    $description = $row['desc_detail'];

                                    $des_pieces = explode("|", $description);
                                    foreach ($des_pieces as $obj){
                                        $des_final = explode("=", $obj);
                                        echo"                                       
                                         <tr>
                                            <th>{$des_final[0]}</th>
                                            <td><p>{$des_final[1]}</p></td>
                                         </tr>";
                                    }
                                    ?>

                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="col-md-6">
                                    <h4 class="alert alert-info">User Reviews</h4>
                                    <?php get_reviews(); ?>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="alert alert-warning">Add A review</h4>
                                    <hr>
                                    <form action="add_review.php" method="POST" class="form-inline">

                                        <div class="input-group col-md-12">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" name="userName" class="form-control" placeholder="Username" required>
                                        </div>
                                        <hr>
                                        <div class="input-group col-md-12">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input type="text" name="email" class="form-control" placeholder="E-mal" required>
                                            <input type="hidden" name="product_id" value="<?php echo $_GET['id'] ;?>" >
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <textarea name="comment" id=""  cols="50" rows="10" class="form-control" required></textarea>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="post_review" value="Post">
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>


                </div><!--Row for Tab Panel-->


            </div>
        <?php endwhile; ?>
    </div>
    <!-- /.container -->
    <!--footer-->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>