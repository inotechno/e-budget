<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Daftar_Karyawan extends CI_Controller {

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
			$this->load->view('direktur/daftar_karyawan');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/direktur/daftar_karyawan');
		}

		public function get_karyawan_by_id()
		{
			$data = array();
			$id = $this->input->get('id');
			$get = $this->AdminModel->get_karyawan($id);
			foreach ($get as $gt) {
				$data = array(
					'id' => $gt->id,
					'nik' => $gt->nik,
					'nama_lengkap' => $gt->nama_lengkap,
					'tempat_lahir' => $gt->tempat_lahir,
					'tanggal_lahir' => $gt->tanggal_lahir,
					'hp' => $gt->hp,
					'jabatan' => $gt->jabatan,
					'pendidikan' => $gt->pendidikan,
					'jenis_kelamin' => $gt->jenis_kelamin,
					'agama' => $gt->agama,
					'username' => $gt->username,
					'email' => $gt->email,
					'alamat' => $gt->alamat,
					'foto' => $gt->foto
					);
			}
			echo json_encode($data);
		}

		public function view_karyawan()
		{
			$html = '';
			$data = $this->AdminModel->view_karyawan();

			foreach ($data as $dp) {
				if ($dp->foto == '') {
    				$foto = 'default.jpg';
    			}else{
    				$foto = $dp->foto;
    			}
    			
				$html .= '<tr>
							<th style="width:40px" class="text-center align-middle"><img width="35" height="40" src="'.base_url('assets/dist/img/karyawan/'.$foto).'"></th>
							<td class="align-middle">'.$dp->nik.'</td>
							<td class="align-middle">'.$dp->nama_lengkap.'</td>
							<td class="align-middle">'.$dp->tempat_lahir.', '.date('d-m-Y', strtotime($dp->tanggal_lahir)).'</td>

						</tr>';
			}
			echo $html;
		}

		
	
	}
	
	/* End of file Daftar_Karyawan.php */
	/* Location: ./application/controllers/admin/Daftar_Karyawan.php */
?>