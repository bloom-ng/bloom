<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if ($no_upcoming_appointments+$no_unfinished_tasks)
          <span class="badge badge-warning navbar-badge">
          {{$no_upcoming_appointments+$no_unfinished_tasks}}
          </span>
          @endif
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">{{$no_upcoming_appointments+$no_unfinished_tasks==0?'No':''}} Notifications</span>
          @if ($no_unfinished_tasks>0)
          <div class="dropdown-divider"></div>
          <a href="/dashboard/tasks/{{$user->personnel->id}}/single" class="dropdown-item">
            <i class="fas fa-tasks mr-2"></i> {{$no_unfinished_tasks}} Unfinished Task{{$no_unfinished_tasks>1?'s':''}}
            <span class="float-right text-muted text-sm"></span>
          </a>
          @endif
         @if ($no_upcoming_appointments>0)
         <div class="dropdown-divider"></div>
          <a href="/dashboard/appointments/{{$user->personnel->id}}/single" class="dropdown-item">
            <i class="fas fa-clock mr-2"></i> {{$no_upcoming_appointments}} Upcoming Appointment{{$no_upcoming_appointments>1?'s':''}}
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
         @endif
         
          
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="/images/{{$user->avatar}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"> {{$user->name}} </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src=" /images/{{$user->avatar}} " class="img-circle elevation-2" alt="User Image">

            <p>
            {{$user->name}} <br> ({{$user->personnel->designation}})
              <small></small>
            </p>
          </li>
         
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="/dashboard/profile/{{$user->id}}" class="btn btn-default btn-flat">Profile</a>
            <a href="/dashboard/logout" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>

      
    </ul>
  </nav>