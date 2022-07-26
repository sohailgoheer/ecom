<div class="row">
    <h4 class="breadcrumb"><a href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a> /  Users   </h4>
</div>
<?php display_message(); ?>

<div class="col-md-12">
    <a href="index.php?add_user" class="btn btn-success pull-right" style="margin-right: 80px;margin-bottom: 20px;"><span class="fa fa-user-plus"></span> Add User</a>
</div>

<div class="col-lg-12">
        <table class="table  table-responsive table-striped">
            <thead>
            <tr class="btn-primary">
                <th>ID.</th>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Email</th>
                <th>Stores</th>
                <th> </th>

            </tr>
            </thead>
            <tbody>
                <?php display_users_in_admin(); ?>

            </tbody>
        </table> <!--End of Table-->





</div>
    








