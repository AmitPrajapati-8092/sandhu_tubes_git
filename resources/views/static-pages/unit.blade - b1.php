<!DOCTYPE html>
<html lang="en">

<head>
    <title>jiada</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <!--// Meta tag Keywords -->

    <!-- Recent Trips section css files-->
    <link rel="stylesheet" href="{{url('public/static-pages-assets/css/owl.carousel.css')}}" type="text/css" media="all">
    <link href="{{url('public/static-pages-assets/css/owl.theme.css')}}" rel="stylesheet">
    <!-- //Recent Trips section css files -->

    <!-- Testimonials -->
    <link rel="stylesheet" href="{{url('public/static-pages-assets/css/flexslider.css')}}" type="text/css" media="screen" />
    <!-- //Testimonials -->

    <!-- css files -->
    <link rel="stylesheet" href="{{url('public/static-pages-assets/css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{url('public/static-pages-assets/css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{url('public/static-pages-assets/css/font-awesome.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gabriela&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overlock&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- //web-fonts -->

</head>
<style>
     h4{
    margin: 0;
    font-weight: 100;
     }
    .panel-group {
        margin-bottom: 20px;
        margin-top: 1em;
    }
    .panel-body {
        padding: 15px;
        background: #3f51b5;
    }
    .footer-agile {
        padding: 6em 0 3em;
        background: #232323;
        margin-top: 1em;
    }

</style>

