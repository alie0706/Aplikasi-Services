<?php
class Model_customer extends CI_Model{
    
    
    
    function tampilkan_data(){
        $query = "select * 
                    FROM m_customer";
        return $this->db->query($query);
        // return $this->db->get('m_customer');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
    $query = "select *  FROM m_customer";
    return $this->db->query($query);
  }
    
    function post(){
        $data=array(            
           'kd_customer'=>  $this->input->post('kd_customer'),
           'nama_customer'=>  $this->input->post('nama_customer'),
           'alamat_customer'=>  $this->input->post('alamat_customer'),
           'tujuan'=>  $this->input->post('tujuan'),
           'tlp_customer'=>  $this->input->post('tlp_customer'),
           'email_customer'=>  $this->input->post('email_customer'),
           'pic_customer'=>  $this->input->post('pic_customer')
                    );
        $this->db->insert('m_customer',$data);
    }
    
    
    function edit()
    {
        $data=array(
            'kd_customer'=>  $this->input->post('kd_customer'),
            'nama_customer'=>  $this->input->post('nama_customer'),
           'alamat_customer'=>  $this->input->post('alamat_customer'),
           'tujuan'=>  $this->input->post('tujuan'),
           'tlp_customer'=>  $this->input->post('tlp_customer'),
           'email_customer'=>  $this->input->post('email_customer'),
           'pic_customer'=>  $this->input->post('pic_customer'),
           'status'=>  $this->input->post('status')
                    );
        $this->db->where('id_customer',$this->input->post('id'));
        $this->db->update('m_customer',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_customer'=>$id);
        return $this->db->get_where('m_customer',$param);
    }
    function get_one_count($kd,$idKat)
    {
        $query = "select count(id_customer) AS jml from m_customer where kd_customer='$kd' AND id_kategori='$idKat'";
        // return $this->db->where('m_customer',$kd);
        return $this->db->query($query);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_customer',$id);
        $this->db->delete('m_customer');
    }

    //get customer
    function customer_Kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'ASC');
        return $this->db->from('m_customer')->get()->result();
    }
}