<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {
	
		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/sidebar');
			$this->load->view('admin/profil');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
		}
	
	}
	
	/* End of file Profil.php */
	/* Location: ./application/controllers/karyawan/Profil.php */
?>