<body style="    background-image: linear-gradient(#d0d7ff, white);">

    @include("static-pages.header")

    <!-- Shop -->
    <div class="container-fluid" style="width: 80%;">
    <div class="innerf-pages section" style="padding: 2em;">
    
		<div class="fh-container mx-auto">
			<div class="row my-lg-5 mb-5">
				<!-- grid left -->
				<div class="side-bar col-lg-3">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                           
                            <div class="panel-heading  show" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Industry
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" >
                                <div class="panel-body">
                                    <div class="left-side">
                                        <form>
                                            <!-- <span><input type="reset" value="Reset"></span><br> -->
                                        <ul style="margin-top: 1em;">
                                        @foreach($industries as $industry)
                                            <li>
                                                <input type="checkbox" class="checked" name="industry_name[]" onclick="ajaxFunc()" value="{{$industry->id}}">
                                                <label for="industry_name">{{$industry->industires_name}}</label>
                                            </li>
                                        @endforeach	
                                            
                
                                        </ul>
                                    </div>
                                </form>
                                </div>
                            </div>
                     
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Company Type
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body">
                                    <!-- Company Type -->
                                <div class="left-side">
                                    <form>
                                        <!-- <span><input type="reset" value="Reset"></span><br> -->
                                            
                                      
                                    <div class="d-flex">
                                        <ul style="margin-top: 1em;">
                                        @foreach($company_types as $company_type)
                                            <li>
                                                <input type="radio" class="checked" name="comp_type[]" id="comp_type" value="{{$company_type->id}}" onclick="ajaxFunc()">
                                                <label for="color1">{{$company_type->company_type}}</label>
                                            </li>
                                        @endforeach
    
                                            
                                        </ul>
                                    </div>
                                    </form>
                                </div>
                                <!-- //Company Type -->	
                            </div>
                        </div>
                    </div>


                             
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Company Size
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <!--Company Size-->
                            <div class="left-side">
                                <form>
                                    <!-- <span><input type="reset" value="Reset"></span><br> -->
                                        
                                    <ul style="margin-top: 1em;">
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size1" value="1-10" onclick="ajaxFunc()">
                                        <label for="arr1">1 - 10 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size1" value="10-50" onclick="ajaxFunc()">
                                        <label for="arr1">11 - 50 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size1" value="50-100" onclick="ajaxFunc()">
                                        <label for="arr1">51 - 100 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size2" value="100-150" onclick="ajaxFunc()">
                                        <label for="arr2">101 - 150 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size3" value="150-200" onclick="ajaxFunc()">
                                        <label for="arr3">151 - 200 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size3" value="201-500" onclick="ajaxFunc()">
                                        <label for="arr3">201 - 500 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size3" value="501-1000" onclick="ajaxFunc()">
                                        <label for="arr3">501 - 1000 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size3" value="1001-5000" onclick="ajaxFunc()">
                                        <label for="arr3">1001 - 5000 </label>
                                    </li>
                                    <li>
                                        <input type="radio" class="checked" name="company_size[]" id="company_size3" value="5001-10,000" onclick="ajaxFunc()">
                                        <label for="arr3">5001 - 10,000 </label>
                                    </li>

                                </ul>
                            </div>
                        </form>
                            <!-- // Company Size -->
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSeven">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                Input Materials
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                                <!--Waste Materials-->
                                <div class="left-side">
                                    <form>
                                        <!-- <span><input type="reset" value="Reset"></span><br> -->
                                    
                                       
                                    <div class="d-flex">
                                        <ul style="margin-top: 1em;">
                                       @foreach($materials as $material)
                                            <li>
                                                <input type="checkbox" class="checked" name="input_material_name[]" id="material_name" value="{{$material->id}}" onclick="ajaxFunc()">
                                                <label for="color1">{{$material->material_name }}</label>
                                            </li>
                                         @endforeach  
                                            
                                        </ul>
                                    </div>
                                    </form>
                                </div>	<!--end of leftside-->
                            <!--input Materials-->    
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingEight">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Waste Materials
                        </a>
                    </h4>
                </div>
                <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                    <div class="panel-body">
                            <!--Waste Materials-->
                            <div class="left-side">
                                <form>
                                   <!-- <span><input type="reset" value="Reset"></span><br> -->
                                    <div class="d-flex" style=" margin-top: 1em;">
                                        <ul style="margin-top: 1em;">
                                            @foreach($materials as $material)
                                            <li>
                                                <input type="checkbox" class="checked" name="waste_material_name[]" id="material_name" value="{{$material->id}}" onclick="ajaxFunc()">
                                                <label for="color1">{{$material->material_name }}</label>
                                            </li>
                                            @endforeach
        
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <!--Waste Materials-->    
                    </div>
                </div>
            </div>
                
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Turnover (in Crore Rs.)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    			<!-- Turnover -->
                                        <div class="left-side">
                                            <form>
                                                <!-- <span><input type="reset" value="Reset"></span><br> -->
                                            
                                                <ul style="margin-top: 1em;">
                                                <li>
                                                    <input type="radio" class="checked" name="turn_over[]" id="turn_over1" onclick="ajaxFunc()" value="0-10">
                                                    <label for="size1">0 - 10</label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="checked" name="turn_over[]" id="turn_over2" onclick="ajaxFunc()" value="11-50">
                                                    <label for="size2">11 - 50</label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="checked" name="turn_over[]" id="turn_over3" onclick="ajaxFunc()" value="51-100">
                                                    <label for="size3">51 - 100</label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="checked" name="turn_over[]" id="turn_over4" onclick="ajaxFunc()" value="101-500">
                                                    <label for="size4">101 - 500</label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="checked" name="turn_over[]" id="turn_over5" onclick="ajaxFunc()" value="501-1000">
                                                    <label for="size5">500+</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                        <!-- //Turnover -->
                                </div>
                            </div>
                        </div>

                           
           


 

       



                   

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                JIADA Region
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">
                                 <!-- JIADA Region -->
					<div class="left-side">
                        <form>
                            <!-- <span><input type="reset" value="Reset"></span><br> -->
						<div class="d-flex">
                            <ul style="margin-top: 1em;">
								<li>
									<input type="radio" class="checked" name="location_zone[]" id="location_zone" value="Adityapur" onclick="ajaxFunc()">
									<label for="color1">Adityapur</label>
								</li>
                               <!--  <li>
									<input type="radio" class="checked" name="location_zone[]" id="location_zone" value="Dhanbad" onclick="ajaxFunc()">
									<label for="color1">Dhanbad</label>
								</li> -->
                                <li>
                                    <input type="radio" class="checked" name="location_zone[]" id="location_zone" value="Ranchi" onclick="ajaxFunc()">
                                    <label for="color1">Ranchi</label>
                                </li>
                                <li>
                                    <input type="radio" class="checked" name="location_zone[]" id="location_zone" value="Bokaro" onclick="ajaxFunc()">
                                    <label for="color1">Bokaro</label>
                                </li>
                                <li>
                                    <input type="radio" class="checked" name="location_zone[]" id="location_zone" value="SanthalPargana" onclick="ajaxFunc()">
                                    <label for="color1">Santhal Pargana</label>
                                </li>
							</ul>
						</div>
                    </div>
				<!-- </div> -->
					<!-- //JIADA Region	-->
                    </div>
                </div>
            </div>


         



                
                    </div><!-- panel-group -->


				</div>
                <!-- //grid left -->



            <div class="col-md-9" style="margin-top: -1em; width: 70%;">

                    <!--search-->
      
            <div class="input-group mb-3" style="margin-top:1em;">
                <input type="text" class="form-control" placeholder="Search" style="    width: 85%;">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit" style="background-color: #0661a8;">Go</button>  
                  <button class="btn btn-success" id="view_all" onclick="view_all_unit();" type="button" style="background-color: #0661a8;">View All</button>
                 </div>
              </div>
      
        <!--end of search-->


           
            <div  id="company_details">
                @foreach($customer_details as $key_comp => $value_comp)
                <div class="job-post-main row my-3">
                <div class="col-md-9 job-post-info text-left" style="margin-top:4px;" >
                    
                    <div class="job-post-icon">
                       <img src="{{url('public/images/company/'.$value_comp['company_logo'])}}">
                    </div>
                    <div class="job-single-sec">
                        <p class="my-2"><a href="{{$value_comp['company_portal_url']}}">{{$value_comp['company']}}</a>  <span class="etlk">({{$value_comp['company_type']}})</span></p>
                        <!-- <ul class="job-list-info">
                            <li>
                                <i class="fas fa-briefcase"></i> {{$value_comp['company_type']}}</li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>{{$value_comp['address']}}</li>
                            <li>
                                <i class="fas fa-rupee-sign"></i>{{$value_comp['turn_over']}}</li>
                        </ul> -->
                        <ul class="job-list-info">
                          <!-- <li>
                                <i class="fas fa-briefcase"></i> {{$value_comp['company_type']}}</li>-->
                            <li>
                                <i class="fas fa-map-marker-alt"></i>{{$value_comp['address']}}</li>
                            
                            @if($value_comp['company_portal_url']!="")    <li class="cllrr">
                                <i class="fa fa-globe cllrr"></i>{{$value_comp['company_portal_url']}}</li>
                                @endif
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 job-single-time text-right">
                    <a href="{{url('comapny-profile/'.$value_comp['id'])}}" class="aply-btn ">See more</a>
					<a href="#" class="aply-btn rrtt " onclick="model()">Contact</a>
                </div>
            </div>
                @endforeach
            </div>
            {{ $customer_details->links() }}

            <!--//job2-->
            <!--/job3-->

        </div>
       

            </div>
        </div>
    </div>
