<?php
class model_barang extends ci_model{
    var $table  = 'm_barang';
    
    function tampil_data()
    {
        // $this->db->select('m_barang.id_barang,m_barang.kd_barang,m_barang.nama_barang,m_barang.keterangan,m_barang.stok,m_konektor.id_konektor,m_konektor.kd_konektor,m_konektor.nama_konektor,m_jenis_obat.id_jenis_obat,m_jenis_obat.kd_jenis_obat,m_jenis_obat.nama_jenis_obat,m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
        // $this->db->join('m_konektor','m_barang.id_konektor = m_konektor.id_konektor');
        // $this->db->join('m_jenis_obat','m_jenis_obat.id_jenis_obat = m_barang.id_jenis_obat');
        // $this->db->join('m_merk','m_merk.id_merk = m_barang.id_merk');
        // $this->db->join('m_jenis','m_barang.id_jenis = m_jenis.id_jenis');
        // $this->db->join('m_kategori','m_barang.id_kategori = m_kategori.id_kategori');
        $this->db->select('*');
        return $this->db->get($this->table);
    }

    function tampilkan_data()
    {
        // $query= "SELECT b.id_barang,b.kd_barang,b.nama_barang,b.keterangan,b.harga,kb.nama_kategori
        //         FROM m_barang as b,m_kategori as kb
        //         WHERE b.id_kategori=kb.id_kategori";
        // return $this->db->query($query);
        $this->db->select('m_barang.id_barang,m_barang.kd_barang,m_barang.nama_barang,m_barang.keterangan');
        return $this->db->get($this->table);
    }
    
    function post($data)
    {
        $rp = $this->input->post('harga');
        $data=array(
            'kd_barang'     =>  $this->input->post('kode_barang'),
            'nama_barang'   =>  $this->input->post('nama_barang'),
            'id_kategori'   =>  $this->input->post('kategori'),
            'keterangan'    =>  $this->input->post('keterangan'),
            'harga'         =>  str_replace(",", "", $rp),
            'insert_at'     =>  date("Y-m-d h:i:s")
                     );
         $this->db->insert('m_barang',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_barang'=>$id);
        return $this->db->get_where('m_barang',$param);
    }
    function get_one_cek($kd)
    {
        $param  =   array('kd_barang'=>$kd);
        return $this->db->get_where('m_barang',$param);
    }
    function get_one_cek_detail($id_kategori,$id_jenis,$id_merk,$id_jenis_obat,$id_konektor)
    {
        $query ="select * FROM m_barang WHERE id_kategori='$id_kategori'
        AND id_jenis='$id_jenis' AND id_merk='$id_merk' AND id_jenis_obat='$id_jenis_obat'
        AND id_konektor='$id_konektor'";
        return $this->db->query($query);
    }
    function get_one_kd($kd)
    {
        $query ="select COUNT(kd_barang) as jml FROM m_barang WHERE kd_barang='$kd'";
        return $this->db->query($query);
    }
    function get_one_kd_detail($id_kategori,$id_jenis,$id_merk,$id_jenis_obat,$id_konektor)
    {
        $query ="select COUNT(kd_barang) as jml FROM m_barang WHERE id_kategori='$id_kategori'
        AND id_jenis='$id_jenis' AND id_merk='$id_merk' AND id_jenis_obat='$id_jenis_obat'
        AND id_konektor='$id_konektor'";
        return $this->db->query($query);
    }
    function cekhasil($kd)
    {
        $chek=  $this->db->get_where('m_barang',array('kd_barang'=>$kd));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    function edit($data,$id)
    {
        $rp = $this->input->post('harga');
        $data=array(
            'kd_barang'     =>  $this->input->post('kode_barang'),
            'nama_barang'   =>  $this->input->post('nama_barang'),
            'id_kategori'   =>  $this->input->post('kategori'),
            'keterangan'    =>  $this->input->post('keterangan'),
            'harga'         =>  str_replace(",", "", $rp),
            'insert_at'     =>  date("Y-m-d h:i:s")
                     );
        $this->db->where('id_barang',$id);
        $this->db->update('m_barang',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_barang',$id);
        $this->db->delete('m_barang');
    }

    function get_one_count($kdbarang)
    {
        $chek=  $this->db->get_where('m_barang',array('kd_barang'=>$kdbarang));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }

    function get_barang($cari)
    {
        $query= "SELECT *
                FROM m_barang
                WHERE kd_barang like '%$cari%' or nama_barang like '%$cari%'";
        return $this->db->query($query);
    }

    function get_barang_jual($id)
    {
        $query= "SELECT *
                FROM m_barang
                WHERE id_barang='$id'";
        return $this->db->query($query);
    }

    
    
}