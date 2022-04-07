<?= $this->extend('layouts/manager_layout') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Detail Cuti</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="index.html">Cuti</a></li>
        <li class="breadcrumb-item active">Detail Cuti</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <form action="<?= base_url() ?>/manager/karyawan/cuti" method="post">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Pengajuan Cuti</h5>
              <div class="my-3">
                <div class="fw-bold">Status Approve By Manager</div>
                <input type="text" name="id" value="<?= $cuti['id'] ?>" class="form-control" hidden>
                <select name="status_cuti_id_by_manager" class="form-select">
                  <?php if ($cuti['status_cuti_id_by_manager'] == 1) : ?>
                    <option value="1">process</option>
                  <?php elseif ($cuti['status_cuti_id_by_manager'] == 2) : ?>
                    <option value="2">approve</option>
                  <?php elseif ($cuti['status_cuti_id_by_manager'] == 3) : ?>
                    <option value="3">return</option>
                  <?php elseif ($cuti['status_cuti_id_by_manager'] == 4) : ?>
                    <option value="4">reject</option>
                  <?php endif ?>
                  <option value="1">process</option>
                  <option value="2">approve</option>
                  <option value="3">return</option>
                  <option value="4">reject</option>
                </select>
              </div>
              <div class="my-3">
                <div class="fw-bold">Status Approve By Senior Manager</div>
                <?php if ($cuti['status_cuti_id_by_senior_manager'] == 1) : ?>
                  <div style="white-space:nowrap;">
                    <div class="badge bg-primary">process</div>
                  </div>
                <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == 2) : ?>
                  <div style="white-space:nowrap;">
                    <div class="badge bg-success">approve</div>
                  </div>
                <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == 3) : ?>
                  <div style="white-space:nowrap;">
                    <div class="badge bg-warning">return</div>
                  </div>
                <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == 4) : ?>
                  <div style="white-space:nowrap;">
                    <div class="badge bg-danger">reject</div>
                  </div>
                <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == null) : ?>
                  <div style="white-space:nowrap;">
                    <div class="badge bg-danger">Belum dikirim ke Senior Manager</div>
                  </div>
                <?php endif ?>
              </div>
              <div class="my-3">
                <div class="fw-bold">Nama</div>
                <div><?= $cuti['name'] ?></div>
              </div>
              <div class="my-3">
                <div class="fw-bold">NIK</div>
                <div><?= $cuti['nik'] ?></div>
              </div>
              <div class="my-3">
                <div class="fw-bold">Lama Cuti</div>
                <div><?= $cuti['lama_cuti'] ?> Hari</div>
              </div>
              <div class="my-3">
                <div class="fw-bold">Tanggal Mulai Cuti</div>
                <div><?= $cuti['mulai_cuti'] ?></div>
              </div>
              <div class="my-3">
                <div class="fw-bold">Tanggal Berakhir Cuti</div>
                <div><?= $cuti['akhir_cuti'] ?></div>
              </div>
              <div class="my-3">
                <div class="fw-bold">Jenis Cuti</div>
                <div><?= $cuti['jenis_cuti'] ?></div>
              </div>
              <div class="my-3">
                <div class="fw-bold">Alasan Cuti</div>
                <div><?= $cuti['alasan_cuti'] ?></div>
              </div>
              <div class="my-3">
                <div class="fw-bold">Bukti Cuti</div>
                <div>
                  <a href="<?= base_url('assets/img/bukti-pendukung/' . $cuti['bukti_cuti']) ?>" target="_blank">
                    <img src="<?= base_url('assets/img/bukti-pendukung/' . $cuti['bukti_cuti']) ?>" width="100%">
                  </a>
                </div>
              </div>
              <div class="text-end">
                <button class="btn btn-primary" type="submit">Update</button>
                <a class="btn btn-secondary" href="<?= base_url() ?>/karyawan">Kembali</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>