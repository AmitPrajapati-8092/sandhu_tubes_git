  <div class="content-page"> 
   <!-- Start content -->
   <div class="content">
     <div class="container-fluid">
       <div class="wraper">
         <div class="row">
           <div class="col-sm-12">
             <div class="bg-picture text-center" style="background-image:url('{{asset('public/assets/images/big/bg.jpg')}}')">
               <div class="bg-picture-overlay"></div>
               <div class="profile-info-name">
                 @php  $logo = DB::table('users')->where('id',Auth::user()->id)->selectRaw("concat('".url('public/images/user_profile/').'/'."',user_image) as logo")->first();  @endphp
                  @if(Auth::user()->user_image!="")
                    @if(@Auth::user()->id!=1)
                    <img src=" {{ asset(@Auth::user()->user_image) }}" alt="profile-image" class="thumb-lg rounded-circle img-thumbnail">
                    @else
                    <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="thumb-lg rounded-circle img-thumbnail" alt="profile-image">
                    @endif
                  @else 
                    <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="thumb-lg rounded-circle img-thumbnail" alt="profile-image">
                  @endif 
                 <h3 class="text-white">{{Auth::user()->username ?? "" }}</h3>
               </div>
             </div>
             <!--/ meta -->
           </div>
         </div>
         <div class="row user-tabs">
           <div class="col-md-9 col-xl-6">
             <ul class="nav nav-tabs tabs" role="tablist">
               <li class="nav-item tab">
                 <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">
                   <span class="d-block d-sm-none"><i class="fa fa-home"></i></span>
                   <span class="d-none d-sm-block">About Me</span>
                 </a>
               </li>
               <li class="nav-item tab">
                 <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">
                   <span class="d-block d-sm-none"><i class="fa fa-cog"></i></span>
                   <span class="d-none d-sm-block">Settings</span>
                 </a>
               </li>
               <div class="indicator"></div>
             </ul>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-12">

             <div class="tab-content profile-tab-content">
               <div class="tab-pane show active" id="about" role="tabpanel" aria-labelledby="about-tab">

                 <div class="row">
                   <div class="col-lg-4">
                     <!-- Personal-Information -->
                     <div class="card card-default card-fill">
                       <div class="card-header">
                         <h3 class="card-title">Personal Information</h3>
                       </div>
                       <div class="card-body">
                         <div class="about-info-p">
                          <strong>Organization Name</strong>
                          <br>
                          <p class="text-muted">{{Auth::user()->name ?? ""}}</p>
                        </div>
                        <div class="about-info-p">
                         <strong>Mobile</strong>
                         <br>
                         <p class="text-muted">{{Auth::user()->phone ??  ""}}</p>
                       </div>
                       <div class="about-info-p">
                         <strong>Email</strong>
                         <br>
                         <p class="text-muted">{{Auth::user()->email ??  ""}}</p>
                       </div>
                       <div class="about-info-p m-b-0">
                         <strong>Address</strong>
                         <br>
                         <p class="text-muted">{{Auth::user()->address ??  ""}}</p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <div class="tab-pane" id="setting" aria-labelledby="setting-tab">

               <!-- Personal-Information -->
               <div class="card card-default card-fill">
                 <div class="card-header">
                   <h3 class="card-title">Edit Profile</h3>
                 </div>
                 @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 <div class="card-body">
                   <form action="{{'edit-userprofile'}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="u_ids" value='{{Auth::user()->id ?? ""}}'>
                     <input type="hidden" name="c_ids" value='{{$companydata->id ?? ""}}'>
                     <div class="form-group">
                       <label for="FullName">Organization Name</label>
                       <input type="text" name="name" value='{{Auth::user()->name ?? ""}}' id="Name" required="" aria-required="true" class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="Email">Email</label>
                       <input type="email" name="email" value='{{Auth::user()->email  ?? ""}}' id="Email" class="form-control" required="" aria-required="true">
                     </div>
                     <div class="form-group">
                       <label for="Username">Username</label>
                       <input type="text" value='{{Auth::user()->username ?? ""}}'  name="username" id="Username" class="form-control" required="" aria-required="true">
                     </div>
                                         <!-- <div class="form-group">
                                             <label for="Password">Old Password</label>
                                             <input type="password" name="password" placeholder="" id="password" class="form-control" required="" aria-required="true">
                                             @error('password')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                           </div> -->
                                         <!-- <div class="form-group">
                                             <label for="RePassword">New Password</label>
                                             <input type="password" name="new_password" placeholder="" id="new_password" class="form-control" required="" aria-required="true">
                                             @error('password')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                           </div> -->
                                           <button class="btn btn-primary waves-effect waves-light w-md" disabled type="submit">UPDATE</button>
                                         </form>

                                       </div>
                                     </div>
                                     <!-- Personal-Information -->
                                   </div>
                                 </div>
                               </div>
                             </div>

                           </div>
                           <!-- container-fluid -->

                         </div>
                         <!-- content -->
                       </div>
                     </div>