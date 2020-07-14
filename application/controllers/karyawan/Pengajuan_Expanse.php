<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pengajuan_Expanse extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PengajuanModel');
		}
	
		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/sidebar');
			$this->load->view('karyawan/pengajuan_expanse');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/karyawan/pengajuan_expanse');
		}

		public function view_pengajuan()
		{
			$html = '';
			$id = '';
			if ($this->session->userdata('level') == 2) {
				$id = $this->session->userdata('id');
			}
			$data = $this->PengajuanModel->view_pengajuan_expanse($id);

			foreach ($data as $dp) {
				if ($dp->status == 2) {
    				$badge = '<button class="badge badge-info selesaikan_pengajuan ml-lg-1 mb-1" data-id="'.$dp->id.'" data-no="'.$dp->no_pengajuan.'" data-uang="Rp. '.number_format($dp->jumlah_uang).'" data-keterangan="'.$dp->keterangan.'">Upload</button>
							</button>
							<button class="badge badge-warning proses_pengajuan ml-lg-1 mb-1" data-id="'.$dp->id.'">Kirim</button>';
    			}if ($dp->status == 3) {
    				$badge = '<button class="badge badge-warning">'.$dp->status_pengajuan.'</button>';
    			}if ($dp->status == 4) {
    				$badge = '<button class="badge badge-success">'.$dp->status_pengajuan.'</button>';
    			}
				$html .= '<tr>
							<th class="text-center align-middle">'.$dp->no_pengajuan.'</th>
							<td class="align-middle">'.date('d-m-Y', strtotime($dp->tgl_pengajuan)).'</td>
							<td class="align-middle">Rp. '.number_format($dp->jumlah_uang).'</td>
							<td class="align-middle">'.$dp->keterangan.'</td>
							<td class="align-middle text-center">'.$badge.'</td>
						</tr>';
			}
			echo $html;
		}

		public function view_detail_pengajuan_expanse()
		{
			$html = '';
			$id = $this->input->post('id');

			$data = $this->PengajuanModel->view_detail_pengajuan_expanse($id);
			$no = 1;
			foreach ($data as $dp) {

				if ($dp->foto != NULL) {
					$button = '<span class="fa fa-check text-success"></span>';
				}else{
					$button = '<a class="delete-detail ml-lg-1 mb-1" style="cursor:pointer" data-id="'.$dp->id.'" data-id_pengajuan="'.$id.'">
								<span class="fa fa-trash-alt text-danger"></span>
								</a>
								<a class="upload-detail ml-lg-1 mb-1" style="cursor:pointer" data-id="'.$dp->id.'" data-deskripsi="'.$dp->deskripsi.'" data-id_pengajuan="'.$id.'" data-qty="'.$dp->qty.'" data-satuan="'.$dp->satuan.'" data-biaya="'.$dp->biaya.'"><span class="fa fa-file-upload text-info"></span>
								</a>';
				}
				
				$html .= '<tr>
							<th class="text-center align-middle">'.$no++.'</th>
							<th class="align-middle">'.$dp->deskripsi.'</th>
							<td class="align-middle">'.$dp->qty.' '.$dp->satuan.'</td>
							<td class="align-middle">Rp. '.number_format($dp->biaya).'</td>
							<td class="align-middle">Rp. '.number_format($dp->biaya * $dp->qty).'</td>
							<td class="align-middle text-center">'.$button.'</td>
						</tr>';

			}

			echo $html;
		}

		public function new_detail_pengajuan()
		{
			$id = $this->input->post('id');
			$data['id_pengajuan'] = $this->input->post('id');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['qty'] = $this->input->post('qty');
			$data['satuan'] = $this->input->post('satuan');
			$data['biaya'] = $this->input->post('biaya');

			$res = $this->PengajuanModel->new_detail_pengajuan($data);
			
			$response = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Pengajuan Berhasil',
				'id' => $data['id_pengajuan'],
			);

			echo json_encode($response);
		}

		public function upload_detail()
		{

			$id = $this->input->post('id');
			$id_p = $this->input->post('id_pengajuan');

			$config['upload_path'] = './assets/dist/img/nota/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('id_pengajuan').'-'.$this->input->post('id');
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("bukti")){
				$foto = $this->upload->file_name;
			} else {
				$foto = '';
			}

			$data = array(
	 			'id_pengajuan' 		=> $this->input->post('id_pengajuan'),
	 			'deskripsi' 		=> $this->input->post('deskripsi'),
	 			'biaya' 			=> $this->input->post('biaya'),
	 			'qty' 				=> $this->input->post('qty'),
	 			'satuan' 			=> $this->input->post('satuan'),
	 			'status_detail' 	=> 1,
	 			
	 			'foto' 				=> $foto
			);


			$upload = $this->PengajuanModel->upload_detail_expanse($id, $data);
			
			$response = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Upload Data Berhasil',
				'id' => $id_p,
			);

			echo json_encode($response);
		}

		public function delete_detail()
		{
			$id = $this->input->post('id');
			$id_pengajuan = $this->input->post('id_pengajuan');
			$data['status_detail'] = 0;
			$data = $this->PengajuanModel->delete_detail_pengajuan_expanse($data, $id);

			$response = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Hapus Detail Berhasil',
				'id' => $id_pengajuan,
			);

			echo json_encode($response);
		}

		public function grand_total_biaya_expanse()
		{
			$id = $this->input->post('id');

			$data = $this->PengajuanModel->validasi_saldo_expanse($id);
			echo 'Rp. '.number_format($data->total);
		}

		public function proses_pengajuan()
		{
			$id = $this->input->post('id');
			$data['status'] = 3;

			$cek = $this->db->get_where('detail_pengajuan', array('id_pengajuan' => $id, 'status_detail' => NULL));

			if ($cek->num_rows() > 0) {
				$response = array(
					'status' => 'error',
					'title' => 'Gagal !!!',
					'message' => 'Masih Ada Detail Pengajuan Yang Belum Di Upload !!!',
				);
			}else{
				$this->PengajuanModel->edit_pengajuan($data, $id);

				$response = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Berhasil Di Proses Silahkan Tunggu Pengajuan Berhasil Di Verifikasi',
				);
			}
			echo json_encode($response);
		}

	}
	/* End of file Pengajuan_Expanse.php */
	/* Location: ./application/controllers/karyawan/Pengajuan_Expanse.php */
?>