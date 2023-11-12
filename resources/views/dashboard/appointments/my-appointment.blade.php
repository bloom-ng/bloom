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
            <h1 class="m-0">My Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/home">Home</a></li>
              <li class="breadcrumb-item active">My Appointments</li>
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
                    <div class="card-body">
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
                    <div class="card-body">
                      {{session('action-fail')}}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  @endif

                  
                  
                  
                
                  
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Appointments</h3>
                    </div>

                    <div class="card-body">
                        <table id="my-appointments-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>With</th>
                                    <th>Booked by</th>
                                    <th></th>
                                    <th></th>
                                    <th>For</th>
                                    <th>At</th>
                                    <th>Status</th>
                                    
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($appointments as $appointment )
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$appointment->personnel->user->name}}</td>
                                    <td>{{$appointment->requester_name}}</td>
                                    <td>{{$appointment->requester_email}}</td>
                                    <td>{{$appointment->requester_phone}}</td>
                                    <td>
                                        {{$appointment->duration<60 ? $appointment->duration.' mins' 
                                                                    :intdiv($appointment->duration,60).' hr '.$appointment->duration%60 .'mins' }}
                                    </td>
                                    <td>{{date_format( date_create($appointment->start),'D, d M Y  ')}} <br>
                                    {{date_format( date_create($appointment->start),'h: i a.   ')}} 
                                    </td>
                                    <td class="{{$appointment->start> now()?'text-warning': 'text-success'}} font-weight-bold">
                                      {{$appointment->start> now()?'Upcoming': 'Done'}}</td>
                                    
                                    <td>
                                        
                                    
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-success"> <i class="fa fa-stream"></i></button>
                                          <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <div class="dropdown-menu" role="menu" style="">
                                          
                                            <div class="dropdown-divider"></div>
                                            <form action="/dashboard/appointments/{{$appointment->id}}" method="post" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger"> <i class="fa fa-times"></i> Cancel</button>
                                            </form>
                                            
                                          </div>
                                        </div>
                                    
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    No Appointments.

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