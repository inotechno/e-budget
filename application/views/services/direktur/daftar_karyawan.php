
<script type="text/javascript">
	$(document).ready(function() {

		view_karyawan();

	    function view_karyawan() {
	    	$.ajax({
	    		url: '<?= base_url('direktur/Daftar_karyawan/view_karyawan') ?>',
	    		type: 'POST',
	    		async : false,
	    		success:function (data) {
	    			$('#show_daftar_karyawan').html(data);
	    			$("input[data-bootstrap-switch]").each(function(){
				      $(this).bootstrapSwitch('state', $(this).prop('checked'));
				    });
	    		}
	    	});	
	    }

	    $('#btn-add-karyawan').on('click', function () {
	                
		    if ($('[name="nik"]').val().length == 0){
		        $('[name="nik"]').addClass('border-danger');
		        $('[name="nik"]').focus();
		        return false;
		    }
		    if ($('[name="nama_lengkap"]').val().length == 0){
		        $('[name="nama_lengkap"]').addClass('border-danger');
		        $('[name="nama_lengkap"]').focus();
		        return false;
		    }
		    if ($('[name="tempat_lahir"]').val().length == 0){
		        $('[name="tempat_lahir"]').addClass('border-danger');
		        $('[name="tempat_lahir"]').focus();
		        return false;
		    }
		    if ($('[name="tanggal_lahir"]').val().length == 0){
		        $('[name="tanggal_lahir"]').addClass('border-danger');
		        $('[name="tanggal_lahir"]').focus();
		        return false;
		    }
		    if ($('[name="username"]').val().length == 0){
		        $('[name="username"]').addClass('border-danger');
		        $('[name="username"]').focus();
		        return false;
		    }
		    if ($('[name="password"]').val().length == 0){
		        $('[name="password"]').addClass('border-danger');
		        $('[name="password"]').focus();
		        return false;
		    }
		    if ($('#konfirmasi-password').val() != $('[name="password"]').val()){
		        $('#konfirmasi-password').addClass('border-danger');
		        $('[name="password"]').focus();
		        return false;
		    }

		    var formData = new FormData();
		    formData.append('nik', $('[name="nik"]').val()); 
		    formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
		    formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
		    formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
		    formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
		    formData.append('agama', $('[name="agama"]').val()); 
		    formData.append('alamat', $('[name="alamat"]').val()); 
		    formData.append('pendidikan', $('[name="pendidikan"]').val());
		    formData.append('jabatan', $('[name="jabatan"]').val());
		    formData.append('username', $('[name="username"]').val());
		    formData.append('password', $('[name="password"]').val());
		    formData.append('hp', $('[name="hp"]').val()); 
		    formData.append('email', $('[name="email"]').val()); 
		    formData.append('foto', $('[name="foto"]')[0].files[0]);
		   
	    	$(this).attr('disabled');
		    $.ajax({
		        url: '<?= base_url("admin/Daftar_Karyawan/add_karyawan")?>',
		        type: 'POST',
		        dataType: 'JSON',
		        data: formData,
		        cache: false,
		        processData: false,
		        contentType: false,

		        success: function (response) {
		        	if (response.status == 'success') {

			            $('[name="nik"]').val(''); 
			            $('[name="nama_lengkap"]').val(''); 
			            $('[name="tempat_lahir"]').val(''); 
			            $('[name="tanggal_lahir"]').val('');  
			            $('[name="alamat"]').val(''); 
			            $('[name="jabatan"]').val(''); 
			            $('[name="username"]').val(''); 
			            $('[name="password"]').val(''); 
			            $('[name="foto"]').val(''); 
			            $('[name="hp"]').val('');
			            $('[name="email"]').val('');
		        		$(this).removeAttr('disabled');

			            $('#add-karyawan-modal').modal('hide');

			            toastr.success(response.message)
			            view_karyawan();
		        	}else{
			            $('#add-karyawan-modal').modal('hide');
			            toastr.error(response.message)
		        	}
		            
		        }
		    });
		    return false;
		});

		$('#btn-update-karyawan').on('click', function () {
	                
		    if ($('[name="nik_detail"]').val().length == 0){
		        $('[name="nik_detail"]').addClass('border-danger');
		        $('[name="nik_detail"]').focus();
		        return false;
		    }
		    if ($('[name="nama_lengkap_detail"]').val().length == 0){
		        $('[name="nama_lengkap_detail"]').addClass('border-danger');
		        $('[name="nama_lengkap_detail"]').focus();
		        return false;
		    }
		    if ($('[name="tempat_lahir_detail"]').val().length == 0){
		        $('[name="tempat_lahir_detail"]').addClass('border-danger');
		        $('[name="tempat_lahir_detail"]').focus();
		        return false;
		    }
		    if ($('[name="tanggal_lahir_detail"]').val().length == 0){
		        $('[name="tanggal_lahir_detail"]').addClass('border-danger');
		        $('[name="tanggal_lahir_detail"]').focus();
		        return false;
		    }
		    if ($('[name="username_detail"]').val().length == 0){
		        $('[name="username_detail"]').addClass('border-danger');
		        $('[name="username_detail"]').focus();
		        return false;
		    }

		    var formData = new FormData();
		    formData.append('id', $('[name="id_detail"]').val()); 
		    formData.append('nik', $('[name="nik_detail"]').val()); 
		    formData.append('nama_lengkap', $('[name="nama_lengkap_detail"]').val()); 
		    formData.append('tempat_lahir', $('[name="tempat_lahir_detail"]').val()); 
		    formData.append('tanggal_lahir', $('[name="tanggal_lahir_detail"]').val()); 
		    formData.append('jenis_kelamin', $('[name="jenis_kelamin_detail"]').val()); 
		    formData.append('agama', $('[name="agama_detail"]').val()); 
		    formData.append('alamat', $('[name="alamat_detail"]').val()); 
		    formData.append('pendidikan', $('[name="pendidikan_detail"]').val());
		    formData.append('jabatan', $('[name="jabatan_detail"]').val());
		    formData.append('username', $('[name="username_detail"]').val());
		    formData.append('hp', $('[name="hp_detail"]').val()); 
		    formData.append('email', $('[name="email_detail"]').val()); 
		    formData.append('foto_lama', $('[name="foto_lama"]').val()); 
		    formData.append('foto', $('[name="foto_detail"]')[0].files[0]);
		   
	    	$(this).attr('disabled');
		    $.ajax({
		        url: '<?= base_url("admin/Daftar_Karyawan/update_karyawan")?>',
		        type: 'POST',
		        dataType: 'JSON',
		        data: formData,
		        cache: false,
		        processData: false,
		        contentType: false,

		        success: function (response) {
		        	if (response.status == 'success') {

			            $('[name="nik_detail"]').val(''); 
			            $('[name="id_detail"]').val(''); 
			            $('[name="foto_lama"]').val(''); 
			            $('[name="nama_lengkap_detail"]').val(''); 
			            $('[name="tempat_lahir_detail"]').val(''); 
			            $('[name="tanggal_lahir_detail"]').val('');  
			            $('[name="alamat_detail"]').val(''); 
			            $('[name="jabatan_detail"]').val(''); 
			            $('[name="username_detail"]').val(''); 
			            $('[name="foto_detail"]').val(''); 
			            $('[name="hp_detail"]').val('');
			            $('[name="email_detail"]').val('');
		        		$(this).removeAttr('disabled');

			            $('#detail-karyawan-modal').modal('hide');

			            toastr.success(response.message)
			            view_karyawan();
		        	}else{
			            $('#detail-karyawan-modal').modal('hide');
			            toastr.error(response.message)
		        	}
		            
		        }
		    });
		    return false;
		});

		$('#show_daftar_karyawan').on('click', '.detail-karyawan', function() {
			var id = $(this).attr('data-id');
			var base_url = '<?= base_url('assets/dist/img/karyawan')?>';
			$.ajax({
				url: '<?= base_url('admin/Daftar_Karyawan/get_karyawan_by_id') ?>',
				type: 'GET',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					$.each(data, function(id, nik, nama_lengkap, tempat_lahir, tanggal_lahir, hp, jabatan, pendidikan, jenis_kelamin, agama, username, email, foto, alamat) {

						$('#detail-karyawan-modal').modal('show');
						$('[name="nik_detail"]').val(data.nik); 
			            $('[name="nama_lengkap_detail"]').val(data.nama_lengkap); 
			            $('[name="tempat_lahir_detail"]').val(data.tempat_lahir); 
			            $('[name="tanggal_lahir_detail"]').val(data.tanggal_lahir);  
			            $('[name="alamat_detail"]').val(data.alamat); 
			            $('[name="jabatan_detail"]').val(data.jabatan); 
			            $('[name="username_detail"]').val(data.username);  
			            $('[name="hp_detail"]').val(data.hp);
			            $('[name="email_detail"]').val(data.email);
			            $('[name="id_detail"]').val(data.id);
			            $('[name="foto_lama"]').val(data.foto);

			            if (data.foto != '') {
	                        $('#previewFoto_Detail').attr("src", base_url+"/"+data.foto);
	                        $('#ganti_foto').show();
	                        $('#upload_foto').hide();

	                    } else {
	                        $('#previewFoto_Detail').attr("src", base_url+"/default.jpg");
	                        $('#upload_foto').show();
	                        $('#ganti_foto').hide();
	                    }
					});
				}
			});
			return false;
		});

		$('#ganti_foto').click(function() {
                
            $('#upload_foto').fadeIn(500);
            $('#ganti_foto').hide();
            
        });

        function previewFoto(input) {
           if (input.files && input.files[0]) {
              var reader = new FileReader();
         
              reader.onload = function (e) {
                  $('#previewFoto').attr('src', e.target.result);
              }
         
              reader.readAsDataURL(input.files[0]);
           }
        }
        $("#foto").change(function(){
            previewFoto(this);
        });

        //  -----------------------------------------------------------------------------
        //  |       PREVIEW FOTO KARYAWAN DI FORM EDIT                                  |
        //  -----------------------------------------------------------------------------

        function previewFotoEdit(input) {
           if (input.files && input.files[0]) {
              var reader = new FileReader();
         
              reader.onload = function (e) {
                  $('#previewFoto_Detail').attr('src', e.target.result);
              }
         
              reader.readAsDataURL(input.files[0]);
           }
        }
        $("#foto_Detail").change(function(){
            previewFotoEdit(this);
        })


		$('#daftar_karyawan').DataTable({
	    	dom: "B<'row'<'col-sm-12 col-md-6 mt-1'l><'col-sm-12 col-md-6'f>>" +
					"<'row'<'col-sm-12'tr>>" +
					"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
	        buttons: [
	            {
	                extend:    'excel',
	                className: 'btn btn-sm',
	            },
	            {
	                extend:    'pdf',
	                className: 'btn btn-sm',

	            },
	            {
	                extend:    'print',
	                className: 'btn btn-sm',

	            }
	        ],

	    });
	});
</script>
</body>
</html>