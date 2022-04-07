<?= $this->extend('layouts/karyawan_layout') ?>

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
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Detail Pengajuan Cuti</h5>
            <div class="my-3">
              <div class="fw-bold">Nama</div>
              <div><?= $user['name'] ?></div>
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
              <a class="btn btn-primary" href="<?= base_url() ?>/karyawan">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>