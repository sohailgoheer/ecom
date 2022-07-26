
<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> / <a href="index.php?products">Products</a>  / New Product    </h4>
</div>

<div class="col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        <?php display_message(); ?>
        <?php  add_product();?>
<!--        main content-->
        <div class="col-md-8" style="margin-top: 10px;">
            <div class="form-group">
                <label for="product-title">* Product Title </label>
                <div id="name_compare_alert" style="display: inline">

                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                    <input onblur="compare_name(this.value)" type="text" name="product_title" value=""  class="form-control"  placeholder="X600" id="product_title" required>
                    <!--                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>-->
                </div>
            </div>

            <div class="form-group">
                <label for="product-title">* Product Short Description</label>
                <textarea name="product_short_description" id="" cols="30" rows="3" class="form-control" placeholder="this product for professional uses"   required data-validation-required-message="Please enter product short description"></textarea>
            </div>


            <div class="form-group row">
                <div class="col-md-4">
                    <label for="product-title">* Sale Price</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="number" name="product_price"  value="00" class="form-control" size="60" placeholder="00"   required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="product-title">* Discount Price</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="number" name="product_disc_price"  value="00" class="form-control" size="60" placeholder="00"   required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="product-title">* Sale Type</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i></span>
                        <select  name="sale_type"   class="form-control"  required>
                            <option value="Online Cart">Online Cart </option>
                            <option value="WhatsApp"> WhatsApp </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-4">
                    <label for="product-title">* Recommend</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i></span>
                        <select  name="recommend"   class="form-control"  required>
                            <option value="Top"> Top </option>
                            <option value="Low"> Low </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="product-title">* Condition</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                        <select  name="condition"   class="form-control"  required>
                            <option value="New"> New </option>
                            <option value="Used"> Used </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="product-title">* Charges On Delivery</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="number" name="cash_on_delivery" class="form-control" value="00" placeholder="Cash on Delivery">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="product-description">* Product Long Description</label>
                <span class="label label-danger"> Heading = Value | Heading = Value </span>
                <textarea name="product_description" id="" cols="30" rows="9" class="form-control" placeholder="Heading = Value | Heading = Value "   required data-validation-required-message="Please enter product description"></textarea>
            </div>

        </div>

        <!-- SIDEBAR-->
        <div id="admin_sidebar" class="col-md-4">
            <div class="form-group">
                <button type="submit" name="draft" class="btn btn-warning btn-lg" ><span class="fa fa-eye-slash"></span> Draft</button>
                <button type="submit" name="publish" class="btn btn-primary btn-lg" ><span class="fa fa-eye"></span> Publish</button>
            </div>
            <!-- Product Categories-->
            <div class="form-group">
                <label>* Categories</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
<!--                    <select name="product_category" id="product_category" class="form-control"  required onchange="fill_sub_categories(this.value)">-->
                    <select name="product_category" id="product_category" class="form-control"  required >
                        <option value="">Select Category</option>
                        <?php get_categories_at_add_product(); ?>
                    </select>
                </div>
            </div>


            <!-- Product sub Categories-->

            <div class="form-group">
                <label>* Sub Categories</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-object-ungroup"></i></span>
                    <select name="product_sub_category" id="product_sub_category" class="form-control" >
                        <option value="">Select Sub Category</option>
                        <?php get_sub_categories_at_add_product(); ?>

                    </select>
                </div>
            </div>
            <!-- Product Brands-->

            <div class="form-group">
                <label>* Brands</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
                    <select name="product_brand" id="" class="form-control"   required data-validation-required-message="Please select Brand name">
                        <option value="">Select Brand</option>
                        <?php get_brands_at_add_product(); ?>
                    </select>
                </div>
            </div>
            <!-- store-->



            <div class="form-group">
                <label>* Image</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-image"></i></span>
                    <input type="file" name="file" class="form-control" id="">
                </div> &nbsp;
                <span class="label label-warning"> Max size 1 MB</span>
                &nbsp;
                <span class="label label-info"> .gif - .jpg - .jpeg - .png </span>

            </div>


        </div><!--SIDEBAR-->


    </form>

</div>
<script>
    var arr_product_names = [];

    function get_product_names() {

        var url = "services/get_product_names.php";

        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            async: false,
            success: function fillList(response) {


                if (response != 0) {
                    for (var j = 0; j < response.length; j++) {
                        arr_product_names.push(response[j].product_title);
                    }

                }

            },
            error: function (error) {
                // alert(error);
            }


        });
    }


    function compare_name(value){
        var i;
        for (i = 0 ; i < arr_product_names.length; i++ ) {

            if (arr_product_names[i] == value) {
                alert('Alert! Product with this name is already available');
                return;
            }
        }


    }

    // var store_total = 0;
    // function calculate_quantity() {
    //     alert("hi");
    //     var godam_total = document.getElementById('product_quantity_by_vendor');
    //     alert(godam_total.value);
    //     var store_quantity = document.getElementsByClassName('quantity');
    //     alert(store_quantity.length);
    //     var i;
    //
    //     // for (i = 0 ; i<store_quantity.length ; i++) {
    //     //     store_total = (store_total + parseInt(store_quantity.value);
    //     //     alert(store_total);
    //     // }
    //     // if(store_total > parseInt(godam_total.value)){
    //     //     alert('Sub store quantity increases then Main Store');
    //     //     return;
    //     // }
    // }


    document.addEventListener('DOMContentLoaded', function() {
        get_product_names();


    }, false);



</script>