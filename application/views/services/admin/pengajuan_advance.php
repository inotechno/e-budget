<script type="text/javascript">
  $(document).ready(function () {

    view_pengajuan();

    function view_pengajuan() {
    	$.ajax({
    		url: '<?= base_url('admin/Pengajuan_Advance/view_pengajuan') ?>',
    		type: 'POST',
    		async : false,
    		success:function (data) {
    			$('#show_pengajuan').html(data);
    		}
    	});	
    }

    function view_detail_pengajuan(id) {
    	$.ajax({
    		url: '<?= base_url('admin/Pengajuan_Advance/view_detail_pengajuan') ?>',
    		type: 'POST',
    		async : false,
            data:{id:id},
    		success:function (data) {
    			$('#show_detail_pengajuan').html(data);
    		}
    	});	
    	$.ajax({
    		url: '<?= base_url('admin/Pengajuan_Advance/grand_total_biaya') ?>',
    		type: 'POST',
    		async : false,
    		data:{id:id},
    		success:function (data) {
    			$('#grand_total').html(data);
    		}
    	});	
    }

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