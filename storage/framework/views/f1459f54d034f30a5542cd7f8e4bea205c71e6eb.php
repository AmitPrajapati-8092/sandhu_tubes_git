<style>
  .card .card-header {
    padding: 1px 20px;
    border: none;
  }

  .col-sm-12 {
    padding-left: 0px !important;
    padding-right: 8px !important;
  }

  @media  screen and (max-width: 1366px) {
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

  @media  screen and (max-width: 1366px) {
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
          <h4 class="pull-left page-title" style="color: #000;font-weight:200;">&nbsp;<i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Service Actions&nbsp;&nbsp;/ &nbsp; <a href="<?php echo e(URL::to('serviceManu/list')); ?>">Back</a></h4>
          <ol class="breadcrumb pull-right">
            <li><a href="<?php echo e(url('dashboard')); ?>">Home</a></li>
            <li><a href="<?php echo e(url('serviceManu/list')); ?>">Service</a></li>
            <!-- <li class="active">Process</li> -->
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
              <form action="<?php echo e(URL::to('serviceManu/create')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                  <h4 style="text-align: center;"><span id="msg" style="color: #F0560A;"></span></h4>
                  <p style="font-size: 17px; font-weight: 700;">Input</p>
                  <input type="hidden" name="service_details_id" value="<?php echo e(@$service_details->id); ?>">
                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-1" class="control-label">Item Type<span style="color: red;">*<span></label>
                          <select class="form-control" name="item_type_id" id="item_type_id" required="" aria-required="true" onchange="get_item_name()">
                            <option value="">--Select--</option>
                            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php if(@$service_details->item_type_id==$value->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-1" class="control-label">Service Type<span style="color: red;">*<span></label>
                          <select class="form-control" name="service_type_id" required="" aria-required="true">
                            <option value="">--Select--</option>
                            <?php $__currentLoopData = $service_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php if(@$service_details->service_type_id==$value->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value->service_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group"> 
                          <label for="field-1" class="control-label">Item Name<span style="color: red;">*<span></label>
                          <!-- <input type="text" class="form-control" name="item_name_id" id="item_name_id" value="<?php echo e($service_details->inv_item_id ?? ''); ?>" onchange="get_item_details(this)" required> -->
                          <select class="form-control" name="item_name_id" id="item_name_id" required="" aria-required="true" onchange="get_item_details(this)" required>
                            <option value="">--Select--</option>
                            <?php $__currentLoopData = $inv_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php if(@$service_details->inv_item_id==$value->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value->item_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <label for="field-3" class="control-label">Quantity<span style="color: red;">*<span></label>
                          <input type="text" class="form-control" name="input_items_quantity" onblur="clc_per();" id="input_items_quantity" min="1" value="<?php if(@$service_details->input_quantity): ?> <?php echo e($service_details->input_quantity); ?> <?php endif; ?>" placeholder="" required="" aria-required="true">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">UoM<span style="color: red;">*<span></label>
                          <label for="field-1" class="control-label"></label>
                          <select class="form-control" name="input_items_uom" required="" aria-required="true">
                            <option value="">--Select--</option>
                            <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value['id']); ?>" <?php if(@$service_details->input_uom_id==$value['id']): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value['uom_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <label for="field-1" class="control-label">Finished Goods Type<span style="color: red;">*<span></label>
                        <select class="form-control" name="finished_goods_name" id="finished_goods_name" required="" aria-required="true">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $finished_goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php if(@$service_details->finished_good_id==$value->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value->finished_goods_type_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <!-- <input type="text" class="form-control" name="finished_goods_name" id="finished_goods_name" value="<?php if(@$service_details->finished_goods_name): ?> <?php echo e($service_details->finished_goods_name); ?> <?php endif; ?>"  placeholder="" required="" aria-required="true"> -->
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Finished Goods Name<span style="color: red;">*<span></label>
                        <input type="text" class="form-control" name="finished_goods_dimension"  id="finished_goods_dimension" placeholder="" required="" aria-required="true" value="<?php if(@$service_details->finished_good_name): ?><?php echo e($service_details->finished_good_name); ?><?php endif; ?>">
                      </div>
                      <span id="finished_goods_dimension_error" style="color: #F83008;display:none">Finished Goods Name</span>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity<span style="color: red;">*<span></label>
                        <input type="text" class="form-control" name="finished_goods_quantity" onblur="clc_scrap();" id="finished_goods_quantity" min="1" value="<?php if(@$service_details->finished_good_quantity): ?><?php echo e($service_details->finished_good_quantity); ?><?php endif; ?>" placeholder="" required="" aria-required="true">
                      </div>
                      <span id="finished_goods_quantity_error" style="color: #F83008;display:none">Finished Goods Quantity</span>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">UoM<span style="color: red;">*<span></label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="finished_goods_uom" id="finished_goods_uom" required="" aria-required="true">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value['id']); ?>" <?php if(@$service_details->finished_good_uom==$value['id']): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value['uom_name']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-1" class="control-label">Metal Scrap<span style="color: red;">*<span></label>
                        <select class="form-control" name="metal_scrap_name" id="metal_scrap_name" required="" aria-required="true">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $metal_scrap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php if(@$service_details->scrap==$value->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value->metal_scrap_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Metal Scrap Name<span style="color: red;">*<span></label>
                        <input type="text" class="form-control" name="metal_scrap_dimension"  id="metal_scrap_dimension"  placeholder="" required="" aria-required="true" value="<?php if(@$service_details->metal_scrap_name): ?><?php echo e($service_details->metal_scrap_name); ?><?php endif; ?>">
                      </div>
                      <span id="metal_scrap_dimension_error" style="color: #F83008;display:none">Metal Scrap Name</span>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity<span style="color: red;">*<span></label>
                        <input type="text" class="form-control" name="metal_scrap_quantity" id="metal_scrap_quantity" min="1" value="<?php if(@$service_details->scrap_quantity): ?><?php echo e($service_details->scrap_quantity); ?><?php endif; ?>" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">UoM<span style="color: red;">*<span></label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="metal_scrap_uom" id="metal_scrap_uom" required="" aria-required="true">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value['id']); ?>" <?php if(@$service_details->scrap_uom==$value['id']): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value['uom_name']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-1" class="control-label">Invisible Loss Percentage<span style="color: red;">*<span></label>
                        <select class="form-control" name="invisible_loss_name" id="invisible_loss_name" required="" aria-required="true">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $invisible_loss_percentage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php if(@$service_details->invisible_loss==$value->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value->invisible_loss_percentage); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Invisible Loss Name<span style="color: red;">*<span></label>
                        <input type="text" class="form-control" name="invisible_loss_dimension"  id="invisible_loss_dimension"  placeholder="" required="" aria-required="true" value="<?php if(@$service_details->invisible_loss_name): ?><?php echo e($service_details->invisible_loss_name); ?><?php endif; ?>">
                      </div>
                      <span id="invisible_loss_dimension_error" style="color: #F83008;display:none">Invisible Loss Name</span>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity<span style="color: red;">*<span></label>
                        <input type="text" class="form-control" name="invisible_loss_quantity" id="invisible_loss_quantity" min="0" value="<?php if(@$service_details->invisible_quantity): ?><?php echo e($service_details->invisible_quantity); ?><?php endif; ?>" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">UoM<span style="color: red;">*<span></label>
                        <select class="form-control" name="invisible_loss_uom" id="invisible_loss_uom" required="" aria-required="true">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value['id']); ?>" <?php if(@$service_details->invisible_uom==$value['id']): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value['uom_name']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <p id="final_quantity"><?php if(@$service_details->input_quantity): ?> <?php echo e($service_details->input_quantity); ?> <?php endif; ?> </p>
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
            url: "<?php echo e(url('Manufacturing/get_item_details/')); ?>" + '/' + item_id,
            type: "GET",
            success: function (data) {
              // console.log(data);
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
          })
          ;

        }
      </script>
      <script>
    function get_item_name(){
          var item_id_tmp = $("#item_type_id").val(); 
        $("#item_name_id").html('<option value="">--Select--</option>');
        if(item_id_tmp)
        {
      
            $.ajax({
              url: "<?php echo e(url('Service/get_item_name/')); ?>"+'/'+item_id_tmp,
              data: {'item_name_id':item_id_tmp},
              method:"GET",
              contentType:'application/json',
              dataType:"json",
              beforeSend: function(data){
                  $(".loader").fadeIn(300);
                  
              },
              error:function(xhr){
                  alert("error"+xhr.status+","+xhr.statusText);
                  $(".loader").fadeOut(300);
              },
              success:function(data){
              
                console.log(data);
                  $("#item_name_id").html('<option value="">--Select--</option>');
                  for(var i=0;i<data.length;i++){
                      $("#item_name_id").append('<option value="'+data[i].item_name+'" >'+data[i].item_name+'</option>');
                  }
                  $(".loader").fadeOut(300);
              }
          });
        }
    }
      </script><?php /**PATH C:\xampp\htdocs\sandhu_tubes_git\resources\views/service/add.blade.php ENDPATH**/ ?>