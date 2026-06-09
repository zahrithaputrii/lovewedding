<div class="sidebar shadow">
    <h5 class="text-center py-4 fw-bold text-white">Love Wedding</h5>
    
    <div class="nav flex-column mt-2">
        <a href="<?= base_url('admin/dashboard') ?>" class="<?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
            <i class="bi bi-grid-fill me-2"></i> Dashboard
        </a>

        <a href="<?= base_url('admin/booking') ?>" class="<?= (uri_string() == 'admin/booking' || strpos(uri_string(), 'admin/booking') !== false) ? 'active' : '' ?>">
            <i class="bi bi-calendar-event me-2"></i> Booking
        </a>

        <a href="<?= base_url('admin/layanan') ?>" class="<?= (uri_string() == 'admin/layanan') ? 'active' : '' ?>">
            <i class="bi bi-box-seam me-2"></i> Layanan
        </a>

        <a href="<?= base_url('admin/vendor') ?>" class="<?= (uri_string() == 'admin/vendor') ? 'active' : '' ?>">
            <i class="bi bi-shop me-2"></i> Vendor
        </a>

        <hr class="text-white-50 mx-3 my-4">

        <a href="<?= base_url('logout') ?>" onclick="return confirm('Yakin ingin keluar?')">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </div>
</div>

<div class="main-content">