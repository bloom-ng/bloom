<x-dashboard-header>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</x-dashboard-header>

<x-dashboard-navbar></x-dashboard-navbar>

<x-dashboard-sidebar  ></x-dashboard-sidebar>


<!-- Content   -->

<div class="content-wrapper" style="min-height: 511px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/home">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
            <div class="col-12">

                <div>
                  <button class="btn bg-success btn-app" type="button" data-toggle="modal" data-target="#add-user-modal">
                    <i class="fa fa-user-plus"> </i> Add User
                  </button> <br>

                  @if (session('action-success'))
                  <div class="card bg-success">
                    <div class="card-header">
                      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"> <i class="fa fa-check fa-2x"></i>
                      {{session('action-success')}}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  @endif

                  @if (session('action-fail'))
                  <div class="card bg-danger">
                    <div class="card-header">
                      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"> <i class="fa fa-times fa-2x"></i>
                      {{session('action-fail')}}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  @endif

                  
                  
                  @if ($errors->has('email')) <br>
                  <p class="text-danger">{{$errors->first('email')  }} </p>
                  @endif
                  @if ($errors->has('name')) <br>
                  <p class="text-danger">{{$errors->first('name')  }} </p>
                  @endif
                  @if ($errors->has('role')) <br>
                  <p class="text-danger">{{$errors->first('role')  }} </p>
                  @endif
                
                  
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Team</h3>
                    </div>

                    <div class="card-body">
                        <table id="team-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Designation</th>
                                    <th>Job Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($users as $member )
                                <tr class="{{$member->personnel->featured?'bg-success':''}}">
                                    <td>{{$loop->index+1}}</td>
                                    <td><img src="/images/{{$member->avatar}}" alt="Avatar" height="50px" width="50px" ></td>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>
                                        @foreach ($member->roles as $role )
                                            <span>{{$role->name}}</span> <br>
                                        @endforeach
                                    </td>
                                    <td>{{$member->personnel->designation}}</td>
                                    <td>{{$member->personnel->job_description}}</td>
                                    <td>
                                        
                                    
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-success"> <i class="fa fa-stream"></i></button>
                                          <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <div class="dropdown-menu" role="menu" >
                                          <a class="dropdown-item " title="Edit Team Member" href="/dashboard/users/{{$member->id}}/edit"><i class="fa fa-edit"> Edit</i> </a>
                                            <a class="dropdown-item" href="/dashboard/users/{{$member->id}}/reset-password"> <i class="fa fa-lock"></i> Reset Password</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/dashboard/users/{{$member->id}}/toggle-featured"> <i class="fa fa-star"></i> Toggle Featured</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            <form action="/dashboard/users/{{$member->id}}" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger"> <i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                            
                                          </div>
                                        </div>
                                    
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    No Member in the Team. <button class="btn btn-primary">Add New </button>
                                </tr>
                            @endforelse
                                
                            </tbody>
                        
                        </table>
                    </div>
                
                </div>
            
            
            </div>
          
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <!-- Add User Modal -->
  <x-add-user-modal></x-add-user-modal>


<x-dashboard-footer>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Datatables buttons
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

-->

</x-dashboard-footer>