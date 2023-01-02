<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_services extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_transaksi_services_detail');
        $this->load->model('model_transaksi_services');
        $this->load->model('model_customer_alat');
        $this->load->model('model_barang');
        $this->load->model('model_profile');
        
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_transaksi_services->tampilkan_data();
        
        // print_r($record[0]->id_transaksi_services);
        // die;
        
        $this->template->load('template','transaksi_services/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            
            $noservices       =   $this->input->post('no_services');
            $tgl_terima   =   $this->input->post('tgl_terima');
            $customer   =   $this->input->post('customer');
            // $customeralat   =   $this->input->post('customeralat');
            $keluhan_services   =   $this->input->post('keluhan_services');
            $iduser   =   $this->input->post('id_user');
            $tglinput = date("Y-m-d");
            $data       = array('no_services'=>$noservices,
                                'tgl_terima'=>$tgl_terima,
                                'id_customer'=>$customer,
                                'keluhan_services'=>$keluhan_services,
                                'id_user'=>$iduser,
                                'tgl_input'=>$tglinput);
            $this->model_transaksi_services->post($data);
            //mengambil nilai id transaksi
            $id = $this->db->insert_id();
            // print_r($id);
            // die;
            // $this->template->load('template','transaksi_services/form_input_barang',$data);
            redirect('transaksi_services/form_input_material/'.$id);
        }
        else{
            $this->load->model('model_customer');
            $data['customer']=  $this->model_customer->tampilkan_data()->result();

            $bln=date("m");
            $thn=date("Y");
            $cek = $this->model_transaksi_services->get_one_kd($bln,$thn)->result();
            $max = $cek[0]->jml + 1;
            if(strlen($max) == 1)
				$max0 = "000".$max;
				elseif(strlen($max) == 2)
				$max0 = "00".$max;
				elseif(strlen($max) == 3)
				$max0 = "0".$max;
				elseif(strlen($max) == 4)
				$max0 = $max;
                
            // print_r($cek[0]->jml);
            // die;
           $tandaterima = "TS/".$bln."/".$thn."/".$max0;
        //    print_r($tandaterima);
        //    die;
            $data['no_services'] = $tandaterima;
            //$this->load->view('transaksi_services/form_input',$data);
            $this->template->load('template','transaksi_services/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id       =   $this->input->post('id');
            $noservices       =   $this->input->post('no_services');
            $tgl_terima   =   $this->input->post('tgl_terima');
            $customer   =   $this->input->post('customer');
            $customeralat   =   $this->input->post('customer_alat');
            $keluhan_services   =   $this->input->post('keluhan_services');
            $tglinput = date("Y-m-d");
            $data       = array('no_services'=>$noservices,
                                'tgl_terima'=>$tgl_terima,
                                'id_customer'=>$customer,
                                'id_customer_alat'=>$customeralat,
                                'keluhan_services'=>$keluhan_services,
                                'tgl_input'=>$tglinput);

            $this->db->where('id_transaksi_services',$id);
            $this->db->update('transaksi_services',$data);
            // $this->model_transaksi_services->edit($data,$id);
            redirect('transaksi_services');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_customer');
            $this->load->model('model_customer_alat');
            $data['customer']=  $this->model_customer->tampilkan_data()->result();
            $data['record']     =  $this->model_transaksi_services->get_one($id)->row_array();
            $transservices     =  $this->model_transaksi_services->get_one($id)->row_array();
            // print_r($transservices['id_customer']);
            // die;
            $data['customer_alat']=  $this->model_customer_alat->get_one($transservices['id_customer']);
            //$this->load->view('transaksi_services/form_edit',$data);
            $this->template->load('template','transaksi_services/form_edit',$data);
        }
    }

    function form_input_material()
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
            $this->load->model('model_customer');
            $this->load->model('model_customer_alat');
            $this->load->model('model_transaksi_services_detail');
            $trmasuk     =  $this->model_transaksi_services->get_one($id)->row_array();
            $idcustomer =$trmasuk['id_customer'];
            // $idcustomeralat =$trmasuk['id_customer_alat'];
            // print_r($trmasuk['id_transaksi_services']);
            // die;
            $data['record']     =  $this->model_transaksi_services->get_one($id)->row_array();
            $data['customer']   =  $this->model_customer->get_one($idcustomer)->result();
            // $data['customer_alat']   =  $this->model_customer_alat->get_one_alat($idcustomeralat)->result();
            $data['list']   =  $this->model_transaksi_services_detail->get_one_transaksi($id);

            $data['qtybarang'] = $this->model_transaksi_services_detail->get_one_cek_trans($id)->result();
            $this->template->load('template','transaksi_services/form_input_material',$data);
        }
    }

    function cetak()
    {
       
            $id=  $this->uri->segment(3);
            $this->load->model('model_customer');
            $this->load->model('model_customer_alat');
            $this->load->model('model_transaksi_services_detail');
            $trmasuk     =  $this->model_transaksi_services->get_one($id)->row_array();
            $idcustomer =$trmasuk['id_customer'];
            // $idcustomeralat =$trmasuk['id_customer_alat'];
            // print_r($trmasuk['id_transaksi_services']);
            // die;
            $data['record']     =  $this->model_transaksi_services->get_one($id)->result();
            if($trmasuk['ppn']==1){
                $data['profile']   =  $this->model_profile->tampilkan_data_ppn()->result();
                 }
                 else{
                     $data['profile']   =  $this->model_profile->tampilkan_data_non_ppn()->result();
                 }
            // $data['profile']   =  $this->model_profile->tampilkan_data()->result();
            $data['customer']   =  $this->model_customer->get_one($idcustomer)->result();
            // $data['customer_alat']   =  $this->model_customer_alat->get_one_alat($idcustomeralat)->result();
            $data['list']   =  $this->model_transaksi_services_detail->get_one_transaksi($id);

            $data['qtybarang'] = $this->model_transaksi_services_detail->get_one_cek_trans($id)->result();
            
            $this->load->view('cetak/cetak_services',$data);
        
    }

    function cetakinvoice()
    {
       
            $id=  $this->uri->segment(3);
            $this->load->model('model_customer');
            $this->load->model('model_customer_alat');
            $this->load->model('model_transaksi_services_detail');
            $trmasuk     =  $this->model_transaksi_services->get_one($id)->row_array();
            $idcustomer =$trmasuk['id_customer'];
            // $listing   =  $this->model_transaksi_services_detail->get_one_transaksi($id)->result();
            // print_r($trmasuk['ppn']);
            // die;

            // $idcustomeralat =$trmasuk['id_customer_alat'];
            // print_r($trmasuk['id_transaksi_services']);
            // die;
            // $record     =  $this->model_transaksi_services->get_one($id)->result();
            
            $data['record']     =  $this->model_transaksi_services->get_one($id)->result();
            if($trmasuk['ppn']==1){
                $data['profile']   =  $this->model_profile->tampilkan_data_ppn()->result();
                 }
                 else{
                     $data['profile']   =  $this->model_profile->tampilkan_data_non_ppn()->result();
                 }
 
            // $data['profile']   =  $this->model_profile->tampilkan_data()->result();
            $data['customer']   =  $this->model_customer->get_one($idcustomer)->result();
            // $data['customer_alat']   =  $this->model_customer_alat->get_one_alat($listing[0]->id_customer_alat)->result();
            $data['list']   =  $this->model_transaksi_services_detail->get_one_transaksi($id);

            $data['qtybarang'] = $this->model_transaksi_services_detail->get_one_cek_trans($id)->result();
            
            $this->load->view('cetak/cetak_invoice_services',$data);
        
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_transaksi_services->delete($id);
        redirect('transaksi_services');
    }

    function updateservices()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id_transaksi_services       =   $this->input->post('id_transaksi_services');
            $totalharga   =   $this->input->post('total_harga');
            $discount   =   $this->input->post('discount');
            $ppn   =   $this->input->post('ppn');
            $no_invoice   =   $this->input->post('no_invoice');
            $no_surat_jalan   =   $this->input->post('no_surat_jalan');
            $tgl_invoice   =   $this->input->post('tgl_invoice');
            if($ppn==1){
                $vpajak   =   $totalharga - $discount;
                $pajak   =   ($vpajak/100)*11;
            }
            else{
                $pajak   =   0;
            }
            $totalall   =   $this->input->post('total_all') + $pajak;
            // print_r($totalall);
            // die;
            // $total_all   =   $this->input->post('total_all');
            $data       = array('total_harga'=>$totalharga,
                                'discount'=>$discount,
                                'ppn'=>$ppn,
                                'pajak'=>$pajak,
                                'total_all'=>$totalall,
                                'no_invoice'=>$no_invoice,
                                'tgl_invoice'=>$tgl_invoice,
                                'no_surat_jalan'=>$no_surat_jalan);

            $this->db->where('id_transaksi_services',$id_transaksi_services);
            $this->db->update('transaksi_services',$data);
            // $this->model_transaksi_services->edit($data,$id);
            redirect('transaksi_services');
        }
        else{
            $id=   $this->input->post('id_transaksi_services');
            $this->load->model('model_customer');
            $this->load->model('model_customer_alat');
            $this->load->model('model_transaksi_services_detail');
            $trmasuk     =  $this->model_transaksi_services->get_one($id)->row_array();
            $idcustomer =$trmasuk['id_customer'];
            // $idcustomeralat =$trmasuk['id_customer_alat'];
            // print_r($trmasuk['id_transaksi_services']);
            // die;
            $data['record']     =  $this->model_transaksi_services->get_one($id)->row_array();
            $data['customer']   =  $this->model_customer->get_one($idcustomer)->result();
            // $data['customer_alat']   =  $this->model_customer_alat->get_one_alat($idcustomeralat)->result();
            $data['list']   =  $this->model_transaksi_services_detail->get_one_transaksi($id);

            $data['qtybarang'] = $this->model_transaksi_services_detail->get_one_cek_trans($id)->result();
            $this->template->load('template','transaksi_services/form_input_material',$data);
        }
    }
}