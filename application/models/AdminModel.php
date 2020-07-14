<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class AdminModel extends CI_Model {

		function view_pengajuan_advance()
		{
			$this->db->select('pengajuan.*, karyawan.nama_lengkap');
			$this->db->select('
				CASE 
				WHEN pengajuan.status = 0 THEN "Ubah" 
				WHEN pengajuan.status = 1 THEN "Sedang Di Proses" 
				WHEN pengajuan.status = 2 THEN "Sudah Di Terima" 
				WHEN pengajuan.status = 3 THEN "Sedang Di Proses" 
				WHEN pengajuan.status = 4 THEN "Sudah Selesai"
				END as status_pengajuan', false);
			$this->db->from('pengajuan');
			$this->db->join('karyawan', 'karyawan.id = pengajuan.id_karyawan', 'left');
			$this->db->where('pengajuan.status', 0);
			$this->db->or_where('pengajuan.status', 1);
			$this->db->or_where('pengajuan.status', 2);
			return $this->db->get()->result();
		}

		function view_pengajuan_expanse()
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
			$this->db->where('status', 2);
			$this->db->or_where('status', 3);
			$this->db->or_where('status', 4);
			return $this->db->get()->result();
		}

		function view_detail_pengajuan_advance($id)
		{
			$this->db->select('*');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			return $this->db->get()->result();
		}

		function view_detail_pengajuan_expanse($id)
		{
			$this->db->select('*');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			$this->db->where('status_detail', NULL);
			$this->db->or_where('status_detail !=', 0);
			return $this->db->get()->result();
		}

		function validasi_saldo($id)
		{
			$this->db->select('SUM(detail_pengajuan.qty*detail_pengajuan.biaya) as total');
			$this->db->from('detail_pengajuan');
			$this->db->where('id_pengajuan', $id);
			return $this->db->get()->row();
		}
		
		function view_karyawan()
		{
			return $this->db->get('karyawan')->result();
		}

		function validasi_add($username, $nik, $email)
		{
			$this->db->where('nik', $nik);
			$this->db->or_where('username', $username);
			$this->db->or_where('email', $email);
			return $this->db->get('karyawan');
		}

		function tambah_karyawan($data)
		{
			$this->db->insert('karyawan', $data);
		}

		function get_karyawan($id)
		{
			$this->db->select('id, nik, nama_lengkap, tempat_lahir, tanggal_lahir, hp, jabatan, pendidikan, jenis_kelamin, agama, username, email, foto, alamat');
			$this->db->from('karyawan');
			$this->db->where('id', $id);
			return $this->db->get()->result();
		}

		function ubah_karyawan($id, $data)
		{
			$this->db->update('karyawan', $data, array('id' => $id));
		}

		function get_setting()
		{
			$this->db->select('direktur.*, setting.*');
			$this->db->from('setting');
			$this->db->join('direktur', 'direktur.id = setting.pimpinan', 'left');
			$this->db->where('setting.id', 0);
			return $this->db->get()->result();
		}

		function update_direktur($data)
		{
			$this->db->update('direktur', $data, array('id' => 0));
		}

		function update_perusahaan($data)
		{
			$this->db->update('setting', $data, array('id' => 0));
		}
	
	}
	
	/* End of file PengajuanModel.php */
	/* Location: ./application/models/PengajuanModel.php */
?>