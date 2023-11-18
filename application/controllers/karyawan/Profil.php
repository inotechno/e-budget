<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UserModel');
		}
	
		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/sidebar');
			$this->load->view('karyawan/profil');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/karyawan/profil');
		}

		public function view_profil()
		{
			$data = array();
			$id = $this->session->userdata('id');
			$get = $this->UserModel->get_karyawan($id);
			foreach ($get as $gt) {
				$data = array(
					'id' 			=> $gt->id,
					'nik'			=> $gt->nik,
					'nama_lengkap' 	=> $gt->nama_lengkap,
					'tempat_lahir' 	=> $gt->tempat_lahir,
					'tanggal_lahir' => $gt->tanggal_lahir,
					'hp' 			=> $gt->hp,
					'jabatan' 		=> $gt->jabatan,
					'pendidikan' 	=> $gt->pendidikan,
					'jenis_kelamin' => $gt->jenis_kelamin,
					'agama' 		=> $gt->agama,
					'username' 		=> $gt->username,
					'email' 		=> $gt->email,
					'alamat' 		=> $gt->alamat,
					'status' 		=> $gt->status,
					'foto' 			=> $gt->foto,
					'pengajuan_proses' => $gt->pengajuan_proses,
					'pengajuan_selesai'=> $gt->pengajuan_selesai,
					'total_pengajuan' 	=> $gt->total_pengajuan
				);
			}
			echo json_encode($data);
		}
	
	}
	
	/* End of file Profil.php */
	/* Location: ./application/controllers/karyawan/Profil.php */
?>