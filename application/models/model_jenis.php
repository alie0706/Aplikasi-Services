<?php
class Model_jenis extends CI_Model{
    
    
    
    function tampilkan_data(){
        $query = "select a.id_jenis,a.kd_jenis,a.nama_jenis,b.id_kategori,b.nama_kategori 
                    FROM m_jenis as a,m_kategori as b
                    WHERE a.id_kategori=b.id_kategori";
        return $this->db->query($query);
        // return $this->db->get('m_jenis');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
    $query = "select a.id_jenis,a.kd_jenis,a.nama_jenis,b.id_kategori,b.nama_kategori 
                FROM m_jenis as a,m_kategori as b
                WHERE a.id_kategori=b.id_kategori";
    return $this->db->query($query);
  }
    
    function post(){
        $data=array(            
           'id_kategori'=>  $this->input->post('kategori'),
           'kd_jenis'=>  $this->input->post('kd_jenis'),
           'nama_jenis'=>  $this->input->post('nama_jenis')
                    );
        $this->db->insert('m_jenis',$data);
    }
    
    
    function edit()
    {
        $data=array(
            'id_kategori'=>  $this->input->post('kategori'),
            'kd_jenis'=>  $this->input->post('kd_jenis'),
            'nama_jenis'=>  $this->input->post('nama_jenis')
                    );
        $this->db->where('id_jenis',$this->input->post('id'));
        $this->db->update('m_jenis',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_jenis'=>$id);
        return $this->db->get_where('m_jenis',$param);
    }
    function get_one_count($kd,$idKat)
    {
        $query = "select count(id_jenis) AS jml from m_jenis where kd_jenis='$kd' AND id_kategori='$idKat'";
        // return $this->db->where('m_jenis',$kd);
        return $this->db->query($query);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_jenis',$id);
        $this->db->delete('m_jenis');
    }

    //get jenis
    function Jenis_Kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'ASC');
        return $this->db->from('m_jenis')->get()->result();
    }
}