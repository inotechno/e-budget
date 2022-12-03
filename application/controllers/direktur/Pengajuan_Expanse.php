<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_Expanse extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DirekturModel');
	}

	public function index()
	{
		$this->load->view('_partials/head');
		$this->load->view('_partials/navbar');
		$this->load->view('_partials/sidebar');
		$this->load->view('direktur/pengajuan_expanse');
		$this->load->view('_partials/footer');
		$this->load->view('_partials/plugin');
		$this->load->view('services/direktur/pengajuan_expanse');
	}

	public function view_pengajuan()
	{
		$html = '';
		$data = $this->DirekturModel->view_pengajuan_expanse();

		foreach ($data as $dp) {
			$val_1 = '';
			$val_2 = '';
			$val_3 = '';
			$val_4 = '';
			$val_5 = '';

			if ($dp->status == 2) {
				$badge = '<button class="badge badge-secondary">' . $dp->status_pengajuan . '</button>';
			}
			if ($dp->status == 3) {
				if (
					$dp->val_ex_direct_1 != $this->session->userdata('id')
					&& $dp->val_ex_direct_2 != $this->session->userdata('id')
					&& $dp->val_ex_direct_3 != $this->session->userdata('id')
					&& $dp->val_ex_direct_4 != $this->session->userdata('id')
					&& $dp->val_ex_direct_5 != $this->session->userdata('id')
				) {
					$badge = '<button class="badge badge-info lihat_detail ml-lg-1 mb-1" data-id="' . $dp->id . '" data-no="' . $dp->no_pengajuan . '" data-uang="Rp. ' . number_format($dp->jumlah_uang) . '" data-keterangan="' . $dp->keterangan . '">Detail</button>
											</button>
											<button class="badge badge-warning validasi" data-id="' . $dp->id . '">Validasi</button>';
				} else {
					$badge = '';
				}

				if ($dp->val_ex_direct_1 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_1])->row();
					$val_1 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_2 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_2])->row();
					$val_2 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_3 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_3])->row();
					$val_3 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_4 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_4])->row();
					$val_4 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_5 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_5])->row();
					$val_5 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
			}
			if ($dp->status == 4) {
				if ($dp->val_ex_direct_1 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_1])->row();
					$val_1 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_2 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_2])->row();
					$val_2 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_3 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_3])->row();
					$val_3 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_4 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_4])->row();
					$val_4 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}
				if ($dp->val_ex_direct_5 != null) {
					$dir  = $this->db->get_where('direktur', ['id' => $dp->val_ex_direct_5])->row();
					$val_5 = '<span class="text-success fa fa-star" title="' . $dir->nama_lengkap . '"></span>';
				}

				$badge = '<button class="badge badge-success">' . $dp->status_pengajuan . '</button>';
			}
			$html .= '<tr>
							<th class="text-center align-middle">' . $dp->no_pengajuan . '</th>
							<td class="align-middle">' . date('d-m-Y', strtotime($dp->tgl_pengajuan)) . '</td>
							<td class="align-middle">Rp. ' . number_format($dp->jumlah_uang) . '</td>
							<td class="align-middle">' . $dp->keterangan . '</td>
							<td class="align-middle">' . $val_1 . ' ' . $val_2 . ' ' . $val_3 . ' ' . $val_4 . ' ' . $val_5 . '</td>
							<td class="align-middle text-center">' . $badge . '</td>
						</tr>';
		}
		echo $html;
	}

	public function view_detail_pengajuan_expanse()
	{
		$html = '';
		$id = $this->input->post('id');
		$data = $this->DirekturModel->view_detail_pengajuan_expanse($id);
		$no = 1;
		// echo $this->db->last_query($data);
		// echo '<pre>' . print_r($data, 1) . '</pre>';
		// die;
		foreach ($data as $dp) {

			$html .= '<tr>
							<th class="text-center align-middle">' . $no++ . '</th>
							<th class="align-middle">' . $dp->deskripsi . '</th>
							<td class="align-middle">' . $dp->qty . ' ' . $dp->satuan . '</td>
							<td class="align-middle">Rp. ' . number_format($dp->biaya) . '</td>
							<td class="align-middle">Rp. ' . number_format($dp->biaya * $dp->qty) . '</td>
							<td class="align-middle"><a class="lihat_file" data-file="' . $dp->foto . '" style="cursor:pointer" ><span class="fa fa-file-upload text-info"></td>
						</tr>';
		}

		echo $html;
	}

	public function grand_total_biaya_expanse()
	{
		$id = $this->input->post('id');

		$data = $this->DirekturModel->validasi_saldo_expanse($id);
		echo 'Rp. ' . number_format($data->total);
	}

	public function validasi_pengajuan()
	{
		$id = $this->input->post('id');
		$cek = $this->DirekturModel->CheckValidation($id)->row();
		if ($cek->val_ex_direct_1 == NULL) {
			$data['val_ex_direct_1'] = $this->session->userdata('id');
		} else if ($cek->val_ex_direct_2 == NULL) {
			$data['val_ex_direct_2'] = $this->session->userdata('id');
		} else if ($cek->val_ex_direct_3 == NULL) {
			$data['status'] = 4;
			$data['val_ex_direct_3'] = $this->session->userdata('id');
		} else if ($cek->val_ex_direct_4 == NULL) {
			$data['status'] = 4;
			$data['val_ex_direct_4'] = $this->session->userdata('id');
		} else if ($cek->val_ex_direct_5 == NULL) {
			$data['status'] = 4;
			$data['val_ex_direct_5'] = $this->session->userdata('id');
		}

		$this->DirekturModel->validasi_pengajuan($id, $data);


		$response = array(
			'status' => 'success',
			'title' => 'SUKSES !!!',
			'message' => 'Pengajuan Berhasil Di Validasi',
		);
		echo json_encode($response);
	}
}
	/* End of file Pengajuan_Expanse.php */
	/* Location: ./application/controllers/karyawan/Pengajuan_Expanse.php */
