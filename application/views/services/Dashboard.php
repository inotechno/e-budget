
<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js')?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js')?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js')?>"></script>
<script type="text/javascript">
	// Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
  var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  //$('#revenue-chart').get(0).getContext('2d');
  $.ajax({
  	url: '<?= site_url('direktur/Dashboard/get_debit_kredit') ?>',
  	type: 'GET',
  	dataType: 'JSON',
  	success:function (data) {
  		$.each(data, function(chart) {
  			var label = [];
	        var debit = [];
	        var kredit = [];
	          for (var i in data.chart) {
	            debit.push(data.chart[i].debit);
	            kredit.push(data.chart[i].kredit);
	            label.push(bulan[data.chart[i].daftar_bulan]);
	          };
		  	var salesGraphChartData = {
			    labels  : label,
			    datasets: [
			      {
			        label               : 'Debit',
			        fill                : false,
			        borderWidth         : 2,
			        lineTension         : 0,
			        spanGaps : true,
			        borderColor         : '#efefef',
			        pointRadius         : 3,
			        pointHoverRadius    : 7,
			        pointColor          : '#efefef',
			        pointBackgroundColor: '#efefef',
			        data                : debit
			      },
			      {
			        label               : 'Kredit',
			        fill                : false,
			        borderWidth         : 2,
			        lineTension         : 0,
			        spanGaps : true,
			        borderColor         : '#000000',
			        pointRadius         : 3,
			        pointHoverRadius    : 7,
			        pointColor          : '#000000',
			        pointBackgroundColor: '#000000',
			        data                : kredit
			      }
			    ]
			};

			var salesGraphChartOptions = {
		    maintainAspectRatio : false,
		    responsive : true,
		    legend: {
		      display: false,
		    },
		    scales: {
		      xAxes: [{
		        ticks : {
		          fontColor: '#efefef',
		        },
		        gridLines : {
		          display : false,
		          color: '#efefef',
		          drawBorder: false,
		        }
		      }],
		      yAxes: [{
		        ticks : {
		          stepSize: 5000,
		          fontColor: '#efefef',
		        },
		        gridLines : {
		          display : true,
		          color: '#efefef',
		          drawBorder: false,
		        }
		      }]
		    }
		  }

		  // This will get the first returned node in the jQuery collection.
		  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
		      type: 'line', 
		      data: salesGraphChartData, 
		      options: salesGraphChartOptions
		    }
		  )
  		});

  		$.each(data, function(advanse, expanse, karyawan, total_saldo) {
  			$('#advance').html(data.advance);
  			$('#expanse').html(data.expanse);
  			$('#karyawan').html(data.karyawan);
  			$('#total_saldo').html(data.total_saldo);
  			$('.tahun').html(new Date().getFullYear());
  		});
	  }

  });
  $('#logout').click(function() {
		    Swal.fire({
		      title: 'Are you sure ?',
		      text: "Apakah Anda Ingin Logout",
		      icon: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Ya, Logout!'
		    }).then((result) => {
		      if (result.value) {
		        window.location.href = '<?= base_url('logout') ?>';
		        Swal.fire(
		          'Sukses!',
		          'Anda Telah Logout',
		          'success'
		        )
		      } 
		    });
		});	
  

  

</script>
</body>
</html>