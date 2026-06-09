<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">
        <?= isset($layanan) ? 'Edit' : 'Tambah' ?> Layanan
    </h3>
    <a href="<?= base_url('admin/layanan') ?>" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<form action="<?= isset($layanan)
        ? base_url('admin/layanan/update/' . $layanan['id'])
        : base_url('admin/layanan/store') ?>"
      method="post"
      enctype="multipart/form-data"
      class="col-lg-8">

    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Layanan</label>
        <input type="text"
               name="nama"
               class="form-control"
               value="<?= old('nama', $layanan['nama'] ?? '') ?>"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Gambar Layanan</label>

        <?php if (!empty($layanan['gambar'])): ?>
            <div class="mb-2">
                <img src="<?= base_url('uploads/layanan/' . $layanan['gambar']) ?>"
                     class="rounded border"
                     style="max-width:220px">
            </div>
        <?php endif; ?>

        <input type="file"
               name="gambar"
               class="form-control"
               accept="image/*">

        <small class="text-muted">
            JPG / PNG / WEBP • Maks 2MB
        </small>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Harga Mulai</label>
        <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="number"
                name="harga"
                class="form-control"
                value="<?= old('harga', $layanan['harga'] ?? '') ?>"
                placeholder="Contoh: 15000000"
                required>
        </div>
        <small class="text-muted">Isi tanpa titik atau koma</small>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Teks Awalan</label>
        <input type="text"
            name="awalan"
            class="form-control"
            value="<?= old('awalan', $layanan['awalan'] ?? '') ?>"
            placeholder="Contoh: Professional Wedding Service">
        <small class="text-muted">
            Teks kecil di atas deskripsi / judul layanan
        </small>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi"
                  rows="4"
                  class="form-control"
                  required><?= old('deskripsi', $layanan['deskripsi'] ?? '') ?></textarea>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-save me-1"></i> Simpan
        </button>

        <a href="<?= base_url('admin/layanan') ?>" class="btn btn-outline-secondary">
            Batal
        </a>
    </div>

</form>

<?= $this->include('admin/layout/footer') ?>
