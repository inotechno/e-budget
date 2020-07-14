<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('DashboardModel');
            $this->load->model('BukuBesarModel');
        }
    
        public function index()
        {
            $this->load->view('_partials/head');
            $this->load->view('_partials/navbar');
            $this->load->view('_partials/sidebar');
            $this->load->view('dashboard');
            $this->load->view('_partials/footer');
            $this->load->view('services/dashboard');
        }

        public function get_debit_kredit()
        {
            $data['chart'] = $this->DashboardModel->get_debit_kredit();
            $get = $this->DashboardModel->get_data();
            $data['advance'] = $get->advance;
            $data['expanse'] = $get->expanse;

            $saldo = $this->BukuBesarModel->get_dkt();
            $get_saldo = $this->db->get('setting', array('id' => 0))->row();
            $saldo_awal = $get_saldo->saldo_awal;
            $total = $saldo_awal - $saldo->kredit + $saldo->debit;
            $data['total_saldo'] = 'Rp. '.number_format($total);

            $karyawan = $this->DashboardModel->get_karyawan();
            $data['karyawan'] = $karyawan->jumlah_karyawan;
            echo json_encode($data);
        }
    
    }
    
    /* End of file Dashboard.php */
    /* Location: ./application/controllers/direktur/Dashboard.php */
?>