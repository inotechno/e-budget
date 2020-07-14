<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class PengajuanModel extends CI_Model {

		function get_no_pengajuan()
		{
			$bulan = date('n');
			$tahun = date('Y');
			$array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
			$bln = $array_bln[$bulan];
			$nomor = "/e-Budget/".$bln."/".$tahun;

			$q = $this->db->query("SELECT MAX(no_pengajuan) AS kode_peng FROM pengajuan WHERE month(tgl_pengajuan)=$bulan");
			$kd = "";
			if ($q->num_rows()>0) {
				foreach ($q->result() as $k) {
					$tmp = ((int)$k->kode_peng)+1;
					$kd = sprintf("%02s", $tmp);
				}
			} else {
				$kd = "001";
			} 
			date_default_timezone_set('Asia/Jakarta');
			return $kd.$nomor;
		}
	
		function new_pengajuan($data)
		{
			$this->db->insert('pengajuan', $data);
		}

		function new_detail_pengajuan($data)
		{
			$this->db->insert('detail_pengajuan', $data);
		}

		function validasi_saldo($id)
		{
			$this->db->select('SUM(detail_pengajuan.qty*detail_pengajuan.biaya) as total');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			return $this->db->get()->row();
		}

		function edit_pengajuan($data, $id)
		{
			$this->db->update('pengajuan', $data, array('id' => $id));
		}

		function view_pengajuan_advance($id)
		{
			$this->db->select('*');
			$this->db->select('
				CASE 
				WHEN status = 0 THEN "Ubah" 
				WHEN status = 1 THEN "Sedang Di Proses" 
				WHEN status = 2 THEN "Sudah Di Terima" 
				WHEN status = 3 THEN "Sedang Di Proses" 
				WHEN status = 4 THEN "Sudah Selesai"
				END as status_pengajuan', false);
			$this->db->from('pengajuan');
			$this->db->where('id_karyawan', $id);
			$this->db->group_start();
				$this->db->or_where('status', 0);
				$this->db->or_where('status', 1);
			$this->db->group_end();
			return $this->db->get()->result();
		}

		function view_pengajuan_expanse($id)
		{
			$this->db->select('*');
			$this->db->select('
				CASE 
				WHEN status = 0 THEN "Ubah" 
				WHEN status = 1 THEN "Sedang Di Proses" 
				WHEN status = 2 THEN "Sudah Di Terima" 
				WHEN status = 3 THEN "Sedang Di Proses"
				WHEN status = 4 THEN "Sudah Selesai"
				END as status_pengajuan', false);

			$this->db->from('pengajuan');
			$this->db->where('id_karyawan', $id);
			$this->db->group_start();
				$this->db->or_where('status', 2);
				$this->db->or_where('status', 3);
				$this->db->or_where('status', 4);
			$this->db->group_end();
			return $this->db->get()->result();
		}

		function view_detail_pengajuan_advance($id)
		{
			$this->db->select('*');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			return $this->db->get()->result();
		}

		function delete_detail_pengajuan_advance($id)
		{
			$this->db->delete('detail_pengajuan', array('id' => $id));
		}


		function view_detail_pengajuan_expanse($id)
		{
			$this->db->select('*');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			$this->db->group_start();
				$this->db->or_where('status_detail', NULL);
				$this->db->or_where('status_detail !=', 0);
			$this->db->group_end();
			return $this->db->get()->result();
		}

		function delete_detail_pengajuan_expanse($data, $id)
		{
			$this->db->update('detail_pengajuan', $data, array('id' => $id));
		}

		function upload_detail_expanse($id, $data)
		{
			$this->db->update('detail_pengajuan', $data, array('id' => $id));
		}

		function validasi_saldo_expanse($id)
		{
			$this->db->select('SUM(detail_pengajuan.qty*detail_pengajuan.biaya) as total');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			$this->db->group_start();
				$this->db->or_where('status_detail', NULL);
				$this->db->or_where('status_detail !=', 0);
			$this->db->group_end();
			return $this->db->get()->row();
		}

	
	}
	
	/* End of file PengajuanModel.php */
	/* Location: ./application/models/PengajuanModel.php */
?>