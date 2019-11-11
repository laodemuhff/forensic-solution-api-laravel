<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-text mx-3">Skripsi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      @if (Auth::user()->admin == 1)

      <!-- Heading -->
      <div class="sidebar-heading">
        Expert Table
      </div>

      <!-- Nav Item - Functionality -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/funcs">
          <i class="fas fa-fw fa-table"></i>
          <span>Functionality</span></a>
      </li>

      <!-- Nav Item - Characteristics -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/chars">
          <i class="fas fa-fw fa-table"></i>
          <span>Characteristics</span></a>
      </li>

      <!-- Nav Item - Tool -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/tools">
          <i class="fas fa-fw fa-table"></i>
          <span>Tool</span></a>
      </li>

      <!-- Nav Item - Rule -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/rules">
          <i class="fas fa-fw fa-table"></i>
          <span>Rule</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        User Table
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="/admin/users">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Users</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin/allhistories">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Histories</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      @else
      <li class="nav-item active">
        <a class="nav-link" href="/admin/checktools">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Check Tools</span></a>
      </li>

      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="/admin/profil">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profil</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin/histories">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Histories</span></a>
      </li>
      @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>