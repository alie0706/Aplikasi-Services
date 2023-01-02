<?php
class model_stok_barang extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT a.id_stok,a.id_barang,a.stok,b.kd_barang,b.nama_barang,b.keterangan,b.harga
                FROM m_barang_stok as a,m_barang as b
                WHERE a.id_barang=b.id_barang";
        return $this->db->query($query);
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
}