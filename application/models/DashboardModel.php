<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class DashboardModel extends CI_Model {
	
		function get_debit_kredit()
		{
			$this->db->select('SUM(IF(detail_pengajuan.status_detail = 0, biaya, NULL)) as debit, SUM(IF(detail_pengajuan.status_detail = 1, biaya, NULL)) as kredit, MONTH(pengajuan.tgl_pengajuan) as daftar_bulan, YEAR(pengajuan.tgl_pengajuan) as daftar_tahun');
		$this->db->from('detail_pengajuan');
		$this->db->join('pengajuan', 'detail_pengajuan.id_pengajuan = pengajuan.id', 'left');
		$this->db->where('YEAR(pengajuan.tgl_pengajuan)', date('Y'));
		$this->db->group_by('daftar_bulan, daftar_tahun');
		return $this->db->get()->result();
		}

		function get_data()
		{
			$this->db->select('COUNT(IF(status = 1,1,NULL)) as advance, COUNT(IF(status = 3,1,NULL)) as expanse');
			return $this->db->get('pengajuan')->row();
		}

		function get_karyawan()
		{		
			$this->db->select('COUNT(*) as jumlah_karyawan');
			return $this->db->get('karyawan')->row();
		}
	
	}
	
	/* End of file DashboardModel.php */
	/* Location: ./application/models/DashboardModel.php */
?>