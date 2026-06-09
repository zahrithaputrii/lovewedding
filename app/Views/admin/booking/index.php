<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h3 class="fw-bold mb-0 text-dark">Manajemen Booking</h3>
        <p class="text-muted small">Daftar pesanan aktif di sistem Anda.</p>
    </div>
    <div class="col-md-6">
        <form action="<?= base_url('admin/booking') ?>" method="get" class="d-flex justify-content-md-end mt-3 mt-md-0">
            <div class="input-group shadow-sm rounded-pill overflow-hidden" style="max-width: 350px; background: white;">
                <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" class="form-control border-0 ps-3" placeholder="Cari Nama atau ID...">
                <button class="btn btn-white border-0 px-3 text-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
                <?php if (!empty($keyword)): ?>
                    <a href="<?= base_url('admin/booking') ?>" class="btn btn-white border-0 text-danger pe-3">
                        <i class="bi bi-x-circle"></i>
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success border-0 shadow-sm animate-fadeIn">
        <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted uppercase">
                <tr style="font-size: 0.75rem;">
                    <th class="ps-4 py-3">ID</th>
                    <th>Client</th>
                    <th>Vendor</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-center pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($booking)): ?>
                <?php foreach ($booking as $b): ?>
                    <tr>
                        <td class="ps-4 text-muted small">#<?= $b['id'] ?></td>
                        <td>
                            <div class="fw-bold text-dark"><?= esc($b['nama_client']) ?></div>
                            <div class="small text-muted"><?= esc($b['whatsapp_client']) ?></div>
                        </td>
                        <td><span class="text-primary fw-semibold small"><?= esc($b['vendor_nama']) ?></span></td>
                        <td><div class="small fw-medium text-dark"><?= date('d M Y', strtotime($b['tanggal_pernikahan'])) ?></div></td>
                        <td>
                            <?php 
                                $badgeClass = 'bg-danger-subtle text-danger border-danger';
                                if($b['status'] == 'pending') $badgeClass = 'bg-warning-subtle text-warning-emphasis border-warning';
                                if($b['status'] == 'confirmed') $badgeClass = 'bg-success-subtle text-success border-success';
                            ?>
                            <span class="badge border <?= $badgeClass ?> rounded-pill px-3 py-2 fw-bold" style="font-size: 0.65rem;">
                                <?= strtoupper($b['status']) ?>
                            </span>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('admin/booking/detail/' . $b['id']) ?>" class="btn btn-sm btn-info text-white rounded-pill px-3 shadow-sm py-1">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="<?= base_url('admin/booking/delete/' . $b['id']) ?>" class="btn btn-sm btn-danger text-white rounded-pill px-3 shadow-sm py-1" onclick="return confirm('Hapus booking ini dari sistem?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2 opacity-25"></i>
                        Data tidak ditemukan.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .rounded-4 { border-radius: 1rem !important; }
    .bg-light { background-color: #f8f9fa !important; }
    .animate-fadeIn { animation: fadeIn 0.4s; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>

<?= $this->include('admin/layout/footer') ?>