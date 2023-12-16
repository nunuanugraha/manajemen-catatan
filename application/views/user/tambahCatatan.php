<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Buat Catatan</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <form method="POST" action="">
              <div class="card-header">
                <a href="<?= base_url('dashboard'); ?>" class="badge badge-danger">Kembali</a>
              </div>
              <div class="card-body">
              <?= $this->session->flashdata('berhasil'); ?>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Catatan</label>
                  <textarea name="isi" class="form-control" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>tanggal</label>
                  <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
