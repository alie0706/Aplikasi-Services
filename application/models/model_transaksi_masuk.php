<?php
class model_transaksi_masuk extends ci_model{
    var $table  = 'transaksi_masuk';
    
    function tampil_data()
    {
        $query= "SELECT a.id_transaksi,a.no_tanda_terima,a.tgl_terima,a.id_supplier,b.nama_supplier
                FROM transaksi_masuk as a, m_supplier as b WHERE a.id_supplier=b.id_supplier";
        return $this->db->query($query);
        // $this->db->select('m_barang.id_barang,m_barang.kd_barang,m_barang.nama_barang,m_barang.keterangan,m_barang.harga,m_konektor.id_konektor,m_konektor.kd_konektor,m_konektor.nama_konektor,m_jenis_obat.id_jenis_obat,m_jenis_obat.kd_jenis_obat,m_jenis_obat.nama_jenis_obat,m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
        // $this->db->join('m_konektor','m_barang.id_konektor = m_konektor.id_konektor');
        // $this->db->join('m_jenis_obat','m_jenis_obat.id_jenis_obat = m_barang.id_jenis_obat');
        // $this->db->join('m_merk','m_merk.id_merk = m_barang.id_merk');
        // $this->db->join('m_jenis','m_barang.id_jenis = m_jenis.id_jenis');
        // $this->db->join('m_kategori','m_barang.id_kategori = m_kategori.id_kategori');
        // return $this->db->get($this->table);
    }
    
    function post($data)
    {
        $data=array(
                    'no_tanda_terima'     =>  $this->input->post('no_tanda_terima'),
                    'tgl_terima'   =>  $this->input->post('tgl_terima'),
                    'id_supplier'   =>  $this->input->post('supplier'),
                    'id_user'   =>  $this->input->post('id_user'),
                    'tgl_input'     =>  date("Y-m-d")
                     );
         $this->db->insert('transaksi_masuk',$data);

         //data barang
        //  return $this->db->insert('m_barang', $data);
    }
    function postbarang($data)
    {
        
         //data barang
         return $this->db->insert_batch('m_barang', $data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_transaksi'=>$id);
        return $this->db->get_where('transaksi_masuk',$param);
    }
    
    function get_one_kd($bln,$thn)
    {
        $query= "SELECT COUNT('no_tanda_terima') AS jml 
        FROM transaksi_masuk WHERE MID(tgl_input, 6,2)='$bln' AND MID(tgl_input, 1,4)='$thn'";
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
        $this->db->update('transaksi_masuk',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_transaksi',$id);
        $this->db->delete('transaksi_masuk');
    }

    function cari($tgl1,$tgl2)
    {
        $query= "SELECT a.id_transaksi,a.no_tanda_terima,a.tgl_terima,a.id_supplier,b.nama_supplier
        FROM transaksi_masuk as a, m_supplier as b WHERE a.id_supplier=b.id_supplier AND a.tgl_terima BETWEEN '$tgl1' and '$tgl2'";
        return $this->db->query($query);
    }
}