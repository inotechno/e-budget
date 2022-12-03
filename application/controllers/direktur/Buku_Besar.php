<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Besar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BukuBesarModel');
	}

	public function index()
	{
		$this->load->view('_partials/head');
		$this->load->view('_partials/navbar');
		$this->load->view('_partials/sidebar');
		$this->load->view('admin/buku_besar');
		$this->load->view('_partials/footer');
		$this->load->view('_partials/plugin');
		$this->load->view('services/admin/buku_besar');
	}

	public function get_dkt()
	{
		$saldo_awal = 500000;
		$get = $this->BukuBesarModel->get_dkt();
		$data['debit'] = 'Rp. ' . number_format($get->debit);
		$data['kredit'] = 'Rp. ' . number_format($get->kredit);
		$total = $saldo_awal - $get->kredit + $get->debit;
		$data['total_saldo'] = 'Rp. ' . number_format($total);
		echo json_encode($data);
	}

	public function get_transaksi()
	{
		$saldo_awal = 500000;
		$debit = 0;
		$kredit = 0;
		$html = '';
		$data = $this->BukuBesarModel->get_transaksi();
		foreach ($data as $dp) {
			if ($dp->status_detail == 1) {
				$kredit = intval($dp->biaya) * intval($dp->qty);
				$debit = '';
			}
			if ($dp->status_detail == 0) {
				$debit = intval($dp->biaya) * intval($dp->qty);
				$kredit = '';
			}
			$saldo_awal += $debit - $kredit;

			$html .= '<tr>
							<th>' . $dp->no_pengajuan . '</th>
							<th>' . $dp->deskripsi . '</th>
							<td class="align-middle">Rp. ' . number_format((float)$debit) . '</td>
							<td class="align-middle">Rp. ' . number_format((float)$kredit) . '</td>
							<td class="align-middle">Rp. ' . number_format((float)$saldo_awal) . '</td>
						</tr>';
		}
		echo $html;
	}
}
	
	/* End of file Buku_Besar.php */
	/* Location: ./application/controllers/admin/Buku_Besar.php */
