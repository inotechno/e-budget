<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DirekturModel extends CI_Model
{

	function view_pengajuan_advance()
	{
		$this->db->select('pengajuan.*, karyawan.nama_lengkap');
		$this->db->select('
				CASE 
				WHEN pengajuan.status = 0 THEN "Belum Di Ajukan" 
				WHEN pengajuan.status = 1 THEN "Validasi" 
				WHEN pengajuan.status = 2 THEN "Sedang Berjalan" 
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
				WHEN status = 2 THEN "Sedang Berjalan" 
				WHEN status = 3 THEN "Validasi"
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
		$this->db->group_start();
		$this->db->where('status_detail', NULL);
		$this->db->or_where('status_detail !=', 0);
		$this->db->group_end();
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

	function get_karyawan($id)
	{
		$this->db->select('id, nik, nama_lengkap, tempat_lahir, tanggal_lahir, hp, jabatan, pendidikan, jenis_kelamin, agama, username, email, foto, alamat');
		$this->db->from('karyawan');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}

	function validasi_pengajuan($id, $data)
	{
		$this->db->update('pengajuan', $data, array('id' => $id));
	}

	function CheckValidation($id)
	{
		return $this->db->get_where('pengajuan', ['id' => $id]);
	}
}
	
	/* End of file PengajuanModel.php */
	/* Location: ./application/models/PengajuanModel.php */
