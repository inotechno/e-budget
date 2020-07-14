<script type="text/javascript">
	$(document).ready(function() {

		view_profil();
		function view_profil() {
			var base_url = '<?= base_url('assets/dist/img/karyawan')?>';
			$.ajax({
				url: '<?= site_url('karyawan/Profil/view_profil') ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					$.each(data, function(id, nik, nama_lengkap, tempat_lahir, tanggal_lahir, hp, jabatan, pendidikan, jenis_kelamin, agama, username, email, foto, alamat, status) {
						$('.nama_lengkap').html(data.nama_lengkap);
						$('#nik').html(data.nik);
						$('#hp').html(data.hp);
						$('#agama').html(data.agama);
						$('#status').html(data.status);
						$('#username').html(data.username);
						$('#email').html(data.email);
						$('#pendidikan').html(data.pendidikan);
						$('#jenis_kelamin').html(data.jenis_kelamin);
						$('#alamat').html(data.alamat);
						$('#pengajuan_proses').html(data.pengajuan_proses);
						$('#pengajuan_selesai').html(data.pengajuan_selesai);
						$('#total_pengajuan').html(data.total_pengajuan);
						$('#tempat_tgl_lahir').html(data.tempat_lahir+', '+data.tanggal_lahir);
						$('.jabatan').html(data.jabatan);

						if (data.foto != '') {
	                        $('#foto').attr("src", base_url+"/"+data.foto);
	                    } else {
	                        $('#foto').attr("src", base_url+"/default.jpg");
	                    }
					});
				}
			});
			
			return false;
		}
	});		
</script>
</body>
</html>