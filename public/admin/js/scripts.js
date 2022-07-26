//////////////////////////////////////////////////////////////////////////////////////////////////////
// index.php?add_product





function active_quantity(id) {
    if ($('#store_id_' + id).is(':checked')) {
        $('#Product_quantity_' + id).prop('disabled', false);
    } else {
        $('#Product_quantity_' + id).val(0);
        $('#Product_quantity_' + id).prop('disabled', true);
    }
}


// function update_quantity() {
//     var quantity = $('#product_quantity_by_vendor').val();
//     var amount = $('#product_purchase_price').val();
//     var sum = parseInt(quantity) * parseFloat(amount);
//     $('#amount_paid_to_vendor').val(sum);
// }

// function fill_sub_categories(value) {
//     $('#product_sub_category').empty().append('<option value="0" selected="selected">Select Sub Category</option>');
//     var url = "services/service_fill_sub_category.php?category_id=" + value;
//
//     $.ajax({
//         url: url,
//         type: "GET",
//         dataType: 'json',
//         async: false,
//         success: function fillList(response) {
//
//             if (response != 0) {
//                 for (var j = 0; j < response.length; j++) {
//                     $('#product_sub_category').append('<option value="' + response[j].sub_category_id + '" style="height: 20px;" >' + response[j].sub_category_name + '</option>');
//                 }
//
//             }
//
//         },
//         error: function (error) {
//             console.log(error);
//         }
//
//
//     });
//
// }

//////////////////////////////////////////////////////////////////////////////////////////////////////
// index.php?invoice


// index.php?start_invoice
function update_remain_total() {
    var total_sub_id = $('#total_sub_id').val();
    var received_amount_id = $('#received_amount_id').val();
    $('#renain_amount_id').val(total_sub_id - received_amount_id);

}


