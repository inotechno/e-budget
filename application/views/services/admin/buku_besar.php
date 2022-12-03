<script type="text/javascript">
	$(document).ready(function() {
		view_dkt();
		view_transaksi();

		function view_dkt() {
			$.ajax({
				url: '<?= base_url('admin/Buku_Besar/get_dkt') ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					$.each(data, function(debit, kredit, total_saldo) {	 
					 	$('#saldo_debit').html(data.debit);
						$('#saldo_kredit').html(data.kredit);
						$('#total_saldo').html(data.total_saldo);
					});
				}
			});
			
		}

		function view_transaksi() {
			$.ajax({
	    		url: '<?= base_url('admin/Buku_Besar/get_transaksi') ?>',
	    		type: 'POST',
	    		async : false,
	    		success:function (data) {
	    			$('#show_buku_besar').html(data);
	    		}
	    	});	
		}

		$('#buku_besar').DataTable({
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