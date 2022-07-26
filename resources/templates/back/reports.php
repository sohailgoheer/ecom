<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Reports   </h4>
</div>
<?php



$data = search_report();

if (isset($_POST['search_report'])) {

    $start_date =  $data[6];
    $end_date = $data[7];
}else{
    $start_date =  date("Y-m-d",strtotime("-1 month"));
    $end_date =  date("Y-m-d");

}




?>
<?php display_message();  ?>

<div class="row col-md-12" style="margin-top: 15px;">
    <form action="" method="post">

    <div class="form-group col-md-3">
        <label for="store_name">Store Name</label>
        <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-bank"></i></span>
            <select name="store_name" id="store_name" class="form-control selectpicker" data-live-search="true" onchange="check_product_avaliablity(this)">

                <?php if (isset($_POST['search_report'])):?>

                    <option value="<?php echo $data[9]; ?>"><?php echo $data[8]; ?></option>

                <?php else: ?>
                    <option value="%">All Store </option>
                <?php endif; ?>
                <?php fill_store_drop_down_reports(); ?>

            </select>

        </div>


    </div>


    <div class="form-group col-md-3">
        <label for="start_date">Start Date</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="date" name="start_date" id="start_date" value="" class="form-control"  placeholder="Start Date" required/>

        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="start_date">End Date</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="date" name="end_date" id="end_date" class="form-control" value="" placeholder="End Date" required/>

        </div>
    </div>

    <div class="form-group col-md-3">
        <div class="btn-group" style="margin-top: 25px;">
            <button type="submit" name="search_report" class="btn btn-primary" ><span class="fa fa-search"></span> Search</button> &nbsp; &nbsp;
            <a href="index.php?reports"  class="btn btn-default" ><span class="fa fa-refresh"></span> Reset</a>
        </div>
    </div>

    </form>


</div>


<div class="row col-md-12">
    <!--    Office Inventory-->
    <div class="col-md-6">
        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr class="btn-warning">
                <th colspan="2"><span class="fa fa-list-alt"></span> Office Inventory</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Total Items Sold</th>
                <td><?php echo $data[2]; ?></td>
            </tr>
            <tr>
                <th>Cash on Sold Items</th>
                <td>Rs. <?php echo $data[3]; ?> /-</td>
            </tr>

            </tbody>
        </table>
    </div>
    <!--    Online Cart-->
    <div class="col-md-6">
        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr class="btn-success">
                <th colspan="2"><span class="fa fa-shopping-cart"></span> Online Cart</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Total Item Sold</th>
                <td><?php echo $data[0]; ?></td>
            </tr>
            <tr>
                <th>Cash on Sold Items </th>
                <td>Rs. <?php echo $data[1]; ?>/-</td>
            </tr>

            </tbody>
        </table>
    </div>
    <!--    over all-->
    <div class="col-md-12">

        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr class="btn-danger">
                <th colspan="2"><span class="fa fa-object-group"></span> Over All</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="col-md-6">Total Items Sold</th>
                <td><?php echo $data[4]; ?></td>
            </tr>
            <tr>
                <th>Cash on Sold Items</th>
                <td>Rs. <?php echo $data[5]; ?>/-</td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    <a href="index.php" class="btn btn-warning"><span class="fa fa-backward"></span> Back </a>

</div>

<script>
    function setDate() {
        document.getElementById("start_date").value ="<?php echo $start_date; ?>";
        document.getElementById("end_date").value = "<?php echo $end_date; ?>";
    }
    setDate();




</script>