</div>





<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Contact Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



     <script>
	 function model(){
		 $(".modal").modal("show");
	 }
	 </script>


@include("static-pages.footer")
     <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                autoPlay: true,
                items: 3,
                itemsDesktop: [640, 5],
                itemsDesktopSmall: [414, 4]
            });
        });
    </script>
    <script>
        $(function() {
            $("#slider").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 1000,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>

    
    
<script>
function ajaxFunc(){
    // alert("sdsdfsd");
var industry_ids = $("input[name='industry_name[]']:checked").map(function(){
    return $(this).val();
}).get();
var company_type_ids = $("input[name='comp_type[]']:checked").map(function(){
    return $(this).val();
}).get();
var company_size=$("input[name='company_size[]']:checked").map(function(){
    return $(this).val();
}).get();
var turn_over=$("input[name='turn_over[]']:checked").map(function(){
    return $(this).val();
}).get();
var location_zone=$("input[name='location_zone[]']:checked").map(function(){
    return $(this).val();
}).get();
// alert(turn_over);
var input_material_ids = $("input[name='input_material_name[]']:checked").map(function(){
    return $(this).val();
}).get();
var waste_material_ids = $("input[name='waste_material_name[]']:checked").map(function(){
return $(this).val();
}).get();
// alert(input_material_ids);

if((industry_ids!="") || (company_type_ids!="") || (input_material_ids!="")|| (waste_material_ids!="") ||(turn_over!="")||(location_zone!="")||(company_size!=""))
{
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url:"{{url('unit-listing/industry-filter')}}",
    data: {'industry_ids':industry_ids,'company_type_ids':company_type_ids,'waste_material_ids':waste_material_ids,'input_material_ids':input_material_ids,'company_size':company_size,'location_zone':location_zone,'turn_over':turn_over},
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
        // if(data.length!=0)
        // {
            $("#company_details").html("");
            for(var i=0;i<data.length;i++)
            {
                to_append =`<div class="job-post-main row my-3">
                                    <div class="col-md-9 job-post-info text-left">
                                    <div class="job-post-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="job-single-sec">
                                    <h4>
                                        <a href="http://itscient.com/automobile"></a>
                                        </h4>
                                    
                                        <p class="my-2">`+ data[i].company + `</p>
                                        <ul class="job-list-info">
                                            <li>
                                                <i class="fas fa-briefcase"></i> `+ data[i].company_type + `</li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>`+ data[i].address + `</li>`;
                                        if(data[i].company_portal_url){
                                            to_append +=`<li><i class="fas fa-globe"></i>`+data[i].company_portal_url+`</li>`;
                                        }
                                                
                                    to_append +=`</ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-3 job-single-time text-right">
                                    <a href="{{url('comapny-profile/`+ data[i].id + `')}}" class="aply-btn ">View Profile</a>
                                </div><br><br><br> </div>`;

                    $("#company_details").append(to_append);
            }
            $(".loader").fadeOut(300);
    }
    // }
//     else
//     {
//     $("#company_details").html("No Record Found !!");
// }

});
}
else{
    $("#company_details").html("No Record Found !!");
}
}
    </script>
    <script>

