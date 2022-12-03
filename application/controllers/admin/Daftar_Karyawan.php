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
			$this->load->view('admin/daftar_karyawan');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/daftar_karyawan');
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
    			if ($dp->status == 'Aktif') {
    				$status = '<input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Aktif" data-off-text="Tidak">';
    			}else{
    				$status = '<input type="checkbox" name="my-checkbox" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Aktif" data-off-text="Tidak">';
    			}
				$html .= '<tr>
							<th style="width:40px" class="text-center align-middle"><img width="35" height="40" src="'.base_url('assets/dist/img/karyawan/'.$foto).'"></th>
							<td class="align-middle">'.$dp->nik.'</td>
							<td class="align-middle">'.$dp->nama_lengkap.'</td>
							<td class="align-middle">'.$dp->tempat_lahir.', '.date('d-m-Y', strtotime($dp->tanggal_lahir)).'</td>
							<td class="align-middle">'.$status.'</td>
							<td class="align-middle">
								<button class="btn btn-sm btn-success text-center detail-karyawan" data-id="'.$dp->id.'">Update</button>
							</td>
						</tr>';
			}
			echo $html;
		}

		public function add_karyawan()
		{
			$username = $this->input->post('username');
			$nik = $this->input->post('nik');
			$email = $this->input->post('email');

			$validasi = $this->AdminModel->validasi_add($username, $nik, $email);

			if ($validasi->num_rows() > 0) {
				$response = array(
					'status' => 'error',
					'title' => 'GAGAL !!!',
					'message' => 'Data Karyawan Sudah Ada',
				 );
			}else{
				$config['upload_path'] = './assets/dist/img/karyawan/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = '1024';
		        $config['file_name'] = $this->input->post('nik');
		        $this->load->library('upload', $config);

		        if($this->upload->do_upload("foto")){
					$foto = $this->upload->file_name;
				} else {
					$foto = '';
				}

				$data = array(
		 			'nik' 					=> $this->input->post('nik'),
		 			'username' 				=> $this->input->post('username'),
		 			'email' 				=> $this->input->post('email'),
		 			'jabatan' 				=> $this->input->post('jabatan'),
		 			'pendidikan' 			=> $this->input->post('pendidikan'),
		 			'nama_lengkap' 			=> $this->input->post('nama_lengkap'),
		 			'tempat_lahir' 			=> $this->input->post('tempat_lahir'),
		 			'tanggal_lahir' 		=> $this->input->post('tanggal_lahir'),
		 			'agama' 				=> $this->input->post('agama'),
		 			'alamat' 				=> $this->input->post('alamat'),
		 			'jenis_kelamin' 		=> $this->input->post('jenis_kelamin'),
		 			'hp' 					=> $this->input->post('hp'),
		 			'status' 				=> 'Aktif',
		 			'level' 				=> 2,
		 			'password' 				=> hash('sha512', $this->input->post('password') . config_item('encryption_key')),
		 			
		 			'created_at' 			=> date('Y-m-d H:i:s'),
		 			'created_by' 			=> $this->session->userdata('id'),
		 			'foto' 					=> $foto
					 );

				$data = $this->AdminModel->tambah_karyawan($data);
				$response = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil Di Simpan',
				 );
			}
			echo json_encode($response);
		}

		public function update_karyawan()
		{
			$id = $this->input->post('id');
			$config['upload_path'] = './assets/dist/img/karyawan/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('nik');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/dist/img/karyawan/".$this->input->post('foto_lama'));
			} else {
				$foto = $this->input->post('foto_lama');
			} 
			
			$data = array(
		 			'nik' 					=> $this->input->post('nik'),
		 			'username' 				=> $this->input->post('username'),
		 			'email' 				=> $this->input->post('email'),
		 			'jabatan' 				=> $this->input->post('jabatan'),
		 			'pendidikan' 			=> $this->input->post('pendidikan'),
		 			'nama_lengkap' 			=> $this->input->post('nama_lengkap'),
		 			'tempat_lahir' 			=> $this->input->post('tempat_lahir'),
		 			'tanggal_lahir' 		=> $this->input->post('tanggal_lahir'),
		 			'agama' 				=> $this->input->post('agama'),
		 			'alamat' 				=> $this->input->post('alamat'),
		 			'jenis_kelamin' 		=> $this->input->post('jenis_kelamin'),
		 			'hp' 					=> $this->input->post('hp'),
		 			
		 			'created_at' 			=> date('Y-m-d H:i:s'),
		 			'created_by' 			=> $this->session->userdata('id'),
		 			'foto' 					=> $foto
					 );

			$this->AdminModel->ubah_karyawan($id, $data);
			$response = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Diubah',
			 );

			
			echo json_encode($response);
		}
	
	}
	
	/* End of file Daftar_Karyawan.php */
	/* Location: ./application/controllers/admin/Daftar_Karyawan.php */
?>