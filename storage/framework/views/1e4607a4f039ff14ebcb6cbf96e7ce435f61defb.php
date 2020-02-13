<style>
  table th {
    text-align: center;
  }

  table td {
    padding: 3px 10px 3px 10px !important;
  }

  .rig {
    text-align: right;
  }

  .action {
    width: 50px;
  }
</style>
<div class="content-page">
  <div class="content">
    <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row" id="dashboard-row">
        <div class="col-sm-12">
          <h4 class="pull-left page-title" style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Manage Categories</h4>
          <ol class="breadcrumb pull-right">
            <li><a href="<?php echo e(URL::to('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(URL::to('home')); ?>">Master</a></li>
            <li class="active">Manage Category</li>
          </ol>
        </div>
      </div>
      <hr class="new2">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border card-info">
            <div class="card-header" style="padding-top: 20px !important;">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <?php if(Auth::user()->id!=1): ?>
                  <?php if(@$module_permission['is_add']=='yes'): ?>
                  <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light m-b-5" style="float: right;margin-top: 0px !important;" onclick="addRecords()">Add <i class="md md-add-circle-outline"></i></button>
                  <?php endif; ?>
                <?php else: ?>
                <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light m-b-5" style="float: right;margin-top: 0px !important;" onclick="addRecords()">Add <i class="md md-add-circle-outline"></i></button>
                <?php endif; ?>
                <thead style="">
                  <tr>
                    <th style="width: 55px;">Sl.</th>
                    <th>Categories</th>
                    <th>Description</th>
                    <!-- <th>POC</th> -->
                    <th>Is Active</th>
                    <th>Created Date</th>
                    <th class="action">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $categorytData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="rig"><?php echo e($key+1); ?></td>
                    <td><?php echo e($data->category_name); ?></td>
                    <td><?php echo e($data->description); ?></td>
                    <?php if($data->is_active == 1): ?>
                    <td>
                      <p class="mb-0">
                        <span class="badge badge-success">Active</span>
                      </p>
                    </td>
                    <?php else: ?>
                    <td>
                      <p class="mb-0">
                        <span class="badge badge-danger">Inactive</span>
                      </p>
                    </td>
                    <?php endif; ?>
                    <td><?php echo e(date('j M, Y ',strtotime($data->created_at))); ?></td>
                    <td class="actions">
                      <?php if(Auth::user()->id!=1): ?>
                        <?php if(@$module_permission['is_edit']=='yes'): ?>
                          <a href="javascript::void(0)" class="on-default edit-row" onclick="editRecords(<?php echo e($data->id); ?>)" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                          &nbsp;&nbsp;&nbsp;
                        <?php endif; ?>
                        <?php if(@$module_permission['is_delete']=='yes'): ?>
                          <a href="<?php echo e(URL::to('category/destroy',$data->id)); ?>" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash" style="color:red;"></i></a>
                        <?php endif; ?>
                      <?php else: ?>
                      <a href="javascript::void(0)" class="on-default edit-row" onclick="editRecords(<?php echo e($data->id); ?>)" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="<?php echo e(URL::to('category/destroy',$data->id)); ?>" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash" style="color:red;"></i></a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <!-- end card-body -->
          </div>
        </div>
        <!-- container -->
      </div>
    </div>
  </div>
</div>
<!-- content -->


<!--- MODEL CALL--->
<div id="category-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mt-0">Categories info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(url('add/category')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="ids" id="ids">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="field-1" class="control-label">Categories</label>
                <input type="text" id="category_name" name="category_name" class="form-control" required="" aria-required="true" placeholder="Enter Categories Name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="field-2" class="control-label">Description</label>
                <input id="description" type="text" name="description" class="form-control" required="" aria-required="true" placeholder="Enter  Description">
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label for="sel1">POC</label>
                <select class="select2 form-control" name="pos_id" id="pos_id">
                  <option value="">--- Select POC ---</option>
                  <?php if($userData !=''): ?>
                  <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($data->id > 1): ?>
                  <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
              </div>
            </div> -->
            <div class="col-md-6">
              <div class="form-group">
                <p class="control-label"><b>Is Active</b>
                  <font color="red">*</font>
                </p>
                <div class="radio radio-info form-check-inline">
                  <input type="radio" value="1" name="is_active">
                  <label for="inlineRadio1"> Active </label>
                </div>
                <div class="radio radio-info form-check-inline">
                  <input type="radio" value="0" name="is_active">
                  <label for="inlineRadio1"> Inactive </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="new2">
        <div class="modal-footer">
          <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal eND -->

<script type="text/javascript">
 function editRecords(id) { 
  $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });
  $.ajax({
   url:"<?php echo e(url('category/edit/')); ?>"+'/'+id,  
   method:"POST", 
   contentType : 'application/json',
   success: function( data ) {
            // console.log(data);
            document.getElementById("ids").value = data.id;
            document.getElementById("category_name").value = data.category_name;
            document.getElementById("description").value = data.description;
            // document.getElementById("pos_id").value = data.pos_id;
            var val = data.is_active;
            if( val == 1)
            {
             $('input[name=is_active][value=' + val + ']').prop('checked',true);
           }else{
             $('input[name=is_active][value=' + val + ']').prop('checked',true);
           }
           document.getElementById("submitbtn").innerText ='UPDATE';
           $('#category-model').modal('show');
         }
       });
}

function addRecords() { 
 document.getElementById("ids").value ='';
 document.getElementById("category_name").value = '';
 document.getElementById("description").value = '';
//  document.getElementById("pos_id").value = '';
 document.getElementById("submitbtn").innerText ='Save';
 $('#category-model').modal('show');
}
</script>

<script type="text/javascript">  
  function addajax()
  {
    $.ajax({
      url:    'display.php',
      method: 'post',
      content:'application/json',
      success: function (data)
      {
        document.getElementById('ids').value ='';
      }
    });
  }
</script><?php /**PATH C:\xampp\htdocs\sandhu_tubes_git\resources\views/master/category.blade.php ENDPATH**/ ?>