function fill_product_name_id(value) {


    $('#product_name_invoice').empty().append('<option value="%" selected="selected">Product Name</option>');
    $('#product_Id_invoice').empty().append('<option value="%" selected="selected">Product ID</option>');
    var url = "services/fill_product_name_id.php?store_id=" + value;
// alert(url);
// return;
    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        async: false,
        success: function fillList(response) {
            if (response != 0) {
                for (var j = 0; j < response.length; j++) {

                    $('#product_name_invoice').append('<option value="' + response[j].product_title + '" style="height: 20px;" >' + response[j].product_title + '</option>');
                    $('#product_Id_invoice').append('<option value="' + response[j].product_id + '" style="height: 20px;" >' + response[j].product_id + '</option>');
                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#product_name_invoice').selectpicker('refresh');
    $('#product_Id_invoice').selectpicker('refresh');

}


function refershInvoice_dropdown_name() {

    $("#product_Id_invoice").prop("selectedIndex", 0);
    $('#product_Id_invoice').selectpicker('refresh');
    $('#add_product_invoice').prop('disabled', false);
}

function refershInvoice_dropdown_id() {

    $("#product_name_invoice").prop("selectedIndex", 0);
    $('#product_name_invoice').selectpicker('refresh');
    $('#add_product_invoice').prop('disabled', false);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// index.php?orders_detail

function check_product_avaliablity(element) {

    var assignment_avaliable = true;
    var assignment_not_avaliable = true;
    $('#alert_assignment_id').hide();

    var store_id = element.options[element.selectedIndex].value;
    var store_name = element.options[element.selectedIndex].text;
    // alert(store_id);
    // alert(store_name);
    var products_ids = document.getElementsByName('products_id');
    var products_names = document.getElementsByName('products_names');
    var products_quantity = document.getElementsByName('products_quantity');

    document.getElementById("add_products_availability").innerHTML='';
    var i ;
    for(i = 0; i<products_ids.length; i++) {
        // alert(products_ids[i].value);
        // alert(products_names[i].value);
        var url = "services/check_product_avaliablity.php?store_id=" + store_id + "&product_id=" + products_ids[i].value;


        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            async: false,
            success: function fillList(response) {

                if (response != 'error' && parseInt(response[0].product_quantity) >= 1) {

                    var tr = document.createElement("tr");
                    var td  = document.createElement("td");
                    var td2  = document.createElement("td");
                    var td3  = document.createElement("td");



                    td2.appendChild(document.createTextNode(response[0].product_name));
                    tr.appendChild(td2);

                    td.appendChild(document.createTextNode(products_quantity[i].value));
                    tr.appendChild(td);

                    td3.appendChild(document.createTextNode(response[0].product_quantity));
                    tr.appendChild(td3);

                    var att = document.createAttribute("class");       // Create a "class" attribute
                    att.value = "btn-success";                           // Set the value of the class attribute
                    tr.setAttributeNode(att);

                    document.getElementById("add_products_availability").appendChild(tr);
                    assignment_avaliable = false;


                }else {
                    var tr = document.createElement("tr");
                    var td  = document.createElement("td");
                    var td2  = document.createElement("td");
                    var td3  = document.createElement("td");



                    td2.appendChild(document.createTextNode(products_names[i].value));
                    tr.appendChild(td2);

                    td.appendChild(document.createTextNode(products_quantity[i].value));
                    tr.appendChild(td);

                    td3.appendChild(document.createTextNode('Not Available'));
                    tr.appendChild(td3);

                    var att = document.createAttribute("class");       // Create a "class" attribute
                    att.value = "btn-danger";                           // Set the value of the class attribute
                    tr.setAttributeNode(att);
                    document.getElementById("add_products_availability").appendChild(tr);

                    assignment_not_avaliable = false;
                }

            },
            error: function (error) {
                console.log(error);
            }
        });


    }
    if(assignment_not_avaliable == true){
        $('#btn_assign_store_id').prop("disabled",assignment_avaliable);
    }else {
        $('#btn_assign_store_id').prop("disabled",true);
        $('#alert_assignment_id').show();
    }


}


// vendor_invoice



$('#submit_send_store').bind("click",function(e){
    var validate = true;
    var remain_product = parseInt($('#remain_product_in_main_store_id').val());
    var assign_product = parseInt($('#product_quantity_id').val());


    if(assign_product >remain_product){
        validate = false;
    }else {
        validate = true;
    }


    if(validate == false){
        e.preventDefault();
        var alert_message = "<div class='alert alert-danger' col-md-12'>\n" +
            "                            <button type='button' class='close' data-dismiss='alert'>&times;</button>\n" +
            "                            <strong>Alert !</strong> Assigning product count is bigger than available quantity in main store\n" +
            "                        </div>";

        $('#display_msg').html(alert_message);
    }else {
        $('#display_msg').html('');
    }


});


$('#submit_return_products').bind("click",function(e){
    var validate = true;
    var remain_product = parseInt($('#remain_product_in_country_store_id').val());
    var assign_product = parseInt($('#product_quantity_return_id').val());


    if(assign_product >remain_product){
        validate = false;
    }else {
        validate = true;
    }


    if(validate == false){
        e.preventDefault();
        var alert_message = "<div class='alert alert-danger' col-md-12'>\n" +
            "                            <button type='button' class='close' data-dismiss='alert'>&times;</button>\n" +
            "                            <strong>Alert !</strong> Assigning product count is bigger than available quantity in main Country Store\n" +
            "                        </div>";

        $('#display_msg').html(alert_message);
    }else {
        $('#display_msg').html('');
    }


});


//////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Sale Returns///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////



function fill_customer_name_sale_return(value) {


    $('#customer_id').empty().append('<option value="%" selected="selected">Customer Name</option>');
    var url = "services/fill_product_name_id_sale_return.php?store_id=" + value;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        async: false,
        success: function fillList(response) {
            if (response != 0) {
                for (var j = 0; j < response.length; j++) {

                    $('#customer_id').append('<option value="' + response[j].customer_id + '" style="height: 20px;" >' + response[j].customer + '</option>');

                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#customer_id').selectpicker('refresh');

}

function fill_invoice_sale_return() {
   var store_id =  $('#store_name').val();
   var customer_id =  $('#customer_id').val();

    $('#invoice_no').empty().append('<option value="%" selected="selected">Invoice No</option>');
    var url = "services/fill_invoice_sale_return.php?store_id=" + store_id + "&customer_id="+customer_id;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        async: false,
        success: function fillList(response) {
            if (response != 0) {
                for (var j = 0; j < response.length; j++) {

                    $('#invoice_no').append('<option value="' + response[j].invoice_no + '" style="height: 20px;" >' + response[j].invoice_no + '</option>');

                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#invoice_no').selectpicker('refresh');

}



function fill_product_name_sale_return() {
   var store_id =  $('#store_name').val();
   var invoice_no =  $('#invoice_no').val();

    $('#product_id').empty().append('<option value="%" selected="selected">Product Title</option>');
    var url = "services/fill_product_name_sale_return.php?store_id=" + store_id + "&invoice_no="+invoice_no;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        async: false,
        success: function fillList(response) {
            if (response != 0) {
                for (var j = 0; j < response.length; j++) {

                    $('#product_id').append('<option value="' + response[j].product_id + '" style="height: 20px;" >' + response[j].product_title + '</option>');
                    
                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#product_id').selectpicker('refresh');

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////Purchase Return//////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function fill_invoice_no_vendor() {
    var vendor_id =  $('#vendor_id').val();

    $('#invoice_no').empty().append('<option value="%" selected="selected">Invoice No</option>');
    var url = "services/fill_invoice_no_vendor.php?vendor_id=" + vendor_id;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        async: false,
        success: function fillList(response) {
            if (response != 0) {
                for (var j = 0; j < response.length; j++) {

                    $('#invoice_no').append('<option value="' + response[j].invoice_no + '" style="height: 20px;" >' + response[j].invoice_no + '</option>');

                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#invoice_no').selectpicker('refresh');

}

function fill_product_title_purchase_return(){
    var vendor_id =  $('#vendor_id').val();
    var invoice_no =  $('#invoice_no').val();

    $('#product_id').empty().append('<option value="%" selected="selected">Product Title</option>');
    var url = "services/fill_product_title_purchase_return.php?vendor_id=" + vendor_id+"&invoice_no="+invoice_no;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        async: false,
        success: function fillList(response) {
            if (response != 0) {
                for (var j = 0; j < response.length; j++) {

                    $('#product_id').append('<option value="' + response[j].product_id + '" style="height: 20px;" >' + response[j].product_title + '</option>');

                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#product_id').selectpicker('refresh');

}









