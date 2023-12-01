<?php
require_once 'app/functions/MY_model.php';

$pasiens = get("SELECT * FROM pasien");
$dokters = get("SELECT * FROM dokter");
$ruangs = get("SELECT * FROM ruang");
$obats = get("SELECT * FROM obat");
?>

<div class="content-header row">

  <div class="content-header-right col-md-12">
    <a href="?page=rekam-medis" class="btn btn-light float-right mb-2">Kembali</a>
  </div>
</div>
<section id="basic-horizontal-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tambah Rekam Medis</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="app/rekam-medis/proses/create.php" method="post">
              <div class="form-body">
                <div class="row">


                <script>
                  function updateNomorIdentitas() {

                    var selectedPasien = document.getElementById('pasienSelect');
                    var nomorIdentitasInput = document.getElementById('nomorIdentitasSelect');

                    // Dapatkan nilai atribut data-nama-pasien dari opsi yang dipilih
                    var selectedNamaPasien = selectedPasien.options[selectedPasien.selectedIndex].getAttribute('data-nama-pasien');

                    // Perbarui input Nama Pasien
                    nomorIdentitasInput.value = selectedNamaPasien;

                    // Dapatkan nilai atribut data-nomor-identitas dari opsi yang dipilih
                    var selectedNomorIdentitas = selectedPasien.options[selectedPasien.selectedIndex].getAttribute('data-nomor-identitas');

                    // Perbarui baris tabel berdasarkan Nomor Identitas yang dipilih
                    updateTableRows(selectedNomorIdentitas);
                  }

                  function updateTableRows(selectedNomorIdentitas) {
                    var tableRows = document.querySelectorAll('.dataex-html5-selectors tbody tr');

                    tableRows.forEach(function (row) {
                      var rowNomorIdentitas = row.cells[2].innerText; // Asumsikan Nomor Identitas berada di kolom ketiga

                      // Tampilkan/sembunyikan baris berdasarkan Nomor Identitas yang dipilih
                      if (rowNomorIdentitas === selectedNomorIdentitas) {
                        row.style.display = '';
                      } else {
                        row.style.display = 'none';
                      }
                    });
                  }
                </script>

                <div class="col-12">
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label>Nomor Identitas</label>
                    </div>
                    <div class="col-md-8">
                    <select class="select2 form-control" name="pasien_id" id="pasienSelect" required onchange="updateNomorIdentitas()">
                      <?php foreach ($pasiens as $pasien) : ?>
                        <option value="<?= $pasien['id']; ?>" data-nomor-identitas="<?= $pasien['nomor_identitas']; ?>" data-nama-pasien="<?= $pasien['nama_pasien']; ?>">
                          <?= $pasien['nomor_identitas']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    </div>
                  </div>
                </div>

                <!-- COBA NOMOR IDENTITAS-->
                <div class="col-12">
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label>Nama Pasien</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="nama_pasien" id="nomorIdentitasSelect" required readonly>
                    </div>
                  </div>
                </div>









                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>Keluhan</label>
                      </div>
                      <div class="col-md-8">
                        <textarea class="form-control" id="basicTextarea" rows="3" placeholder="keluhan" name="keluhan" required></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>Dokter</label>
                      </div>
                      <div class="col-md-8">
                        <select class="select2 form-control" name="dokter_id" required>
                          <?php foreach ($dokters as $dokter) : ?>
                            <option value="<?= $dokter['id']; ?>"><?= $dokter['nama_dokter']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>Diagnosa</label>
                      </div>
                      <div class="col-md-8">
                        <textarea class="form-control" id="basicTextarea" rows="3" placeholder="diagnosa" name="diagnosa" required></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>obat</label>
                      </div>
                      <div class="col-md-8">
                        <select multiple class="form-control" name="obat_id[]" size="7" required>
                          <?php foreach ($obats as $obat) : ?>
                            <option value="<?= $obat['id']; ?>"><?= $obat['nama_obat']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>Ruang</label>
                      </div>
                      <div class="col-md-8">
                        <select class="select2 form-control" name="ruang_id" required>
                          <?php foreach ($ruangs as $ruang) : ?>
                            <option value="<?= $ruang['id']; ?>"><?= $ruang['nama_ruang']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>Tanggal Periksa</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="tanggal" value="<?= date('Y-m-d'); ?>" readonly class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>

              <?php
                    require_once 'app/functions/MY_model.php';
                    $rekam_medis = get("SELECT *, rm.id as rm_id FROM rekam_medis rm
                                        INNER JOIN pasien ON rm.pasien_id = pasien.id 
                                        INNER JOIN dokter ON rm.dokter_id = dokter.id 
                                        INNER JOIN ruang ON rm.ruang_id = ruang.id");

                    $no = 1;

                    $title = 'rekam_medis';
                    ?>
                    <!-- <script src="assets/vendors/js/tables/datatable/buttons.html5.min.js"></script> -->
                    <!-- User Table -->
                    <section id="column-selectors">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">

                            
                            <div class="card-content">
                              <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                <table id="rekamMedisTable" class="table table-striped dataex-html5-selectors">
                                    <thead>
                                      <tr>
                                        <th></th>
                                        <th>Tanggal Periksa</th>
                                        <th>Nomor Identitas</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Nama Dokter</th>
                                        <th>Diagnosa</th>
                                        <th>Nama Obat</th>
                                        <th>Ruang</th>
                                        <th>
                                          <i class="feather icon-settings"></i>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($rekam_medis as $rm) : ?>
                                        <tr>
                                          <td><?= $no++ ?></td>
                                          <td><?= $rm['tanggal']; ?></td>
                                          <td><?= $rm['nomor_identitas']; ?></td> <!--Nomor Identitas-->
                                          <td><?= $rm['nama_pasien']; ?></td>
                                          <td><?= $rm['keluhan']; ?></td>
                                          <td><?= $rm['nama_dokter']; ?></td>
                                          <td><?= $rm['diagnosa']; ?></td>
                                          <td>
                                            <?php
                                            $obats = mysqli_query($conn, "SELECT * FROM rm_obat JOIN obat ON rm_obat.obat_id = obat.id WHERE rm_id = '$rm[rm_id]'") or die(mysqli_error($conn));
                                            while ($obat = mysqli_fetch_assoc($obats)) {
                                              echo $obat['nama_obat'] . '<br>';
                                            }
                                            ?>
                                          </td>
                                          <td><?= $rm['nama_ruang']; ?></td>
                                          <td>
                                            <a href="?page=hapus-rekam-medis&id=<?= $rm['rm_id']; ?>" class="btn-hapus"><i class="feather icon-trash"></i></a>
                                          </td>
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
                    <!-- User Table -->
                    <?php $title = 'rekam_medis'; ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

$addon_script = ['assets/vendors/js/forms/select/select2.full.min.js', 'assets/js/scripts/forms/select/form-select2.js'];

?>