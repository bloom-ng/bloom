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
              <li class="breadcrumb-item "><a href="/dashboard/tasks">Tasks</a></li>
              <li class="breadcrumb-item active">Edit Task</li>

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
              <h4 class="card-title">Edit Task</h4> <br> <hr>
              <form action="/dashboard/tasks/{{$task->id}}" method="post">
                @csrf
                @method('PATCH')
            
                
            
              
                <div class="form-group">
                    <label for="personnel_id">Personnel</label>
                    <select name="personnel_id" id="personnel_id" required  class="form-control">
                        @foreach ($personnels as $personnel)
                            <option value="{{$personnel->id}}"
                                {{$task->personnel_id==$personnel->id?'selected':''}}
                            >{{$personnel->user->name.' ('.$personnel->designation.')'}}</option>
                        @endforeach
                    </select>
                </div> 
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" class="form-control" id="description" name="description" placeholder="Design three banners" 
                    value="{{old('description')?old('description'):$task->description}}" required>
                </div>
                @if ($errors->has('description')) <br>
                <p class="text-danger">{{$errors->first('description')  }} </p>
                @endif

                <div class="form-group">
                    <label for="phone">Due  (Initially due: {{date_format( date_create($task->due),'D, d M Y, h:i a. ')}})</label>
                    <input type="datetime-local"  class="form-control" name="due" id="due" 
                    value="{{old('due')?date_format( date_create(old('due')),'Y-m-d\TH:i:s'):date_format( date_create($task->due),'Y-m-d\TH:i:s')}}">
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