
<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- DataTable -->
<script src="<?= base_url('assets/plugins/datatables/datatables.min.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>

<script type="text/javascript">
	
	$(function () {
		Inputmask.extendAliases({
		  rupiah: {
		            prefix: " Rp ",
		            groupSeparator: ".",
		            alias: "currency",
		            placeholder: "0",
		            autoGroup: !0,
		            digits: 0,
		            digitsOptional: !1,
		            clearMaskOnLostFocus: !1,
		            removeMaskOnSubmit: true,
		            numericInput: true,
        			autoUnmask: true,
		        }
		});
		$('#reservation').daterangepicker();
		$('.currency').inputmask({ alias : "rupiah"});
		$('[data-mask]').inputmask({
			removeMaskOnSubmit: true,
			autoUnmask: true,
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
	})
</script>
