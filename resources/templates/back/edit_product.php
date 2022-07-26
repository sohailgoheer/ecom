<div class="row">
    <h4 class="breadcrumb"><a href="index.php">Home</a> / <a href="index.php?products"> Products </a> / Edit Product    </h4>
</div>
<?php $data = display_in_edit_product(); ?>







<div class="col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        <?php edit_product();?>
        <div class="col-md-8" style="margin-top: 10px;">
            <div class="form-group">
                <label for="product-title">* Product Name </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                    <input  type="text" name="product_title" value="<?php echo $data[0]; ?>" class="form-control"  placeholder="Product Title *" id="name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="product_short_description">* Short Description</label>
                <textarea name="product_short_description"  id="" cols="30" rows="3" class="form-control" placeholder="Short Introduction *"   required  ><?php echo $data[1]; ?></textarea>
            </div>


            <div class="form-group row">
                <div class="col-md-4">
                    <label for="product_price">* Sale Price</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="number" name="product_price" value="<?php echo $data[3]; ?>" class="form-control" size="60" placeholder="00 *"   required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="product_disc_price">Discount Price</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="number" name="product_disc_price"  value="<?php echo $data[4]; ?>" class="form-control" size="60" placeholder="00 *">
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="product-title">* Sale Type</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i></span>
                        <select  name="sale_type"   class="form-control"  required>
                            <option value="<?php echo $data[22]; ?>"> <?php echo $data[22]; ?> </option>
                            <option value="Online Cart">Online Cart </option>
                            <option value="WhatsApp"> WhatsApp </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <label for="recommend">* Recommend </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i></span>
                        <select  name="recommend"   class="form-control"  required>
                            <option value="<?php echo $data[18]; ?>"> <?php echo $data[18]; ?> </option>
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
                            <option value="<?php echo $data[21]; ?>"> <?php echo $data[21]; ?> </option>
                            <option value="New"> New </option>
                            <option value="Used"> Used </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="cash_on_delivery">* Charges On Delivery </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="number" name="cash_on_delivery" class="form-control" placeholder="Cash on Delivery" id=""  value="<?php echo $data[19]; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="product-description">Long Description</label>
                <span class="label label-danger"> Heading = Value | Heading = Value </span>
                <textarea name="product_description" id="" cols="30" rows="9" class="form-control" placeholder="Heading = Value | Heading = Value "><?php echo $data[2]; ?></textarea>
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
                <label for="product_category">* Categories</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
                    <select name="product_category" id="product_category" class="form-control"  required  >
<!--                    <select name="product_category" id="product_category" class="form-control"  required onchange="fill_sub_categories(this.value)">-->
                        <option value="<?php echo $data[13]; ?>"><?php echo $data[12]; ?></option>
                        <?php get_categories_at_add_product(); ?>
                    </select>
                </div>
            </div>


            <!-- Product sub Categories-->

            <div class="form-group">
                <label for="product_sub_category">Sub Categories</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-object-ungroup"></i></span>
                    <select name="product_sub_category" id="product_sub_category" class="form-control" >
                        <option value="<?php echo $data[15]; ?>"><?php echo $data[14]; ?></option>
                        <?php get_sub_categories_at_add_product(); ?>

                    </select>
                </div>
            </div>
            <!-- Product Brands-->

            <div class="form-group">
                <label for="product_brand">* Brands</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
                    <select name="product_brand" id="" class="form-control"   required data-validation-required-message="Please select Brand name">
                        <option value="<?php echo $data[17]; ?>"><?php echo $data[16]; ?></option>
                        <?php get_brands_at_add_product(); ?>
                    </select>
                </div>
            </div>
            <!-- store-->

            <div class="form-group">
                <label for="file">* Image </label>
                <div class="input-group  ">
                    <span class="input-group-addon"><i class="fa fa-image"></i></span>
                    <input type="file" name="file" class="form-control" id=""  >
                </div> &nbsp;
                <span class="label label-warning"> Max size 1 MB</span>
                &nbsp;
                <span class="label label-info"> .gif - .jpg - .jpeg - .png </span>

            </div>


            <div class="form-group">

                <img  src="../../resources/<?php echo $data[20]; ?>" class="img-responsive img-thumbnail col-md-12"/ >

            </div>



        </div><!--SIDEBAR-->


    </form>

</div>
