<style>
    .card .card-header {
        padding: 1px 20px;
        border: none;
    }

    .form-control {
        -moz-border-radius: 2px;
        -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        -webkit-border-radius: 2px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        border-radius: 2px;
        border: 1px solid #b3b1b1;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: rgba(0, 0, 0, 0.6);
        font-size: 14px;
        box-shadow: 0px 0px #ffffff;
        width: 100%;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start content -->
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row" id="dashboard-row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title" style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Add Shipment Out&nbsp;&nbsp;/ &nbsp;
                        <a href="{{URL::to('shipment/listing')}}">Back</a></h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ URL::to('home') }}">Home</a></li>
                            <li><a href="{{URL::to('home')}}">List</a></li>
                            <li class="active">Add Shipment Out</li>
                        </ol>
                </div>
            </div>
            <hr class="new2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-border card-info">
                        <div class="card-header" style="background-image: linear-gradient(#e9f8ff, white);">
                            <form action="{{url('shipment/addStore')}}" method="post" id="FormValidation" required="" aria-required="true" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Supplier Name *</label>
                                                <input type="text" class="form-control" name="supplier_name" id="supplier_name" placeholder="Supplier Name" required aria-required="true">
                                            </div>
                                        </div>
                                        <input type="hidden" name="shipment_type" value="0">
                                        <!-- <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Shipment Type *</label>
                                                <select class="form-control" name="shipment_type" id="shipment_type" required="" aria-required="true">
                                                    <option value="" selected>--Select--</option>
                                                    <option value="1">IN</option>
                                                    <option value="0">OUT</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Q/A</label>
                                                <select class="form-control" name="qa_check" id="qa_check">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Shipping Date</label>
                                                <input type="text" class="form-control datepicker" name="date" id="date" autocomplete="off">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Status *</label>
                                                <select class="form-control" name="status" id="status" required="" aria-required="true">
                                                    <option value="" selected>--Select--</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>SHIP-To LOCATION:</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Address</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="field-2" class="control-label">City</label>
                                                <select class="form-control" name="city" id="city">
                                                    <option value="" selected>--Select--</option>
                                                    @foreach($cities as $key=>$val)
                                                    <option value="{{$val->id}}">{{$val->city}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">State</label>
                                                <select class="form-control" name="state" id="state">
                                                    <option value="" selected>--Select--</option>
                                                    @foreach($state as $key=>$val)
                                                    <option value="{{$val->id}}">{{$val->state}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Pin Code</label>
                                                <input type="text" min="1" class="form-control" name="pin" id="pin" placeholder="Pin Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>VEHICLE</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Vehicle Type</label>
                                                <select class="form-control" name="vehicle_type" id="vehicle_type">
                                                    <option value="">--Select-</option>
                                                    <option value="Bus">Bus</option>
                                                    <option value="Truck">Truck</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Vehicle Make</label>
                                                <input type="text" class="form-control" name="vehicle_make" id="vehicle_make" placeholder="Vehicle Make">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Model</label>
                                                <input type="text" class="form-control" name="model" id="model" placeholder="Model">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">License No.</label>
                                                <input type="text" class="form-control" name="license_no" id="license_no" placeholder="License No.">
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Driver</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Driver Name</label>
                                                <input type="text" class="form-control" name="driver_name" id="driver_name" placeholder="Driver Name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Phone1</label>
                                                <input type="text" min="1" class="form-control" name="phone1" id="phone1" placeholder="Phone1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Phone2</label>
                                                <input type="text" min="1" class="form-control" name="phone2" id="phone2" placeholder="Phone2">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Address</label>
                                                <input type="text" class="form-control" name="driver_address" id="driver_address" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h4>ITEMS SHIPPED</h4>
                                        </div>
                                        <div class="col-md-9">
                                            <button type="button" onclick="append_data();" class="btn btn-secondary btn-sm btn-circle">Add <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="col-md-12 row" id="append_here">

                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: left; margin-bottom: 6px;">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-b-5" onclick="return datacheck()">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- card -->
    </div> <!-- container -->
</div> <!-- content -->

<script>
    var append_i = 0;
    function append_data() {
        $.ajax({
            url: "{{url('shipment/fetchItems')}}",
            data: {},
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                var to_append = `<span class="col-md-12 row">
                    <div class="col-md-2"><div class="form-group">
                        <label for="field-2" class="control-label">Item Type</label>
                        <select class="form-control" name="item_type_ids[]" id="item_type_ids" onchange="showsitemtypedata(this.value,this)">
                            <option value="" selected>--Select--</option>`
                        for (var i = 0; i < data.item_type.length; i++) {
                            to_append += `<option value=\"` + data.item_type[i].id + `\">` + data.item_type[i].category_name + `</option>`
                        }
                        to_append += `</select>
                    </div></div>
                        <div class="col-md-2"><div class="form-group">
                            <label for="field-2" class="control-label">Item Name</label>
                            <select class="form-control" name="item_ids[]" id="item_ids" onchange="showserailno(this.value,`+append_i+`,this)">
                            </select>
                        </div></div>
                        <div class="col-md-2"><div class="form-group">
                        <label for="field-2" class="control-label">GRN No.</label>
                        <input type="text" class="form-control" name="grn_no[]" id="grn_no" placeholder="GRN No.">
                        
                        </div></div>
                    <div class="col-md-2"><div class="form-group">
                        <label for="field-2" class="control-label">Invoice No.</label>
                        <input type="text" class="form-control" name="invoice_no[]" id="invoice_no" placeholder="Invoice No.">
                        
                        </div></div>
                        <div class="col-md-2"><div class="form-group">
                            <label for="field-2" class="control-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity[]" onchange="checkitemquantity(this.value,this)" id="quantity" placeholder="Quantity">
                            <span id="errorquantity" style="color:red;display:none">Dispatch Quantity Mismatch</span>
                            </div></div>
                            <div class="col-md-2"><div class="form-group">
                        <label for="field-2" class="control-label">UoM</label>
                        <select class="form-control" name="uom_ids[]" id="uom_ids">
                            <option value="" selected>--Select--</option>`
                            for (var i = 0; i < data.uomData.length; i++) {
                                to_append += `<option value=\"` + data.uomData[i].id + `\">` + data.uomData[i].uom_name + `</option>`
                            }
                            to_append += `</select>
                        
                        </div></div>
                        <div class="col-md-2"><div class="form-group">
                            <label for="field-2" class="control-label">Item Location</label>
                            <select class="form-control" name="item_location[]" id="item_location">
                                <option value="" selected>--Select--</option>`
                                for(var i = 0; i < data.inventory_location.length; i++)
                                {
                                    to_append += `<option value=\"`+ data.inventory_location[i].id+ `\">`+ data.inventory_location[i].location_name +`</option>`
                                }
                    to_append += `</select>
                        </div></div>
                        <div class="col-md-2"><div class="form-group" id="hidden_sl" style="display:none">
                            <label for="field-2" class="control-label">Serial No.</label>
                            <input type="text" class="form-control" name="serial_no[]" readonly id="serial_no" placeholder="Serial No.">
                        </div></div>
                        </span>
                        `;
                $("#append_here").append(to_append);
                append_i++;
            }
        });
    }

    function showserailno(element,append,e)
    {
        // alert(append);
        $.ajax({
            url: "{{url('shipment/fetchItemsserialno/')}}"+'/'+element,
            data: {},
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                if (data.inv_item_sl.serial_no != null) {
                     $(e).closest('span').find("#hidden_sl").css('display', 'block');
                     $(e).closest('span').find("#serial_no").val(data.inv_item_sl.serial_no);
                }
                else {
                     $(e).closest('span').find("#hidden_sl").css('display', 'none');
                }
                
            }
        });
    }
    // $('#errorquantity').hide();
    var quantity_error = true;
    function checkitemquantity(element,e) {
        var item_id = $(e).closest('span').find("#item_ids").val();

       $.ajax({
            url: "{{url('shipment/fetchItemsserialno/')}}"+'/'+item_id,
            data: {},
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                if(element > data.inv_item_sl.quantity)
                {
                    // $('#errorquantity').hide();
                    quantity_error = true;
                    $(e).closest('span').find("#errorquantity").css('display', 'block');
                }
                else
                {
                    // $('#errorquantity').show();
                    quantity_error = false;
                    $(e).closest('span').find("#errorquantity").css('display', 'none');
                }
                
            }
        });
    }
    function showsitemtypedata(element, e) {
        // alert(append);
        $.ajax({
            url: "{{url('shipment/fetchitemType/')}}" + '/' + element,
            data: {},
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                $(e).closest('span').find("#item_ids").html("");
                var to_append = `<option value="">--Select--</option>`
                for (var i = 0; i < data.inv_Type_item.length; i++) {
                     to_append += `<option value=\"` + data.inv_Type_item[i].id + `\">` + data.inv_Type_item[i].item_name + `</option>`
                    }
                $(e).closest('span').find("#item_ids").append(to_append);

            }
        });
    }
    function datacheck() {
        
        if (quantity_error==true) {
            return false;
        }
        else {
            return true;
        }
    }
</script>

<script>
    $(function () {
    $(".datepicker").datepicker();
    });
</script> 