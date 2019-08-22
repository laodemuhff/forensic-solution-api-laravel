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
        Tabel
      </div>

      <!-- Nav Item - Aplikasi -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/apps">
          <i class="fas fa-fw fa-table"></i>
          <span>Aplikasi</span></a>
      </li>

      <!-- Nav Item - Karakteristik -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/chars">
          <i class="fas fa-fw fa-table"></i>
          <span>Karakteristik</span></a>
      </li>

      <!-- Nav Item - Aturan -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin/aturan">
          <i class="fas fa-fw fa-table"></i>
          <span>Aturan</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="/admin/users">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Users</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin/histories">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Histories</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      @else
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Cek Tools</span></a>
      </li>
      @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>