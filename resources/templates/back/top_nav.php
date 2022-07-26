<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <?php
        $data = web_profile();
    ?>
    <a target="_blank" class="navbar-brand" href="../index.php" style="color: #ffffff"> <?php if(isset($data[0])) echo $data[0]; ?> </a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo strtoupper($_SESSION['user']) ;?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li class="divider"></li>
            <li>
                <a href="index.php?profile_setting"><i class="fa fa-cogs"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>