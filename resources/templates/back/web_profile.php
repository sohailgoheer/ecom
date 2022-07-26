<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Web Profile    </h4>
</div>


<?php

$data = web_profile();


?>

<div class="col-md-12">
    <?php display_message(); ?>
</div>

<form action="" method="post">
    <?php update_web_profile(); ?>
    <div class="col-md-12">
        <div class="form-group col-md-6">
            <label for="message">Shop Name</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                <input type="text" name="shop_name" value="<?php if(isset($data[0])) echo $data[0]; ?>" class="form-control" placeholder="GeoSoftic" required>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">Slogan</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
                <input type="text" name="slogan" value="<?php if(isset($data[1])) echo $data[1]; ?>" class="form-control" placeholder="Hello Customer" required>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">Email</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="email" value="<?php if(isset($data[2])) echo $data[2]; ?>" class="form-control" placeholder="abc@gmail.com" required>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">Cell No.</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                <input type="text" name="contact_no" value="<?php if(isset($data[3])) echo $data[3]; ?>" class="form-control" placeholder="+923331234567" required>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">WhatsApp No.</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-whatsapp"></i></span>
                <input type="text" name="whatsapp" value="<?php if(isset($data[4])) echo $data[4]; ?>" class="form-control" placeholder="+92421234567" required>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">Address</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <input type="text" name="address" value="<?php if(isset($data[5])) echo $data[5]; ?>" class="form-control" placeholder="Address  " required>
            </div>
        </div>




        <div class="form-group col-md-6">
            <label for="message">Facebook Page Link</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                <input type="text" name="fb" value="<?php if(isset($data[6])) echo $data[6]; ?>" class="form-control" placeholder="https://www.facebook.com/page_name"  >
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">Youtube Page Link</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                <input type="text" name="youtube" value="<?php if(isset($data[8])) echo $data[8]; ?>" class="form-control" placeholder="https://www.youtube.com/channel/channel_name"  >
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="message">Tweeter Account</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                <input type="text" name="tweeter" value="<?php if(isset($data[7])) echo $data[7]; ?>" class="form-control" placeholder="https://twitter.com/shop_profile" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="message">instagram</label>
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                <input type="text" name="instagram" value="<?php if(isset($data[9])) echo $data[9]; ?>" class="form-control" placeholder="https://www.instagram.com/shop_account" required>
            </div>
        </div>




        <div class="form-group col-md-12">
            <label for="message">Message For Public</label>
            <textarea name="message" id="" cols="30" rows="6" class="form-control" ><?php if(isset($data[10])) echo $data[10]; ?></textarea>
        </div>
        <div class="btn-group col-md-12">
            <a class="btn btn-warning" href="index.php"><span class="fa fa-backward"></span> Back</a>
            <button type="submit" name="add_web_profile" class="btn btn-success" ><span class="fa fa-save"></span> Update </button>
        </div>


    </div>


</form>






