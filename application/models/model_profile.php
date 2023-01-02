<?php
class Model_profile extends CI_Model{
    
    
    function tampilkan_data(){
        $query = "select * 
                    FROM m_profile";
        return $this->db->query($query);
    }
    function tampilkan_data_paging($halaman,$batas)
  {
    $query = "select *  FROM m_profile";
    return $this->db->query($query);
  }
  function tampilkan_data_ppn(){
    $query = "select * 
                FROM m_profile where id='1'";
    return $this->db->query($query);
}
function tampilkan_data_non_ppn(){
    $query = "select * 
                FROM m_profile where id='2'";
    return $this->db->query($query);
}
  function get_one($id)
  {
      $param  =   array('id'=>$id);
      return $this->db->get_where('m_profile',$param);
  }
    function edit($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('m_profile',$data);
    }
    
    
}