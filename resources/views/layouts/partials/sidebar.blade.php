      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="/">

          {{-- <div class="Logo">
            <i class="Logo"></i>
          </div> --}}
          <div class="sidebar-brand-text mx-3">
            @yield('title', 'Laporan Keuangan')
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Data
        </div>

        <!-- Nav Item - Pemasukan -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pemasukan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('cicilan')}}">Yang bisa di cicil</a>
              <a class="collapse-item" href="{{route('incomes')}}">Keuangan dari yang lain</a>
            </div>
          </div>

        <!-- Nav Item - Pegeluaran -->
        <li class="nav-item">
          <a class="nav-link" href="{{route('expenses')}}">
            <i class="fas fa-fw fa-external-link-alt"></i>
            <span>Pengeluaran</span></a>
        </li>

        <div class="text-center d-none d-md-inline">
          <br>
          <button class="rounded-sm border-0" id="sidebarToggle"></button>
        </div>
      </ul>