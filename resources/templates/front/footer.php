<div class="container">

    <?php $data2 = get_shop_detail(); ?>

    <!-- Footer -->
    <footer>
        <hr>
        <div class="col-md-4">
            <p><strong>Order Us:</strong></p>
            <p><span class="fa fa-whatsapp"></span> <?php if(isset($data2[2])) echo $data2[2]; ?></p>
            <p><span class="fa fa-mobile"></span> <?php if(isset($data2[1])) echo $data2[1]; ?></p>
            <p><span class="fa fa-envelope"></span>  <?php if(isset($data2[0])) echo $data2[0]; ?></p>
        </div>
        <div class="col-md-4">

            <a href="<?php if(isset($data2[9])) echo $data2[9]; ?>" target="_blank"> <img src="../resources/images/instagram.png" style="width: 50px" ></img></a>
            <a href="<?php if(isset($data2[7])) echo $data2[7]; ?>" target="_blank"> <img src="../resources/images/tweeter.png" style="width: 50px" ></img></a>
            <a href="<?php if(isset($data2[0])) echo $data2[0]; ?>" target="_blank"> <img src="../resources/images/whatsapp.png" style="width: 50px" ></img></a>
            <a href="<?php if(isset($data2[8])) echo $data2[8]; ?>" target="_blank"> <img src="../resources/images/youtube.png" style="width: 50px" ></img></a>
            <a href="<?php if(isset($data2[6])) echo $data2[6]; ?>" target="_blank"> <img src="../resources/images/facebook.png" style="width: 50px" ></img></a>

            <br>
            <br>
        </div>


        <div class="col-md-4">
            <p> </p>
            <p> </p>
            <p>Copyright © Your Website 2030</p>
        </div>

    </footer>
<!--    <nav  class="navbar navbar-custom navbar-fixed-bottom"  >-->
<!--        --><?php //include (TEMPLATE_FRONT.DS."bottom_nav.php")?>
<!--    </nav>-->


</div>
<!-- /.container -->

<!-- jQuery -->
<!--<script src="js/jquery.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
