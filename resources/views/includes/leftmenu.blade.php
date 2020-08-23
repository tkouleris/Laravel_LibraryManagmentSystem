    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="padding-top:5px;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library Managment System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-columns"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/books') }}" >
          <i class="fas fa-book"></i>
          <span>Books</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/authors') }}" >
          <i class="fas fa-pen-nib"></i>
          <span>Authors</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/borrowers') }}" >
          <i class="fas fa-user-edit"></i>
          <span>Borrowers</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Borrowings</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions:</h6>
            <a class="collapse-item" href="{{ url('/borrowings') }}" >Borrowings List</a>

            @if (\Request::is('borrowings'))
              <a class="collapse-item" data-toggle="modal" href="#borrowing_form">New Borrowing</a>
            @endif

          </div>
        </div>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/register') }}" >
          <i class="fas fa-user-edit"></i> Register User
        </a>
      </li>

    </ul>
    <!-- End of Sidebar -->
