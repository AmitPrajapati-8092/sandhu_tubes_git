<style>
  .card .card-header {
    padding: 1px 20px;
    border: none;
  }

  .col-sm-12 {
    padding-left: 0px !important;
    padding-right: 8px !important;
  }

  @media screen and (max-width: 1366px) {
    .inp {
      width: 52% !important;
    }

    .inp2 {
      width: 59% !important;
    }

    .frs {
      width: 172px !important;
    }

    label {
      font-weight: 500;
      padding-right: 0px !important;
      font-family: "Roboto", sans-serif;
    }
  }
</style>
<style type="text/css">
  .custom-control {
    position: relative;
    display: block;
    min-height: 1.5rem;
    padding-left: 0.1rem;
  }

  .f-padding {
    margin-bottom: 10px;
  }

  .justify-content-center {

    -ms-flex-pack: center !important;

    justify-content: inherit !important;

  }

  .wizard,
  .tabcontrol {
    display: block;
    width: 100%;
    height: auto !important;
    overflow: scroll;
  }

  .wizard>.steps>ul>li {
    width: 16%;
  }

  @media screen and (max-width: 1366px) {
    .wizard>.steps>ul>li {
      width: 16% !important;
      font-size: 11px !important;
    }
  }

  .wizard>.content {
    background: #ffffff;
    min-height: 500px !important;
    padding: 20px;
  }

  .side {
    margin-left: 8px;
  }
