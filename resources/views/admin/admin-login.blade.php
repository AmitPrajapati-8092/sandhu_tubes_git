
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name','Admin Login') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon_1.ico')}}">
    <!-- Custom Files -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/assets/js/modernizr.min.js')}}"></script>
    <!-- Alert -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        history.pushState(null, null, null);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, null);
        });
    </script>
    <style type="text/css">
        .pace-active{display: none!important;}
        .popupbox {
            background-color:rgba(248,248,248,.60);
            position:fixed;
            height:100%;
            width:100%;
            z-index:111;
            top:0;
        }
        .popup {
            margin: 15% 30%;
            padding: 8px;
            position: relative;
            width: 40%;
            border-radius:5px;
        }
        @media(max-width:767px){
            .popup {
                margin: 40% 30%;
                width: 40%;
                border-radius:5px;
            }
            .popupbox .popup .loader12 img{width:100px; height:100px;}
            .ml-bg{ background-position: bottom left;
                background-color: #4cc0bf;;
            }
            .blank-page .content-wrapper .flexbox-container {
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: block;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                height: fit-content;
            }
        }

        .card-pages .card-header {
            border-radius: 6px 6px 0px 0px;
            padding: 16px 2px !important;
            position: relative;
        }

        .card-pages .card-body {
            padding: 10px !important;
        }

    </style>  
</head>
<body>
  @include('layouts.alert')
  <div class="preload popupbox loader1" id="loader1" style="display:none;">
    <div class="popup">
        <center>
            <span class="loader12" style="display:block;"><img src="{{asset('public/assets/images/loader.gif')}}" height="40" /></span>
        </center>
    </div>
</div>
<div class="wrapper-page">
    <div class="card card-pages" style="background-color: #e0e0e0;">
        <div class="card-header"> 
            <img src="{{ asset('public/assets/images/logo.png')}}" style="height: 100px; margin-left: 158px;">
            <h3 class="text-center m-t-20 text-black">Jharkhand Industrial Area Development Authority</h3>
            <h4 class="text-center m-t-20 text-black"> (Adityapur)</h4>
        </div> 
        <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form">
                <form class="cmxform form-horizontal tasi-form" id="loginForm" method="POST" action="{{ route('login') }}"  novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <div class="col-12">
                            <input  id="username" type="text" class="form-control input-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" required="" aria-required="true" autofocus placeholder="Username">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <input  type="password" id="password"  class="form-control input-lg @error('password') is-invalid @enderror" name="password" required="" aria-required="true" autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup" for="remember">
                                 {{ __('Remember Me') }}
                             </label>
                         </div>

                     </div>
                 </div>                    
                 <div class="form-group text-center m-t-40">
                    <div class="col-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" id="login" type="submit"> {{ __('Login') }}</button>
                    </div>
                </div>

                <img src="{{ asset('public/assets/images/logo-baba.png')}}" style="height: 45px; margin-left: 158px;">

                <div class="form-group row m-t-30">

                    <div class="col-sm-12">
                        @if (Route::has('password.request'))
                        <center><a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> {{ __('Forgot Your Password?') }}
                        </a></center> 
                        @endif
                    </div>                      
                </div>
                <p style="text-align: center;">Privacy Policy | Terms of use</p>
            </form> 
        </div>
    </div>   
</div>
<footer class="footer" style="text-align: center;">
    JIADA
    © 2019 - 2020. All rights reserved.
</footer>
<script type="text/javascript">

    $(document).ready(function(){       
        $("#login").click(function(){  

            var username = $("#username").val();
            var password = $("#password").val();
         //      var recaptcha = $("#recaptcha").val();
         if(username.trim()==''){                
            $("#username").css("border","1px solid red");
            $("#username").focus();
            return false;
        }else{
            $("#username").css("border","");
        }       

        if(password==''){               
            $("#password").css("border","1px solid red");
            $("#password").focus();
            return false;
        }else{
            $("#password").css("border","");
        }       


        if(username.trim()!='' && password!=''){    
            $("#loader1").css("display","block");   
        }   

    })
    });

</script>
<style type="text/css">
    .footer {
        background-color: #f5f5f5;
        border-top: 0;
        right: 222px;
    }
</style>
</div>

<script>
    var resizefunc = [];
</script>
<!-- Main  -->
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/js/detect.js')}}"></script>
<script src="{{asset('public/assets/js/fastclick.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('public/assets/js/waves.js')}}"></script>
<script src="{{asset('public/assets/js/wow.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.app.js')}}"></script>    
<!--form validation-->
<script src="{{ asset('public/assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>

<!--form validation init-->
<script src="{{ asset('public/assets/pages/form-validation-init.js')}}"></script>


</body>
</html>