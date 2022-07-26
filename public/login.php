<?php require_once ('../resources/config.php'); ?>
<!--header-->
<?php include(TEMPLATE_FRONT.DS."header.php")?>
    <!-- Page Content -->

    <div class="container" xmlns="http://www.w3.org/1999/html">

      <header>
           <h1 class="text-center"><span class="fa fa-lock"></span> Login</h1>


        <div class="col-sm-4 col-sm-offset-4">
            <?php display_message(); ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <?php login_user(); ?>

                <div class="form-group">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>

                </div>
                 <div class="form-group">
                     <div class="input-group ">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk red"></i></span>
                         <input type="password" name="password" class="form-control" placeholder="Password">
                     </div>


                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" ><span class="fa fa-unlock"></span>  Login </button>
                </div>
            </form>
        </div>


    </header>

</div>

    <!--footer-->
<?php include(TEMPLATE_FRONT.DS."footer.php")?>