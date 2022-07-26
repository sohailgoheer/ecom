<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
<!--        <h1 class="page-header">-->
<!--            Dashboard-->
<!--            <small>Statistics Overview</small>-->
<!--        </h1>-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
<?php $data = get_notification();  ?>

<?php if($_SESSION['user_role'] == 'admin'): ?>

<div class="row">

    <div class="col-md-3">
        <div class="btn-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $data[0]; ?></div>
                        <div>New Orders!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?orders">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-md-3">
        <div class="btn-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $data[1]; ?></div>
                        <div>Products!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?products">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="btn-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $data[2]; ?></div>
                        <div>Categories!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?categories">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="btn-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-apple fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $data[3]; ?></div>
                        <div>Brands!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?brands">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


</div>

<?php endif; ?>


<!-- SECOND ROW WITH TABLES-->

<div class="row" style="margin-top:20px; ">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Online Transactions Panel</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr class="btn-info">
                            <th>Order #</th>
                            <th>Date & Time</th>
                            <th>Items Quantity</th>
                            <th>Amount (Rs)</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php display_online_transactions();  ?>

                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?order_placed">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>







    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Store Transactions Panel</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr class="btn-info">
                            <th>Invoice #</th>
                            <th>Date & Time</th>
                            <th>Items Quantity</th>
                            <th>Amount (Rs)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php display_store_transactions(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?invoice_history">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.row -->