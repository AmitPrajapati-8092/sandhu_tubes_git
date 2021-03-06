<style>
  hr.new2 {
    border-top: 1px dashed #000;
  }

  .card {
    -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
    border-radius: 0px;
    border: 0px solid whitesmoke;
    box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }
</style>
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row" id="dashboard-row">
        <div class="col-sm-12">
          <h4 class="pull-left page-title" style="color: #000; font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp; Create Inventory Item&nbsp;&nbsp;/ &nbsp;
            <a href="<?php echo e(url('inv_item/listing')); ?>">Back</a></h4>
          <ol class="breadcrumb pull-right">
            <li><a href="<?php echo e(URL::to('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(URL::to('inv_item/listing')); ?>">Item</a></li>
            <li class="active">Add Inventory Item</li>
          </ol>
        </div>
      </div>
      <hr class="new2">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="border-left: 3px solid #386900;box-shadow: 4px 4px #b1b1b1;">
            <div class="card-header" style="background: linear-gradient(to left, #6e5e5c, #ffffff 50%, #ffffff, #ffffff 75%);">
              <div class="card-body">

                <form action="<?php echo e(url('inv_item/addStore')); ?>" method="post" id="FormValidation" required="" aria-required="true" enctype="multipart/form-data">
                  <div class="row gutters justify-content-left">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                      <!-- <div class="row">
                        <div class="col-sm-12"> -->
                      <div class="row">

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Item Code<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="item_code" id="item_code" placeholder="Item Code" required aria-required="true" onkeyup="get_batch_number();">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Batch No.</label>
                            <input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="Batch No." disabled>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Item Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name" required aria-required="true">
                            <!-- <select class="form-control" name="item_name" id="item_name" required aria-required="true">
                                  <option value="">--Select--</option>
                                  <?php $__currentLoopData = $itemsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($val->id); ?>"><?php echo e($val->items_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select> -->
                          </div>
                        </div>


                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Item Category<span style="color:red;">*</span></label>
                            <select class="form-control" name="item_category" id="item_category" required aria-required="true" required>
                              <option value="">--Select--</option>
                              <?php $__currentLoopData = $categorytData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($val->id); ?>"><?php echo e($val->category_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Quantity<span style="color:red;">*</span></label>
                            <input type="text" min="0" class="form-control" name="quantity" id="quantity" placeholder="Quantity" required aria-required="true" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">UoM<span style="color:red;">*</span></label>
                            <select class="form-control" name="uom" id="uom" required aria-required="true" required>
                              <option value="">--Select--</option>
                              <?php $__currentLoopData = $uomData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($val->id); ?>"><?php echo e($val->uom_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Seralized</label>
                            <select class="form-control" name="seralized" id="seralized" onchange="showDiv('hidden_div', this)">
                              <option value="">--Select--</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4" id="hidden_div" style="display: none;">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Serial Number</label>
                            <input type="text" class="form-control" name="serial_no" id="serial_no" placeholder="Serial Number">
                          </div>
                        </div>

                        <!-- <div class="col-md-4">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Leasable</label>
                                <select class="form-control" name="leasable" id="leasable">
                                  <option value="">--Select--</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                            </div> -->
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="field-4" class="control-label">Location</label>
                            <select class="form-control" name="location" id="location">
                              <option value="">--Select--</option>
                              <?php $__currentLoopData = $inventory_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($val->id); ?>"><?php echo e($val->location_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="field-3" class="control-label">Q/A</label>
                          <select class="form-control" name="quality" id="quality">
                            <option value="">--Select--</option>
                           
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                           
                          </select>
                        </div>
                      </div>

                      </div>

                      <div class="form-group">
                        <label for="field-4" class="control-label">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Description" row="5"></textarea>
                              </div>
                           
                          <!-- <div class="row">
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <hr class="new2">
                  </div>
                  <div class="col-md-12" style="    text-align: left; margin-bottom: 6px;">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-b-5">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function showDiv(divId, element)
  {
      document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
  }
</script>
<script>
  function get_batch_number()
  {
    var item_code = $("#item_code").val();
    $("#batch_no").val(item_code);
  }
</script><?php /**PATH C:\xampp\htdocs\sandhu_tubes_git\resources\views/inventory/add_inv_item.blade.php ENDPATH**/ ?>