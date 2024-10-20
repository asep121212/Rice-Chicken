<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/tenant">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

 
<!-- Data Penjualan -->
 <li class="nav-item {{ Request::is('tenant/laporans*') || Request::is('tenant/pemasukans*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
      aria-controls="collapseOne">
      <i class="fas fa-fw fa-cart-plus"></i>
      <span>Data Laporan</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <!-- Kategori -->
         <a class="collapse-item {{ Request::is('tenant/pemasukans*') ? 'active' : '' }}"
          href="{{ route('tenant.pemasukans.index') }}">Pemasukan</a>
        <a class="collapse-item {{ Request::is('tenant/laporans*') ? 'active' : '' }}"
          href="{{ route('tenant.laporans.index') }}">Pengeluaran</a>
        <!-- Produk -->
       
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
