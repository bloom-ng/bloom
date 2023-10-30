<x-dashboard-header></x-dashboard-header>

<x-dashboard-navbar></x-dashboard-navbar>

<x-dashboard-sidebar  ></x-dashboard-sidebar>

    <div class="content-wrapper" style="min-height: 264px;">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">My Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item "><a href="/dashboard/home">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="/dashboard/profile/{{$user->id}}">My Profile</a></li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
                            </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                        
                    </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                    <div class="container-fluid">
                    <!-- Response Errors-->
                    
                    @if(session('action-success'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Profile Update!</h5>
                    {{session('action-success')}}
                    </div>
                    @endif

                    @if(session('action-fail'))
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Profile Update!</h5>
                    {{session('action-fail')}}
                    </div>
                    @endif

                   

                    @error('photo')
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                    </div>
                    @enderror
                    @error('name')
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                    </div>
                    @enderror
                    @error('email')
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                    </div>
                    @enderror
                    @error('phone')
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                    </div>
                    @enderror
                    
                    
                    @error('password')
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                    </div>
                    @enderror
                    @error('current_password')
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                    </div>
                    @enderror
                    
                    <div class="row">
                        <div class="col-md-4">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/images/{{$user->avatar}}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}  <small>({{$user->personnel->designation}})</small></h3>

                                <p class="text-muted text-center"></p>
                                

                                <ul class="list-group list-group-unbordered mb-3">
                                
                                <li class="list-group-item">
                                    <b>Profile Created</b> <a class="float-right">{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last Updated</b> <a class="float-right">{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</a>
                                </li>
                                
                                
                                </ul>

                                <strong><i class="fas fa-tasks "></i> Job Description</strong>

                                <p class="text-muted">
                                {{$user->personnel->job_description}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-envelope "></i> Email</strong>

                                <p class="text-muted">
                                {{$user->email}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>
                                
                                <p class="text-muted">{{$user->phone}}</p>
                                

                                <hr>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        
                        <div class="col-md-8">
                            <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                <li class="nav-item active"><a class=" nav-link  " href="#edit_profile" data-toggle="tab">Edit Profile</a></li>
                                <li class="nav-item"><a class="nav-link " href="#upload_picture" data-toggle="tab">Upload Picture</a></li>
                                <li class="nav-item"><a class="nav-link " href="#change_password" data-toggle="tab">Change Password</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                
                            
                                <div class="tab-pane" id="edit_profile">
                                    <form class="form-horizontal" action="/dashboard/profile/{{$user->id}}/update-profile" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <input required type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone" 
                                                placeholder="Phone (Optional)" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="designation" name="designation" 
                                                placeholder="UI/UX Designer" value="{{$user->personnel->designation}}">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="job_description" class="col-sm-2 col-form-label">Job Description</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="job_description" name="job_description" 
                                                placeholder="Job Description (Optional)" value="{{$user->personnel->job_description}}">
                                        </div>
                                    </div>

                                    
                                
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Update</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div id="upload_picture" class="tab-pane">
                                    <form action="/dashboard/profile/{{$user->id}}/upload-photo" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="avatar">Profile Picture (2MB max, JPEG or PNG.)</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*"
                                                id="photo" name="photo" required 
                                                onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="input-group-text" type="submit" >Upload</button>
                                        </div>
                                        </div>
                                        <div class="input-group">
                                            
                                            <img id="img_preview" alt="" height="100" width="100">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!--Change Password Tab -->
                                <div id="change_password" class="tab-pane">
                                    <form action="/dashboard/profile/{{$user->id}}/change-password" method="POST"  >
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                                        <div class="col-sm-10">
                                        <input required type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                        <input required type="password" class="form-control" id="password" name="password" placeholder="New Password" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                        <input required type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Change Password</button>
                                        </div>
                                    </div>
                                    
                                    </form>
                                </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    
                    
                        <!-- /.col -->
                    
                        
                    </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>

    <x-dashboard-footer>
        <script>
                    $(function () {
                    bsCustomFileInput.init();
                    });
            </script>
    
    </x-dashboard-footer>