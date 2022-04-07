<?= $this->extend('layouts/karyawan_layout') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Ajukan Cuti</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="index.html">Cuti</a></li>
        <li class="breadcrumb-item active">Ajukan Cuti</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Pengajuan Cuti</h5>
            <form action="<?= base_url() ?>/karyawan/cuti/tambah" method="post" enctype="multipart/form-data">
              <div class="form-group my-3">
                <label>Nama</label>
                <input type="text" name="id" class="form-control" value="<?= $user['id'] ?>" hidden>
                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" disabled>
              </div>
              <div class="form-group my-3">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control">
              </div>
              <div class="form-group my-3">
                <label>Tanggal Mulai Cuti</label>
                <input type="date" name="mulai_cuti" class="form-control">
              </div>
              <div class="form-group my-3">
                <label>Tanggal Selesai Cuti</label>
                <input type="date" name="akhir_cuti" class="form-control">
              </div>
              <div class="form-group my-3">
                <label>Lama Cuti ( Hari )</label>
                <input type="text" name="lama_cuti" class="form-control">
              </div>
              <div class="form-group my-3">
                <label>Jenis Cuti</label>
                <select name="jenis_cuti" class="form-select">
                  <option disabled selected>Pilih Jenis Cuti</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Menikah">Menikah</option>
                  <option value="Dinas Keluar Kota">Dinas Keluar Kota</option>
                  <option value="Melahirkan">Melahirkan</option>
                </select>
              </div>
              <div class="form-group my-3">
                <label>Alasan Cuti</label>
                <textarea name="alasan_cuti" cols="30" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group my-3">
                <label>Bukti Pendukung</label>
                <input type="file" name="bukti_pendukung" class="form-control">
              </div>
              <div class="form-group my-3">
                <label>Ajukan Cuti Ke</label>
                <select name="ajukan_cuti" class="form-select">
                  <option selected disabled>Pilih tujuan</option>
                  <option value="Manager">Manager</option>
                  <option value="Senior Manager">Senior Manager</option>
                </select>
              </div>
              <div class="text-end">
                <button class="btn btn-primary" type="submit">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>