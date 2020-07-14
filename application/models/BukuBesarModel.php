<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class BukuBesarModel extends CI_Model {
	
		function get_dkt()
		{
			$this->db->select('SUM(IF(status_detail = 0, biaya, NULL)) as debit, SUM(IF(status_detail = 1, biaya, NULL)) as kredit');
			$this->db->from('detail_pengajuan');
			return $this->db->get()->row();
		}

		function get_transaksi()
		{
			$this->db->select('detail_pengajuan.*, pengajuan.no_pengajuan');
			$this->db->from('detail_pengajuan');
			$this->db->join('pengajuan', 'pengajuan.id = detail_pengajuan.id_pengajuan', 'left');
			$this->db->where('detail_pengajuan.status_detail !=', NULL);
			return $this->db->get()->result();
		}
	
	}
	
	/* End of file BukuBesarModel.php */
	/* Location: ./application/models/BukuBesarModel.php */
?>