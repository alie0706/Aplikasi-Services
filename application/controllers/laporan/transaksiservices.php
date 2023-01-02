<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksiservices extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_transaksi_services_detail');
        $this->load->model('model_transaksi_services');
        $this->load->model('model_barang');
        $this->load->model('model_konektor');
        $this->load->model('model_jenis_obat');
        $this->load->model('model_merk');
        $this->load->model('model_jenis');
        $this->load->model('model_kategori');
        
        chek_session();
    }


    function index()
    {
        // $data['record'] = $this->model_transaksi_services->tampil_data();
        
        // print_r($record[0]->id_transaksi);
        // die;
        $tgl1       =   $this->input->post('tgl1');
        $tgl2   =   $this->input->post('tgl12');
            
            $data['record'] = $this->model_transaksi_services->cari($tgl1,$tgl2);
// print_r('test');
// die;
            $this->template->load('template','laporan/transaksi_services/lihat_data',$data);
        
        // $this->template->load('template','laporan/transaksi_services/lihat_data',$data);
    }
    
    
    function cari()
    {
            // proses barang
            
            $tgl1       =   $this->input->post('tgl1');
            $tgl2       =   $this->input->post('tgl2');
            $record = $this->model_transaksi_services->cari($tgl1,$tgl2)->result();
            // print_r($record[0]->no_tanda_terima);
            // die;
            $data['tgl1']       =   $this->input->post('tgl1');
            $data['tgl2']       =   $this->input->post('tgl2');
            $data['record'] = $this->model_transaksi_services->cari($tgl1,$tgl2);
            // $data['recorddetail']     =  $this->model_transaksi_services_detail->get_one_transaksi($record[0]->id_transaksi);
// print_r($tgl2);
// die;
            $this->template->load('template','laporan/transaksi_services/lihat_data',$data);
        
    }

    function cetak()
    {
            // proses barang
            
            $tgl1       =   $this->uri->segment(4);
            $tgl2       =   $this->uri->segment(5);
            $record = $this->model_transaksi_services->cari($tgl1,$tgl2)->result();
            // print_r($record[0]->no_tanda_terima);
            // die;
            $data['tgl1']       =   $this->uri->segment(4);
            $data['tgl2']       =   $this->uri->segment(5);
            $data['record'] = $this->model_transaksi_services->cari($tgl1,$tgl2);
            // $data['recorddetail']     =  $this->model_transaksi_services_detail->get_one_transaksi($record[0]->id_transaksi);
// print_r($tgl2);
// die;
            $this->load->view('cetak/laporan_transaksi_services',$data);
        
    }
}