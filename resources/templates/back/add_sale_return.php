<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i>
            Dashboard </a> / <a href="index.php?sale_return_history">Sales Return</a>  / Add Sale Return
    </h4>
</div>

<div class="col-md-12">


<form action="" method="post" enctype="multipart/form-data">
    <?php add_sales_return(); ?>
    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                <select name="store_name" id="store_name" class="form-control selectpicker" data-live-search="true" onchange="fill_customer_name_sale_return(this.value)">
                    <option value="%">Store Name</option>
                    <?php add_stores(); ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select name="customer_name" id="customer_id" class="form-control selectpicker" data-live-search="true" onchange="fill_invoice_sale_return()">
                    <option value="%">Customer Name</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                <select name="invoice_no" id="invoice_no" class="form-control selectpicker" data-live-search="true" onchange="fill_product_name_sale_return()">
                    <option value="%">Invoice No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                <select name="product_id" id="product_id" class="form-control selectpicker" data-live-search="true">
                    <option value="%">Product Name</option>
                </select>
            </div>
        </div>



        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-calculator"></i></span>
                <input type="number" name="quantity" id="quantity" value="0" class="form-control"  placeholder="Quantity">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                <input type="text" name="serial_no" class="form-control"  placeholder="Serial No. with qoma separated">
            </div>
        </div>

        <div class="form-group">
            <textarea name="reason_comments" id=""  cols="50" rows="10" class="form-control" >Reason: </textarea>
        </div>

         <div class="btn-group">
             <a href="index.php?sale_return_history"  class="btn btn-warning" > <span class="fa fa-backward"></span> Back </a>
             <button type="reset" class="btn btn-default" ><span class="fa fa-refresh"></span> Reset </button>
             <button type="submit" name="add_sale_return" class="btn btn-success"  ><span class="fa fa-save"></span> Submit</button>
         </div>
    </div>


</form>




</div>

