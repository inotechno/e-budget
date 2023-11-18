 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item text-bold"><a href="#">Home</a></li>
              <li class="breadcrumb-item" active>
                 <a href="#" class="d-inline"><?= $this->session->userdata('nama_akses'); ?></a>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img id="foto" class="profile-user-img img-fluid img-circle"
                       alt="User profile">
                </div>

                <h3 class="profile-username text-center">
                  <div class="nama_lengkap"></div>
                </h3>

                <p class="text-muted text-center">
                  <div class="jabatan text-center"></div>
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Proses Pengajuan</b> <a class="float-right" id="pengajuan_proses" href="<?= base_url('karyawan/Pengajuan_Advance') ?>"></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pengajuan Selesai</b> <a class="float-right" id="pengajuan_selesai" href="<?= base_url('karyawan/Pengajuan_Expanse') ?>"></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jumlah Pengajuan</b> <a class="float-right" id="total_pengajuan"></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-info btn-block"><b>Details</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->

          <div class="col-md-9">
            <div class="card">
              <div class="p-3 mb-2 bg-info text-white"><b>Detail Profil</b></div>
              <div class="card-body">

                    <div class="row">

                      <div class="col-md">
                        <div class="card card-info card-outline">
                          <div class="card-body">

                            <table class="table table-sm table-hover">
                              <tbody>
                                <!--  -->
                                  <tr>
                                    <td>Nama Lengkap</th>
                                    <td>:</th>
                                    <td class="nama_lengkap"></td>
                                    
                                  </tr>
                                  <tr>
                                    <td>NIK</th>
                                    <td>:</th>
                                    <td id="nik"></td>
                                    
                                  </tr>
                                  <tr>
                                    <td>TTL</th>
                                    <td>:</th>
                                    <td id="tempat_tgl_lahir"></td>
                                    
                                  </tr>
                                  <tr>
                                    <td>HP</th>
                                    <td>:</th>
                                    <td id="hp"></td>
                                    
                                  </tr>
                                  <tr>
                                    <td>Jabatan</th>
                                    <td>:</th>
                                    <td class="jabatan"></td>
                                    
                                  </tr>
                                  <tr>
                                    <td>Agama</th>
                                    <td>:</th>
                                    <td id="agama"></td>
                                    
                                  </tr>

                                <!--  -->
                              </tbody>
                            </table>
                            
                          </div>
                        </div> 
                      </div>

                      <div class="col-md">
                        <div class="card card-info card-outline">
                          <div class="card-body">

                            <table class="table table-sm table-hover">
                              <tbody>
                                <!--  -->
                                  <tr>
                                    <td>Status Akun</td>
                                    <td>:</th>
                                    <td id="status"></td>
                                  </tr>
                                  <tr>
                                    <td>Username</td>
                                    <td>:</th>
                                    <td id="username"></td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>:</th>
                                    <td id="email"></td>
                                  </tr>
                                  <tr>
                                    <td>Pendidikan</td>
                                    <td>:</th>
                                    <td id="pendidikan"></td>
                                  </tr>
                                  <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</th>
                                    <td id="jenis_kelamin"></td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td>:</th>
                                    <td id="alamat"></td>
                                  </tr>
                                <!--  -->
                              </tbody>
                            </table>
                            
                          </div>
                        </div>
                        
                      </div>

                      
                    </div>
                   
                <a href="#" class="btn btn-info btn-block"><b>Edit Profile</b></a>

            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->