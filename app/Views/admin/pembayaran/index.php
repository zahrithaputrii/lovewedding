<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Manajemen Pembayaran</h3>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>ID Booking</th>
                        <th>Jenis</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pembayaran)): ?>
                        <?php foreach($pembayaran as $i => $p): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><strong>#<?= $p['booking_kode'] ?></strong></td>
                            <td><span class="badge bg-secondary"><?= $p['jenis'] ?></span></td>
                            <td class="text-success fw-bold">Rp <?= number_format($p['jumlah'], 0, ',', '.') ?></td>
                            <td>
                                <span class="badge <?= $p['status'] == 'diterima' ? 'bg-success' : ($p['status'] == 'pending' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                    <?= ucfirst($p['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if($p['bukti_pembayaran']): ?>
                                    <a href="<?= base_url('/uploads/' . $p['bukti_pembayaran']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                        Lihat Bukti
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted small italic">Tidak ada bukti</span>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <?php if($p['status'] == 'pending'): ?>
                                    <div class="btn-group">
                                        <a href="<?= base_url('admin/pembayaran/approve/' . $p['id']) ?>" class="btn btn-sm btn-success" onclick="return confirm('Terima pembayaran?')">Terima</a>
                                        <a href="<?= base_url('admin/pembayaran/reject/' . $p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pembayaran?')">Tolak</a>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted small">Selesai</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center py-4">Belum ada data pembayaran.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>