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
               <h4 class="pull-left page-title" style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Manage UoM</h4>
               <ol class="breadcrumb pull-right">
                  <li><a href="<?php echo e(URL::to('home')); ?>">Home</a></li>
                  <li><a href="<?php echo e(URL::to('home')); ?>">Master</a></li>
                  <li class="active">UoM MASTER</li>
               </ol>
            </div>
         </div>
         <hr class="new2">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-border card-info">
                  <div class="card-header" style="background-image: linear-gradient(#e9f8ff, white);">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="m-b-30">
                              <?php if(Auth::user()->id!=1): ?>
                                 <?php if(@$module_permission['is_add']=='yes'): ?>
                                 <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light m-b-5" style="float: right;" onclick="addRecords()">Add <i class="md md-add-circle-outline"></i></button>
                                 <?php endif; ?>
                              <?php else: ?>
                              <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light m-b-5" style="float: right;" onclick="addRecords()">Add <i class="md md-add-circle-outline"></i></button>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead style="background: #b6e9ff;">
                           <tr>
                              <th style="width: 55px;">Sl.</th>
                              <th>UoM Name</th>
                              <th>UoM Description</th>
                              <!-- <th>UoM Type</th> -->
                              <th>Is Active</th>
                              <th>Created Date</th>
                              <th class="action">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $uomData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td class="rig"><?php echo e($key+1); ?></td>
                              <td><?php echo e($data->uom_name); ?></td>
                              <td><?php echo e($data->uom_description); ?></td>
                              <!-- <td><?php echo e($data->uom_type); ?></td> -->
                              <?php if($data->status == 1): ?>
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
                                    <a href="<?php echo e(URL::to('uom_master/destroy',$data->id)); ?>" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash" style="color:red;"></i></a>
                                    <?php endif; ?>
                                 <?php else: ?>
                                 <a href="javascript::void(0)" class="on-default edit-row" onclick="editRecords(<?php echo e($data->id); ?>)" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                                 &nbsp;&nbsp;&nbsp;
                                 <a href="<?php echo e(URL::to('uom_master/destroy',$data->id)); ?>" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash" style="color:red;"></i></a>
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
<div id="material-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title mt-0">UoM info</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo e(url('add/uom_master')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="ids" id="ids">
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="field-1" class="control-label">UoM Name </label>
                        <input type="text" id="uom_name" name="uom_name" class="form-control" required="" aria-required="true" placeholder="UoM Name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="field-2" class="control-label">UoM Description</label>
                        <input id="uom_description" type="text" name="uom_description" class="form-control" required="" aria-required="true" placeholder="UoM Description">
                     </div>
                  </div>
                  <!-- <div class="col-md-6">
                     <div class="form-group">
                        <label for="sel1">UoM Type</label>
                        <select class="select2 form-control" name="uom_type" id="uom_type" required="">
                           <option value="">--- Select Type ---</option>                  
                           <option value="Land">Land</option>                 
                           <option value="Material">Material</option>                              
                        </select>
                     </div>
                  </div> -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <p class="control-label"><b>Is Active</b>
                           <font color="red">*</font>
                        </p>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" value="1" name="is_active" checked="">
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
         url: "<?php echo e(url('uom_master/edit/')); ?>" + '/' + id,
         method: "POST",
         contentType: 'application/json',
         success: function (data) {
            // console.log(data);
            document.getElementById("ids").value = data.id;
            document.getElementById("uom_name").value = data.uom_name;
            document.getElementById("uom_description").value = data.uom_description;
            // document.getElementById("uom_type").value = data.uom_type;
            var val = data.status;
            if (val == 1) {
               $('input[name=is_active][value=' + val + ']').prop('checked', true);
            } else {
               $('input[name=is_active][value=' + val + ']').prop('checked', true);
            }
            document.getElementById("submitbtn").innerText = 'UPDATE';
            $('#material-model').modal('show');
         }
      });
   }

   function addRecords() {
      document.getElementById("ids").value = '';
      document.getElementById("uom_name").value = '';
      document.getElementById("uom_description").value = '';
      // document.getElementById("uom_type").value = '';
      document.getElementById("submitbtn").innerText = 'Save';
      $('#material-model').modal('show');
   }



</script><?php /**PATH C:\xampp\htdocs\sandhu_tubes_git\resources\views/master/indexuom.blade.php ENDPATH**/ ?>