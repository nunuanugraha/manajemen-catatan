<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Catatan</h1>
    </div>
    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?= $detailCatatan['judul']; ?></h4>
        </div>
        <div class="card-body">
          <p class="card-subtitle"><strong>Dibuat pada:</strong> <?= date("D, d M Y", strtotime($detailCatatan['tanggal'])); ?></p>
          <p class="card-text"><?= nl2br($detailCatatan['isi']); ?></p>
        </div>
        <div class="card-footer">
          <a href="<?= base_url('dashboard'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </section>
</div>
