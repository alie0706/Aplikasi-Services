<?php
class Model_supplier extends CI_Model{
    
    
    
    function tampilkan_data(){
        $query = "select * 
                    FROM m_supplier";
        return $this->db->query($query);
        // return $this->db->get('m_supplier');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
    $query = "select *  FROM m_supplier";
    return $this->db->query($query);
  }
    
    function post(){
        $data=array(            
           'nama_supplier'=>  $this->input->post('nama_supplier'),
           'alamat_supplier'=>  $this->input->post('alamat_supplier'),
           'tlp_supplier'=>  $this->input->post('tlp_supplier'),
           'email_supplier'=>  $this->input->post('email_supplier'),
           'pic_supplier'=>  $this->input->post('pic_supplier')
                    );
        $this->db->insert('m_supplier',$data);
    }
    
    
    function edit()
    {
        $data=array(
            'nama_supplier'=>  $this->input->post('nama_supplier'),
           'alamat_supplier'=>  $this->input->post('alamat_supplier'),
           'tlp_supplier'=>  $this->input->post('tlp_supplier'),
           'email_supplier'=>  $this->input->post('email_supplier'),
           'pic_supplier'=>  $this->input->post('pic_supplier'),
           'status'=>  $this->input->post('status')
                    );
        $this->db->where('id_supplier',$this->input->post('id'));
        $this->db->update('m_supplier',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_supplier'=>$id);
        return $this->db->get_where('m_supplier',$param);
    }
    function get_one_count($kd,$idKat)
    {
        $query = "select count(id_supplier) AS jml from m_supplier where kd_supplier='$kd' AND id_kategori='$idKat'";
        // return $this->db->where('m_supplier',$kd);
        return $this->db->query($query);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_supplier',$id);
        $this->db->delete('m_supplier');
    }

    //get supplier
    function supplier_Kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'ASC');
        return $this->db->from('m_supplier')->get()->result();
    }
}