<script type="text/javascript">
  $(document).ready(function() {
    

    view_pengajuan();

    function view_pengajuan() {
      $.ajax({
        url: '<?= base_url('karyawan/Pengajuan_Expanse/view_pengajuan') ?>',
        type: 'POST',
        async : false,
        success:function (data) {
          $('#show_pengajuan').html(data);
        }
      }); 
    }

    function view_detail_pengajuan(id) {
      $.ajax({
        url: '<?= base_url('karyawan/Pengajuan_Expanse/view_detail_pengajuan_expanse') ?>',
        type: 'POST',
        async : false,
        data:{id:id},
        success:function (data) {
          $('#show_detail_pengajuan').html(data);
        }
      }); 
      $.ajax({
        url: '<?= base_url('karyawan/Pengajuan_Expanse/grand_total_biaya_expanse') ?>',
        type: 'POST',
        async : false,
        data:{id:id},
        success:function (data) {
          $('#grand_total').html(data);
        }
      }); 
    }

    $('#show_pengajuan').on('click', '.selesaikan_pengajuan', function() {
      var id = $(this).attr('data-id');
      var uang = $(this).attr('data-uang');
      var keterangan = $(this).attr('data-keterangan');
      var no = $(this).attr('data-no');

      $('#view_no').html(no);
      $('#view_jum_uang').html(uang);
      $('#view_keterangan').html(keterangan);
      $('[name="id_pengajuan"]').val(id);

      $('#selesaikan-pengajuan-modal').modal('show');
      view_detail_pengajuan(id);
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
                    url: '<?= site_url('karyawan/Pengajuan_Expanse/delete_detail') ?>',
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

    $('#show_detail_pengajuan').on('click', '.upload-detail', function() {
      var id = $(this).attr('data-id');
      var id_pengajuan = $(this).attr('data-id_pengajuan');
      var biaya = $(this).attr('data-biaya');
      var deskripsi = $(this).attr('data-deskripsi');
      var qty = $(this).attr('data-qty');
      var satuan = $(this).attr('data-satuan');

      $('[name="id_pengajuan_upload"]').val(id_pengajuan);
      $('[name="id_upload"]').val(id);
      $('[name="qty_detail_upload"]').val(qty);
      $('[name="satuan_detail_upload"]').val(satuan);
      $('[name="deskripsi_detail_upload"]').val(deskripsi);
      $('[name="biaya_detail_upload"]').val(biaya);
      $('#total_biaya_upload').val(biaya*qty);
      $('#upload-detail-modal').modal('show');
    });

    $('#btn-upload-detail').on('click',function() {

      if ($('[name="deskripsi_detail_upload"]').val().length == 0){
          $('[name="deskripsi_detail_upload"]').addClass('border-danger');
          $('[name="deskripsi_detail_upload"]').focus();
          return false;
      }
      if ($('[name="qty_detail_upload"]').val().length == 0){
          $('[name="qty_detail_upload"]').addClass('border-danger');
          $('[name="qty_detail_upload"]').focus();
          return false;
      }
      if ($('[name="satuan_detail_upload"]').val().length == 0){
          $('[name="satuan_detail_upload"]').addClass('border-danger');
          $('[name="satuan_detail_upload"]').focus();
          return false;
      }
      if ($('[name="biaya_detail_upload"]').val().length == 0){
          $('[name="biaya_detail_upload"]').addClass('border-danger');
          $('[name="biaya_detail_upload"]').focus();
          return false;
      }
      if ($('[name="bukti_upload"]').val().length == 0){
          $('.custom-file-label').addClass('text-danger');
          $('.custom-file-label').html('Wajib Di Upload');
          return false;
      }

      var formData = new FormData();
      formData.append('id_pengajuan', $('[name="id_pengajuan_upload"]').val()); 
      formData.append('id', $('[name="id_upload"]').val()); 
      formData.append('satuan', $('[name="satuan_detail_upload"]').val()); 
      formData.append('deskripsi', $('[name="deskripsi_detail_upload"]').val()); 
      formData.append('biaya', $('[name="biaya_detail_upload"]').val()); 
      formData.append('qty', $('[name="qty_detail_upload"]').val()); 
      
      formData.append('bukti', $('[name="bukti_upload"]')[0].files[0]);
      $.ajax({
          url: '<?= base_url("karyawan/Pengajuan_Expanse/upload_detail")?>',
          type: 'POST',
          dataType: 'JSON',
          data: formData,
          cache: false,
          processData: false,
          contentType: false,
          success:function (response) {
            $('[name="id_pengajuan_upload"]').val('');
            $('[name="id_upload"]').val('');
            $('[name="qty_detail_upload"]').val('');
            $('[name="satuan_detail_upload"]').val('');
            $('[name="deskripsi_detail_upload"]').val('');
            $('[name="biaya_detail_upload"]').val('');
            $('[name="bukti_upload"]').val('');
            $('#total_biaya_upload').val('');
            $('#upload-detail-modal').modal('hide');

            toastr.success(response.message)

          view_detail_pengajuan(response.id);
          }
      });
      return false;
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
        url: '<?= site_url('karyawan/Pengajuan_Expanse/new_detail_pengajuan') ?>',
        type: 'POST',
        dataType: 'JSON',
        data:{id:id, deskripsi:deskripsi, qty:qty, satuan:satuan, biaya:biaya},
        success:function(respond) {
            
          toastr.success(response.message)
          $('[name="deskripsi_detail"]').val('');
          $('[name="qty_detail"]').val('');
          $('[name="biaya_detail"]').val('');
          $('#total_biaya').val('');

          view_detail_pengajuan(response.id);
        }
      });
    });

    $('[name="biaya_detail_upload"]').keyup(function() {
      var qty = $('[name="qty_detail_upload"]').val();
      var biaya = $(this).val();
      $('#total_biaya_upload').val(parseInt(qty)*parseInt(biaya));
    });

    $('[name="biaya_detail"]').keyup(function() {
      var qty = $('[name="qty_detail"]').val();
      var biaya = $(this).val();
      $('#total_biaya').val(parseInt(qty)*parseInt(biaya));
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

    $('#show_pengajuan').on('click', '.proses_pengajuan', function() {
        var id = $(this).attr('data-id');

        Swal.fire({
              title: 'Are you sure ?',
              text: "Pengajuan Akan Dikirim Ke Bagian Verifikasi, Apakah Anda Yakin ?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Saya Yakin!'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url: '<?= site_url('karyawan/Pengajuan_Expanse/proses_pengajuan') ?>',
                    type: 'POST',
                    dataType:'JSON',
                    data: {id:id},
                    success:function (response) {
                      if (response.status == 'success') {
                        toastr.success(response.message)
                        view_pengajuan();
                      }else{
                        toastr.error(response.message)
                      }
                    }
                });
            } 
            });
        
    });

  });
</script>