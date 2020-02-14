<style>
    .table td {
        padding: 0.50rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        font-size: 13px;
        color: black;
        padding-left: 8px;
    }

    .table td {
        padding: 0.50rem;
        vertical-align: top;
        border-top: 1px dashed #747474;
        font-size: 13px;
        color: black;
        padding-left: 8px;
        background: #f4f4f4;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row" id="dashboard-row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title" style="color: #000;font-weight:200;"><i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Add Users &nbsp;&nbsp;/ &nbsp;
                        <a href="{{url('users')}}">Back</a></h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ URL::to('home') }}">Home</a></li>
                        <li><a href="{{URL::to('home')}}">Master</a></li>
                        <li class="active">Add Users</li>
                    </ol>
                </div>
            </div>
            <hr class="new2">
            <div class="row">
                <div class="col-md-12">

                    <form action="{{url('add/users')}}" method="post" enctype="multipart/form-data" id="FormValidation" autocomplete="off">
                        @csrf()
                        <div class="card card-border card-info" style="border-top: 2px solid #018eff;">
                            <div class="card-body" style="background-image: linear-gradient(#ebf9ff, white);">

                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" id="" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" id="" name="email" placeholder="" required>
                                        </div>

                                    </div> <!-- col-->

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" id="" name="user_name" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" id="" name="password" placeholder="" required>
                                        </div>
                                    </div> <!-- col-->

                                    <div class="col-xl-4">


                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" id="" name="phone" min="1" placeholder="">
                                        </div>
                                        <div style="display: flex;">

                                            <div class="form-group">
                                                <label for="">Designation</label>
                                                <input type="text" class="form-control" id="" name="designation" required placeholder="Designation">
                                            </div>

                                            <div class="form-group" style='margin-left: 1em;'><br>
                                                <label for="">Is Active</label><br>
                                                <div class="radio radio-info form-check-inline">
                                                    <input type="radio" id="inlineRadio1" value="option1" name="is_active" checked="checked">
                                                    <label for="inlineRadio1"> Active</label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio2" value="option2" name="is_active">
                                                    <label for="inlineRadio2">Inactive</label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div> <!-- col-->
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">Profile Image</label>
                                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                                        </div>
                                    </div> <!-- col-->

                                </div> <!-- End row -->

                                <table class="table table-striped add-edit-table dt-responsive nowrap" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead style='background: #d0f0ff;'>
                                        <tr>
                                            <th>Module Name</th>
                                            <th>Read</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($module as $key => $value)
                                        <tr>
                                            <td>{{$value['module_name']}}<input id="text" name="module[]" value="{{$value['ID']}}" type="hidden"> </td>
                                            <td><input id="checkbox2" name="read{{$value['ID']}}" value="read" type="checkbox" checked></td>
                                            <td><input id="checkbox2" name="add{{$value['ID']}}" value="add" type="checkbox"></td>
                                            <td><input id="checkbox2" name="edit{{$value['ID']}}" value="edit" type="checkbox"></td>
                                            <td><input id="checkbox2" name="delete{{$value['ID']}}}" value="delete" type="checkbox"></td>
                                        <tr>
                                        <tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Save</button>
                                </div>
                            </div><!-- card-body -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>