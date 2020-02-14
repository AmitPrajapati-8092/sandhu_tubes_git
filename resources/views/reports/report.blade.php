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
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row" id="dashboard-row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title" style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Contact Type</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ URL::to('home') }}">Home</a></li>
                        <li><a href="{{URL::to('home')}}">Reports</a></li>
                        <!-- <li class="active">location/area</li> -->
                    </ol>
                </div>
            </div>
            <hr class="new2">
            <form method="post" action="{{url('genrate/report')}}" autocomplete="off">
                @csrf()
            <div class="row" style="width: 102%; margin-left: -16px;">
                <div class="col-xl-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Process</label>
                        <select class="select2 form-control" onchange="get_cat_details(this);" name="procreportsreportsess" id="process" required>
                        <option value="">--- Select Type ---</option>
                        <option value="1">Input</option>
                        <option value="0">Output</option>
                        </select>
                    </div>
                </div> 
                <div class="col-xl-3">
                    <div class="form-group">
                      <label for="field-2" class="control-label">Category</label>
                      <select class="select2 form-control" name="category" id="category" required>
                        <option value="">--- Select Type ---</option>
                        
                      </select>
                    </div>
                </div>
                <div class="col-xl-3">
                    <label for="field-2" class="control-label">Start Date</label>
                    <input type="text" name="start_date" class="form-control datepicker" required>
                </div>
                <div class="col-xl-3">
                    <label for="field-2" class="control-label">End Date</label>
                    <input type="text" name="end_date" class="form-control datepicker" required>
                </div>
                <div class="col-xl-3">
                    <button type="submit" class="btn btn-primary"> <i class="md md-add-circle-outline"></i> Genrate</button><br>
                </div>
                <div class="col-xl-3">
                    <a href="{{url('reports')}}"><button type="button" class="btn btn-primary"> <i class="md md-add-circle-outline"></i> Undo</button><br>
                </div>
            </div>
            </form>
            @if(@$inv_item!="")
            <div class="card">
                <div class="row">
                    <div class="col-sm-12">
                    <table class="table" id="datatable"  width="100%">
                        <thead>
                            <tr>
                            <th>SI No.</th>
                            <th>ITEMS Name</th>
                            <th>ITEMS Code</th>
                            <th >Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inv_item as $key_inv => $value_inv)
                            <tr>
                                <td>{{$key_inv+1}}</td>
                                <td>{{$value_inv['item_name']}}</td>
                                <td>{{$value_inv['item_code']}}</td>
                                <td style="text-align:right;">{{$value_inv['quantity']}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>

<script>
    function editRecords(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: "{{url('org/org_contact/edit/')}}" + '/' + id,
            method: "POST",
            contentType: 'application/json',
            success: function (data) {
                // console.log(data);

            }
        });
    }




</script>
<script>
   $( function() {
    $( ".datepicker" ).datepicker();
  } );
</script>
<script>
    function get_cat_details(e)
    {
var process_id=$(e).val();
// alert(process_id);
$.ajax({
            url: "{{url('report/get_cat')}}" + '/' + process_id,
            method: "get",
            contentType: 'application/json',
            success: function (data) {
                $("#category").html("");
                var to_append="";
                if(data!=null)
                {
                    for(i=0;i<data.length;i++)
                    {
                        to_append+=`<option value="`+data[i].id+`">`+data[i].category_name+`</option>`;
                    }
                }
                $("#category").append(to_append);
            }
        });
    }
</script>