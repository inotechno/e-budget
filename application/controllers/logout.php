
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{

		if ($this->session->userdata('link') == 'admin') {
			$this->session->sess_destroy();
			redirect(base_url('admin/login'));
		}
		if ($this->session->userdata('link') == 'direktur') {
			$this->session->sess_destroy();
			redirect(base_url('direktur/login'));
		}
		if ($this->session->userdata('link') == 'karyawan') {
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}


	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */
 ?>