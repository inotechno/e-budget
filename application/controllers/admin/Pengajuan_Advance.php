<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pengajuan_Advance extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
		}
	
		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/sidebar');
			$this->load->view('admin/pengajuan_advance');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/pengajuan_advance');
		}

		public function view_pengajuan()
		{
			$html = '';
			$data = $this->AdminModel->view_pengajuan_advance();

			foreach ($data as $dp) {
				if ($dp->status == 0) {
    				$badge = '<button class="badge badge-info lihat_detail ml-lg-1 mb-1" data-id="'.$dp->id.'" data-no="'.$dp->no_pengajuan.'" data-uang="Rp. '.number_format($dp->jumlah_uang).'" data-keterangan="'.$dp->keterangan.'">Detail</button>
							</button>';
    			}if ($dp->status == 1) {
    				$badge = '<button class="badge badge-warning">'.$dp->status_pengajuan.'</button><button class="badge badge-primary lihat_detail ml-lg-1 mb-1" data-id="'.$dp->id.'" data-no="'.$dp->no_pengajuan.'" data-uang="Rp. '.number_format($dp->jumlah_uang).'" data-keterangan="'.$dp->keterangan.'">Cetak</button>';
    			}if ($dp->status == 2) {
    				$badge = '<button class="badge badge-danger">'.$dp->status_pengajuan.'</button>';
    			}if ($dp->status == 3) {
    				$badge = '<button class="badge badge-success">'.$dp->status_pengajuan.'</button>';
    			}
				$html .= '<tr>
							<th class="text-center align-middle">'.$dp->no_pengajuan.'</th>
							<th class="text-center align-middle">'.$dp->nama_lengkap.'</th>
							<td class="align-middle">'.date('d-m-Y', strtotime($dp->tgl_pengajuan)).'</td>
							<td class="align-middle">Rp. '.number_format($dp->jumlah_uang).'</td>
							<td class="align-middle">'.$dp->keterangan.'</td>
							<td class="align-middle text-center">'.$badge.'</td>
						</tr>';
			}
			echo $html;
		}

		public function view_detail_pengajuan()
		{
			$html = '';
			$id = $this->input->post('id');

			$data = $this->AdminModel->view_detail_pengajuan_advance($id);
			$no = 1;
			foreach ($data as $dp) {
				
				$html .= '<tr>
							<th class="text-center align-middle">'.$no++.'</th>
							<th class="align-middle">'.$dp->deskripsi.'</th>
							<td class="align-middle">'.$dp->qty.' '.$dp->satuan.'</td>
							<td class="align-middle">Rp. '.number_format($dp->biaya).'</td>
							<td class="align-middle">Rp. '.number_format($dp->biaya * $dp->qty).'</td>
						</tr>';

			}

			echo $html;
		}

		public function grand_total_biaya()
		{
			$id = $this->input->post('id');

			$data = $this->AdminModel->validasi_saldo($id);
			echo 'Rp. '.number_format($data->total);
		}
	
	}
	
	/* End of file Pengajuan_Advance.php */
	/* Location: ./application/controllers/admin/Pengajuan_Advance.php */
 ?>