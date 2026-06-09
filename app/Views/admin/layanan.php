<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Manajemen Layanan</h3>
    <a href="<?= base_url('admin/layanan/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Layanan
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success shadow-sm">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="4%">#</th>
                    <th width="8%">Gambar</th>
                    <th width="15%">Nama</th>
                    <th width="18%">Awalan</th>
                    <th>Deskripsi</th>
                    <th width="12%">Harga</th>
                    <th width="13%" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($layanan)): ?>
                <?php foreach ($layanan as $i => $l): ?>
                    <tr>
                        <td class="text-muted"><?= $i + 1 ?></td>

                        <td>
                            <?php if (!empty($l['gambar'])): ?>
                                <img src="<?= base_url('uploads/layanan/' . $l['gambar']) ?>"
                                     class="rounded border"
                                     style="width:50px;height:50px;object-fit:cover">
                            <?php else: ?>
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded"
                                     style="width:50px;height:50px">
                                    <i class="bi bi-image"></i>
                                </div>
                            <?php endif; ?>
                        </td>

                        <td class="fw-semibold"><?= esc($l['nama']) ?></td>

                        <td class="small text-muted">
                            <?= esc(strlen($l['awalan']) > 60
                                ? substr($l['awalan'], 0, 60) . '...'
                                : $l['awalan']) ?>
                        </td>

                        <td class="small text-muted">
                            <?= esc(strlen($l['deskripsi']) > 80
                                ? substr($l['deskripsi'], 0, 80) . '...'
                                : $l['deskripsi']) ?>
                        </td>

                        <td class="fw-semibold text-success">
                            Rp <?= number_format($l['harga'], 0, ',', '.') ?>
                        </td>

                        <td class="text-center">
                            <a href="<?= base_url('admin/layanan/edit/' . $l['id']) ?>"
                               class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <a href="<?= base_url('admin/layanan/delete/' . $l['id']) ?>"
                               onclick="return confirm('Yakin ingin menghapus layanan ini?')"
                               class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        Belum ada data layanan
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>
