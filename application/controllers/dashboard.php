<?php
class Dashboard extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_transaksi_masuk','model_transaksi_keluar','model_transaksi_services','model_barang'));
    }
    
    function index(){
        chek_session();
        $data['jumlahtransaksimasuk']= $this->model_transaksi_masuk->tampil_data()->num_rows();
        $data['jumlahtransaksikeluar']= $this->model_transaksi_keluar->tampil_data()->num_rows();
        $data['jumlahtransaksiservices']= $this->model_transaksi_services->tampil_data()->num_rows();
        $data['jumlahbarang']= $this->model_barang->tampil_data()->num_rows();

        $data['recordmasuk'] = $this->model_transaksi_masuk->tampil_data();
        $data['recordkeluar'] = $this->model_transaksi_keluar->tampil_data();
        $data['recordservices'] = $this->model_transaksi_services->tampil_data();
        $this->template->load('template','v_dashboard',$data);
    }
}