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
          <h4 class="pull-left page-title" style="color: #000; font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp; Create Organization&nbsp;&nbsp;/ &nbsp;
            <a href="<?php echo e(url('organization/listing')); ?>">Back</a></h4>
          <ol class="breadcrumb pull-right">
            <li><a href="<?php echo e(URL::to('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(URL::to('organization/listing')); ?>">Organization</a></li>
            <li class="active">Add Organization</li>
          </ol>
        </div>
      </div>
      <hr class="new2">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="border-left: 3px solid #386900;box-shadow: 4px 4px #b1b1b1;">
            <div class="card-header" style="background: linear-gradient(to left, #6e5e5c, #ffffff 50%, #ffffff, #ffffff 75%);">
              <div class="card-body">

                <form action="<?php echo e(url('organization/addStore')); ?>" method="post" id="FormValidation" required="" aria-required="true" enctype="multipart/form-data">
                  <div class="row gutters justify-content-left">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="row">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Organization Name<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="organization_name" id="organization_name" placeholder="Organization Name" required aria-required="true">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">City<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" required aria-required="true">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">State<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="state" id="state" placeholder="State" required aria-required="true">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">CIN<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="cin" id="cin" placeholder="CIN" required aria-required="true">
                              </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Revenue (In CR)</label>
                                <input type="text" min="0" class="form-control" name="revenue" id="revenue" placeholder="Revenue">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Relationships<span style="color:red;">*</span></label>
                                <select class="form-control" name="relationships" id="relationships" required aria-required="true">
                                  <option value="">--Select--</option>
                                  <?php $__currentLoopData = $org_relation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($val->org_relation_id); ?>"><?php echo e($val->relation_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>

                            <!-- <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Suppliers</label>
                                <input type="text" class="form-control" name="suppliers" id="suppliers" placeholder="Suppliers" required aria-required="true">
                              </div>
                            </div> -->
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <h4>Contacts</h4>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Name<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required aria-required="true">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Phone<span style="color:red;">*</span></label>
                                <input type="text" min="1" class="form-control" name="phone" id="phone" placeholder="Phone" required aria-required="true">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Email<span style="color:red;">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required aria-required="true">
                              </div>
                            </div>
                            <!-- <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Role</label>
                                <input type="text" class="form-control" name="role" id="role" placeholder="Role">
                              </div>
                            </div> -->
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Department<span style="color:red;">*</span></label>
                                <select class="form-control" name="department" id="department" required aria-required="true">
                                  <option value="">--Select--</option>
                                  <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($val->id); ?>"><?php echo e($val->department_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="field-4" class="control-label">Contact Type<span style="color:red;">*</span></label>
                                <select class="form-control" name="contact_type" id="contact_type" required aria-required="true">
                                  <option value="">--Select--</option>
                                  <?php $__currentLoopData = $org_contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($val->org_contact_type_id); ?>"><?php echo e($val->org_contact_type_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>

                          </div>
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
</div><?php /**PATH C:\xampp\htdocs\sandhu_tubes_git\resources\views/organization/add_organization.blade.php ENDPATH**/ ?>