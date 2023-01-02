<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_masuk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_transaksi_masuk_detail');
        $this->load->model('model_transaksi_masuk');
        $this->load->model('model_barang');
        $this->load->model('model_konektor');
        $this->load->model('model_jenis_obat');
        $this->load->model('model_merk');
        $this->load->model('model_jenis');
        $this->load->model('model_kategori');
        $this->load->model('model_profile');
        
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_transaksi_masuk->tampil_data();
        
        // print_r($record[0]->id_transaksi);
        // die;
        
        $this->template->load('template','transaksi_masuk/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            
            $notandaterima       =   $this->input->post('no_tanda_terima');
            $tgl_terima   =   $this->input->post('tgl_terima');
            $supplier   =   $this->input->post('supplier');
            $iduser   =   $this->input->post('id_user');
            $tglinput = date("Y-m-d");
            $data       = array('no_tanda_terima'=>$notandaterima,
                                'tgl_terima'=>$tgl_terima,
                                'id_supplier'=>$supplier,
                                'id_user'=>$iduser,
                                'tgl_input'=>$tglinput);
            $this->model_transaksi_masuk->post($data);
            //mengambil nilai id transaksi
            $id = $this->db->insert_id();
            // print_r($id);
            // die;
            // $this->template->load('template','transaksi_masuk/form_input_barang',$data);
            redirect('transaksi_masuk/form_input_barang/'.$id);
        }
        else{
            $this->load->model('model_kategori');
            $this->load->model('model_supplier');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['supplier']=  $this->model_supplier->tampilkan_data()->result();
            $data['record'] = $this->model_transaksi_masuk->tampil_data();

            $bln=date("m");
            $thn=date("Y");
            $cek = $this->model_transaksi_masuk->get_one_kd($bln,$thn)->result();
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
           $tandaterima = "TD/".$bln."/".$thn."/".$max0;
        //    print_r($tandaterima);
        //    die;
            $data['no_tanda_terima'] = $tandaterima;
            // $kd_barang=$kdbrg.$max0;

            //$this->load->view('transaksi_masuk/form_input',$data);
            $this->template->load('template','transaksi_masuk/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id       =   $this->input->post('id');
            $notandaterima       =   $this->input->post('no_tanda_terima');
            $tgl_terima   =   $this->input->post('tgl_terima');
            $supplier   =   $this->input->post('supplier');
            // $iduser   =   $this->input->post('id_user');
            $tglinput = date("Y-m-d");
            $data       = array('no_tanda_terima'=>$notandaterima,
                                'tgl_terima'=>$tgl_terima,
                                'id_supplier'=>$supplier,
                                'tgl_input'=>$tglinput);

            $this->db->where('id_transaksi',$id);
            $this->db->update('transaksi_masuk',$data);
            // $this->model_transaksi_masuk->edit($data,$id);
            redirect('transaksi_masuk');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $this->load->model('model_supplier');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['supplier']=  $this->model_supplier->tampilkan_data()->result();
            $data['record']     =  $this->model_transaksi_masuk->get_one($id)->row_array();
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->template->load('template','transaksi_masuk/form_edit',$data);
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
            $this->load->model('model_transaksi_masuk_detail');
            $trmasuk     =  $this->model_transaksi_masuk->get_one($id)->row_array();
            $disupp =$trmasuk['id_supplier'];
            // print_r($trmasuk['id_transaksi']);
            // die;
            $data['record']     =  $this->model_transaksi_masuk->get_one($id)->row_array();
            $data['supplier']   =  $this->model_supplier->get_one($disupp)->result();
            $data['list']   =  $this->model_transaksi_masuk_detail->get_one_transaksi($id);

            // $record= $this->model_transaksi_masuk->tampil_data()->row_array();
            // $dtrecord = array('id_transaksi'=>$record['id_transaksi']);
            $data['qtybarang'] = $this->model_transaksi_masuk_detail->get_one_cek_trans($id)->result();
            // $qtybarang = $this->model_transaksi_masuk_detail->get_one_cek_trans($id)->result();
            // print_r($qtybarang[0]->jml);
            // die;
            // $id = 
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->template->load('template','transaksi_masuk/form_input_barang',$data);
        }
    }

    function cetak()
    {
       
            $id=  $this->uri->segment(3);
            $this->load->model('model_supplier');
            $this->load->model('model_transaksi_masuk_detail');
            $trmasuk     =  $this->model_transaksi_masuk->get_one($id)->row_array();
            $disupp =$trmasuk['id_supplier'];
            $data['record']     =  $this->model_transaksi_masuk->get_one($id)->row_array();
            $data['profile']   =  $this->model_profile->tampilkan_data()->result();
            $data['supplier']   =  $this->model_supplier->get_one($disupp)->result();
            $data['list']   =  $this->model_transaksi_masuk_detail->get_one_transaksi($id);
            $data['qtybarang'] = $this->model_transaksi_masuk_detail->get_one_cek_trans($id)->result();
            // $this->template->load('template','transaksi_masuk/form_input_barang',$data);
            $this->load->view('cetak/cetak_tanda_terima',$data);
        
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_transaksi_masuk->delete($id);
        redirect('transaksi_masuk');
    }
}