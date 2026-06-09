<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Manajemen Vendor</h3>
    <a href="<?= base_url('admin/vendor/create') ?>" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Vendor Baru
    </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3">ID</th>
                        <th class="py-3">Foto</th> 
                        <th class="py-3">Nama Vendor</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Harga</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($vendors)): ?>
                        <?php foreach ($vendors as $v): ?>
                        <tr>
                            <td class="ps-4 text-muted">#<?= $v['id'] ?></td>
                            
                            <td>
                                <?php if(!empty($v['foto']) && file_exists('uploads/' . $v['foto'])): ?>
                                    <img src="<?= base_url('uploads/' . $v['foto']) ?>" 
                                         class="rounded shadow-sm object-fit-cover" 
                                         style="width: 50px; height: 50px;" 
                                         alt="<?= esc($v['nama']) ?>">
                                <?php else: ?>
                                    <div class="bg-light rounded text-center d-flex align-items-center justify-content-center border" 
                                         style="width: 50px; height: 50px;">
                                        <i class="bi bi-image text-muted fs-5"></i>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td class="fw-bold text-dark"><?= esc($v['nama']) ?></td>
                            <td>
                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3">
                                    <?= esc($v['kategori']) ?>
                                </span>
                            </td>
                            <td class="text-success fw-bold">
                                Rp <?= number_format($v['harga'], 0, ',', '.') ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('admin/vendor/detail/' . $v['id']) ?>" 
                                       class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?= base_url('admin/vendor/edit/' . $v['id']) ?>" 
                                       class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?= base_url('admin/vendor/delete/' . $v['id']) ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Hapus vendor ini?')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center py-5">Belum ada data vendor.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>