<x-dashboard-header></x-dashboard-header>

<x-dashboard-navbar></x-dashboard-navbar>

<x-dashboard-sidebar  :user="$user"></x-dashboard-sidebar>


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
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$unfinished_tasks}}</h3>

                <p>Unfinished Tasks</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$upcoming_appointments}}</h3>

                <p>Upcoming Appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-clock"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$subscriber_no}}</h3>

                <p>Subscribers</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$contact_no}}</h3>

                <p>Contacts</p>
              </div>
              <div class="icon">
                <i class="fas fa-phone"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Task List</h3>
                    </div>

                    <div class="card-body">
                        <table id="task-widget" class="table ">
                            <thead>
                                <tr>
                                    <th></th>
                                   <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($tasks as $task )
                                <tr>
                                    <td><img src="/images/{{$task->personnel->user->avatar}}" height="30px" width="30px" class="img-circle" alt=""></td>
                                    <td>{{$task->description}}</td>
                                    
                                    <td>{{\Carbon\Carbon::parse($task->due)->diffForHumans()}}</td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    No Pending Task
                                </tr>
                            @endforelse
                                
                            </tbody>
                        
                        </table>
                    </div>
                
                </div>
          

        </div>



          <div class="col-md-6">
                  <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                 
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col-md-6 -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>




<x-dashboard-footer>

<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>



<script>
$('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })

  
</script>

</x-dashboard-footer>