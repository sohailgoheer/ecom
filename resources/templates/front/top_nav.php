<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       <?php
       if (basename($_SERVER['PHP_SELF']) == '' || basename($_SERVER['PHP_SELF']) == 'index.php') {
          echo "<a class='navbar-brand'  href='index.php'><span class='fa fa-home'></span><strong style='color:#ffffff'> Home</strong></a>";
       }else{
           echo "<a class='navbar-brand' href='index.php'><span class='fa fa-home'></span> Home</a>";
       }

       ?>

    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav mr-auto">
            <li>
                <?php
                if (basename($_SERVER['PHP_SELF']) == 'shop.php') {
                    echo "<a href='shop.php'><strong style='color:#ffffff'>Shop</strong></a>";
                }else{
                    echo "<a href='shop.php'>Shop</a>";
                }
                ?>

            </li>

            <li>
                <?php
                if (basename($_SERVER['PHP_SELF']) == 'checkout.php' || basename($_SERVER['PHP_SELF']) == 'proceed.php' ) {
                    echo "<a href='checkout.php'><strong style='color:#ffffff'>Checkout</strong></a>";
                }else{
                    echo "<a href='checkout.php'>Checkout</a>";
                }
                ?>

            </li>
            <li>
                <?php
                if (basename($_SERVER['PHP_SELF']) == 'contact.php') {
                    echo "<a href='contact.php'><strong style='color:#ffffff'>Contact</strong></a>";
                }else{
                    echo "<a href='contact.php'>Contact</a>";
                }
                ?>

            </li>
            <li>
                <?php
                if (basename($_SERVER['PHP_SELF']) == '/workspace/ecom/public/login.php') {
                    echo "<a href='login.php'><strong style='color:#ffffff'>Admin</strong></a>";
                }else{
                    echo "<a href='admin'>Admin</a>";
                }
                ?>
<!--                <a href="admin">Admin</a>-->
            </li>
<!--            <li>-->
<!--                <a href="login.php">Login</a>-->
<!--            </li>-->
        </ul>
        <a href="checkout.php" type="button" class="btn btn-default navbar-btn pull-right">
            <?php


                $total_amount = 0;
                $total_items =0;
                foreach ($_SESSION as $name => $value){//for getting all products which are under session
                    if($value>0){
                        if(substr($name , 0,8) == 'product_'){

                            $length = strlen($name);
                            $id = substr($name,8,$length); //getting id

                            $sql = "select * from products where product_id = {escape_string($id)}";
                            $query = query($sql);
                            confirm($query);
                            while ($row = fetch_array($query)) {
                                $sub = $row['product_price']*$value;
                            }
                            $_SESSION['amount_totals'] = $total_amount += $sub;
                            $_SESSION['items_totals'] = $total_items += $value;
                        }
                    }
                }
            ?>
            <strong>Rs.</strong> <?php  echo isset($_SESSION['amount_totals'])? $_SESSION['amount_totals']:$_SESSION['amount_totals']='00'; ?> |
             <strong>Item</strong> <?php  echo isset($_SESSION['items_totals'])? $_SESSION['items_totals']:$_SESSION['items_totals']='0'; ?> |
            <span class="glyphicon glyphicon-shopping-cart"></span> Cart
        </a>
    </div>
    <!-- /.navbar-collapse -->

</div>
<!-- /.container -->