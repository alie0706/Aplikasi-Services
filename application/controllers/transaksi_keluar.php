<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_keluar extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // $this->load->model('model_transaksi_keluar_detail');
            $this->load->model('model_customer_alat');
            $this->load->model('model_profile');
            $this->load->model('model_barang');
            $this->load->model('model_transaksi_keluar');
            $this->load->model('model_transaksi_keluar_detail');
            $this->load->model('model_transaksi_keluar_detail_temp');
        $this->load->model('model_barang');
        
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_transaksi_keluar->tampil_data();
        
        // print_r($record[0]->id_transaksi_keluar);
        // die;
        
        $this->template->load('template','transaksi_keluar/lihat_data',$data);
    }
    

    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            
            // $no_transaksi       =   $this->input->post('no_transaksi');
            $no_transaksi       =   "TR/".date("Ymd")."/".date("his");
            $no_invoice   =   $this->input->post('no_invoice');
            $no_surat_jalan   =   $this->input->post('no_surat_jalan');
            $tgl_transaksi   =   $this->input->post('tgl_transaksi');
            $customer   =   $this->input->post('customer');
            $iduser   =   $this->input->post('id_user');
            $tglinput = date("Y-m-d");
            $totalharga   =   $this->input->post('total_harga');
            // $biayaservice   =   $this->input->post('biaya_service');
            $discount   =   $this->input->post('discount');
            $uang_muka   =   $this->input->post('uang_muka');
            // $sisa_bayar   =   $this->input->post('sisa_bayar');
            $ppn   =   $this->input->post('ppn');
            if($ppn==1){
                $vpajak   =   $totalharga - $discount;
                // $vpajak   =   $totalharga - $discount;
                $pajak   =   ($vpajak/100)*11;
            }
            else{
                $pajak   =   0;
            }
            $totalall   =   $this->input->post('total_all') + $pajak;
            $sisa_bayar   =   $totalall - $uang_muka;
            // echo $pajak."<br>";
           //  echo $totalall;
            // die;

            $data       = array('no_transaksi'=>$no_transaksi,
                                'no_invoice'=>$no_invoice,
								'no_surat_jalan'=>$no_surat_jalan,
                                'tgl_transaksi'=>$tgl_transaksi,
                                'id_customer'=>$customer,
                                'id_user'=>$iduser,
                                'tgl_input'=>$tglinput,
                                'total_harga'=>$totalharga,
                                'discount'=>$discount,
                                'ppn'=>$ppn,
                                'pajak'=>$pajak,
                                'total_all'=>$totalall,
                                'uang_muka'=>$uang_muka,
                                'sisa_bayar'=>$sisa_bayar);
            $this->db->insert('transaksi_keluar',$data);
            //mengambil nilai id transaksi
            $id = $this->db->insert_id();
            
            //insert ketable detail
            $isikeranjang = array();
            $sid = $this->session->userdata('session_id');
            
            $isikeranjang2 = $this->model_transaksi_keluar_detail_temp->isi_keranjang($sid);
            foreach ($isikeranjang2->result() as $r) {
                $isikeranjang[] = $r;
            }
            $jml          = count($isikeranjang);
            // simpan data detail pemesanan  
            for ($i = 0; $i < $jml; $i++){
                $databarang       = array('id_transaksi_keluar' => $id,
                                    'id_barang' => $isikeranjang[$i]->id_barang,
                                    'kd_barang' => $isikeranjang[$i]->kd_barang,
                                    'qty' =>$isikeranjang[$i]->qty,
                                    'harga' =>$isikeranjang[$i]->harga,
                                    'total' =>$isikeranjang[$i]->total,
                                    'keterangan' =>$isikeranjang[$i]->keterangan,
                                    'tgl_order'=>$isikeranjang[$i]->tgl_order_temp);
                $this->db->insert('transaksi_keluar_detail',$databarang);
            }

            // setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara
            for ($i = 0; $i < $jml; $i++) {
                $this->db->where('id_transaksi_keluar_detail',$isikeranjang[$i]->id_transaksi_keluar_detail);
                $this->db->delete('transaksi_keluar_detail_temp');
            
            }
            $query="UPDATE m_barang,transaksi_keluar_detail SET m_barang.stok=m_barang.stok-transaksi_keluar_detail.qty WHERE m_barang.id_barang=transaksi_keluar_detail.id_barang AND transaksi_keluar_detail.id_transaksi_keluar='$id'";
            $this->db->query($query);
            redirect('transaksi_keluar');
        }
        else{
            $this->load->model('model_customer');
            $data['barang']=  $this->model_barang->tampilkan_data()->result();
            $data['customer']=  $this->model_customer->tampilkan_data()->result();

            //data keranjang belanja
            $sid = $this->session->userdata('session_id');
            //get one keranjang belanja
            $this->load->model('model_transaksi_keluar_detail_temp');
            $data['keranjang']=  $this->model_transaksi_keluar_detail_temp->get_one($sid);

            // print_r($sid);
            // die;

            $this->template->load('template','transaksi_keluar/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id       =   $this->input->post('id');
            $notransaksikeluar       =   $this->input->post('no_transaksi_keluar');
            $no_surat_jalan   =   $this->input->post('no_surat_jalan');
            $tgl_transaksi   =   $this->input->post('tgl_transaksi');
            $customer   =   $this->input->post('customer');
            $customeralat   =   $this->input->post('customer_alat');
            $keluhan_keluar   =   $this->input->post('keluhan_keluar');
            $tglinput = date("Y-m-d");
            $data       = array('no_transaksi_keluar'=>$notransaksikeluar,
                                'no_surat_jalan'=>$no_surat_jalan,
                                'tgl_transaksi'=>$tgl_transaksi,
                                'id_customer'=>$customer,
                                'id_customer_alat'=>$customeralat,
                                'keluhan_keluar'=>$keluhan_keluar,
                                'tgl_input'=>$tglinput);

            $this->db->where('id_transaksi_keluar',$id);
            $this->db->update('transaksi_keluar',$data);
            // $this->model_transaksi_keluar->edit($data,$id);
            redirect('transaksi_keluar');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_customer');
            $this->load->model('model_barang');
            $this->load->model('model_transaksi_keluar_detail');

            //tampil transaksi keluar
            // $data['record']     =  $this->model_transaksi_keluar->get_one($id)->result();
            
            $record     =  $this->model_transaksi_keluar->get_one($id)->result();
            // $idcust =$record['id_customer'];           
            
            $listcustomer   =  $this->model_customer->tampilkan_data()->result();
            $customer   =  $this->model_customer->get_one($record[0]->id_customer)->result();
            $list   =  $this->model_transaksi_keluar_detail->get_one_barang($id)->result();
            $keranjang=  $this->model_transaksi_keluar_detail->get_one_barang($id);
            // $barang   =  $this->model_barang->get_one($list[0]->id_barang)->result();

            // print_r($list[0]->id_barang);
            // die;
            $data = array(
                'record'=>$record,
                'customer'=>$customer,
                'list'=>$list,
                'listcustomer'=>$listcustomer,
                'keranjang'=>$keranjang
                
            );
            $this->template->load('template','transaksi_keluar/form_edit',$data);
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
            $this->load->model('model_transaksi_keluar_detail');
            $trmasuk     =  $this->model_transaksi_keluar->get_one($id)->row_array();
            $idcustomer =$trmasuk['id_customer'];
            $idcustomeralat =$trmasuk['id_customer_alat'];
            // print_r($trmasuk['id_transaksi_keluar']);
            // die;
            $data['record']     =  $this->model_transaksi_keluar->get_one($id)->row_array();
            $data['customer']   =  $this->model_customer->get_one($idcustomer)->result();
            $data['customer_alat']   =  $this->model_customer_alat->get_one_alat($idcustomeralat)->result();
            $data['list']   =  $this->model_transaksi_keluar_detail->get_one_transaksi($id);

            $data['qtybarang'] = $this->model_transaksi_keluar_detail->get_one_cek_trans($id)->result();
            $this->template->load('template','transaksi_keluar/form_input_material',$data);
        }
    }

    function cetak()
    {
       
            $id=  $this->uri->segment(3);
            $this->load->model('model_customer');
            $this->load->model('model_barang');
            $this->load->model('model_transaksi_keluar_detail');

            //tampil transaksi keluar
            // $data['record']     =  $this->model_transaksi_keluar->get_one($id)->result();
            
            $record     =  $this->model_transaksi_keluar->get_one($id)->result();
            // $idcust =$record['id_customer'];           
            
            $customer   =  $this->model_customer->get_one($record[0]->id_customer)->result();
            $list   =  $this->model_transaksi_keluar_detail->get_one_barang($id)->result();
            // echo $record[0]->ppn;
            // die;
            if($record[0]->ppn==1){
            $profile   =  $this->model_profile->tampilkan_data_ppn()->result();
            }
            else{
                $profile   =  $this->model_profile->tampilkan_data_non_ppn()->result();
            }
            // $barang   =  $this->model_barang->get_one($list[0]->id_barang)->result();

            // print_r($list[0]->id_barang);
            // die;
            $data = array(
                'record'=>$record,
                'profile'=>$profile,
                'customer'=>$customer,
                'list'=>$list
                
            );
            $this->load->view('cetak/cetak_keluar',$data); 
        
    }

    function printsj()
    {
       
            $id=  $this->uri->segment(3);
            $this->load->model('model_customer');
            $this->load->model('model_barang');
            $this->load->model('model_transaksi_keluar_detail');

            //tampil transaksi keluar
            // $data['record']     =  $this->model_transaksi_keluar->get_one($id)->result();
            
            $record     =  $this->model_transaksi_keluar->get_one($id)->result();
            // $idcust =$record['id_customer'];           
            
            $customer   =  $this->model_customer->get_one($record[0]->id_customer)->result();
            $list   =  $this->model_transaksi_keluar_detail->get_one_barang($id)->result();
            
            if($record[0]->ppn==1){
                $profile   =  $this->model_profile->tampilkan_data_ppn()->result();
                }
                else{
                    $profile   =  $this->model_profile->tampilkan_data_non_ppn()->result();
                }
            // $barang   =  $this->model_barang->get_one($list[0]->id_barang)->result();

            // print_r($list[0]->id_barang);
            // die;
            $data = array(
                'record'=>$record,
                'profile'=>$profile,
                'customer'=>$customer,
                'list'=>$list
                
            );
            $this->load->view('cetak/cetak_sj_keluar',$data); 
        
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_transaksi_keluar->delete($id);
        redirect('transaksi_keluar');
    }

    function jual()
    {
        $id = $this->uri->segment(3);
        $kd = $this->uri->segment(4);
		
		// get tabel barang id_barang 
        $barang =  $this->model_barang->get_barang_jual($id)->row_array();
		// print_r($barang['stok']);
        // die;

		if($barang['stok'] > 0)
		{
            
                $jumlah = 1;
                // $total = $hsl['harga_jual'];
                $tgl = date("j F Y, G:i");
                
                $data1[] = $id;
                // $data1[] = $kasir;
                $data1[] = $jumlah;
                // $data1[] = $total;
                $data1[] = $tgl;
                $sid = $this->session->userdata('session_id');
                $tglorder=date("Y-m-d");
                // print_r($sid);
                // die;
              //cek barang sudah ada ditemp

           $cektemp =  $this->model_transaksi_keluar_detail_temp->get_count_barang_jual($id,$sid);  
           
           if($cektemp=='0'){
                $databarang       = array('id_barang' => $id,
                                    'kd_barang' => $kd,
                                    'qty' =>$jumlah,
                                    'id_session' =>$sid,
                                    'tgl_order_temp'=>$tglorder);
                            $this->db->insert('transaksi_keluar_detail_temp',$databarang);
           }
           else{
                $databarang       = array('qty' =>$jumlah + 1);
                $this->db->where(array('id_session'=>$sid,'id_barang'=> $id));
                $this->db->update('transaksi_keluar_detail_temp',$databarang);
           }

            
        $kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
        // print_r($kemarin);
        // die;
        $this->model_transaksi_keluar_detail_temp->deleteTemp($kemarin); 
        // $this->db->where('tgl_order_temp','<', $kemarin);
        // $this->db->delete('transaksi_keluar_detail_temp');
        // $this->db->select("DELETE FROM transaksi_keluar_detail_temp WHERE tgl_order_temp < '$kemarin'");
			redirect('transaksi_keluar/post');

		}else{
            ?>
            <script>alert('Maaf Jumlah Melebihi Stok !!'); window.location = 'transaksi_keluar/post'</script>
			<!-- redirect('transaksi_keluar/post'); -->
		<?php }
	}

    function updatejual()
    {
        $id = $this->uri->segment(3);
        $kd = $this->uri->segment(4);
		
		// get tabel barang id_barang 
        $barang =  $this->model_barang->get_barang_jual($id)->row_array();
		// print_r($barang['stok']);
        // die;

		if($barang['stok'] > 0)
		{
            
                $jumlah = 1;
                // $total = $hsl['harga_jual'];
                $tgl = date("j F Y, G:i");
                
                $data1[] = $id;
                // $data1[] = $kasir;
                $data1[] = $jumlah;
                // $data1[] = $total;
                $data1[] = $tgl;
                $sid = $this->session->userdata('session_id');
                $tglorder=date("Y-m-d");
                // print_r($sid);
                // die;
              //cek barang sudah ada ditemp

           $cektemp =  $this->model_transaksi_keluar_detail->get_count_barang_jual($id,$sid);  
           
           if($cektemp=='0'){
                $databarang       = array('id_barang' => $id,
                                    'kd_barang' => $kd,
                                    'qty' =>$jumlah,
                                    'id_session' =>$sid,
                                    'tgl_order_temp'=>$tglorder);
                            $this->db->insert('transaksi_keluar_detail_temp',$databarang);
           }
           else{
                $databarang       = array('qty' =>$jumlah + 1);
                $this->db->where(array('id_session'=>$sid,'id_barang'=> $id));
                $this->db->update('transaksi_keluar_detail_temp',$databarang);
           }

            
        $kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
        // print_r($kemarin);
        // die;
        $this->model_transaksi_keluar_detail_temp->deleteTemp($kemarin); 
        // $this->db->where('tgl_order_temp','<', $kemarin);
        // $this->db->delete('transaksi_keluar_detail_temp');
        // $this->db->select("DELETE FROM transaksi_keluar_detail_temp WHERE tgl_order_temp < '$kemarin'");
			redirect('transaksi_keluar/post');

		}else{
            ?>
            <script>alert('Maaf Jumlah Melebihi Stok !!'); window.location = 'transaksi_keluar/post'</script>
			<!-- redirect('transaksi_keluar/post'); -->
		<?php }
	}

    function jualupdate()
    {
        $id = $_POST['id_barang'];
		
		// get tabel barang id_barang 
        $barang =  $this->model_barang->get_barang_jual($id)->row_array();
		// print_r($barang['stok']);
        // die;

		if($barang['stok'] > 0)
		{
            
                $sid = $this->session->userdata('session_id');
                $qty = $_POST['qty'];
                $harga = $_POST['harga'];
                $total = $qty * $harga;
                $keterangan = $_POST['keterangan'];
                // print_r($harga);
                // die;
                $databarang       = array('qty' => $qty,
                                    'harga' => $harga,
                                    'total' =>$total,
                                    'keterangan' =>$keterangan);
                                    
            $this->db->where(array('id_session'=>$sid,'id_barang'=> $id));
            $this->db->update('transaksi_keluar_detail_temp',$databarang);
           redirect('transaksi_keluar/post');

		}else{
            ?>
            <script>alert('Maaf Jumlah Melebihi Stok !!'); window.location = 'transaksi_keluar/post'</script>
			<!-- redirect('transaksi_keluar/post'); -->
		<?php }
	}

    function deletetemp()
    {
        $id=  $this->uri->segment(3);
        $session=  $this->uri->segment(4);
        $this->model_transaksi_keluar_detail_temp->deletetemptrans($id,$session);
        redirect('transaksi_keluar/post');
    }

    //UPDATE TRANSAKSI
    function jualupdatetrans()
    {
        $idbarang = $_POST['id_barang'];
		$id=$_POST['id'];
		$idtrans=$_POST['idtrans'];
		// get tabel barang id_barang 
        $barang =  $this->model_barang->get_barang_jual($idbarang)->row_array();
		// print_r($barang['stok']);
        // die;
        // print_r($cektransdetail);
        // die;
       
		// if($barang['stok'] > 0)
		// {
            // $cektransdetail   =  $this->model_transaksi_keluar_detail->get_count_barang_jual_trans($idbarang,$idtrans);
            // print_r($cektransdetail);
            // die;
            // //cek barang di transaksi detail ada jika ada qty barang ditambahkan
            // if($cektransdetail > 0 ) {
                // $transdetail   =  $this->model_transaksi_keluar_detail->cekdatatrans($idbarang,$idtrans)->result();
                
                
                // $qtylama = $transdetail[0]->qty;
                $qty = $_POST['qty'];
                $qtybaru = $_POST['qty_baru'];
                $ttlqty = $qtybaru + $qty;
                $harga = $_POST['harga'];
                $total = $ttlqty * $harga;
                $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
                // print_r($ttlqty);
                // print_r($barang['stok']);
                // die;
                if($qtybaru==0){
                    $databarang       = array('harga' => $harga,
                                    'total' =>$total,
                                    'keterangan' =>$keterangan);
                    $this->db->where(array('id_transaksi_keluar'=>$idtrans,'id_barang'=> $idbarang));
                    $this->db->update('transaksi_keluar_detail',$databarang);
                    redirect('transaksi_keluar/edit/'.$idtrans);
                }
                else{
                    if($ttlqty > $barang['stok']){
                    echo "<script>alert('Maaf Jumlah Melebihi Stok !!'); window.location = 'edit/$idtrans'</script>";
                
                    }
                    else{
                        $databarang       = array('qty' => $ttlqty,
                                        'harga' => $harga,
                                        'total' =>$total,
                                        'keterangan' =>$keterangan);
                        $this->db->where(array('id_transaksi_keluar'=>$idtrans,'id_barang'=> $idbarang));
                        $this->db->update('transaksi_keluar_detail',$databarang);
                        redirect('transaksi_keluar/edit/'.$idtrans);
                    }
                }
            // }
            // // $cektransdetail   =  $this->model_transaksi_keluar_detail->get_count_barang_jual_trans($idbarang,$idtrans);
            // else{
               
            // }
           

		/*}else{
            ?>
            <script>alert('Maaf Jumlah Melebihi Stok !!'); window.location = 'transaksi_keluar/post'</script>
			<!-- redirect('transaksi_keluar/post'); -->
		<?php }*/
	}

    function updatepost()
    {
        $id=  $this->input->post('idtrans');
		    $no_transaksi       =   $this->input->post('no_transaksi');
            $no_surat_jalan   =   $this->input->post('no_surat_jalan');
            $tgl_transaksi   =   $this->input->post('tgl_transaksi');
            $customer   =   $this->input->post('customer');
            $iduser   =   $this->input->post('id_user');
            $totalharga   =   $this->input->post('total_harga');
            // $biayaservice   =   $this->input->post('biaya_service');
            $discount   =   $this->input->post('discount');
            $uang_muka   =   $this->input->post('uang_muka');
            $ppn   =   $this->input->post('ppn');
            $pajak1   =   $this->input->post('pajak');
            $total_all   =   $this->input->post('total_all');
            // print_r($pajak1);
            // die;
            
            if($ppn==0){
                $pajak   =   0;
                $totalall   =   $total_all-$pajak1;
            }
            else{
                // $pajak   =   $this->input->post('pajak');
                $vpajak   =   $totalharga - $discount;
                $pajak   =   ($vpajak/100)*11;

                $totalall   =   ($totalharga - $discount) + $pajak;
            }
            $sisa_bayar   =   $totalall - $uang_muka;
            // print_r($totalall);
            // die;
            
            // print_r($id);
            // die;
            $data       = array('no_transaksi'=>$no_transaksi,
                                'no_surat_jalan'=>$no_surat_jalan,
                                'tgl_transaksi'=>$tgl_transaksi,
                                'id_customer'=>$customer,
                                'total_harga'=>$totalharga,
                                'discount'=>$discount,
                                'ppn'=>$ppn,
                                'pajak'=>$pajak,
                                'total_all'=>$totalall,
                                'uang_muka'=>$uang_muka,
                                'sisa_bayar'=>$sisa_bayar);
                                // print_r($data);
                                // die;
            // $this->db->insert('transaksi_keluar',$data);
                    $this->db->where(array('id_transaksi_keluar'=>$id,'no_transaksi'=> $no_transaksi));
                    $this->db->update('transaksi_keluar',$data);
                    redirect('transaksi_keluar');
            
	}

    function deletetrans()
    {
        $id=  $this->uri->segment(3);
        $idbarang=  $this->uri->segment(4);
        $idtrans=  $this->uri->segment(5);

        //cek barang
        $barang =  $this->model_barang->get_barang_jual($idbarang)->row_array();

        $cekbarang   =  $this->model_transaksi_keluar->cekdata($idtrans)->result();
        $cekbarangdetail   =  $this->model_transaksi_keluar_detail->cekbarangdetail($id,$idbarang,$idtrans)->result();

        $total_harga=$cekbarang[0]->total_harga;
        $uang_muka=$cekbarang[0]->uang_muka;
        $sisa_bayar=$cekbarang[0]->sisa_bayar;
        $pajak =$cekbarang[0]->pajak;
        $total =$cekbarangdetail[0]->total;

        $totalall=$total_harga-$total;
        $subtotal=$totalall - $uang_muka + $pajak;

        $qtybrg = $barang['stok'];
        $qtytran = $cekbarangdetail[0]->qty;
        $jmlqty=$qtybrg + $qtytran;

        echo $totalall;
        echo "<br>";
        echo $uang_muka;
        echo "<br>";
        echo $pajak;
        echo "<br>";
        echo $subtotal;
        echo "<br>";
        echo $sisa_bayar;
        echo "<br>";
break;
        // print_r($jmlqty);
        // die;
        // $totalharga = 
        //update stok dan nominal
        $data       = array('total_harga'=>$totalall,
                            'uang_muka'=>$uang_muka,
                            'pajak'=>$pajak,
                            'total_all'=>$subtotal,
                            'sisa_bayar'=>$sisa_bayar);
        // print_r($data);
        // die;
        // $this->db->insert('transaksi_keluar',$data);
        $this->db->where(array('id_transaksi_keluar'=>$idtrans));
        $this->db->update('transaksi_keluar',$data);

        //update stok barang

        $databarang       = array('stok'=>$jmlqty);
        $this->db->where(array('id_barang'=>$idbarang));
        $this->db->update('m_barang',$databarang);

        $this->model_transaksi_keluar_detail->deletetrans($id,$idbarang);
        redirect('transaksi_keluar/edit/'.$idtrans);
    }
    
}