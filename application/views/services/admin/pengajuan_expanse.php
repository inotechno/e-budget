<script type="text/javascript">
  $(document).ready(function() {
    
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
    

    view_pengajuan();

    function view_pengajuan() {
      $.ajax({
        url: '<?= base_url('admin/Pengajuan_Expanse/view_pengajuan') ?>',
        type: 'POST',
        async : false,
        success:function (data) {
          $('#show_pengajuan').html(data);
        }
      }); 
    }

    function view_detail_pengajuan(id) {
      $.ajax({
        url: '<?= base_url('admin/Pengajuan_Expanse/view_detail_pengajuan_expanse') ?>',
        type: 'POST',
        async : false,
        data:{id:id},
        success:function (data) {
          $('#show_detail_pengajuan').html(data);
        }
      }); 
      $.ajax({
        url: '<?= base_url('admin/Pengajuan_Expanse/grand_total_biaya_expanse') ?>',
        type: 'POST',
        async : false,
        data:{id:id},
        success:function (data) {
          $('#grand_total').html(data);
        }
      }); 
    }

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