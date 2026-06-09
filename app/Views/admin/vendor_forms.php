<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<?php
$isEdit = isset($vendor);
$isDetail = isset($isDetail) && $isDetail == true;
$action = $isEdit
    ? base_url('admin/vendor/update/'.$vendor['id'])
    : base_url('admin/vendor/store');

$title = 'Tambah Vendor Baru';
if ($isEdit) $title = 'Edit Data Vendor';
if ($isDetail) $title = 'Detail Vendor';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark"><?= $title ?></h3>
    <a href="<?= base_url('admin/vendor') ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-image me-2"></i>Media & Identitas
                    </h5>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <label class="form-label fw-bold">Foto Profil Vendor</label>
                    <div class="mb-3">
                        <?php if($isEdit && !empty($vendor['foto'])): ?>
                            <img src="<?= base_url('uploads/' . $vendor['foto']) ?>" 
                                 class="rounded-4 shadow-sm border" style="width: 100%; max-width: 200px; height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-light rounded-4 d-flex align-items-center justify-content-center border border-2 border-dashed" style="width: 100%; max-width: 200px; height: 200px;">
                                <i class="bi bi-camera text-muted fs-1"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!$isDetail): ?>
                        <input type="file" name="foto" class="form-control form-control-sm shadow-sm" accept="image/*">
                        <div class="form-text small italic text-pink">* Biarkan kosong jika tidak ingin mengubah foto.</div>
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Nama Lengkap Vendor</label>
                            <input type="text" name="nama" value="<?= $isEdit ? esc($vendor['nama']) : '' ?>" 
                                   class="form-control border-2 shadow-sm" placeholder="Nama Bisnis / Brand" <?= $isDetail ? 'readonly' : 'required' ?>>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Kategori Layanan</label>
                            <input type="text" name="kategori" value="<?= $isEdit ? esc($vendor['kategori']) : '' ?>" 
                                   class="form-control border-2 shadow-sm" placeholder="MUA, Catering, MUA, dll" <?= $isDetail ? 'readonly' : '' ?>>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Estimasi Harga</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-2 shadow-sm fw-bold">Rp</span>
                                <input type="number" name="harga" value="<?= $isEdit ? esc($vendor['harga']) : '' ?>" 
                                       class="form-control border-2 shadow-sm" placeholder="Contoh: 5000000" <?= $isDetail ? 'readonly' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-geo-alt me-2"></i>Kontak & Lokasi
                    </h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nomor WhatsApp</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white border-0 shadow-sm"><i class="bi bi-whatsapp"></i></span>
                        <input type="text" name="no_telepon" value="<?= $isEdit ? esc($vendor['no_telepon']) : '' ?>" 
                               class="form-control border-2 shadow-sm" placeholder="62812xxxx" <?= $isDetail ? 'readonly' : '' ?>>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Lokasi / Wilayah</label>
                    <input type="text" name="lokasi" value="<?= $isEdit ? esc($vendor['lokasi']) : '' ?>" 
                           class="form-control border-2 shadow-sm" placeholder="Contoh: Jakarta Selatan" <?= $isDetail ? 'readonly' : '' ?>>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-file-earmark-text me-2"></i>Deskripsi & Layanan
                    </h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tentang Vendor</label>
                    <textarea name="deskripsi" class="form-control border-2 shadow-sm" rows="4" <?= $isDetail ? 'readonly' : '' ?>><?= $isEdit ? esc($vendor['deskripsi']) : '' ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Layanan yang Didapat (Include Harga Dasar)</label>
                    <textarea name="layanan" class="form-control border-2 shadow-sm" rows="4" placeholder="Contoh: Rias Pengantin, 2x Ganti Gaun, 100 Foto Cetak" <?= $isDetail ? 'readonly' : '' ?>><?= $isEdit ? esc($vendor['layanan']) : '' ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Pengalaman</label>
                    <textarea name="pengalaman" class="form-control border-2 shadow-sm" rows="3" <?= $isDetail ? 'readonly' : '' ?>><?= $isEdit ? esc($vendor['pengalaman']) : '' ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Kenapa Harus Memilih Kami?</label>
                    <textarea name="alasan" class="form-control border-2 shadow-sm" rows="3" <?= $isDetail ? 'readonly' : '' ?>><?= $isEdit ? esc($vendor['alasan']) : '' ?></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold text-danger">Catatan Admin</label>
                    <textarea name="catatan" class="form-control border-2 shadow-sm bg-light" rows="2" <?= $isDetail ? 'readonly' : '' ?>><?= $isEdit ? esc($vendor['catatan']) : '' ?></textarea>
                </div>
            </div>

            <div class="row mb-4 border-top pt-4">
                <div class="col-12">
                    <h5 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-star-fill me-2"></i>Pengaturan Trend & Wedding Reference
                    </h5>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_trend" id="isTrend" value="1" 
                               <?= ($isEdit && isset($vendor['is_trend']) && $vendor['is_trend'] == 1) ? 'checked' : '' ?> <?= $isDetail ? 'disabled' : '' ?>>
                        <label class="form-check-label fw-bold" for="isTrend">Tampilkan di Trend Home (Aplikasi)</label>
                    </div>
                    <div class="form-text text-muted small">Jika dicentang, vendor ini akan masuk ke daftar tren di halaman depan aplikasi Flutter.</div>
                    
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" name="is_wedding_reference" id="isWeddingReference" value="1" 
                               <?= ($isEdit && isset($vendor['is_wedding_reference']) && $vendor['is_wedding_reference'] == 1) ? 'checked' : '' ?> <?= $isDetail ? 'disabled' : '' ?>>
                        <label class="form-check-label fw-bold" for="isWeddingReference">Jadikan Wedding Reference</label>
                    </div>
                    <div class="form-text text-muted small">Jika dicentang, vendor ini akan menjadi salah satu kategori/koleksi di halaman Wedding Reference aplikasi Flutter.</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Wedding Reference / Trend</label>
                        <input type="text" name="wedding_reference_title" value="<?= $isEdit ? esc($vendor['wedding_reference_title']) : '' ?>" 
                               class="form-control border-2 shadow-sm" placeholder="Contoh: Garden Wedding / Modern Rustic" <?= $isDetail ? 'readonly' : '' ?>>
                        <div class="form-text text-muted small">Judul khusus tema yang ditampilkan di bagian atas Wedding Reference/Trend.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto Wedding Reference / Trend</label>
                        <?php if($isEdit && !empty($vendor['wedding_reference_foto'])): ?>
                            <div class="mb-2">
                                <img src="<?= base_url('uploads/' . $vendor['wedding_reference_foto']) ?>" 
                                     class="rounded shadow-sm border" style="max-height: 120px; object-fit: cover;">
                            </div>
                        <?php endif; ?>
                        <?php if (!$isDetail): ?>
                            <input type="file" name="wedding_reference_foto" class="form-control form-control-sm shadow-sm" accept="image/*">
                            <div class="form-text small italic text-pink">* Unggah foto bertema referensi pernikahan.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-top text-end">
                <?php if($isDetail): ?>
                    <a href="<?= base_url('admin/vendor/edit/' . $vendor['id']) ?>" class="btn btn-warning px-5 py-2 rounded-pill shadow fw-bold text-white">
                        <i class="bi bi-pencil-square me-2"></i>Edit Data Ini
                    </a>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow fw-bold">
                        <i class="bi bi-check2-circle me-2"></i><?= $isEdit ? 'Update Perubahan' : 'Simpan Vendor Baru' ?>
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<?php if ($isEdit || $isDetail): ?>
<div class="card border-0 shadow-sm rounded-4 mt-4">
    <div class="card-body p-4 p-md-5">
        <h5 class="fw-bold text-primary mb-3 border-bottom pb-2">
            <i class="bi bi-box me-2"></i>Manajemen Layanan / Paket Tambahan
        </h5>
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="table-responsive mb-4">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Layanan / Paket</th>
                        <th>Harga Tambahan</th>
                        <?php if (!$isDetail): ?><th class="text-center" style="width: 100px;">Aksi</th><?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pakets)): ?>
                        <?php foreach ($pakets as $p): ?>
                            <tr>
                                <td><?= esc($p['nama_paket']) ?></td>
                                <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                                <?php if (!$isDetail): ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/paket-vendor/delete/' . $p['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= $isDetail ? 2 : 3 ?>" class="text-center text-muted py-3">Belum ada layanan/paket yang ditambahkan untuk vendor ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if (!$isDetail): ?>
            <form action="<?= base_url('admin/paket-vendor/store') ?>" method="post" class="bg-light p-4 rounded-3 border">
                <?= csrf_field() ?>
                <input type="hidden" name="vendor_id" value="<?= $vendor['id'] ?>">
                
                <h6 class="fw-bold mb-3">Tambah Layanan / Paket Baru</h6>
                <div class="row align-items-end">
                    <div class="col-md-5 mb-3 mb-md-0">
                        <label class="form-label text-muted small fw-bold">Nama Layanan</label>
                        <input type="text" name="nama_paket" class="form-control" required placeholder="Contoh: Paket Cinematic Video">
                    </div>
                    <div class="col-md-5 mb-3 mb-md-0">
                        <label class="form-label text-muted small fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required placeholder="Contoh: 2500000" min="0">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100 fw-bold">
                            <i class="bi bi-plus-lg me-1"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?= $this->include('admin/layout/footer') ?>