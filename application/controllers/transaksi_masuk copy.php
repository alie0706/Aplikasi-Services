<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_masuk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_transaksi_masuk');
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
        $data['record'] = $this->model_transaksi_masuk->tampil_data();
        $this->template->load('template','transaksi_masuk/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            $notandaterima       =   $this->input->post('no_tanda_terima');
            $tgl_terima   =   $this->input->post('tgl_terima');
            $tglinput = date("Y-m-d");
            

            $id_kategori = $_POST['kategori'];
            $id_jenis = $_POST['jenis'];
            $id_merk = $_POST['merk'];
            $id_jenis_obat = $_POST['jenis_obat'];
            $id_konektor = $_POST['konektor'];
            $kd_barang = array($_POST['kd_barang']);
            $nama_barang = $_POST['nama_barang'];
            $qty = $_POST['qty'];
            $keterangan = $_POST['keterangan'];

            $data = array();        
            $index = 0; 
            $count = count($kd_barang);
            // print_r($kd_barang);
            // Set index array awal dengan 0    
            foreach($kd_barang as $kdbrg =>$val){ 
                
                // Kita buat perulangan berdasarkan nis sampai data terakhir      
                $data[] = array(   
                                            'id_kategori' => $id_kategori,
                                            'id_jenis' => $id_jenis,
                                            'id_merk' => $id_merk,
                                            'id_jenis_obat' => $id_jenis_obat,
                                            'id_konektor' => $id_konektor,
                                            'kd_barang' => $kd_barang[$kdbrg],
                                            'nama_barang' => $nama_barang[$kdbrg],
                                            'stok' => $qty[$kdbrg],
                                            'keterangan' => $keterangan[$kdbrg]       
                    // 'alamat'=>$alamat[$index],  
                    // Ambil dan set data alamat sesuai index array dari $index      
                );            
                $index++;    
            } 
            // print_r($count);      
            $sql = $this->model_transaksi_masuk->postbarang($data); 

            // if($sql){ 
            //     // Jika sukses      
            //     echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('transaksi_masuk')."';
            //     </script>";    
            // }else{ 
            //     // Jika gagal      
            //     echo "<script>alert('Data gagal disimpan');window.location = '".base_url('transaksi_masuk/post')."';
            //     </script>";    
            // }
            // Panggil fungsi save_batch yang ada di model siswa
            // redirect('transaksi_masuk');
        }
        else{
            $this->load->model('model_kategori');
            $this->load->model('model_supplier');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['supplier']=  $this->model_supplier->tampilkan_data()->result();
            //$this->load->view('transaksi_masuk/form_input',$data);
            $this->template->load('template','transaksi_masuk/form_input',$data);
        }
    }
    
    
    function edit()
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
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->model_barang->get_one($id)->row_array();
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->template->load('template','transaksi_masuk/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_barang->delete($id);
        redirect('barang');
    }
}