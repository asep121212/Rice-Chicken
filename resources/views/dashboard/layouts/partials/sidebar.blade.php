<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('dashboard') || Request::is('dashboard/profiles*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master Data
  </div>

  <!-- Data Produk -->
  <li class="nav-item {{ Request::is('dashboard/categories*') || Request::is('dashboard/products*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cart-plus"></i>
      <span>Data Produk</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <!-- Kategori -->
        <a class="collapse-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
          href="{{ route('categories.index') }}">Kategori</a>
        <!-- Produk -->
        <a class="collapse-item {{ Request::is('dashboard/products*') ? 'active' : '' }}"
          href="{{ route('products.index') }}">Produk</a>
      </div>
    </div>
  </li>

  <!-- Data Diskon -->
  <li class="nav-item {{ Request::is('dashboard/discounts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('discounts.index') }}">
      <i class="fas fa-fw fa-file"></i>
      <span>Data Diskon</span></a>
  </li>


<!-- Data Penjualan -->
<li class="nav-item {{ Request::is('dashboard/laporans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('laporans.index') }}">
      <i class="fas fa-fw fa-cart-plus"></i>
      <span>Data Laporan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
