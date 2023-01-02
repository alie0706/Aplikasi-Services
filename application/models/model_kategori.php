<?php
class Model_kategori extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('m_kategori');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
      return $this->db->query("select * from m_kategori");
  }
    
    function post(){
        $data=array(
           'nama_kategori'=>  $this->input->post('nama_kategori'),
           'keterangan'=>  $this->input->post('keterangan')
                    );
        $this->db->insert('m_kategori',$data);
    }
    
    
    function edit()
    {
        $data=array(
           'nama_kategori'=>  $this->input->post('nama_kategori'),
           'keterangan'=>  $this->input->post('keterangan'),
           'status'=>  $this->input->post('status')
                    );
        $this->db->where('id_kategori',$this->input->post('id'));
        $this->db->update('m_kategori',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_kategori'=>$id);
        return $this->db->get_where('m_kategori',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_kategori',$id);
        $this->db->delete('m_kategori');
    }

    
}