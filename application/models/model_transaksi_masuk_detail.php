<?php
class model_transaksi_masuk_detail extends ci_model{
    var $table  = 'transaksi_masuk_detail';
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM transaksi_masuk_detail";
        return $this->db->query($query);
        // $this->db->select('m_barang.id_barang,m_barang.kd_barang,m_barang.nama_barang,m_barang.keterangan,m_barang.harga,m_konektor.id_konektor,m_konektor.kd_konektor,m_konektor.nama_konektor,m_jenis_obat.id_jenis_obat,m_jenis_obat.kd_jenis_obat,m_jenis_obat.nama_jenis_obat,m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
        // $this->db->join('m_konektor','m_barang.id_konektor = m_konektor.id_konektor');
        // $this->db->join('m_jenis_obat','m_jenis_obat.id_jenis_obat = m_barang.id_jenis_obat');
        // $this->db->join('m_merk','m_merk.id_merk = m_barang.id_merk');
        // $this->db->join('m_jenis','m_barang.id_jenis = m_jenis.id_jenis');
        // $this->db->join('m_kategori','m_barang.id_kategori = m_kategori.id_kategori');
        // return $this->db->get($this->table);
    }

    function tampil_data_join($idtransaksi)
    {
        // $query= "SELECT *
        //         FROM transaksi_masuk_detail";
        // return $this->db->query($query);
        // $this->db->select('a.*,b.id_transaksi,b.no_tanda_terima,b.id_supplier,b.tgl_terima,c.nama_supplier,d.id_barang,d.nama_barang,d.kd_barang,d.keterangan,e.id_konektor,e.kd_konektor,e.nama_konektor,f.id_jenis_obat,f.kd_jenis_obat,f.nama_jenis_obat,g.id_merk,g.id_jenis,g.kd_merk,g.nama_merk,h.kd_jenis,h.nama_jenis,i.id_kategori,i.nama_kategori');
        // $this->db->from('transaksi_masuk_detail a');
        // $this->db->join('transaksi_masuk b','a.id_transaksi = b.id_transaksi','left');
        // $this->db->join('m_supplier c','c.id_supplier = b.id_supplier','left');
        // $this->db->join('m_barang d','d.kd_barang = a.kd_barang','left');
        // $this->db->join('m_konektor e','d.id_konektor = e.id_konektor','left');
        // $this->db->join('m_jenis_obat f','f.id_jenis_obat = d.id_jenis_obat','left');
        // $this->db->join('m_merk g','g.id_merk = d.id_merk','left');
        // $this->db->join('m_jenis h','d.id_jenis = h.id_jenis','left');
        // $this->db->join('m_kategori i','d.id_kategori = i.id_kategori','left');
        // $this->db->where('a.id_transaksi',$idtransaksi);
        // return $this->db->get($this->table);
        $query= "SELECT a.*,b.id_transaksi,b.no_tanda_terima,b.id_supplier,b.tgl_terima,c.nama_supplier,d.id_barang,d.nama_barang,d.kd_barang,d.keterangan,e.id_konektor,e.kd_konektor,e.nama_konektor,f.id_jenis_obat,f.kd_jenis_obat,f.nama_jenis_obat,g.id_merk,g.id_jenis,g.kd_merk,g.nama_merk,h.kd_jenis,h.nama_jenis,i.id_kategori,i.nama_kategori
                FROM transaksi_masuk_detail as a, transaksi_masuk as b, m_supplier as c, m_barang as d, m_konektor as e, m_jenis_obat as f, m_merk as g, m_jenis as h, m_kategori as i
                WHERE a.id_transaksi = b.id_transaksi AND c.id_supplier = b.id_supplier AND d.kd_barang = a.kd_barang AND d.id_konektor = e.id_konektor AND f.id_jenis_obat = d.id_jenis_obat
                AND g.id_merk = d.id_merk AND d.id_jenis = h.id_jenis AND d.id_kategori = i.id_kategori AND a.id_transaksi='$idtransaksi'";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $data=array(
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'id_kategori' => $this->input->post('kategori'),
                    'id_jenis' => $this->input->post('jenis'),
                    'id_merk' => $this->input->post('merk'),
                    'id_jenis_obat' => $this->input->post('jenis_obat'),
                    'id_konektor' => $this->input->post('konektor'),
                    'kd_barang' => $this->input->post('kd_barang'),
                    'qty' => $this->input->post('qty')
                     );
         $this->db->insert('transaksi_masuk_detail',$data);

         //data barang
        //  return $this->db->insert('m_barang', $data);
    }
    function postbarang($data)
    {
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
     
           
            
            $image_name=$this->input->post('kd_barang').'.png'; //buat name dari qr code sesuai dengan nim
     
            $params['data'] = $this->input->post('kd_barang'); //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

         $data=array(            
               'id_konektor'=>  $this->input->post('konektor'),
               'id_jenis_obat'=>  $this->input->post('jenis_obat'),
               'id_merk'=>  $this->input->post('merk'),
               'id_kategori'=>  $this->input->post('kategori'),
               'id_jenis'=>  $this->input->post('jenis'),
               'kd_barang' => $this->input->post('kd_barang'),
               'nama_barang' => $this->input->post('nama_barang'),
               'stok' => $this->input->post('qty'),
               'keterangan' => $this->input->post('keterangan'),
               'qr_code' => $image_name
                        );
            // $this->db->insert($this->table,$data);
        
         //data barang
         return $this->db->insert('m_barang', $data);
    }

    // function editbarang($data,$id)
    // {
    //     $data=array(
    //                 'id_konektor'=>  $this->input->post('konektor'),
    //                 'id_jenis_obat'=>  $this->input->post('jenis_obat'),
    //                 'id_merk'=>  $this->input->post('merk'),
    //                 'id_kategori'=>  $this->input->post('kategori'),
    //                 'id_jenis'=>  $this->input->post('jenis'),
    //                 'kd_barang' => $this->input->post('kd_barang'),
    //                 'nama_barang' => $this->input->post('nama_barang'),
    //                 'stok' => $this->input->post('qty'),
    //                 'keterangan' => $this->input->post('keterangan')
    //                  );
    //     $this->db->where('id_transaksi',$id);
    //     $this->db->update('transaksi_masuk_detail',$data);
    // }
    
    function get_one($id)
    {
        $param  =   array('id_transaksi_detail'=>$id);
        return $this->db->get_where('transaksi_masuk_detail',$param);
    }
    function get_one_cek($id)
    {
        $param  =   array('id_transaksi_detail'=>$id);
        return $this->db->get_where('transaksi_masuk_detail',$param);
    }
    function get_one_cek_trans($id)
    {
        $query= "SELECT COUNT('id_transaksi') AS jml
                FROM transaksi_masuk_detail 
                WHERE id_transaksi='$id'";
        return $this->db->query($query);
    }
    function get_one_transaksi($id)
    {
        // $query= "SELECT a.*,b.id_transaksi,b.no_tanda_terima,b.id_supplier,b.tgl_terima,c.nama_supplier,d.id_barang,d.nama_barang,d.kd_barang,d.keterangan,e.id_konektor,e.kd_konektor,e.nama_konektor,f.id_jenis_obat,f.kd_jenis_obat,f.nama_jenis_obat,g.id_merk,g.id_jenis,g.kd_merk,g.nama_merk,h.kd_jenis,h.nama_jenis,i.id_kategori,i.nama_kategori
        //         FROM transaksi_masuk_detail as a, transaksi_masuk as b, m_supplier as c, m_barang as d, m_konektor as e, m_jenis_obat as f, m_merk as g, m_jenis as h, m_kategori as i
        //         WHERE a.id_transaksi = b.id_transaksi AND c.id_supplier = b.id_supplier AND d.kd_barang = a.kd_barang AND a.id_konektor = e.id_konektor AND f.id_jenis_obat = a.id_jenis_obat
        //         AND g.id_merk = a.id_merk AND a.id_jenis = h.id_jenis AND a.id_kategori = i.id_kategori AND a.id_transaksi='$id'";
        $query= "SELECT a.*,b.id_transaksi,b.no_tanda_terima,b.id_supplier,b.tgl_terima,c.nama_supplier,d.id_barang,d.nama_barang,d.kd_barang,d.keterangan
        FROM transaksi_masuk_detail as a, transaksi_masuk as b, m_supplier as c, m_barang as d
        WHERE a.id_transaksi = b.id_transaksi AND c.id_supplier = b.id_supplier AND d.kd_barang = a.kd_barang AND a.id_transaksi='$id'";

        return $this->db->query($query);
       
    }
    
    function edit($data,$id)
    {
        $rp = $this->input->post('harga');
        $data=array(
            'no_tanda_terima'     =>  $this->input->post('no_tanda_terima'),
            'tgl_terima'   =>  $this->input->post('tgl_terima'),
            'tgl_input'     =>  date("Y-m-d")
                     );
        $this->db->where('id_transaksi',$id);
        $this->db->update('transaksi_masuk_detail',$data);
    }
    
    
    function delete($id)
    {
        // print_r($id);
        // die;
        $this->db->where('id_transaksi',$id);
        $this->db->delete('transaksi_masuk_detail');
    }
    function deletebrg($kd)
    {
        // print_r($kd);
        // die;
        $this->db->where('id_transaksi_detail',$kd);
        $this->db->delete('transaksi_masuk_detail');
    }
}