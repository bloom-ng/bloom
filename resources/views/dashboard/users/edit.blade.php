<x-dashboard-header></x-dashboard-header>

<x-dashboard-navbar></x-dashboard-navbar>

<x-dashboard-sidebar  ></x-dashboard-sidebar>


<!-- Content   -->

<div class="content-wrapper" style="min-height: 511px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/home">Home</a></li>
              <li class="breadcrumb-item "><a href="/dashboard/users">Users</a></li>
              <li class="breadcrumb-item active">Edit Users</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
       

                  @if (session('action-fail'))
                  <div class="card bg-danger col-12">
                    <div class="card-header">
                      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      {{session('action-fail')}}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  @endif

          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Edit User</h4> <br> <hr>
              <form action="/dashboard/users/{{$current_user->id}}" method="post">
                @csrf
                @method('PUT')
            
                
            
              
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" 
                    value="{{old('name')?old('name'):$current_user->name}}" required>
                </div> 
                @if ($errors->has('name')) <br>
                <p class="text-danger">{{$errors->first('name')  }} </p>
                @endif
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@example.com" 
                    value="{{old('email')?old('email'):$current_user->email}}" required>
                </div>
                @if ($errors->has('email')) <br>
                <p class="text-danger">{{$errors->first('email')  }} </p>
                @endif

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08012345678" 
                    value="{{old('phone')?old('phone'):$current_user->phone}}" required>
                </div>
                @if ($errors->has('phone')) <br>
                <p class="text-danger">{{$errors->first('phone')  }} </p>
                @endif
                <div class="form-group">
                        <label>Role: (Current Role: {{$current_user->roles->first()->name}})</label>
                        <select class="form-control" name="role" required  >
                          <option value=""> Select Role </option>
                            @foreach (\App\Models\Role::all() as $role )
                            <option value="{{$role->id}}" >{{$role->name}}</option>
                            @endforeach
                            
                          
                        </select>
                </div>
                @if ($errors->has('role')) <br>
                <p class="text-danger">{{$errors->first('role')  }} </p>
                @endif
                <div class="form-group">
                    <label for="designation">Designation/Title</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{$current_user->personnel->designation}}" placeholder="Web Designer (optional)" >
                </div>
                <div class="form-group">
                    <label for="job_description">Job Description </label>
                    <textarea name="job_description" id="job_description" value="{{$current_user->personnel->job_description}}" class="form-control" rows="3" 
                    placeholder="Design Websites For Clients (optional)">{{$current_user->personnel->job_description}}</textarea> 
                </div>
              
              
             
            
            <div class=" justify-content-between">
              
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
              </div>
            </div>

           
          </div>
          <!-- /.col-md-6 -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>




<x-dashboard-footer></x-dashboard-footer>