<?= $this->extend('layouts/manager_layout') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
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
                    <th scope="col" style="white-space:nowrap;">Status</th>
                    <th scope="col" style="white-space:nowrap;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($cuties as $cuti) : ?>
                    <tr>
                      <th><?= $i++ ?></th>
                      <td style="white-space:nowrap;"><?= $cuti['name'] ?></td>
                      <td style="white-space:nowrap;"><?= $cuti['mulai_cuti'] ?></td>
                      <td style="white-space:nowrap;"><?= $cuti['akhir_cuti'] ?></td>
                      <td style="white-space:nowrap;"><?= $cuti['lama_cuti'] ?></td>
                      <td style="white-space:nowrap;"><?= $cuti['jenis_cuti'] ?></td>
                      <?php if ($cuti['status_cuti_id_by_senior_manager'] == 1) : ?>
                        <td style="white-space:nowrap;">
                          <div class="badge bg-primary">process</div>
                        </td>
                      <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == 2) : ?>
                        <td style="white-space:nowrap;">
                          <div class="badge bg-success">approve</div>
                        </td>
                      <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == 3) : ?>
                        <td style="white-space:nowrap;">
                          <div class="badge bg-warning">return</div>
                        </td>
                      <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == 4) : ?>
                        <td style="white-space:nowrap;">
                          <div class="badge bg-danger">reject</div>
                        </td>
                      <?php elseif ($cuti['status_cuti_id_by_senior_manager'] == null) : ?>
                        <td style="white-space:nowrap;">
                          <div class="badge bg-danger">Belum dikirim ke Senior Manager</div>
                        </td>
                      <?php endif ?>

                      <td>
                        <a href="<?= base_url('manager/cuti/' . $cuti['id']) . '/detail' ?>" class="btn btn-info text-white"> <i class="bi bi-zoom-in"></i></a>
                      </td>
                    </tr>
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