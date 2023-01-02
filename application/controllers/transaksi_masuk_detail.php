<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_masuk_detail extends CI_Controller{
    
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

            //barcode 

            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
     
            

            // proses barang
            
            $idtransaksi       =   $this->input->post('id_transaksi');
            $id_kategori = $this->input->post('kategori');
            $id_jenis = $this->input->post('jenis');
            $id_merk = $this->input->post('merk');
            $id_jenis_obat = $this->input->post('jenis_obat');
            $id_konektor = $this->input->post('konektor');
            // $kdbarang = $this->input->post('kd_barang');
            $serial_number = $this->input->post('serial_number');
            $qty = $this->input->post('qty');
            $keterangan = $this->input->post('keterangan');

            $idjns=$this->model_jenis->get_one($id_jenis)->result();
            $idmerk=$this->model_merk->get_one($id_merk)->result();
            $idjnsobat=$this->model_jenis_obat->get_one($id_jenis_obat)->result();
            $idkonektor=$this->model_konektor->get_one($id_konektor)->result();

            $idjenis1 = isset($idjns[0]->kd_jenis) ? $idjns[0]->kd_jenis:"" ;
            $idmerk1 = isset($idmerk[0]->kd_merk) ? $idmerk[0]->kd_merk:"" ;
            $idjenis_obat1 = isset($idjnsobat[0]->kd_jenis_obat) ? $idjnsobat[0]->kd_jenis_obat:"" ;
            $idkonektor1 = isset($idkonektor[0]->kd_konektor) ? $idkonektor[0]->kd_konektor:"" ;

            $nmjenis = isset($idjns[0]->nama_jenis) ? $idjns[0]->nama_jenis:"" ;
            $nmmerk = isset($idmerk[0]->nama_merk) ? $idmerk[0]->nama_merk:"" ;
            $nmjenisobat = isset($idjnsobat[0]->nama_jenis_obat) ? $idjnsobat[0]->nama_jenis_obat:"" ;
            $nmkonektor = isset($idkonektor[0]->nama_konektor) ? $idkonektor[0]->nama_konektor:"" ;

            $kdbrg=$id_kategori.$idjenis1.$idmerk1.$idjenis_obat1.$idkonektor1;
            
            $nama_barang = $nmjenis." ".$nmmerk." ".$nmjenisobat." ".$nmkonektor." ".$serial_number;
            
            // $cek = $this->model_barang->get_one_kd($kdbrg)->result();
            $cek = $this->model_barang->get_one_kd_detail($id_kategori,$id_jenis,$id_merk,$id_jenis_obat,$id_konektor)->result();
            // print_r($cek[0]->jml);
            // die;
            $max = $cek[0]->jml + 1;
            if(strlen($max) == 1)
				$max0 = "00".$max;
				elseif(strlen($max) == 2)
				$max0 = "0".$max;
				elseif(strlen($max) == 3)
				$max0 = $max;

            $kd_barang=$kdbrg.$max0;
            // print_r($kd_barang);
            // die;

            
            $image_name=$kd_barang.'.png'; //buat name dari qr code sesuai dengan nim
     
            $params['data'] = $kd_barang; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            // print_r($idtransaksi);
            // die;
            //insert ke table transaksi detail
                    $data       = array(
                                    'id_transaksi' => $idtransaksi,
                                    'id_kategori' => $id_kategori,
                                    'id_jenis' => $id_jenis,
                                    'id_merk' => $id_merk,
                                    'id_jenis_obat' => $id_jenis_obat,
                                    'id_konektor' => $id_konektor,
                                    'kd_barang' => $kd_barang,
                                    'qty' => $qty
                                );
                    // $this->model_transaksi_masuk_detail->post($data);
                    $this->db->insert('transaksi_masuk_detail',$data);
            //insert ke table barang
            //cek jika barang ada tambah stok
            $hasil=  $this->model_barang->cekhasil($kd_barang);
            // print_r($hasil);
            // die;
            if($hasil > 0){
            $cekbarang = $this->model_barang->get_one_cek_detail($id_kategori,$id_jenis,$id_merk,$id_jenis_obat,$id_konektor)->result();
            $ckbrg = $cekbarang[0]->stok ? $cekbarang[0]->stok:0;
            $jmlstok = $ckbrg + $qty;
            // print_r($ckbrg);
            // die;
            $databarang       = array(
                                    'stok' => $jmlstok);
            // $this->model_transaksi_masuk_detail->editbarang($databarang,$kd_barang);
            $this->db->where('kd_barang',$kd_barang);
            $this->db->update('m_barang',$databarang);
            }
            else{
            $databarang       = array(
                                'id_kategori' => $id_kategori,
                                'id_jenis' => $id_jenis,
                                'id_merk' => $id_merk,
                                'id_jenis_obat' => $id_jenis_obat,
                                'id_konektor' => $id_konektor,
                                'kd_barang' => $kd_barang,
                                'serial_number' => $serial_number,
                                'nama_barang' => $nama_barang,
                                'stok' => $qty,
                                'keterangan' => $keterangan,
                                'qr_code'=>$image_name);
            // $this->model_transaksi_masuk_detail->postbarang($databarang);
            $this->db->insert('m_barang',$databarang);
            }
            redirect('transaksi_masuk/form_input_barang/'.$idtransaksi);
            // redirect('transaksi_masuk/form_input_barang/'.$id);
        }
        else{
            $this->load->model('model_kategori');
            $this->load->model('model_supplier');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $id =  $this->uri->segment(3);
            $data['record']     =  $this->model_transaksi_masuk->get_one($id)->result();
            // print_r($this->uri->segment(3));
            //$this->load->view('transaksi_masuk/form_input',$data);
            $this->template->load('template','transaksi_masuk_detail/form_input',$data);
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

            $data['record']     =  $this->model_transaksi_masuk->get_one($id)->row_array();
            $data['recorddetail']     =  $this->model_transaksi_masuk_detail->get_one($iddetail)->row_array();
            $ckbarang     =  $this->model_transaksi_masuk_detail->get_one($iddetail)->result();

            $data['cekbarang'] = $this->model_barang->get_one_cek($ckbarang[0]->kd_barang)->result();
            
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->template->load('template','transaksi_masuk_detail/form_edit',$data);
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

            // $id = 
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->template->load('template','transaksi_masuk/form_input_barang',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $kd=  $this->uri->segment(4);
        //cek kode barang
        
        $qtybarang = $this->model_transaksi_masuk_detail->get_one_cek($kd)->result();
        // print_r($cekbarang[0]->qty);
        // die;
        $kdbarang=$qtybarang[0]->kd_barang;
        $qtybrg=$qtybarang[0]->qty;
        $cekbarang = $this->model_barang->get_one_cek($kdbarang)->result();
        $ckbrg = $cekbarang[0]->stok ? $cekbarang[0]->stok:0;
        $jmlstok = $ckbrg - $qtybrg;
        // print_r($jmlstok);
        // die;
        $databarang       = array(
                                'stok' => $jmlstok);
        // $this->model_transaksi_masuk_detail->editbarang($databarang,$kd_barang);
        $this->db->where('kd_barang',$kdbarang);
        $this->db->update('m_barang',$databarang);

        $this->model_transaksi_masuk_detail->deletebrg($kd);
        redirect('transaksi_masuk/form_input_barang/'.$id);
    }
}