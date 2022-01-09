<!-- Sidebar -->
<ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard'); ?>">
        <!-- <img src="<?= base_url('assets/adm/img/logo_baru.png'); ?>" class="rounded mx-auto d-block" width="180"> -->
        UTNGL
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $sidebar == "course" ? "active" : "" ?>">
        <a class="nav-link" href="<?= site_url('admin/course'); ?>">
            <i class="fas fa-pencil-ruler"></i>
            <span>Course</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $sidebar == "kategori-course" ? "active" : "" ?>">
        <a class="nav-link" href="<?= site_url('admin/kategori-course'); ?>">
            <i class="fas fa-tag"></i>
            <span>Kategori Course</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $sidebar == "pretest" ? "active" : "" ?>">
        <a class="nav-link" href="<?= site_url('admin/pretest'); ?>">
            <i class="fas fa-clipboard-list"></i>
            <span>Pretest</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $sidebar == "event" ? "active" : "" ?>">
        <a class="nav-link" href="<?= site_url('admin/event'); ?>">
            <i class="fas fa-calendar-check"></i>
            <span>Event</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $sidebar == "ngl" ? "active" : "" ?>">
        <a class="nav-link" href="<?= site_url('admin/ngl'); ?>">
            <i class="fas fa-user-tie"></i>
            <span>Next Gen Leaders</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $sidebar == "payment" ? "active" : "" ?>">
        <a class="nav-link" href="<?= site_url('admin/payment'); ?>">
            <i class="fas fa-user-tie"></i>
            <span>Payment</span>
        </a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('user'); ?>">
            <i class="fas fa-user"></i>
            <span>Pengguna</span>
        </a>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('transaction'); ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Transaksi</span>
        </a>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('week'); ?>">
            <i class="fas fa-calendar-alt"></i>
            <span>Tabel Mingguan</span>
        </a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 " id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">