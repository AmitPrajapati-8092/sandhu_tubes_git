 
<div class="content-page">
 <!-- Start content -->
 <div class="content">
  <div class="container-fluid">
    <!-- Page-Title -->
    <div class="row" id="dashboard-row">
      <div class="col-sm-12">
        <h4 class="pull-left page-title"   style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Manage Location</h4>
        <ol class="breadcrumb pull-right">
          <li><a href="<?php echo e(URL::to('home')); ?>">Home</a></li>
          <li><a href="<?php echo e(URL::to('home')); ?>">location</a></li>
          <li class="active">location/area</li>
        </ol>
      </div>
    </div><hr class="new2">

    <script type="text/javascript"> 
      $(document).ready(function () { 
       try {
        $("#arealocation").css("display","block");
        $("#createarea").addClass('active');
        document.getElementById('eventName').setAttribute('onclick','newAreaLocation()');
        $("#createarea").click(function () { 
          $("#createarea").addClass('active');
          $("#creatsector").removeClass('active');
          $("#creatblock").removeClass('active');
          $("#createEmail").removeClass('active');
          document.getElementById("eventName").innerText='Add Area Location';
          document.getElementById('eventName').setAttribute('onclick','newAreaLocation()');
          $("#arealocation").css("display","block");
          $("#sector").css("display","none");
          $("#block").css("display","none");
          $("#email").css("display","none");
        }); 
        $("#creatsector").click(function () { 
          $("#createarea").removeClass('active');
          $("#creatsector").addClass('active');
          $("#creatblock").removeClass('active');
          $("#createEmail").removeClass('active');
          document.getElementById("eventName").innerText='Add Sector/Phase';
          document.getElementById('eventName').setAttribute('onclick','newSectorPhase()'); 
          $("#sector").css("display","block");
          $("#block").css("display","none");
          $("#arealocation").css("display","none");
          $("#email").css("display","none");
        }); 
        $("#creatblock").click(function () { 
          $("#createarea").removeClass('active');
          $("#creatsector").removeClass('active');
          $("#creatblock").addClass('active');
          $("#createEmail").removeClass('active');
          document.getElementById("eventName").innerText='Add Block';
          document.getElementById('eventName').setAttribute('onclick','newBlock()');
          $("#block").css("display","block");
          $("#email").css("display","none");
          $("#arealocation").css("display","none");
          $("#sector").css("display","none");
        }); 
        $("#createEmail").click(function () { 
          $("#createarea").removeClass('active');
          $("#creatsector").removeClass('active');
          $("#creatblock").removeClass('active');
          $("#createEmail").addClass('active');
          document.getElementById("eventName").innerText='New Email';
          document.getElementById('eventName').setAttribute('onclick','newEmail()');
          $("#email").css("display","block");
          $("#sector").css("display","none");
          $("#arealocation").css("display","none");
          $("#block").css("display","none");

        }); 
      }catch(err)
      {
        var error =  err.message;
        alert(error)
      }
    }); 
  </script> 
  <div class="row" style="width: 102%;
    margin-left: -16px;">
    <div class="col-md-12" style="display:block; margin:auto;float:none;">
     <div class="col-xl-12">

      <div class="portlet">
       <div class="portlet-heading portlet-default" style="background: #0333f41a;"> 
          <h3 class="portlet-title">
            <button type="button" id="createarea" class="btn btn-outline-info btn-rounded m-b-5">Area/Location</button> <button type="button" id="creatsector" class="btn btn-outline-info btn-rounded m-b-5">Sector/Phase</button> <button type="button" id="creatblock" class="btn btn-outline-info btn-rounded m-b-5">Block</button>
          </h3>
          <div class="portlet-widgets">
            <button type="button" id="eventName" class="btn btn-inverse btn-rounded waves-effect waves-light m-b-5">Add Zone</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div id="bg-primary" class="panel-collapse collapse show">
         <div class="portlet-body" style="background-image: linear-gradient(#e9f8ff, white);">
            <div class="table-responsive" id="arealocation" style="display: none;" >
             <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
             style="border-collapse: collapse; border-spacing: 0; width: 100%;">
             <thead style="background: #b6e9ff;">
              <tr>
                <th>S.no</th>
                <th>Zone</th>
                <th>Created Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php $i=1; ?>
             <?php $__currentLoopData = $tableData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($val->sector_zone!=''): ?>
             <tr>               
              <td><?php echo e($i); ?></td>
              <td><?php echo e($val->sector_zone); ?></td>
              <td><?php echo e(date('M j, Y',strtotime($val->created_at))); ?></td> 
              <td class="actions">
                &nbsp;&nbsp;&nbsp;
                <a href="#"  class="on-default remove-row" onclick="editRecords(<?php echo e($val->id); ?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="View/Update"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo e(URL::to('delete/sectro-zone', $val->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
              </td>           
            </tr>
            <?php $i++; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </tbody>
        </table>
      </div>
      <div class="table-responsive" id="sector" style="display: none;" >
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
          <tr>
            <th>S.no</th>
            <th>Zone</th>
            <th>Sector/Phase</th>
            <th>Created Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         <?php $i=1; ?>
         <?php $__currentLoopData = $phaseData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($val->phase!=''): ?>
         <tr>               
          <td><?php echo e($i); ?></td>
          <td><?php echo e($val->sector_zone); ?></td>
          <td><?php echo e($val->phase); ?></td>
          <td><?php echo e(date('M j, Y',strtotime($val->created_at))); ?></td>     
          <td class="actions">
            &nbsp;&nbsp;&nbsp;
            <a href="#"  class="on-default remove-row" onclick="edit_phase(<?php echo e($val->id); ?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="View/Update"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="<?php echo e(URL::to('delete/sectro-phase', $val->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
          </td>     
        </tr>
        <?php $i++; ?>
        <?php endif; ?>          
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      </tbody>
    </table>
  </div>
  <div class="table-responsive" id="block" style="display: none;" >
   <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap"
   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
   <thead>
    <tr>
      <th>S.no</th>
      <th>Phase</th>
      <th>Block</th>
      <th>Created Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   <?php $i=1; ?>
   <?php $__currentLoopData = $blockData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php if($val->block!=''): ?>      
   <tr>               
    <td><?php echo e($i); ?></td>
    <td><?php echo e($val->phase); ?></td>
    <td><?php echo e($val->block); ?></td>
    <td><?php echo e(date('M j, Y',strtotime($val->created_at))); ?></td>   
    <td class="actions">
      &nbsp;&nbsp;&nbsp;
      <a href="#"  class="on-default remove-row" onclick="edit_block(<?php echo e($val->id); ?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="View/Update"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
      <a href="<?php echo e(URL::to('delete/sectro-block', $val->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
    </td>             
  </tr> 
  <?php $i++; ?>      
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  try{

    function newAreaLocation() {
      document.getElementById("FormValidation").reset();
      $('#create-area-location').modal('show');
    }
    function newSectorPhase() {
     $('#create-sector-phase').modal('show');
   }
   function newBlock() {
     $('#create-block').modal('show');
   }
 }catch(err)
 {
  var error =  err.message;
  alert(error)
}
</script>

<!-- Area/Location Model -->
<div id="create-area-location" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <div class="modal-dialog"> 
    <div class="modal-content sm"> 
      <div class="modal-header">
        <h4 class="modal-title mt-0">Create area/location</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="<?php echo e(URL::to('area-location/create/area-location')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="checkrequest" value="createarea" >
        <div class="modal-body"> 
          <div class="row"> 
            <div class="col-md-12"> 
              <div class="form-group"> 
                <label for="area" class="control-label">Area/Location <font color="red">*</font></label> 
                <input type="text" class="form-control" id="area"  name="area" placeholder="Ex:-noida,dilhi..." required="" aria-required="true"> 
              </div> 
            </div> 
          </div> 
        </div> 
        <div class="modal-footer"> 
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
          <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
        </div> 
      </form>
    </div> 
  </div>
</div>
<!-- /.modal -->

<!-- Area/Location Edit Model -->
<div id="create-area-location-eidt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <div class="modal-dialog"> 
    <div class="modal-content sm"> 
      <div class="modal-header">
        <h4 class="modal-title mt-0">Edit area/location</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="<?php echo e(URL::to('update/sectro-zone')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="checkrequest" value="createarea" >
        <input type="hidden" name="ids" id="ids">
        <div class="modal-body"> 
          <div class="row"> 
            <div class="col-md-12"> 
              <div class="form-group"> 
                <label for="area" class="control-label">Area/Location <font color="red">*</font></label> 
                <input type="text" class="form-control" id="area-update"  name="area" placeholder="Ex:-noida,dilhi..." required="" aria-required="true"> 
              </div> 
            </div> 
          </div> 
        </div> 
        <div class="modal-footer"> 
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
          <button type="submit" id="submitbtn" class="btn btn-info waves-effect waves-light">Save</button> 
        </div> 
      </form>
    </div> 
  </div>
</div>
<!-- /.modal -->

<!-- Sector/Phase Model -->
<div id="create-sector-phase" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <div class="modal-dialog"> 
    <div class="modal-content sm"> 
      <div class="modal-header">
        <h4 class="modal-title mt-0">Create Sector/Phase</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="<?php echo e(URL::to('area-location/create/sector-phase')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="checkrequest" value="createsector" >
        <div class="modal-body"> 
          <div class="row"> 
            <div class="col-md-12"> 
              <div class="form-group"> 
                <label for="sector" class="control-label">Zone<font color="red">*</font></label> 
                <select class="form-control" id="zone_id" name="zone_id" required="" aria-required="true">
                 <option value="">--- Select Zone ---</option>
                 <?php $__currentLoopData = $tableData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($data->id); ?>"><?php echo e($data->sector_zone); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div> 
           </div>

           <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="sector" class="control-label">Sector/Phase<font color="red">*</font></label> 
              <input type="text" class="form-control" id="sector"  name="sector" placeholder="Ex:-sec-63,sec-8.." required="" aria-required="true"> 
            </div> 
          </div> 

        </div> 
      </div> 
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
      </div> 
    </form>
  </div> 
</div>
</div>
<!-- /.modal -->

<!-- Edit Sector/Phase Model -->
<div id="create-sector-phase-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <div class="modal-dialog"> 
    <div class="modal-content sm"> 
      <div class="modal-header">
        <h4 class="modal-title mt-0">Edit Sector/Phase</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="<?php echo e(URL::to('update/sectro-phase')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="checkrequest" value="createsector" >
        <input type="hidden" name="phaseId" id="phaseId">
        <div class="modal-body"> 
          <div class="row"> 
            <div class="col-md-12"> 
              <div class="form-group"> 
                <label for="sector" class="control-label">Zone<font color="red">*</font></label> 
                <select class="form-control" id="zoneid" name="zone_id" required="" aria-required="true">
                 <option value="">--- Select Zone ---</option>
                 <?php $__currentLoopData = $tableData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($data->id); ?>"><?php echo e($data->sector_zone); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div> 
           </div>

           <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="sector" class="control-label">Sector/Phase<font color="red">*</font></label> 
              <input type="text" class="form-control" id="sectorName"  name="sector" placeholder="Ex:-sec-63,sec-8.." required="" aria-required="true"> 
            </div> 
          </div> 

        </div> 
      </div> 
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
        <button type="submit" id="submitbtn2" class="btn btn-info waves-effect waves-light">Save</button> 
      </div> 
    </form>
  </div> 
</div>
</div>
<!-- /.modal -->

<!-- Sector/Phase Model -->
<div id="create-block" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <!-- Ajax Page Loader -->
  <div class="preload loaderpopupbox modelloader" id="modelloader" style="display:none;">
    <div class="popup">
      <center>
        <span class="loader10" style="display:block;"><img src="<?php echo e(url('public/assets/images/loader.gif')); ?>" height="40" /></span>
      </center>
    </div>
  </div>
  <!-- Close -->
  <div class="modal-dialog"> 
    <div class="modal-content sm"> 
      <div class="modal-header">
        <h4 class="modal-title mt-0">Create Block</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="<?php echo e(URL::to('area-location/create/block')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="checkrequest" value="createblock" >
        <div class="modal-body"> 
          <div class="row"> 


            <div class="col-md-12"> 
              <div class="form-group"> 
                <label for="sector" class="control-label">Zone<font color="red">*</font></label> 
                <select class="form-control" id="block_zone_id" name="block_zone" required="" aria-required="true">
                 <option value="">--- Select Zone ---</option>
                 <?php $__currentLoopData = $tableData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($data->id); ?>"><?php echo e($data->sector_zone); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div> 
           </div>


           <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="sector" class="control-label">Phase<font color="red">*</font></label> 
              <select class="form-control" id="phase_id" name="phase_id" required="" aria-required="true">

              </select>
            </div> 
          </div>

          <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="block" class="control-label">Block <font color="red">*</font></label> 
              <input type="text" class="form-control" id="block"  name="block" placeholder="Ex:-A-43,B-8.." required="" aria-required="true"> 
            </div> 
          </div> 
        </div> 
      </div> 
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
      </div> 
    </form>
  </div> 
</div>
</div>
<!-- /.modal -->

<!--Edit Sector/Block Model -->
<div id="create-edit-block" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
  <!-- Ajax Page Loader -->
  <div class="preload loaderpopupbox modelloader" id="modelloader" style="display:none;">
    <div class="popup">
      <center>
        <span class="loader10" style="display:block;"><img src="<?php echo e(url('public/assets/images/loader.gif')); ?>" height="40" /></span>
      </center>
    </div>
  </div>
  <!-- Close -->
  <div class="modal-dialog"> 
    <div class="modal-content sm"> 
      <div class="modal-header">
        <h4 class="modal-title mt-0">Edit Block</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="<?php echo e(URL::to('update/sectro-block')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="checkrequest" value="createblock" >
        <input type="hidden" id="blockId" name="blockId"  >
        <div class="modal-body"> 
          <div class="row"> 


            <div class="col-md-12"> 
              <div class="form-group"> 
                <label for="sector" class="control-label">Zone<font color="red">*</font></label> 
                <select class="form-control" id="block_zone_id1" name="block_zone" required="" aria-required="true">
                 <option value="">--- Select Zone ---</option>
                 <?php $__currentLoopData = $tableData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($data->id); ?>"><?php echo e($data->sector_zone); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div> 
           </div>

           <div id="phaseinputdiv" class="col-md-12"> 
            <div class="form-group"> 
              <label for="block" class="control-label">Phase <font color="red">*</font></label> 
              <input type="text" class="form-control" id="phaseId3" aria-required="true"> 
            </div> 
          </div>

          <div id="phaseselectdiv" class="col-md-12"> 
            <div class="form-group"> 
              <label for="sector" class="control-label">Phase<font color="red">*</font></label> 
              <select class="form-control" id="phaseId2" name="phase_id" aria-required="true">
              </select>
            </div> 
          </div>

          <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="block" class="control-label">Block <font color="red">*</font></label> 
              <input type="text" class="form-control" id="block1"  name="block" placeholder="Ex:-A-43,B-8.." required="" aria-required="true"> 
            </div> 
          </div> 
        </div> 
      </div> 
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
        <button type="submit" id="submitbtn3" class="btn btn-info waves-effect waves-light">Save</button> 
      </div> 
    </form>
  </div> 
</div>
</div>
<!-- /.modal -->
<script>
  $(document).ready(function(){
    $('#phaseselectdiv').hide();
    $("#block_zone_id1").change(function(){
      $('#phaseinputdiv').hide();
    });
    $("#block_zone_id1").click(function(){
      $("#phaseselectdiv").show();
    });
  });
</script>

<script type="text/javascript">
  $('#block_zone_id').change(function () { 
    try{
      var id = $(this).val();
      if (id) {
        $("#modelloader").css("display","block");
        $.ajax({
          url: "<?php echo e(url('land/chnage_phase/')); ?>" + '/' + id,
          type: "GET",
          success: function (data) {
            console.log(data);
            if ($.isEmptyObject(data.error)) {
              $('#phase_id').html(data);
              $("#modelloader").css("display","none");
            } else {
              printErrorMsg(data.error);
            }
          }
        });
      }
    }catch(err)
    {
      var error =  err.message;
      alert(error)
    }
  });

</script>

<script type="text/javascript">
  $('#block_zone_id1').change(function () { 
    try{
      var id = $(this).val();
      if (id) {
        $("#modelloader").css("display","block");
        $.ajax({
          url: "<?php echo e(url('land/chnage_phase/')); ?>" + '/' + id,
          type: "GET",
          success: function (data) {
            console.log(data);
            if ($.isEmptyObject(data.error)) {
              $('#phaseId2').html(data);
              $("#modelloader").css("display","none");
            } else {
              printErrorMsg(data.error);
            }
          }
        });
      }
    }catch(err)
    {
      var error =  err.message;
      alert(error)
    }
  });

</script>

<script type="text/javascript">
  function editRecords(id) { 
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $.ajax({
    url:"<?php echo e(url('edit/sectro-zone/')); ?>"+'/'+id,  
    method:"POST", 
    contentType : 'application/json',
    success: function( data ) {
      document.getElementById("ids").value = data.id;
      document.getElementById("area-update").value = data.sector_zone;
      document.getElementById("submitbtn").innerText ='UPDATE';
      $('#create-area-location-eidt').modal('show');
      
    }
  });
 }
</script>

<script type="text/javascript">
  function edit_phase(id) { 
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $.ajax({
    url:"<?php echo e(url('edit/sectro-phase/')); ?>"+'/'+id,  
    method:"POST", 
    contentType : 'application/json',
    success: function( data ) {

      document.getElementById("phaseId").value = data.id;
      document.getElementById("zoneid").value = data.zone_id;
      document.getElementById("sectorName").value = data.phase;
      document.getElementById("submitbtn2").innerText ='UPDATE';
      $('#create-sector-phase-edit').modal('show');
    }
  });
 }
</script>

<script type="text/javascript">
  function edit_block(id) { 
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $.ajax({
    url:"<?php echo e(url('edit/sectro-block/')); ?>"+'/'+id,  
    method:"POST", 
    contentType : 'application/json',
    success: function( data ) {
      
      document.getElementById("blockId").value = data.id;
      document.getElementById("block_zone_id1").value = data.phase_id;
      document.getElementById("phaseId3").value = data.phase;
      document.getElementById("block1").value = data.block;
      document.getElementById("submitbtn3").innerText ='UPDATE';
      $('#create-edit-block').modal('show');
    }
  });
 }
</script><?php /**PATH C:\xampp\htdocs\sandhu_tubes_git\resources\views/land/area_location.blade.php ENDPATH**/ ?>