<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="container-fluid p-4">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold mb-1">Detail Booking #<?= $b['id'] ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/booking') ?>" class="text-decoration-none">Manajemen Booking</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end mt-3 mt-md-0">
            <a href="<?= base_url('admin/booking') ?>" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4 rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-person-circle me-2 text-primary"></i>Informasi Client
                    </h5>
                </div>
                <div class="card-body pt-0 pb-3">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td width="30%" class="text-muted small border-0">Nama Client</td>
                                    <td class="fw-bold border-0"><?= esc($b['nama_client']) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">WhatsApp</td>
                                    <td class="fw-semibold text-success">
                                        <i class="bi bi-whatsapp me-1"></i><?= esc($b['whatsapp_client']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">Email Address</td>
                                    <td class="text-muted"><?= esc($b['email_client']) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">Vendor Terpilih</td>
                                    <td class="fw-bold text-primary">
                                        <i class="bi bi-shop me-1"></i><?= esc($b['vendor_nama']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted small border-0">Total Pembayaran</td>
                                    <td class="fw-bold text-dark fs-5 border-0">
                                        Rp <?= number_format($b['total_harga'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4 rounded-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-receipt me-2 text-primary"></i>Bukti Pembayaran
                    </h5>
                </div>
                <div class="card-body text-center bg-light-subtle rounded-bottom-4">
                    <?php if (!empty($b['bukti_pembayaran'])): ?>
                        <div class="p-3 bg-white d-inline-block rounded-4 shadow-sm mb-3 border">
                            <img src="<?= base_url('uploads/pembayaran/' . $b['bukti_pembayaran']) ?>" 
                                 class="img-fluid rounded-3" 
                                 style="max-height: 500px; object-fit: contain;" 
                                 alt="Bukti Transfer"
                                 onclick="window.open(this.src)">
                        </div>
                        <p class="mb-0 text-muted">Metode: <span class="badge bg-secondary-subtle text-dark border rounded-pill px-3"><?= strtoupper($b['metode_pembayaran']) ?></span></p>
                    <?php else: ?>
                        <div class="py-5 text-muted">
                            <i class="bi bi-exclamation-circle-fill d-block fs-1 mb-3 text-warning"></i>
                            <span class="fst-italic">Client belum mengunggah bukti pembayaran.</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px;">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-gear-wide-connected me-2 text-primary"></i>Kontrol Status
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-center p-3 rounded-4 bg-light border border-dashed">
                        <p class="small text-muted mb-2 text-uppercase tracking-wider">Status Saat Ini</p>
                        <?php 
                            $badgeClass = 'bg-danger';
                            if($b['status'] == 'pending') $badgeClass = 'bg-warning text-dark';
                            if($b['status'] == 'confirmed') $badgeClass = 'bg-success';
                        ?>
                        <span class="badge <?= $badgeClass ?> rounded-pill px-4 py-2 fs-6 shadow-sm">
                            <?= strtoupper($b['status']) ?>
                        </span>
                    </div>

                    <form action="<?= base_url('admin/booking/status/' . $b['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Update Status Booking:</label>
                            <select name="status" class="form-select rounded-3 py-2 border-light shadow-sm">
                                <option value="pending" <?= $b['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="confirmed" <?= $b['status'] == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                <option value="cancelled" <?= $b['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                            <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
                <div class="card-footer bg-light border-0 py-3 rounded-bottom-4">
                    <div class="d-flex align-items-center text-muted">
                        <i class="bi bi-info-circle fs-5 me-2 text-primary"></i>
                        <small class="lh-sm">Status yang telah diubah akan otomatis ter-update di panel Client.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>