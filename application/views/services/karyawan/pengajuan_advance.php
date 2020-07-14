<script type="text/javascript">
  $(document).ready(function () {

    view_pengajuan();

    function view_pengajuan() {
    	$.ajax({
    		url: '<?= base_url('karyawan/Pengajuan_Advance/view_pengajuan') ?>',
    		type: 'POST',
    		async : false,
    		success:function (data) {
    			$('#show_pengajuan').html(data);
    		}
    	});	
    }

    function view_detail_pengajuan(id) {
    	$.ajax({
    		url: '<?= base_url('karyawan/Pengajuan_Advance/view_detail_pengajuan') ?>',
    		type: 'POST',
    		async : false,
    		data:{id:id},
    		success:function (data) {
    			$('#show_detail_pengajuan').html(data);
    		}
    	});	
    	$.ajax({
    		url: '<?= base_url('karyawan/Pengajuan_Advance/grand_total_biaya') ?>',
    		type: 'POST',
    		async : false,
    		data:{id:id},
    		success:function (data) {
    			$('#grand_total').html(data);
    		}
    	});	
    }

    $('[name="biaya_detail"]').keyup(function() {
    	var qty = $('[name="qty_detail"]').val();
    	var biaya = $(this).val();
    	$('#total_biaya').val(parseInt(qty)*parseInt(biaya));
    });

    $('#add-pengajuan').on('click', function() {
    	$.ajax({
    		url: '<?= base_url('karyawan/Pengajuan_Advance/get_no') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		success:function (data) {
    			$('#add-pengajuan-modal').modal('show');
    			$('[name="no_pengajuan"]').val(data);
    			$('[name="no_pengajuan"]').attr('disabled', true);
    		}
    	});
    });

    $('#btn-add-pengajuan').on('click', function() {
    	var no_pengajuan = $('[name="no_pengajuan"]').val();
    	var jumlah_uang = $('[name="jumlah_uang"]').val();
    	var keterangan = $('[name="keterangan"]').val();

		$('#btn-add-pengajuan').attr('disabled', true);;
    	$.ajax({
    		url: '<?= site_url('karyawan/Pengajuan_Advance/new_pengajuan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data:{no_pengajuan:no_pengajuan, jumlah_uang:jumlah_uang, keterangan:keterangan},
    		success:function(respond) {
	          
	          	$('#add-pengajuan-modal').modal('hide');
		        $('[name="no_pengajuan"]').val('');
			    $('[name="jumlah_uang"]').val('');
			    $('[name="keterangan"]').val('');
				$('#btn-add-pengajuan').attr('disabled', false);

                toastr.success(respond.message)
		         
		        view_pengajuan();
    		}
    	});
    });

    $('#show_pengajuan').on('click', '.edit_pengajuan', function() {
    	var id = $(this).attr('data-id');
    	var uang = $(this).attr('data-uang');
    	var keterangan = $(this).attr('data-keterangan');
    	var no = $(this).attr('data-no');

    	$('[name="no_pengajuan_edit"]').val(no);
    	$('[name="no_pengajuan_edit"]').attr('disabled', true);

    	$('[name="id"]').val(id);
    	$('[name="jumlah_uang_edit"]').val(uang);
    	$('[name="keterangan_edit"]').val(keterangan);
    	$('#edit-pengajuan-modal').modal('show');
    });

    $('#show_pengajuan').on('click', '.lihat_detail', function() {
    	var id = $(this).attr('data-id');
    	var uang = $(this).attr('data-uang');
    	var keterangan = $(this).attr('data-keterangan');
    	var no = $(this).attr('data-no');

    	$('#view_no').html(no);
    	$('#view_jum_uang').html(uang);
    	$('#view_keterangan').html(keterangan);
    	$('[name="id_pengajuan"]').val(id);

    	$('#lihat-detail-modal').modal('show');
    	view_detail_pengajuan(id);
    });

    $('#btn-add-detail').on('click', function() {

    	if ($('[name="deskripsi_detail"]').val().length == 0){
	        $('[name="deskripsi_detail"]').addClass('border-danger');
	        $('[name="deskripsi_detail"]').focus();
	        return false;
	    }
	    if ($('[name="qty_detail"]').val().length == 0){
	        $('[name="qty_detail"]').addClass('border-danger');
	        $('[name="qty_detail"]').focus();
	        return false;
	    }
	    if ($('[name="satuan_detail"]').val().length == 0){
	        $('[name="satuan_detail"]').addClass('border-danger');
	        $('[name="satuan_detail"]').focus();
	        return false;
	    }
	    if ($('[name="biaya_detail"]').val().length == 0){
	        $('[name="biaya_detail"]').addClass('border-danger');
	        $('[name="biaya_detail"]').focus();
	        return false;
	    }

	    var id = $('[name="id_pengajuan"]').val();
    	var deskripsi = $('[name="deskripsi_detail"]').val();
    	var qty = $('[name="qty_detail"]').val();
    	var satuan = $('[name="satuan_detail"]').val();
    	var biaya = $('[name="biaya_detail"]').val();

    	$.ajax({
    		url: '<?= site_url('karyawan/Pengajuan_Advance/new_detail_pengajuan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data:{id:id, deskripsi:deskripsi, qty:qty, satuan:satuan, biaya:biaya},
    		success:function(respond) {
	          
                toastr.success(respond.message)
	           
		    	$('[name="deskripsi_detail"]').val('');
		    	$('[name="qty_detail"]').val('');
		    	$('[name="biaya_detail"]').val('');
		    	$('#total_biaya').val('');

		     	view_detail_pengajuan(respond.id);
    		}
    	});
    });

    $('#btn-edit-pengajuan').on('click', function() {
    	var id = $('[name="id"]').val();
    	var no_pengajuan = $('[name="no_pengajuan_edit"]').val();
    	var jumlah_uang = $('[name="jumlah_uang_edit"]').val();
    	var keterangan = $('[name="keterangan_edit"]').val();

		$('#btn-edit-pengajuan').attr('disabled', true);;
    	$.ajax({
    		url: '<?= site_url('karyawan/Pengajuan_Advance/edit_pengajuan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data:{id:id, jumlah_uang:jumlah_uang, keterangan:keterangan},
    		success:function(respond) {
	          
	          	$('#edit-pengajuan-modal').modal('hide');
		        $('[name="no_pengajuan_edit"]').val('');
			    $('[name="jumlah_uang_edit"]').val('');
			    $('[name="keteranga_editn"]').val('');
				$('#btn-edit-pengajuan').attr('disabled', false);

              toastr.success(respond.message)

	          view_pengajuan();
    		}
    	});
    });

    $('#show_detail_pengajuan').on('click', '.delete-detail', function() {
        var id = $(this).attr('data-id');
        var id_pengajuan = $(this).attr('data-id_pengajuan');

        Swal.fire({
              title: 'Are you sure ?',
              text: "Yakin Ingin Menghapus Detail Pengajuan ini ?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url: '<?= site_url('karyawan/Pengajuan_Advance/delete_detail') ?>',
                    type: 'POST',
                    dataType:'JSON',
                    data: {id:id, id_pengajuan:id_pengajuan},
                    success:function (response) {
                        toastr.success(response.message)
                        view_detail_pengajuan(response.id);
                    }
                });
            } 
            });
        
    });

    $('#show_pengajuan').on('click', '.proses_pengajuan', function() {
        var id = $(this).attr('data-id');

        Swal.fire({
              title: 'Are you sure ?',
              text: "Pengajuan Akan Dikirim Ke Bagian Verifikasi Dan Tidak Dapat Di Ubah Lagi, Apakah Anda Yakin ?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Saya Yakin!'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url: '<?= site_url('karyawan/Pengajuan_Advance/proses_pengajuan') ?>',
                    type: 'POST',
                    dataType:'JSON',
                    data: {id:id},
                    success:function (response) {
                        toastr.success(response.message)
                        view_pengajuan();
                    }
                });
            } 
            });
        
    });

    $('#pengajuan').DataTable({
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