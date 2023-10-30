<aside class="main-sidebar sidebar-primary bg-white elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard/home" class="brand-link">
      <img src="/images/oo.png"  alt="Bloom Logo" class="brand-image mx-1  elevation-0" style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="image">
          <img src="/images/{{$user->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        
        <div class="info">
          <a href="#" class="d-block"> {{$user->name}}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
        @can('do-admin-operations')
        <li class="nav-item">
            <a href="/dashboard/users" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Users
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/appointments" class="nav-link">
              <i class="nav-icon far fa-clock"></i>
              <p>
                Appointments
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/tasks" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Tasks
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/contacts/list" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Contacts
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/subscribers" class="nav-link">
              <i class="nav-icon fa fa-bell"></i>
              <p>
                Subscribers
                
              </p>
            </a>
          </li>
        @endcan
         
          <li class="nav-item">
            <a href="/dashboard/appointments/{{$user->personnel->id}}/single" class="nav-link">
              <i class="nav-icon far fa-calendar "></i>
              <p>
                My Appointments
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/tasks/{{$user->personnel->id}}/single" class="nav-link">
              <i class="nav-icon fas fa-hourglass-half"></i>
              <p>
                My Tasks
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <i class="right fas fa-angle-left"></i>
              <p>
                My Profile
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/profile/{{$user->id}}" class="nav-link ">
                  <i class="far fa-eye nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/logout" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>

          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>