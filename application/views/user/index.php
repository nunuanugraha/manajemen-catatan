
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Welcome To Management Note</h1>
    </div>
    <div class="section-body">
    <form action="<?= base_url('dashboard/search'); ?>" method="GET">
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Catatan" name="keyword" autocomplete="off" autofocus>
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
    </div>
  </form>
  <form action="<?= base_url('dashboard/sort'); ?>" method="GET">
  <div class="input-group mb-3">
    <select name="sort" class="custom-select">
      <option value="judul_asc">Judul A-Z</option>
      <option value="tanggal_asc">Tanggal Terlama</option>
      <option value="tanggal_desc">Tanggal Terbaru</option>
    </select>
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">Urutkan</button>
    </div>
  </div>
</form>
      <div class="row">
        <?php foreach ($catatan as $c) : ?>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title"><?= $c['judul']; ?></h4>
                <p class="card-subtitle"><?= date("D, d M Y", strtotime($c['tanggal'])); ?></p>
              </div>
              <div class="card-body">
                <p class="card-text"><?= substr($c['isi'], 0, 100); ?>...</p>
              </div>
              <div class="card-footer">
                <a href="<?= base_url('dashboard/detail_catatan/'.$c['id']); ?>" class="btn btn-sm btn-primary">Lihat</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
