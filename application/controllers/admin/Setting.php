<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

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
		$this->load->view('admin/setting');
		$this->load->view('_partials/footer');
		$this->load->view('_partials/plugin');
		$this->load->view('services/admin/setting');
	}

	public function view_setting()
	{
		$data = array();
		$get = $this->AdminModel->get_setting();

		foreach ($get as $gt) {
			$data = array(
				'nama_perusahaan'	=> $gt->nama_perusahaan,
				'alamat' 			=> $gt->alamat,
				'provinsi' 			=> $gt->provinsi,
				'kota'				=> $gt->kota,
				'kec' 				=> $gt->kec,
				'saldo_awal' 		=> 'Rp. ' . number_format($gt->saldo_awal),
				'saldo' 		=> $gt->saldo_awal,
				'pimpinan' 			=> $gt->pimpinan,
				'logo' 				=> $gt->logo,
				'nama_lengkap' 		=> $gt->nama_lengkap,
				'username' 		=> $gt->username,
				'email' 		=> $gt->email,
				'status' 		=> $gt->status,
				'foto' 			=> $gt->foto,
				'direksi'		=> $this->AdminModel->get_direksi()
			);
		}
		echo json_encode($data);
	}

	public function update_direktur()
	{
		$config['upload_path'] = './assets/dist/img/direktur/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '1024';
		$config['file_name'] = $this->input->post('username');
		$this->load->library('upload', $config);

		if ($this->upload->do_upload("foto")) {
			$foto = $this->upload->file_name;
			@unlink("./assets/dist/img/direktur/" . $this->input->post('foto_lama'));
		} else {
			$foto = '';
		}

		$id = $this->input->post('id');
		$data = array(
			'username' 				=> $this->input->post('username'),
			'email' 				=> $this->input->post('email'),
			'nama_lengkap' 			=> $this->input->post('nama_lengkap'),
			'status' 				=> 'Aktif',
			'password' 				=> hash('sha512', $this->input->post('password') . config_item('encryption_key')),
			'created_at' 			=> date('Y-m-d H:i:s'),
			'created_by' 			=> $this->session->userdata('id'),
			'foto' 					=> $foto
		);

		$data = $this->AdminModel->update_direktur($data, $id);
		$response = array(
			'status' => 'success',
			'title' => 'SUKSES !!!',
			'message' => 'Data Berhasil Di Simpan',
		);

		echo json_encode($response);
	}

	public function update_perusahaan()
	{
		$config['upload_path'] = './assets/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '1024';
		$config['file_name'] = 'Perusahaan';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload("logo")) {
			$logo = $this->upload->file_name;
			@unlink("./assets/dist/img/" . $this->input->post('logo_lama'));
		} else {
			$logo = '';
		}

		$data = array(
			'nama_perusahaan' 				=> $this->input->post('nama_perusahaan'),
			'alamat' 				=> $this->input->post('alamat'),
			'provinsi' 			=> $this->input->post('provinsi'),
			'kota' 			=> $this->input->post('kota'),
			'kec' 			=> $this->input->post('kec'),
			'saldo_awal' 			=> $this->input->post('saldo_awal'),

			'logo' 					=> $logo
		);

		$data = $this->AdminModel->update_perusahaan($data);
		$response = array(
			'status' => 'success',
			'title' => 'SUKSES !!!',
			'message' => 'Data Berhasil Di Simpan',
		);

		echo json_encode($response);
	}
}
	
	/* End of file Setting.php */
	/* Location: ./application/controllers/admin/Setting.php */
