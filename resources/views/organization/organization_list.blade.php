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
               <h4 class="pull-left page-title" style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Organization Summary</h4>
               <ol class="breadcrumb pull-right">
                  <li><a href="{{ URL::to('home') }}">Home</a></li>
                  <li><a href="{{URL::to('organization/listing')}}">Organization</a></li>
                  <li class="active">Organization Summary</li>
               </ol>
            </div>
         </div>
         <hr class="new2">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-border card-info">
                  <div class="card-header" style="background-image: linear-gradient(#e9f8ff, white);padding-top: 20px !important;">
                     <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        @if(Auth::user()->id!=1)
                        @if(@$module_permission['is_add']=='yes')
                        <a href="{{url('organization/add')}}"><button type="button" class="btn btn-purple btn-rounded waves-effect waves-light m-b-5" style="float: right;margin-top: 0px !important;">Add <i class="md md-add-circle-outline"></i></button></a><br>
                        @endif
                        @else
                        <a href="{{url('organization/add')}}"><button type="button" class="btn btn-purple btn-rounded waves-effect waves-light m-b-5" style="float: right;margin-top: 0px !important;">Add <i class="md md-add-circle-outline"></i></button></a>
                        @endif
                        
                        <thead style="background: #fff;">
                           <tr>
                              <th>Organization Name</th>
                              <th>City, State</th>
                              <th>CIN</th>
                              <th>Revenue (In CR)</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 68px;" aria-label="Action: activate to sort column ascending">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if($statusdata)
                           @foreach($statusdata as $key=>$val)
                           <tr>
                              <td>{{$val->organization_name}}</td>
                              <td>{{$val->city}}, {{$val->state}}</td>
                              <td>{{$val->cin}}</td>
                              <td class="rig">{{$val->revenue}}</td>
                              <td class="actions">
                                 @if(Auth::user()->id!=1)
                                    @if(@$module_permission['is_read']=='yes')
                                       <a href="{{url('organization/showView/'.$val->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" onclick=""><i class="fa fa-eye" style="color:green;"></i></a>
                                    @endif
                                    @if(@$module_permission['is_edit']=='yes')
                                       <a href="{{url('organization/editView/'.$val->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                    @endif
                                    @if(@$module_permission['is_delete']=='yes')
                                       <a href="{{url('organization/deletedata/'.$val->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this Data?');"><i class="fa fa-trash" style="color:red;"></i></a>
                                    @endif
                                 @else
                                 <a href="{{url('organization/showView/'.$val->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" onclick=""><i class="fa fa-eye" style="color:green;"></i></a>
                                 <a href="{{url('organization/editView/'.$val->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                 <a href="{{url('organization/deletedata/'.$val->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this Data?');"><i class="fa fa-trash" style="color:red;"></i></a>
                                 @endif
                                 
                              </td>
                           </tr>
                           @endforeach
                           @endif
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

   </div>
   </div>
</div>
<!-- content -->

