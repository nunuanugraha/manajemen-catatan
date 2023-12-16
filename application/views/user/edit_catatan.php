<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Welcome To Management Note</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href=" <?= base_url('dashboard/tambahCatatan'); ?> " class="btn btn-sm btn-warning">Tambah catatan</a>
            </div>
            <div class="card-body">
              <div class="table-responsive table">
                <table class="table table-striped" id="example">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Hari/Tanggal</th>
                      <th>Judul</th>
                      <th>catatan</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($catatan as $c) : ?>
                    <tr>
                      <td> <?= $no++;  ?> </td>
                      <td> <?= date("D, d M Y", strtotime($c['tanggal'])); ?> </td>
                      <td> <?= $c['judul']; ?></td>
                      <td> <?= $c['isi']; ?></td>
                      <td class="text-center">
                      <a href="<?= base_url('dashboard/edit_catatan/' . $c['id']); ?>" class="btn btn-info btn-xs" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                          </td>
                          <td class="text-center">
                          <form action="<?php echo base_url('dashboard/delete_catatan') ?>" method="post">
                          <input type="hidden" name="id" value="<?= $c['id']; ?>">
                          <button class="btn btn-danger btn-xs btn-delete" type="submit" data-original-title="delete" data-placement="top" data-toggle="tooltip"><i class="fas fa-trash"></i></button>
                          </form>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
      