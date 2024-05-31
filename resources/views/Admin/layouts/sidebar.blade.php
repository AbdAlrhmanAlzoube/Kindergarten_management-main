<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
 

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     
      <div class="info">
        <a href="#" class="d-block">Admin Dashboradr</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
   
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
        <li class="nav-item">
          <a href="#" class="nav-link">
          
            <p>
              User
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('users.index') }}">List User</a>
          </li>
          
          
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('users.create') }}" class="nav-link">
                  <p>Add User</p>
              </a>
          </li>
          
      </ul>


      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <p>
                    Forebear
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('forebears.index') }}" class="nav-link">List Forebear</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('forebears.create') }}" class="nav-link">Add Forebear</a>
                </li>
            </ul>
        </li>  
    
  
    </ul>


      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Child
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('children.index') }}" class="nav-link">List Child</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('children.create') }}" class="nav-link">Add child</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <p>
                    Teacher
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('teachers.index') }}" class="nav-link">List Teachers</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teachers.create') }}" class="nav-link">Add Teacher</a>
                </li>
            </ul>
        </li>
     </ul>


     
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
          <a href="#" class="nav-link">
              <p>
                  Advertisements
                  <i class="fas fa-angle-left right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('advertisements.index') }}" class="nav-link">List Advertisements</a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('advertisements.create') }}" class="nav-link">Add Advertisement</a>
              </li>
          </ul>
      </li>
  </ul>
  

  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="#" class="nav-link">
            <p>
          Course
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('courses.index') }}" class="nav-link">List Course</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('courses.create') }}" class="nav-link">Add Course</a>
            </li>
        </ul>
    </li>

    
    
  </li>

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <p>
                    Review
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reviews.index') }}" class="nav-link">List Review</a>
                </li>
                
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('reviews.create') }}" class="nav-link">Add Review</a>
              </li>
              
          </ul>
        </li>  
    
  
    </ul>




   
      
    
  
    </ul>
 

    </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>