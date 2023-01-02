<?php
class Model_merk extends CI_Model{
    var $table  = 'm_merk';
    
    
    function tampilkan_data(){
        // $query = "select a.id_jenis,a.kd_jenis,a.nama_jenis,b.id_kategori,b.nama_kategori 
        //             FROM m_jenis as a,m_kategori as b
        //             WHERE a.id_kategori=b.id_kategori";
        // return $this->db->query($query);

    $this->db->select('m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
    $this->db->join('m_jenis','m_merk.id_jenis = m_jenis.id_jenis');
    $this->db->join('m_kategori','m_merk.id_kategori = m_kategori.id_kategori');
    return $this->db->get($this->table);
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
    $this->db->select('m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
    $this->db->join('m_jenis','m_merk.id_jenis = m_jenis.id_jenis');
    $this->db->join('m_kategori','m_merk.id_kategori = m_kategori.id_kategori');
    return $this->db->get($this->table);
  }
    
    function post(){
        $data=array(            
           'kd_merk'=>  $this->input->post('kd_merk'),
           'nama_merk'=>  $this->input->post('nama_merk'),
           'id_kategori'=>  $this->input->post('kategori'),
           'id_jenis'=>  $this->input->post('jenis')
                    );
        $this->db->insert($this->table,$data);
    }
    
    
    function edit()
    {
        $data=array(
            'kd_merk'=>  $this->input->post('kd_merk'),
           'nama_merk'=>  $this->input->post('nama_merk'),
           'id_kategori'=>  $this->input->post('kategori'),
           'id_jenis'=>  $this->input->post('jenis')
                    );
        $this->db->where('id_merk',$this->input->post('id'));
        $this->db->update('m_merk',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_merk'=>$id);
        return $this->db->get_where('m_merk',$param);
    }

    function get_one_id($id)
    {
        $param  =   array('id_merk'=>$id);
        return $this->db->get_where('m_merk',$param);
    }
    function get_one_count($kd,$idKat)
    {
        $query = "select count(id_jenis) AS jml from m_jenis where kd_jenis='$kd' AND id_kategori='$idKat'";
        // return $this->db->where('m_jenis',$kd);
        return $this->db->query($query);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_merk',$id);
        $this->db->delete('m_merk');
    }

    //get jenis
    function Get_jenis($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->order_by('id_jenis', 'ASC');
        return $this->db->from('m_merk')->get()->result();
    }
}