</style>
<div class="content-page">
  <div class="content">
    <!-- Start content -->
    <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row" id="dashboard-row">
        <div class="col-sm-12">
          <h4 class="pull-left page-title" style="color: #000;font-weight:200;">&nbsp;<i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Service Actions&nbsp;&nbsp;/ &nbsp; <a href="{{URL::to('serviceManu/list')}}">Back</a></h4>
          <ol class="breadcrumb pull-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Input/Output</a></li>
            <li class="active">Process</li>
          </ol>
        </div>
      </div>
      <hr class="new2">

      <div class="row" id="default-form">
        <div class="col-lg-12">
          <!-- <div class="portlet-widgets text-right">
            <button type="button" id="regFormchange" data-id="2" onclick="wizardForm(this)" class="btn btn-inverse btn-rounded waves-effect waves-light m-b-5">Registration With Form Wizard</button>
          </div> -->
          <div class="card" style="border-left: 3px solid #386900;box-shadow: 4px 4px #b1b1b1;">
            <div class="card-header" style="background: linear-gradient(to left, #dbf2fd, #ffffff 50%, #ffffff, #ffffff 75%);">
              <form action="{{ URL::to('serviceManu/create')}}" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card-body">
                  <h4 style="text-align: center;"><span id="msg" style="color: #F0560A;"></span></h4>
                  <p style="font-size: 17px; font-weight: 700;">Input</p>
                  <input type="hidden" name="service_details_id" value="{{@$service_details->id}}">
                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-1" class="control-label">Item Type*</label>
                          <select class="form-control" name="item_type_id" required="" aria-required="true">
                            <option value="">--Select--</option>
                            @foreach($categorys as $key => $value)
                            <option value="{{$value->id}}" @if(@$service_details->item_type_id==$value->id) {{"selected"}} @endif>{{$value->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-1" class="control-label">Service Type*</label>
                          <select class="form-control" name="service_type_id" required="" aria-required="true">
                            <option value="">--Select--</option>
                            @foreach($service_type as $key=> $value)
                            <option value="{{$value->id}}" @if(@$service_details->service_type_id==$value->id) {{"selected"}} @endif>{{$value->service_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-1" class="control-label">Item Name*</label>
                          <select class="form-control" name="item_name_id" required="" onchange="get_item_details(this)" aria-required="true">
                            <option value="">--Select--</option>
                            @foreach($items as $key => $value)
                            <option value="{{$value->id}}" @if(@$service_details->inv_item_id==$value->id) {{"selected"}} @endif>{{$value->items_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3" id="hidden_section_serial" style="display: none;">
                        <label for="field-3" class="control-label">Serial No.</label>
                        <input type="text" class="form-control" id="Serial_no" placeholder="" required="" aria-required="true">
                      </div>
                      <div class="col-md-3" id="hidden_section_batch" style="display: none;">
                        <label for="field-3" class="control-label">Batch No.</label>
                        <input type="text" class="form-control" id="batch_no" placeholder="" required="" aria-required="true">
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">Quantity*</label>
                          <input type="text" class="form-control" name="input_items_quantity" onblur="clc_per();" id="input_items_quantity" min="1" value="@if(@$service_details->input_quantity){{$service_details->input_quantity}}@endif" placeholder="" required="" aria-required="true">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">UoM*</label>
                          <label for="field-1" class="control-label"></label>
                          <select class="form-control" name="input_items_uom" required="" aria-required="true">
                            <option value=""></option>
                            @foreach($uom as $key=> $value)
                            <option value="{{$value['id']}}" @if(@$service_details->input_uom_id==$value['id']) {{"selected"}} @endif>{{$value['uom_name']}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">Q/A</label>
                          <select class="form-control" name="qa_check" id="qa_check">
                            @if(@$service_details->qa == "0")
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            @else
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <p style="font-size: 17px; font-weight: 700;">Output</p>

                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-1" class="control-label">Finished Goods*</label>
                        <select class="form-control" name="finished_goods_name" id="finished_goods_name" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($items as $key => $value)
                            <option value="{{$value->id}}" @if(@$service_details->finished_good_id==$value->id) {{"selected"}} @endif>{{$value->items_name}}</option>
                          @endforeach
                          <!-- <input type="text" class="form-control" name="finished_goods_name" id="finished_goods_name" value="@if(@$service_details->finished_goods_name) {{$service_details->finished_goods_name}} @endif"  placeholder="" required="" aria-required="true"> -->
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity*</label>
                        <input type="text" class="form-control" name="finished_goods_quantity" onblur="clc_scrap();" id="finished_goods_quantity" min="1" value="@if(@$service_details->finished_good_quantity){{$service_details->finished_good_quantity}}@endif" placeholder="" required="" aria-required="true">
                      </div>
                      <span id="finished_goods_quantity_error" style="color: #F83008;display:none">Finished Goods Quantity</span>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">UoM*</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="finished_goods_uom" id="finished_goods_uom" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}" @if(@$service_details->finished_good_uom==$value['id']) {{"selected"}} @endif>{{$value['uom_name']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-1" class="control-label">Metal Scrap*</label>
                        <select class="form-control" name="metal_scrap_name" id="metal_scrap_name" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($items as $key => $value)
                            <option value="{{$value->id}}" @if(@$service_details->scrap==$value->id) {{"selected"}} @endif>{{$value->items_name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity*</label>
                        <input type="text" class="form-control" name="metal_scrap_quantity" id="metal_scrap_quantity" min="1" value="@if(@$service_details->scrap_quantity){{$service_details->scrap_quantity}}@endif" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">UoM*</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="metal_scrap_uom" id="metal_scrap_uom" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}" @if(@$service_details->scrap_uom==$value['id']) {{"selected"}} @endif>{{$value['uom_name']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-1" class="control-label">Invisible Loss*</label>
                        <select class="form-control" name="invisible_loss_name" id="invisible_loss_name" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($items as $key => $value)
                            <option value="{{$value->id}}" @if(@$service_details->invisible_loss==$value->id) {{"selected"}} @endif>{{$value->items_name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity*</label>
                        <input type="text" class="form-control" name="invisible_loss_quantity" id="invisible_loss_quantity" min="0" value="@if(@$service_details->invisible_quantity){{$service_details->invisible_quantity}}@endif" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">UoM*</label>
                        <select class="form-control" name="invisible_loss_uom" id="invisible_loss_uom" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}" @if(@$service_details->invisible_uom==$value['id']) {{"selected"}} @endif>{{$value['uom_name']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                  </div>

                  <div class="total-mn">
                    <div class="row">
                      <div class="col-md-6">
                        <p>Total Quantity </p>
                      </div>
                      <div class="col-md-6">
                        <p id="final_quantity">@if(@$service_details->input_quantity) {{$service_details->input_quantity}} @endif </p>
                      </div>
                    </div>
                  </div>
                  <br>
                  <input type="submit" class="btn btn-primary" name="submit" onclick="return check_quantity()" value="Create">
                  <hr>
                </div> <!-- card -->
            </div> <!-- container -->
          </div> <!-- content -->
          </form>
        </div>
      </div>
      <!--  Wizard Form -->

      <script>
        function check_quantity() {
          var input_items_quantity = $("#input_items_quantity").val();
          var finished_goods_quantity = $("#finished_goods_quantity").val();
          var metal_scrap_quantity = $("#metal_scrap_quantity").val();
          var int_input_quantity = input_items_quantity.replace(/\s/g, '');
          var output_quantity = parseFloat(finished_goods_quantity.replace(/\s/g, '')) + parseFloat(metal_scrap_quantity.replace(/\s/g, ''));
          var diff = 0;
          var final_quantity = 0;
          if (int_input_quantity > output_quantity) {
            diff = int_input_quantity - output_quantity;
            final_quantity = output_quantity + diff;
            $("#final_quantity").html(final_quantity);
            // $("#invisible_loss_quantity").val(diff);
            return true;
          }
          else {
            $("#final_quantity").html(final_quantity);
            // $("#invisible_loss_quantity").val(diff);
            alert("Your Output Quantity is Greater Than Input Quantity");
            return false;
          }
        }
      </script>
      <script>
        function clc_scrap() {
          var input_items_quantity = $("#input_items_quantity").val();
          var finished_goods_quantity = $("#finished_goods_quantity").val();
          // var metal_scrap_quantity = $("#metal_scrap_quantity").val();
          var int_finished_goods_quantity = finished_goods_quantity.replace(/\s/g, '');
          var int_input_quantity = input_items_quantity.replace(/\s/g, '');
          var invisible_loss_quantity = $("#invisible_loss_quantity").val();
          var int_invisible_loss_quantity = parseFloat(invisible_loss_quantity.replace(/\s/g, ''));

          var scrap_item = parseFloat(input_items_quantity.replace(/\s/g, '')) - parseFloat(finished_goods_quantity.replace(/\s/g, '')) - int_invisible_loss_quantity;
          // var output_quantity = parseFloat(finished_goods_quantity.replace(/\s/g, '')) + parseFloat(metal_scrap_quantity.replace(/\s/g, ''));
          var diff = 0;
          var final_quantity = 0;
          if (parseFloat(int_input_quantity) > parseFloat(int_finished_goods_quantity)) {
            $("#metal_scrap_quantity").val(scrap_item);
            $("#finished_goods_quantity_error").css('display', 'none');

          }
          else {
            $("#finished_goods_quantity_error").css('display', 'block');
            $("#metal_scrap_quantity").val(0);
          }
        }
      </script>
      <script>
        function clc_per() {
          var input_items_quantity = $("#input_items_quantity").val();
          var int_input_items_quantity = input_items_quantity.replace(/\s/g, '');
          var invisible_los = (int_input_items_quantity / 300).toFixed(2);
          $("#invisible_loss_quantity").val(invisible_los);
        }
      </script>
      <script>
        function get_item_details(e) {
          var item_id = $(e).val();
          $.ajax({
            url: "{{url('Manufacturing/get_item_details/')}}" + '/' + item_id,
            type: "GET",
            success: function (data) {
              console.log(data);
              if (data.serial_no != null) {
                $("#hidden_section_serial").css('display', 'block');
                $("#Serial_no").val(data.serial_no);
              }
              else {
                $("#hidden_section_serial").css('display', 'none');
                $("#Serial_no").val("");
              }
              if (data.batch_no != null) {
                $("#hidden_section_batch").css('display', 'block');
                $("#batch_no").val(data.batch_no);
              }
              else {
                $("#hidden_section_batch").css('display', 'none');
                $("#batch_no").val("");
              }
            }
          });

        }
      </script>