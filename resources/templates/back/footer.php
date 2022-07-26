</div>
<!-- /#wrapper -->

<!-- jQuery -->
<!--<script src="js/jquery.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!--start datatables-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>


    $(document).ready(function() {
        var t = $('#table_id').DataTable( {
            responsive: true
            // "iDisplayLength": 7

        } );
    } );

</script>
<!--end datatables-->


<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<script src="../../resources/apis/select_search/select.js"></script>
<script src="js/scripts.js"></script>
<script src="js/confirmation.js"></script>

<script>
    console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
    console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        container: 'body'
    });
    $('[data-toggle=confirmation-singleton]').confirmation({
        rootSelector: '[data-toggle=confirmation-singleton]',
        container: 'body'
    });
    $('[data-toggle=confirmation-popout]').confirmation({
        rootSelector: '[data-toggle=confirmation-popout]',
        container: 'body'
    });

    $('#confirmation-delegate').confirmation({
        selector: 'button'
    });



</script>
</body>

</html>
