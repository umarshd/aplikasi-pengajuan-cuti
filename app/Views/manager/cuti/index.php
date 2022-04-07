<?= $this->extend('layouts/manager_layout') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Cuti Karyawan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Cuti Karyawan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Cuti</h5>
            <?php if (session()->get('success')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif ?>
            <?php if (session()->get('error')) : ?>
              <div class="alert alert-danger" role="alert">
                <?= session()->get('error') ?>
              </div>
            <?php endif ?>
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col" style="white-space:nowrap;">No</th>
                    <th scope="col" style="white-space:nowrap;">Nama</th>
                    <th scope="col" style="white-space:nowrap;">Mulai Cuti</th>
                    <th scope="col" style="white-space:nowrap;">Akhir Cuti</th>
                    <th scope="col" style="white-space:nowrap;">Lama Cuti</th>
                    <th scope="col" style="white-space:nowrap;">Jenis Cuti</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($cuties as $cuti) : ?>
                    <?php if ($cuti['status_cuti_id_by_senior_manager'] == 2) : ?>
                      <tr>
                        <th><?= $i++ ?></th>
                        <td style="white-space:nowrap;"><?= $cuti['name'] ?></td>
                        <td style="white-space:nowrap;"><?= $cuti['mulai_cuti'] ?></td>
                        <td style="white-space:nowrap;"><?= $cuti['akhir_cuti'] ?></td>
                        <td style="white-space:nowrap;"><?= $cuti['lama_cuti'] ?></td>
                        <td style="white-space:nowrap;"><?= $cuti['jenis_cuti'] ?></td>

                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>