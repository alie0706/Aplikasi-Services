<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksikeluar extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_customer_alat');
            $this->load->model('model_barang');
            $this->load->model('model_transaksi_keluar');
            $this->load->model('model_transaksi_keluar_detail');
        
        chek_session();
    }


    function index()
    {
        // $data['record'] = $this->model_transaksi_keluar->tampil_data();
        
        // print_r($record[0]->id_transaksi);
        // die;
        $tgl1       =   $this->input->post('tgl1');
        $tgl2   =   $this->input->post('tgl12');
            
            $data['record'] = $this->model_transaksi_keluar->cari($tgl1,$tgl2);
// print_r('test');
// die;
            $this->template->load('template','laporan/transaksi_keluar/lihat_data',$data);
        
        // $this->template->load('template','laporan/transaksi_keluar/lihat_data',$data);
    }
    
    
    function cari()
    {
            // proses barang
            
            $tgl1       =   $this->input->post('tgl1');
            $tgl2       =   $this->input->post('tgl2');
            $record = $this->model_transaksi_keluar->cari($tgl1,$tgl2)->result();
            // print_r($record[0]->no_tanda_terima);
            // die;
            $data['tgl1']       =   $this->input->post('tgl1');
            $data['tgl2']       =   $this->input->post('tgl2');
            $data['record'] = $this->model_transaksi_keluar->cari($tgl1,$tgl2);
            // $data['recorddetail']     =  $this->model_transaksi_keluar_detail->get_one_transaksi($record[0]->id_transaksi);
// print_r($tgl2);
// die;
            $this->template->load('template','laporan/transaksi_keluar/lihat_data',$data);
        
    }

    function cetak()
    {
            // proses barang
            
            $tgl1       =   $this->uri->segment(4);
            $tgl2       =   $this->uri->segment(5);
            $record = $this->model_transaksi_keluar->cari($tgl1,$tgl2)->result();
            // print_r($record[0]->no_tanda_terima);
            // die;
            $data['tgl1']       =   $this->uri->segment(4);
            $data['tgl2']       =   $this->uri->segment(5);
            $data['record'] = $this->model_transaksi_keluar->cari($tgl1,$tgl2);
            // $data['recorddetail']     =  $this->model_transaksi_keluar_detail->get_one_transaksi($record[0]->id_transaksi);
// print_r($tgl2);
// die;
            $this->load->view('cetak/laporan_transaksi_keluar',$data);
        
    }
}