<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Update Catatan</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
          <?= $this->session->flashdata('berhasil2'); ?>
            <form method="POST" action="<?= base_url('dashboard/updateCatatan'); ?>">
              <div class="card-header">
                <a href="<?= base_url('dashboard'); ?>" class="badge badge-danger">Kembali</a>
              </div>
              <div class="card-body">
                <input type="hidden" name="id" value="<?= $detailCatatan['id']; ?>">
                <div class="form-group">
                  <label>Judul Catatan</label>
                  <input type="text" name="judul" class="form-control" value="<?= $detailCatatan['judul']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Isi Catatan</label>
                  <textarea name="isi" class="form-control" required><?= $detailCatatan['isi']; ?></textarea>
                </div>
                <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
