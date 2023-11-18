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
         <div class="col-md-4">

           <!-- Profile Image -->
           <div class="card card-primary card-outline">
             <div class="card-body box-profile">
               <div class="text-center">
                 <img id="logo" class="profile-user-img img-fluid img-circle" alt="User profile">
               </div>

               <h3 class="profile-username text-center">
                 <div class="nama_perusahaan"></div>
               </h3>

               <p class="text-muted text-center">
               <div class="nama_lengkap text-center"></div>
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

             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->

         <div class="col-md">
           <div class="card card-info">
             <div class="card-header bg-info">Profil Perusahaan</div>
             <div class="card-body">

               <table class="table table-sm table-hover">
                 <tbody>
                   <!--  -->
                   <tr>
                     <td>Nama Perusahaan</th>
                     <td>:</th>
                     <td class="nama_perusahaan"></td>

                   </tr>
                   <tr>
                     <td>Alamat</th>
                     <td>:</th>
                     <td id="alamat"></td>

                   </tr>
                   <tr>
                     <td>Provinsi</th>
                     <td>:</th>
                     <td id="prov"></td>

                   </tr>

                   <tr>
                     <td>Kota</th>
                     <td>:</th>
                     <td id="kota"></td>

                   </tr>

                   <tr>
                     <td>Kecamatan</th>
                     <td>:</th>
                     <td id="kec"></td>

                   </tr>

                   <tr>
                     <td>Saldo Awal</th>
                     <td>:</th>
                     <td id="saldo_awal"></td>

                   </tr>

                   <!--  -->
                 </tbody>
               </table>

             </div>
             <a href="" class="btn btn-info text-center" id="update-profil-perusahaan" data-target="#profil-perusahaan-modal" data-toggle="modal">Update Perusahaan</a>
           </div>
         </div>

         <!-- /.col -->
       </div>

       <div class="row" id="data-direksi">

       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <div class="modal fade" id="profil-perusahaan-modal">
   <div class="modal-dialog modal-sm">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <h4 class="modal-title">Profil Perusahaan</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="form-perusahaan" method="POST">
           <div class="row">
             <div class="col-md">

               <div class="form-group">
                 <label for="nama_perusahaan">Nama Perusahaan</label>
                 <input type="text" name="nama_perusahaan" class="form-control form-control-sm">
               </div>
               <div class="form-group">
                 <label for="provinsi">Provinsi</label>
                 <textarea class="form-control form-control-sm" type="text" name="alamat"></textarea>
               </div>

               <div class="form-group">
                 <label for="provinsi">Provinsi</label>
                 <input class="form-control form-control-sm" type="text" name="provinsi">
               </div>

               <div class="form-group">
                 <label for="kota">Kota</label>
                 <input class="form-control form-control-sm" type="text" name="kota">
               </div>

               <div class="form-group">
                 <label for="kec">Kecamatan</label>
                 <input class="form-control form-control-sm" type="text" name="kec">
               </div>

               <div class="form-group">
                 <label>Saldo Awal</label>
                 <input type="text" name="saldo_awal" class="form-control form-control-sm currency">
               </div>
               <input type="hidden" name="logo_lama">

               <div class="preview text-center mb-3">
                 <img width="150" height="180" id="previewLogo" class="text-center">
                 <input id="ganti_logo" type="button" name="ganti_logo" class="col-md my-2 btn btn-sm btn-rounded btn-outline-warning" value="Ganti Logo">
               </div>

               <div class="form-group" id="upload_logo">
                 <label for="customFile">Logo</label>
                 <div class="custom-file">
                   <input type="file" class="custom-file-input" name="logo">
                   <label class="custom-file-label" for="logo">Pilih File</label>
                 </div>
               </div>

             </div>
           </div>
         </form>

       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" id="btn-profil-perusahaan" class="btn btn-info">Save</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>

 <div class="modal fade" id="profil-pimpinan-modal">
   <div class="modal-dialog modal-sm">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <h4 class="modal-title">Profil Pimpinan</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="form-pimpinan" method="POST">
           <div class="row">
             <div class="col-md">
               <input type="hidden" name="id">
               <div class="form-group">
                 <label for="nama_lengkap">Nama Lengkap</label>
                 <input type="text" name="nama_lengkap" class="form-control form-control-sm">
               </div>
               <div class="form-group">
                 <label for="email">Email</label>
                 <input class="form-control form-control-sm" type="email" name="email">
               </div>

               <div class="form-group">
                 <label for="username">Username</label>
                 <input class="form-control form-control-sm" type="text" name="username">
               </div>

               <div class="form-group">
                 <label for="Password">Password Baru</label>
                 <input class="form-control form-control-sm" type="text" name="password">
               </div>

               <div class="form-group">
                 <label for="konfirmasi_Password">Konfirmasi Password Baru</label>
                 <input class="form-control form-control-sm" type="text" name="konfirmasi_password">
               </div>

               <input type="hidden" name="foto_lama">

               <div class="preview text-center mb-3">
                 <img width="150" height="180" id="previewFoto" class="text-center">
                 <input id="ganti_foto" type="button" name="ganti_foto" class="col-md my-2 btn btn-sm btn-rounded btn-outline-warning" value="Ganti Foto">
               </div>

               <div class="form-group" id="upload_foto">
                 <label for="customFile">Foto</label>
                 <div class="custom-file">
                   <input type="file" class="custom-file-input" name="foto">
                   <label class="custom-file-label" for="foto">Pilih File</label>
                 </div>
               </div>

             </div>
           </div>

         </form>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" id="btn-profil-pimpinan" class="btn btn-info">Save</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>