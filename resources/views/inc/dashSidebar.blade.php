<div class="sidebar">
  <!-- Sidebar -->
  <div class="sidebar-header">
    <div class="lg-logo">
      <a href="{{ route('dashboard.index') }}">
        <img src="{{ asset('dashboard-assets/images/logo.png') }}" alt="logo large">
      </a>
    </div>
    <div class="sm-logo">
      <a href="{{ route('dashboard.index') }}">
        <img src="{{ asset('dashboard-assets/images/small-logo.png') }}" alt="logo small">
      </a>
    </div>
  </div>

  <div class="sidebar-body custom-scrollbar">
    <ul class="sidebar-menu">
      <li><a href="{{ route('dashboard.index') }}" class="sidebar-link active"><i class="fa-solid fa-house"></i>
          <p>Dashboard</p>
        </a></li>
      <li><a href="{{ route('admin.getProducts') }}" class="sidebar-link"><i class="fa-brands fa-discourse"></i>
          <p>All Products</p>
        </a></li>
      <li><a href="{{ route('admin.createProduct') }}" class="sidebar-link"><i class="fa-solid fa-user"></i>
          <p>Create Product</p>
        </a></li>
      <li><a href="{{ route('admin.getCategories') }}" class="sidebar-link"><i class="fa-solid fa-user"></i>
          <p>All Categories</p>
        </a></li>

      <li><a href="{{ route('admin.createCategory') }}" class="sidebar-link"><i class="fa-solid fa-user"></i>
          <p>Create Category</p>
        </a></li>

      <li><a href="#" class="sidebar-link"><i class="fa-solid fa-chalkboard-user"></i>
          <p>Teachers</p>
        </a></li>
      <li><a href="#" class="sidebar-link"><i class="fa-solid fa-chalkboard-user"></i>
          <p>Add Category</p>
        </a></li>
      {{-- <li><a href="{{ route('dashboard.library') }}" class="sidebar-link"><i class="fa-solid fa-book"></i>
      <p>Library</p></a></li>
      <li><a href="{{ route('dashboard.department') }}" class="sidebar-link"><i class="fa-solid fa-building"></i>
          <p>Department</p>
        </a></li>
      <li><a href="{{ route('dashboard.staff') }}" class="sidebar-link"><i class="fa-solid fa-users"></i>
          <p>Staff</p>
        </a></li>
      <li><a href="{{ route('dashboard.fees') }}" class="sidebar-link"><i class="fa-solid fa-dollar-sign"></i>
          <p>Fees</p>
        </a></li> --}}

      <!-- Pages -->
      {{-- <li>
                <a href="#" class="sidebar-link submenu-parent"><i class="fa-solid fa-list"></i><p>Pages <i class="fa-solid fa-chevron-right right-icon"></i></p></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.login') }}" class="submenu-link">Login</a></li>
      <li><a href="{{ route('dashboard.signup') }}" class="submenu-link">Register</a></li>
      <li><a href="{{ route('dashboard.forgot') }}" class="submenu-link">Forgot password</a></li>
      <li><a href="{{ route('dashboard.404') }}" class="submenu-link">404 page</a></li>
      <li><a href="{{ route('dashboard.500') }}" class="submenu-link">500 page</a></li>
    </ul>
    </li> --}}

    <!-- Tables -->
    {{-- <li>
                <a href="#" class="sidebar-link submenu-parent"><i class="fa-solid fa-list"></i><p>Table <i class="fa-solid fa-chevron-right right-icon"></i></p></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.tableBootstrap') }}" class="submenu-link">Bootstrap</a></li>
    <li><a href="{{ route('dashboard.dataTable') }}" class="submenu-link">DataTable</a></li>
    </ul>
    </li> --}}

    <!-- Components -->
    {{-- <li>
                <a href="#" class="sidebar-link submenu-parent"><i class="fa-solid fa-list"></i><p>Components <i class="fa-solid fa-chevron-right right-icon"></i></p></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.form') }}" class="submenu-link">Form Element</a></li>
    </ul>
    </li> --}}
    </ul>
  </div>
</div>