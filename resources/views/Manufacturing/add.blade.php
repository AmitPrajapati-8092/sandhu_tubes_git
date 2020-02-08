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
          <h4 class="pull-left page-title" style="color: #000;font-weight:200;">&nbsp;<i class="ion-arrow-right-b"></i> &nbsp;&nbsp;Manufacturing Actions <a href="javascript::void(0);" onclick="history.back();"></a></h4>
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
              <form action="{{ URL::to('land/create/registration')}}" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card-body">
                  <h4 style="text-align: center;"><span id="msg" style="color: #F0560A;"></span></h4>
                  <p style="font-size: 17px; font-weight: 700;">Input</p>
                  <div class="col-md-5">
                    <div class="row form-group">
                      <!--   <label class="col-sm-3 control-label" for="example-input-normal">Search Land</label> -->
                      <div class="col-sm-7">
                        <div class="input-group">
                          <input type="text" id="searchland" name="land_name" class="form-control" placeholder="Search Iteams">
                          <input type="hidden" name="land_id" id="land_id">
                          <span class="input-group-prepend">
                            <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button> &nbsp;
                            <!-- <button type="button" class="btn waves-effect waves-light btn-primary" onclick="addlandModel()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New Land"><i class="fa fa-plus"></i></button> -->
                          </span>
                        </div>
                        <div id="land_list"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-3">

                        <div class="form-group">
                          <label for="field-1" class="control-label">Mother Coil/Slit Coil</label>
                          <select class="form-control" name="city" id="city" required="" aria-required="true">
                            <option value=""></option>
                            <option value="Jamshedpur">Mother Coil</option>
                            <option value="Ranchi">Slit Coil</option>
                            <option value="Bokaro">Scraps</option>
                            <option value="Dhanbad">Pipes</option>
                            <option value="Saraikela kharsawan">Cut Sheets</option>
                            <option value="East Singhbhum">Loss</option>
                          </select>
                        </div>

                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">Quantity</label>
                          <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="" required="" aria-required="true">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">Kilograms</label>
                          <label for="field-1" class="control-label"></label>
                          <select class="form-control" name="city" id="city" required="" aria-required="true">
                            <option value=""></option>
                            @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}">{{$value['uom_name']}}</option>
                          @endforeach
                          </select>
                        </div>

                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="field-3" class="control-label">Inventory Location</label>
                          <label for="field-1" class="control-label"></label>
                          <select class="form-control" name="city" id="city" required="" aria-required="true">
                            <option value=""></option>
                            <option value="Jamshedpur">Jamshedpur, Jharkhand 832108</option>


                          </select>
                        </div>

                      </div>




                    </div>
                  </div>







                  <script type="text/javascript">
                    function chkpsige(elem) {
                      var chkval = Number(document.getElementById("p_size2").value);
                      var inputval = Number(document.getElementById("inputval").value);
                      if (chkval >= inputval) {
                        document.getElementById("msg").innerHTML = '';
                      } else {
                        document.getElementById("msg").innerHTML = 'The size of the Possession cannot exceed the actual size...!<br>(कब्ज़ा का आकार वास्तविक आकार से अधिक नहीं कर सकते हैं ।)';
                      }
                    }
                  </script>
                  <hr>
                  <p style="font-size: 17px; font-weight: 700;">Output</p>
                  <span style="color:#F83008; font-weight: 600;" id="NotAloowPccCust"> </span><br><br>
                  <div class="col-md-5">
                    <div class="row form-group">
                      <div class="col-sm-7">
                        <div class="input-group" style="margin-top: -47px;">
                          <input type="text" name="cust_name" id="searchcustomer" class="form-control" placeholder="Search Customer" autocomplete="off">
                          <input type="hidden" name="cust_id" id="cust_id" value="">
                          <span class="input-group-prepend">
                            <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>&nbsp;
                            <!-- <button type="button" class="btn waves-effect waves-light btn-primary" onclick="addcustomerModel()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New Customer"><i class="fa fa-plus"></i></button> -->
                          </span>
                        </div>
                        <div id="customer_list"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3">

                      <div class="form-group">
                        <label for="field-1" class="control-label">Finished Goods</label>
                        <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="" required="" aria-required="true">
                      </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity</label>
                        <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Kilograms</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="city" id="city" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}">{{$value['uom_name']}}</option>
                          @endforeach

                        </select>
                      </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Inventory Location</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="city" id="city" required="" aria-required="true">
                          <option value=""></option>
                          <option value="Jamshedpur">Jamshedpur, Jharkhand 832108</option>


                        </select>
                      </div>

                    </div>




                  </div>




                  <div class="row">

                    <div class="col-md-3">

                      <div class="form-group">
                        <label for="field-1" class="control-label">Metal Scrap</label>
                        <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="Metal Scrap" required="" aria-required="true">
                      </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity</label>
                        <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Kilograms</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="city" id="city" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}">{{$value['uom_name']}}</option>
                          @endforeach
                        </select>
                      </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Inventory Location</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="city" id="city" required="" aria-required="true">
                          <option value=""></option>
                          <option value="Jamshedpur">Jamshedpur, Jharkhand 832108</option>

                        </select>
                      </div>

                    </div>




                  </div>


                  <div class="row">

                    <div class="col-md-3">

                      <div class="form-group">
                        <label for="field-1" class="control-label">Invisible Loss</label>
                        <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="" required="" aria-required="true">
                      </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Quantity</label>
                        <input type="text" class="form-control" name="plot_value" id="plot_value" min="1" value="" placeholder="" required="" aria-required="true">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">Kilograms</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="city" id="city" required="" aria-required="true">
                          <option value=""></option>
                          @foreach($uom as $key=> $value)
                          <option value="{{$value['id']}}">{{$value['uom_name']}}</option>
                          @endforeach

                        </select>
                      </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="field-3" class="control-label">This is autopopulated</label>
                        <label for="field-1" class="control-label"></label>
                        <select class="form-control" name="city" id="city" required="" aria-required="true">
                          <option value=""></option>
                          <option value="Jamshedpur">Jamshedpur, Jharkhand 832108</option>

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
                        <p> 1000 Kilograms</p>
                      </div>
                    </div>
                  </div>


                  <hr>
                  <script type="text/javascript">
                    function chkdate(elem) {
                      var date = document.getElementById("appliDate").value;
                      //$(".selector" ).datepicker("setDate", date);
                      var today = new Date();
                      $('.selector').datepicker({
                        format: 'dd-mm-yyyy',
                        autoclose: true,
                        setDate: date,
                        startDate: date,
                        minDate: date
                      }).on('changeDate', function (ev) {
                        $(this).datepicker('hide');
                      });
                      $('.selector').datepicker('setDate', date);
                      $('.selector').keyup(function () {
                        if (this.value.match(/[^0-9]/g)) {
                          this.value = this.value.replace(/[^0-9^-]/g, '');
                        }
                      });
                    }
                  </script>

                  <!--   <p style="font-size: 17px; font-weight: 700;">Payment Info</p>
          <hr>
          <p style="font-size: 17px; font-weight: 700;">Review & Submit</p>
          <hr> -->

                </div> <!-- card -->
            </div> <!-- container -->
          </div> <!-- content -->
          </form>
        </div>
      </div>
      <!--  Wizard Form -->

    </div>
    <script type="text/javascript">
      function wizardForm(elem) {
        $("#wform").css("display", "block");
        $("#default-form").css("display", "none");

      }
      function defaultForm(elem) {
        $("#wform").css("display", "none");
        $("#default-form").css("display", "block");
      }
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#additional_charge').on('change', function () {
          var value = $(this).val();
          var bs = Number(document.getElementById('based_rent').value);
          var tax = Number(document.getElementById('taxes').value);
          var ins = Number(document.getElementById('insurance').value);
          var mainti = Number(document.getElementById('maintanance').value);
          var adi = Number(document.getElementById('additional_charge').value);
          var pay = bs + tax + ins + mainti + adi;
          document.getElementById('netpaybill').value = pay;
        });

        $("input[name$='add_net_payable']").click(function () {
          var test = $(this).val();
          if (test == 'monthly') {
            document.getElementById('add_tag_n').textContent = 'Month';
            document.getElementById('add_time_duration').value = 'm';
          } else {
            document.getElementById('add_tag_n').textContent = 'Year';
            document.getElementById('add_time_duration').value = 'yr';
          }
        });

      });
    </script>

    <script type="text/javascript">
      try {
        function addcustomerModel() {
          $('#add_customer').modal('show');
        }
        function addlandModel() {
          $('#add_land').modal('show');
        }
      } catch (err) {
        var error = err.message;
        alert(error)
      }

    </script>
 


    <script type="text/javascript">
      $(document).ready(function () {
        $('#e_additional_charge').on('change', function () {
          var value = $(this).val();
          var bs = Number(document.getElementById('e_based_rent').value);
          var tax = Number(document.getElementById('e_taxes').value);
          var ins = Number(document.getElementById('e_insurance').value);
          var mainti = Number(document.getElementById('e_maintanance').value);
          var adi = Number(document.getElementById('e_additional_charge').value);
          var pay = bs + tax + ins + mainti + adi;
          document.getElementById('e_netpaybill').value = pay;
        });

      });
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        $("input[name$='net_payable']").click(function () {
          var test = $(this).val();
          if (test == 'monthly') {
            document.getElementById('tag_n').textContent = 'Month';
            document.getElementById('time_duration').value = 'm';
          } else {
            document.getElementById('tag_n').textContent = 'Year';
            document.getElementById('time_duration').value = 'yr';
          }
        });
      });
    </script>


    <script type="text/javascript">
      $(document).ready(function () {
        $('#searchcustomer').on('keyup', function () {
          var query = $(this).val();
          if (query != '') {
            $("#loader1").css("display", "block");
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url: "{{url('land/serachcustomers/')}}" + '/' + query,
              type: "GET",
              success: function (data) {
                $("#loader1").css("display", "none");
                $('#customer_list').html(data);
              }
            })
          } else {
            $('#customer_list').html("");
          }
        });
        $(document).on('click', 'td', function () {
          var value = $(this).text();
          $('#customer_list').html("");
        });


        /* Wizard Customer*/

        $('#wsearchcustomer').on('keyup', function () {
          var query = $(this).val();
          if (query != '') {
            $("#loader1").css("display", "block");
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url: "{{url('land/wserachcustomers/')}}" + '/' + query,
              type: "GET",
              success: function (data) {
                $("#loader1").css("display", "none");
                $('#wcustomer_list').html(data);
              }
            })
          } else {
            $('#wcustomer_list').html("");
          }
        });
        $(document).on('click', 'td', function () {
          var value = $(this).text();
          $('#wcustomer_list').html("");
        });

        /* Land */
        $('#searchland').on('keyup', function () {
          var query = $(this).val();
          if (query != '') {
            $("#loader1").css("display", "block");
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url: "{{url('land/serachland/')}}" + '/' + query,
              type: "GET",
              success: function (data) {
                $("#loader1").css("display", "none");
                $('#land_list').html(data);
              }
            })
          } else {
            $('#land_list').html("");
          }
        });
        $(document).on('click', 'td', function () {
          var value = $(this).text();
          $('#land_list').html("");
        });


        $('#wsearchland').on('keyup', function () {
          var query = $(this).val();
          if (query != '') {
            $("#loader1").css("display", "block");
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url: "{{url('land/wserachland/')}}" + '/' + query,
              type: "GET",
              success: function (data) {
                $("#loader1").css("display", "none");
                $('#wland_list').html(data);
              }
            })
          } else {
            $('#wland_list').html("");
          }
        });
        $(document).on('click', 'td', function () {
          var value = $(this).text();
          $('#wland_list').html("");
        });



      });

      function addcustomer(id) {
        $("#loader1").css("display", "block");
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{url('land/customer/add/')}}" + '/' + id,
          method: "POST",
          contentType: 'application/json',
          success: function (data) {
            console.log(data)
            if (data == 0) {
              $("#loader1").css("display", "none");
              document.getElementById("NotAloowPccCust").innerText = 'This client is already registered.';
              document.getElementById("cust_id").value = '';
              document.getElementById("searchcustomer").value = '';
              document.getElementById("c_name").innerText = '';
              document.getElementById("c_email").innerText = '';
              document.getElementById("c_company").innerText = '';
            } else {
              document.getElementById("NotAloowPccCust").innerText = '';
              $("#loader1").css("display", "none");
              var company_reg_no = data.company_reg_no;
              var company = data.company;
              var company_type = data.company_type;
              var address = data.address;
              document.getElementById("cust_id").value = data.id;
              document.getElementById("searchcustomer").value = company;
              document.getElementById("c_name").innerText = company;
              document.getElementById("c_email").innerText = company_type;

              document.getElementById("c_company").innerText = address;
              document.getElementById("c_Regi").innerText = company_reg_no;

            }
          }
        });
      }

      /* Wizard Customer */
      function waddcustomer(id) {
        $("#loader1").css("display", "block");
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{url('land/wcustomer/add/')}}" + '/' + id,
          method: "POST",
          contentType: 'application/json',
          success: function (data) {
            console.log(data)
            $("#loader1").css("display", "none");
            var name = data.f_name + ' ' + data.l_name;
            var email = data.email;
            var mobile = data.mobile;
            var company = data.company;
            document.getElementById("wcust_id").value = data.id;
            document.getElementById("wsearchcustomer").value = name;
            document.getElementById("wc_name").innerText = name;
            document.getElementById("wc_email").innerText = email;
            document.getElementById("wc_mobile").innerText = mobile;
            document.getElementById("wc_company").innerText = company;
          }
        });
      }



      function addland(id) {
        $("#loader1").css("display", "block");
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{url('land/land/add/')}}" + '/' + id,
          method: "POST",
          contentType: 'application/json',
          success: function (data) {
            console.log(data)
            $("#loader1").css("display", "none");
            var name = data.land_name;
            document.getElementById("land_id").value = data.id;
            document.getElementById("searchland").value = name;
            document.getElementById("p_no").innerText = data.plot_no;
            document.getElementById("p_name").innerText = name;
            document.getElementById("p_size").innerText = data.plot_size + ' ' + data.uom;
            document.getElementById("p_size2").value = data.plot_size;
            document.getElementById("p_uom").innerText = data.uom;
            document.getElementById("sect").innerText = data.area;
            document.getElementById("phas").innerText = data.sector;
            document.getElementById("l_block").innerText = data.block;

          }
        });
      }
      function addlandwizard(id) {
        $("#loader1").css("display", "block");
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{url('land/land/wizard/add/')}}" + '/' + id,
          method: "POST",
          contentType: 'application/json',
          success: function (data) {
            console.log(data)
            $("#loader1").css("display", "none");
            var name = data.land_name;
            document.getElementById("wland_id").value = data.id;
            document.getElementById("wsearchland").value = name;
            document.getElementById("wp_no").innerText = data.plot_no;
            document.getElementById("wp_name").innerText = name;
            document.getElementById("wp_size").innerText = data.plot_size + ' ' + data.uom;
            document.getElementById("wsect").innerText = data.area;
            document.getElementById("wphas").innerText = data.sector;
            document.getElementById("wl_block").innerText = data.block;

          }
        });
      }
    </script>
    <script>
      $(function () {
        $(".datepicker").datepicker();
      });
    </script>