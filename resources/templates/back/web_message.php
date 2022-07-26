<div class="row">
    <h4 class="breadcrumb"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a> /  Web Messages </h4>
</div>

<?php display_message(); ?>


<div class="col-md-12">
    <table class="table table-striped table-responsive table-hover">
        <thead>
        <tr class="btn-primary">
            <th>Web User</th>
            <th>Email</th>
            <th>Subject </th>
            <th>Message </th>
            <th>Date</th>
            <th> </th>

        </tr>
        </thead>
        <tbody>
             <?php web_messages(); ?>
        </tbody>
    </table>
</div>



