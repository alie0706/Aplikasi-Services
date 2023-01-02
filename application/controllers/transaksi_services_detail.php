<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_services_detail extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_transaksi_services_detail');
        $this->load->model('model_transaksi_services');
        $this->load->model('model_customer_alat');
        
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_transaksi_services->tampil_data();
        $this->template->load('template','transaksi_services_detail/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){

          

            // proses barang
            
            $idtransaksiservice       =   $this->input->post('id_transaksi_services');
            $id_customer_alat = $this->input->post('id_customer_alat');
            $qty = $this->input->post('qty');
            $harga_services = $this->input->post('harga_services');
            $keluhan_alat = $this->input->post('keluhan_alat');
            $keterangan_alat = $this->input->post('keluhan_alat');
            
            
            //insert ke table transaksi detail
                    $data       = array(
                                    'id_transaksi_services' => $idtransaksiservice,
                                    'id_customer_alat' => $id_customer_alat,
                                    'qty' => $qty,
                                    'harga_services' => $harga_services,
                                    'keluhan_alat' => $keluhan_alat,
                                    'keterangan_alat' => $keterangan_alat
                                );
                    $this->model_transaksi_services_detail->post($data);

            
            redirect('transaksi_services/form_input_material/'.$idtransaksiservice);
            // redirect('transaksi_services/form_input_barang/'.$id);
        }
        else{
            $id =  $this->uri->segment(3);
            // $data['barang']=  $this->model_barang->tampilkan_data()->result();
            $record = $this->model_transaksi_services->get_one($id)->result();
            // print_r($record[0]->id_customer);
            // die;
            $data['record']     =  $this->model_transaksi_services->get_one($id)->result();
            
            $data['recordalat']     =  $this->model_customer_alat->Get_customer($record[0]->id_customer)->result();
            // print_r($this->uri->segment(3));
            //$this->load->view('transaksi_services/form_input',$data);
            $this->template->load('template','transaksi_services_detail/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            // $idtransaksi_detail       =   $this->input->post('id');
            // $idtransaksi       =   $this->input->post('id_transaksi');
            // $id_kategori = $this->input->post('kategori');
            // $id_jenis = $this->input->post('jenis');
            // $id_merk = $this->input->post('merk');
            // $id_jenis_obat = $this->input->post('jenis_obat');
            // $id_konektor = $this->input->post('konektor');
            // $kd_barang = $this->input->post('kd_barang');
            // $nama_barang = $this->input->post('nama_barang');
            // $qty = $this->input->post('qty');
            // $keterangan = $this->input->post('keterangan');

            // //cek kode barang 

            // $data       = array('nama_barang'=>$nama,
            //                     'id_kategori'=>$kategori,
            //                     'harga'=>$harga);
            // $this->model_barang->edit($data,$id);
            // redirect('barang');
        }
        else{
            $this->load->model('model_kategori');
            $this->load->model('model_supplier');
            // $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $id =  $this->uri->segment(3);
            $iddetail =  $this->uri->segment(4);

            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['merk']=  $this->model_merk->tampilkan_data()->result();
            $data['jenis_obat']=  $this->model_jenis_obat->tampilkan_data()->result();
            $data['konektor']=  $this->model_konektor->tampilkan_data()->result();

            $data['record']     =  $this->model_transaksi_services->get_one($id)->row_array();
            $data['recorddetail']     =  $this->model_transaksi_services_detail->get_one($iddetail)->row_array();
            $ckbarang     =  $this->model_transaksi_services_detail->get_one($iddetail)->result();

            $data['cekbarang'] = $this->model_barang->get_one_cek($ckbarang[0]->kd_barang)->result();
            
            //$this->load->view('transaksi_services/form_edit',$data);
            $this->template->load('template','transaksi_services_detail/form_edit',$data);
        }
    }
    

    function form_input_barang()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'id_kategori'=>$kategori,
                                'harga'=>$harga);
            $this->model_barang->edit($data,$id);
            redirect('barang');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_supplier');
            $this->load->model('model_transaksi_services_detail');
            $trmasuk     =  $this->model_transaksi_services->get_one($id)->row_array();
            $disupp =$trmasuk['id_supplier'];
            // print_r($trmasuk['id_transaksi']);
            // die;
            $data['record']     =  $this->model_transaksi_services->get_one($id)->row_array();
            $data['supplier']   =  $this->model_supplier->get_one($disupp)->result();
            $data['list']   =  $this->model_transaksi_services_detail->get_one_transaksi($id);

            // $id = 
            //$this->load->view('transaksi_services/form_edit',$data);
            $this->template->load('template','transaksi_services/form_input_barang',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $kd=  $this->uri->segment(4);
        //cek kode barang
        
       

        $this->model_transaksi_services_detail->delete($kd);
        redirect('transaksi_services/form_input_material/'.$id);
    }
}