
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="advance"></h3>

                <p>Advance</p>
              </div>
              <div class="icon">
                <i class="fab fa-angular"></i>
              </div>
              <a href="<?= site_url($this->session->userdata('link').'/Pengajuan_Advance') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="expanse"></h3>

                <p>Expanse</p>
              </div>
              <div class="icon">
                <i class="fas fa-balance-scale"></i>
              </div>
              <a href="<?= site_url($this->session->userdata('link').'/Pengajuan_Expanse') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="karyawan"></h3>

                <p>Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <?php 
                if ($this->session->userdata('level')!=2) {?>
                  <a href="<?= site_url($this->session->userdata('link').'/Daftar_Karyawan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <?php }else{ ?>
                   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="total_saldo"></h3>

                <p>Sisa Saldo</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
              </div>

              <?php 
                if ($this->session->userdata('level')!=2) {?>
                  <a href="<?= site_url($this->session->userdata('link').'/Buku_Besar') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <?php }else{ ?>
                   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 <?php } ?>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg connectedSortable">
            
             <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Grafik Tahun <span class="tahun"></span>
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper