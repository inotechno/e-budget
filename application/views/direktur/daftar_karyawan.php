<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url($this->session->userdata('link').'/Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Karyawan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-12">
            <div class="row">

                <div class="col-md-4">

                  <!-- <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control form-control-sm float-right" id="reservation">
                    </div>
                  </div> -->

                </div>
                
            </div>
            <div class="card mt-2">
              <!-- <div class="card-header">
                <h3 class="card-title">DAFTAR PENGAJUAN ADVANCE</h3>
              </div> -->
              <!-- /.card-header -->

              <div class="card-body table-responsive">
                <table id="daftar_karyawan" class="table table-bordered table-hover table-sm">
                  <thead>
                    <tr>
                      <th class="align-middle">Foto</th>
                      <th class="align-middle">NIK</th>
                      <th class="align-middle">Nama Lengkap</th>
                      <th class="align-middle">Tempat, Tgl Lahir</th>
                    </tr>
                  </thead>
                  <tbody id="show_daftar_karyawan">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="add-karyawan-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Tambah Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-karyawan" method="POST">
            <div class="row">
              <div class="col-md">
                
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control form-control-sm" data-inputmask='"mask": "999 9999 9999 9999 99"' data-mask name="nik">
                </div>
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                  <label for="tempat_lahir">Tempat, Tgl Lahir</label>
                  <div class="row">
                    <div class="col-6">
                      <input class="form-control form-control-sm" type="text" name="tempat_lahir">
                    </div>
                    <div class="col-6">
                      <input class="form-control form-control-sm" type="date" name="tanggal_lahir">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="hp">HP</label>
                  <input type="text" class="form-control form-control-sm" data-inputmask='"mask": "+99 9999 999 9999"' data-mask name="hp">
                </div>

                <div class="form-group">
                  <label for="Jabatan">Jabatan</label>
                  <input type="text" class="form-control form-control-sm" name="jabatan">
                </div>

                <div class="form-group">
                  <label for="Pendidikan">Pendidikan</label>
                  <select class="form-control form-control-sm" name="pendidikan">
                    <option value="SD">SD</option>
                    <option value="SMP Sederajat">SMP Sederajat</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                    <option value="D3">D3</option>
                    <option value="D2">D2</option>
                    <option value="D1">D1</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control form-control-sm" name="alamat"></textarea>
                </div>

              </div>

              <div class="col-md">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control form-control-sm" name="jenis_kelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label for="agama">Agama</label>
                      <select class="form-control form-control-sm" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control form-control-sm">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control form-control-sm">
                    </div>
                  </div>  

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="konfirmasi_password">Konfirmasi Password</label>
                      <input type="password" id="konfirmasi-password" class="form-control form-control-sm">
                    </div>
                  </div>  
                </div>


                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" name="email" class="form-control form-control-sm">
                </div>

                <div class="preview text-center mb-3">
                    <img width="150" height="180" id="previewFoto" class="text-center" src="<?= base_url('assets/dist/img/karyawan/default.jpg') ?>">
                </div>

                <div class="form-group">
                  <label for="customFile">Foto</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" id="foto">
                    <label class="custom-file-label" for="foto">Pilih File</label>
                  </div>
                </div>

              </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-add-karyawan" class="btn btn-info">Save</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="detail-karyawan-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Detail Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-karyawan" method="POST">
            <div class="row">
              <div class="col-md">
                <input type="hidden" name="id_detail" id="id_detail">
                <input type="hidden" name="foto_lama" id="foto_lama">

                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control form-control-sm" data-inputmask='"mask": "999 99999 9999 9999"' data-mask name="nik_detail">
                </div>
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap_detail" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                  <label for="tempat_lahir">Tempat, Tgl Lahir</label>
                  <div class="row">
                    <div class="col-6">
                      <input class="form-control form-control-sm" type="text" name="tempat_lahir_detail">
                    </div>
                    <div class="col-6">
                      <input class="form-control form-control-sm" type="date" name="tanggal_lahir_detail">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="hp">HP</label>
                  <input type="text" class="form-control form-control-sm" data-inputmask='"mask": "+99 9999 999 9999"' data-mask name="hp_detail">
                </div>

                <div class="form-group">
                  <label for="Jabatan">Jabatan</label>
                  <input type="text" class="form-control form-control-sm" name="jabatan_detail">
                </div>

                <div class="form-group">
                  <label for="Pendidikan">Pendidikan</label>
                  <select class="form-control form-control-sm" name="pendidikan_detail">
                    <option value="SD">SD</option>
                    <option value="SMP Sederajat">SMP Sederajat</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                    <option value="D3">D3</option>
                    <option value="D2">D2</option>
                    <option value="D1">D1</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control form-control-sm" name="alamat_detail"></textarea>
                </div>

              </div>

              <div class="col-md">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control form-control-sm" name="jenis_kelamin_detail">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label for="agama">Agama</label>
                      <select class="form-control form-control-sm" name="agama_detail">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username_detail" class="form-control form-control-sm">
                </div>

                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" name="email_detail" class="form-control form-control-sm">
                </div>

                <div class="preview text-center mb-3">
                    <img width="150" height="180" id="previewFoto_Detail" class="text-center">
                    <input id="ganti_foto" type="button" name="ganti_foto" class="col-md my-2 btn btn-sm btn-rounded btn-outline-warning" value="Ganti Foto">
                </div>

                <div class="form-group" id="upload_foto">
                  <label for="customFile">Foto</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto_detail" id="foto_Detail">
                    <label class="custom-file-label" for="foto">Pilih File</label>
                  </div>
                </div>

              </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-update-karyawan" class="btn btn-info">Update</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->