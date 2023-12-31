<script type="text/javascript">
	$(document).ready(function() {
		var base_url = '<?= base_url('assets/dist/img') ?>';
		view_setting();

		function view_setting() {
			$.ajax({
				url: '<?= site_url('admin/setting/view_setting') ?>',
				type: 'GET',
				dataType: 'JSON',
				success: function(data) {
					console.log(data);
					var direksi = '';
					$.each(data.direksi, function(i, v) {
						direksi += '<div class="col-md-6 col-lg-6 col-xl-3">' +
							'   <div class="card card-info">' +
							'     <div class="card-header bg-info">Profil Pimpinan</div>' +
							'		<div class="card-body">' +
							'		<table class="table table-sm table-hover">' +
							'			<tbody>' +
							'			<tr>' +
							'				<td>Nama Lengkap</td>' +
							'				<td>:</th>' +
							'				<td class="nama_lengkap_direktur">' + v.nama_lengkap + '</td>' +
							'			</tr>' +
							'			<tr>' +
							'				<td>Username</td>' +
							'				<td>:</th>' +
							'				<td class="username">' + v.username + '</td>' +
							'			</tr>' +
							'			<tr>' +
							'				<td>Email</td>' +
							'				<td>:</th>' +
							'				<td class="email">' + v.email + '</td>' +
							'			</tr>' +
							'			<tr>' +
							'				<td>Status</td>' +
							'				<td>:</th>' +
							'				<td class="status">' + v.status + '</td>' +
							'			</tr>' +
							'			</tbody>' +
							'		</table>' +
							'		</div>' +
							'		<a href="#" class="btn btn-info text-center update-profil-pimpinan" data-foto="' + v.foto + '" data-nama="' + v.nama_lengkap + '" data-username="' + v.username + '" data-email="' + v.email + '" data-status="' + v.status + '" data-id="' + v.id + '">Update Pimpinan</a>' +
							'	</div>' +
							'	</div>';
					});

					$('#data-direksi').html(direksi);

					$.each(data, function(nama_perusahaan, nama_lengkap, alamat, prov, kota, kec, saldo_awal, pimpinan, logo, username, email, foto, status, saldo) {
						$('.nama_perusahaan').html(data.nama_perusahaan);
						$('#alamat').html(data.alamat);
						$('#prov').html(data.provinsi);
						$('#kota').html(data.kota);
						$('#kec').html(data.kec);
						$('#saldo_awal').html(data.saldo_awal);

						$('[name="nama_perusahaan"]').val(data.nama_perusahaan);
						$('[name="alamat"]').val(data.alamat);
						$('[name="provinsi"]').val(data.provinsi);
						$('[name="kota"]').val(data.kota);
						$('[name="kec"]').val(data.kec);
						$('[name="saldo_awal"]').val(data.saldo);
						$('[name="logo_lama"]').val(data.logo);
						$('.nama_lengkap').html(data.nama_lengkap);


						$('#username').html(data.username);
						$('#email').html(data.email);
						$('#status').html(data.status);


						if (data.logo != '') {
							$('#previewLogo').attr("src", base_url + "/" + data.logo);
							$('#logo').attr("src", base_url + "/" + data.logo);
							$('#ganti_logo').show();
							$('#upload_logo').hide();

						} else {
							$('#previewLogo').attr("src", base_url + "/default.jpg");
							$('#upload_logo').show();
							$('#ganti_logo').hide();
						}
					});
				}
			});

			return false;
		}

		$('#ganti_logo').click(function() {

			$('#upload_logo').fadeIn(500);
			$('#ganti_logo').hide();

		});

		function previewLogo(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#previewLogo').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$('#data-direksi').on('click', '.update-profil-pimpinan', function() {
			var name = $(this).data('nama');
			var username = $(this).data('username');
			var email = $(this).data('email');
			var id = $(this).data('id');
			var status = $(this).data('status');
			var foto = $(this).data('foto');

			$('[name="nama_lengkap"]').val(name);
			$('[name="email"]').val(email);
			$('[name="username"]').val(username);
			$('[name="foto_lama"]').val(foto);
			$('[name="id"]').val(id);

			if (foto != '') {
				$('#previewFoto').attr("src", base_url + "/direktur/" + foto);

				$('#ganti_foto').show();
				$('#upload_foto').hide();

			} else {
				$('#previewFoto').attr("src", base_url + "/direktur/default.jpg");
				$('#upload_foto').show();
				$('#ganti_foto').hide();
			}

			$('#profil-pimpinan-modal').modal('show');
		})

		$('[name="logo"]').change(function() {
			previewLogo(this);
		});

		$('#ganti_foto').click(function() {

			$('#upload_foto').fadeIn(500);
			$('#ganti_foto').hide();

		});

		function previewFoto(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#previewFoto').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		$('[name="foto"]').change(function() {
			previewFoto(this);
		});

		$('#btn-profil-pimpinan').on('click', function() {

			if ($('[name="nama_lengkap"]').val().length == 0) {
				$('[name="nama_lengkap"]').addClass('border-danger');
				$('[name="nama_lengkap"]').focus();
				return false;
			}
			if ($('[name="email"]').val().length == 0) {
				$('[name="email"]').addClass('border-danger');
				$('[name="email"]').focus();
				return false;
			}
			if ($('[name="username"]').val().length == 0) {
				$('[name="username"]').addClass('border-danger');
				$('[name="username"]').focus();
				return false;
			}
			if ($('[name="password"]').val().length == 0) {
				$('[name="password"]').addClass('border-danger');
				$('[name="password"]').focus();
				return false;
			}
			if ($('[name="konfirmasi_password"]').val() != $('[name="password"]').val()) {
				$('[name="konfirmasi_password"]').addClass('border-danger');
				$('[name="password"]').focus();
				return false;
			}

			var formData = new FormData();

			formData.append('id', $('[name="id"]').val());
			formData.append('nama_lengkap', $('[name="nama_lengkap"]').val());
			formData.append('username', $('[name="username"]').val());
			formData.append('password', $('[name="password"]').val());
			formData.append('email', $('[name="email"]').val());
			formData.append('foto_lama', $('[name="foto_lama"]').val());
			formData.append('foto', $('[name="foto"]')[0].files[0]);

			$.ajax({
				url: '<?= base_url("admin/Setting/update_direktur") ?>',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,

				success: function(response) {
					if (response.status == 'success') {

						$('#profil-pimpinan-modal').modal('hide');
						$('[name="password"]').val('');
						$('[name="konfirmasi_password"]').val('');
						toastr.success(response.message);
						view_setting();
					} else {
						$('#profil-pimpinan-modal').modal('hide');
						toastr.error(response.message);
					}

				}
			});
			return false;
		});

		$('#btn-profil-perusahaan').on('click', function() {

			if ($('[name="nama_perusahaan"]').val().length == 0) {
				$('[name="nama_perusahaan"]').addClass('border-danger');
				$('[name="nama_perusahaan"]').focus();
				return false;
			}
			if ($('[name="provinsi"]').val().length == 0) {
				$('[name="provinsi"]').addClass('border-danger');
				$('[name="provinsi"]').focus();
				return false;
			}
			if ($('[name="alamat"]').val().length == 0) {
				$('[name="alamat"]').addClass('border-danger');
				$('[name="alamat"]').focus();
				return false;
			}
			if ($('[name="kota"]').val().length == 0) {
				$('[name="kota"]').addClass('border-danger');
				$('[name="kota"]').focus();
				return false;
			}
			if ($('[name="kec"]').val().length == 0) {
				$('[name="kec"]').addClass('border-danger');
				$('[name="kec"]').focus();
				return false;
			}
			if ($('[name="saldo_awal"]').val().length == 0) {
				$('[name="saldo_awal"]').addClass('border-danger');
				$('[name="saldo_awal"]').focus();
				return false;
			}

			var formData = new FormData();

			formData.append('nama_perusahaan', $('[name="nama_perusahaan"]').val());
			formData.append('alamat', $('[name="alamat"]').val());
			formData.append('provinsi', $('[name="provinsi"]').val());
			formData.append('kota', $('[name="kota"]').val());
			formData.append('kec', $('[name="kec"]').val());
			formData.append('saldo_awal', $('[name="saldo_awal"]').val());
			formData.append('logo_lama', $('[name="logo_lama"]').val());
			formData.append('logo', $('[name="logo"]')[0].files[0]);

			$.ajax({
				url: '<?= base_url("admin/Setting/update_perusahaan") ?>',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,

				success: function(response) {
					if (response.status == 'success') {

						$('#profil-perusahaan-modal').modal('hide');
						toastr.success(response.message);
						view_setting();
					} else {
						$('#profil-perusahaan-modal').modal('hide');
						toastr.error(response.message);
					}

				}
			});
			return false;
		});

	});
</script>
</body>

</html>