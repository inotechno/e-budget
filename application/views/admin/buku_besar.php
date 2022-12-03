<!-- Content Wrapper. Contains page content --> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buku Besar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url($this->session->userdata('link').'/Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Buku Besar</li>
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

                <div class="info-box bg-gradient-info">
                  <span class="info-box-icon"><i class="fas fa-wallet"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Debit</span>
                    <span class="info-box-number" id="saldo_debit">Rp. 200.000</span>

                    <!-- <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                      70% Increase in 30 Days
                    </span> -->
                  </div>
                  <!-- /.info-box-content -->
                </div>

              </div>

              <div class="col-md-4">

                <div class="info-box bg-gradient-secondary">
                  <span class="info-box-icon"><i class="fas fa-wallet"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Kredit</span>
                    <span class="info-box-number" id="saldo_kredit">Rp. 200.000</span>

                    <!-- <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                      70% Increase in 30 Days
                    </span> -->
                  </div>
                  <!-- /.info-box-content -->
                </div>

              </div>

              <div class="col-md-4">

                  <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="fas fa-wallet"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Saldo</span>
                      <span class="info-box-number" id="total_saldo"></span>

                      <!-- <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                      </div>
                      <span class="progress-description">
                        70% Increase in 30 Days
                      </span> -->
                    </div>
                    <!-- /.info-box-content -->
                  </div>

                </div>
                
            </div>
            <div class="card mt-2">
              <div class="card-body table-responsive">
                <table id="buku_besar" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="align-middle">No Pengajuan</th>
                      <th class="align-middle">Deskripsi</th>
                      <th class="align-middle">Debit</th>
                      <th class="align-middle">Kredit</th>
                      <th class="align-middle">Total Saldo</th>
                    </tr>
                  </thead>
                  <tbody id="show_buku_besar">
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
