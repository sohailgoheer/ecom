<?php require_once ('../resources/config.php'); ?>
    <!--header-->
<?php include(TEMPLATE_FRONT.DS."header.php")?>

    <div class="container">

<?php $data = get_shop_detail(); ?>

            <div class="row">

                    <div class="col-lg-12"><?php display_message(); ?></div>


            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" method="post">
                        <?php send_message(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Your Subject *" id="phone" required data-validation-required-message="Please enter your Subject.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="6"  placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="submit" class="btn btn-xl btn-primary"><span class="fa fa-envelope-o"></span> Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <br>
            <div class="well col-md-12">
                <p>
                    <?php if(isset($data[5])) echo $data[5]; ?>
                </p>
                <p>
                    <strong>Email: </strong><?php if(isset($data[0])) echo $data[0]; ?>
                    <strong>, Cell No: </strong><?php if(isset($data[1])) echo $data[1]; ?>
                    <strong>, WhatsApp No: </strong><?php if(isset($data[2])) echo $data[2]; ?>
                </p>
                <p>
                    <strong> Postal Address  : </strong><?php if(isset($data[3])) echo $data[3]; ?>

                </p>


            </div>


    </div>
    <!-- /.container -->
    <!--footer-->

<?php include(TEMPLATE_FRONT.DS."footer.php")?>