function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    
    
    </script>


<script>
    function view_all_unit() {
        // alert("dfgdfgd");
        $.ajax({
            url: "{{url('list/all_unit')}}",
            method: "get",
            contentType: 'application/json',
            success: function (data) {
                $("#company_details").html("");

                for (var i = 0; i < data.length; i++) {
                    to_append =`<div class="job-post-main row my-3">
                                    <div class="col-md-9 job-post-info text-left">
                                    <div class="job-post-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="job-single-sec">
                                    <h4>
                                        <a href="http://itscient.com/automobile"></a>
                                        </h4>
                                    
                                        <p class="my-2">`+ data[i].company + `</p>
                                        <ul class="job-list-info">
                                            <li>
                                                <i class="fas fa-briefcase"></i> `+ data[i].company_type + `</li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>`+ data[i].address + `</li>`;
                                        
                                        if(data[i].company_portal_url){
                                            to_append +=`<li><i class="fas fa-globe"></i>`+data[i].company_portal_url+`</li>`;
                                        }
                                                
                                    to_append +=`</ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-3 job-single-time text-right">
                                    <a href="{{url('comapny-profile/`+ data[i].id + `')}}" class="aply-btn ">View Profile</a>
                                </div><br><br><br> </div>`;

                    $("#company_details").append(to_append);
                }
            }
        });
    }
</script>






