<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function get_karyawan($id)
		{
			$this->db->select('karyawan.id, nik, nama_lengkap, tempat_lahir, tanggal_lahir, hp, jabatan, pendidikan, jenis_kelamin, agama, username, email, foto, alamat, karyawan.status, COUNT(IF(pengajuan.status = 1, 1,NULL)) as pengajuan_proses, COUNT(IF(pengajuan.status = 4, 1,NULL)) as pengajuan_selesai, COUNT(pengajuan.status) as total_pengajuan');
			$this->db->from('karyawan');
			$this->db->join('pengajuan', 'pengajuan.id_karyawan = karyawan.id', 'left');
			$this->db->where('karyawan.id', $id);
			return $this->db->get()->result();
		}
	
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
?>