<?php
class Model_konektor extends CI_Model{
    var $table  = 'm_konektor';
    
    
    function tampilkan_data(){
        // $query = "select a.id_jenis,a.kd_jenis,a.nama_jenis,b.id_kategori,b.nama_kategori 
        //             FROM m_jenis as a,m_kategori as b
        //             WHERE a.id_kategori=b.id_kategori";
        // return $this->db->query($query);

        $this->db->select('m_konektor.id_konektor,m_konektor.kd_konektor,m_konektor.nama_konektor,m_jenis_obat.id_jenis_obat,m_jenis_obat.kd_jenis_obat,m_jenis_obat.nama_jenis_obat,m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
        $this->db->join('m_jenis_obat','m_jenis_obat.id_jenis_obat = m_konektor.id_jenis_obat');
        $this->db->join('m_merk','m_merk.id_merk = m_konektor.id_merk');
        $this->db->join('m_jenis','m_konektor.id_jenis = m_jenis.id_jenis');
        $this->db->join('m_kategori','m_konektor.id_kategori = m_kategori.id_kategori');
        return $this->db->get($this->table);
    }
    
    function tampilkan_data_paging($halaman,$batas)
    {
        $this->db->select('m_konektor.id_konektor,m_konektor.kd_konektor,m_konektor.nama_konektor,m_jenis_obat.id_jenis_obat,m_jenis_obat.kd_jenis_obat,m_jenis_obat.nama_jenis_obat,m_merk.id_merk,m_merk.id_jenis,m_merk.kd_merk,m_merk.nama_merk,m_jenis.kd_jenis,m_jenis.nama_jenis,m_kategori.id_kategori,m_kategori.nama_kategori');
        $this->db->join('m_jenis_obat','m_jenis_obat.id_jenis_obat = m_konektor.id_jenis_obat');
        $this->db->join('m_merk','m_merk.id_merk = m_konektor.id_merk');
        $this->db->join('m_jenis','m_konektor.id_jenis = m_jenis.id_jenis');
        $this->db->join('m_kategori','m_konektor.id_kategori = m_kategori.id_kategori');
        return $this->db->get($this->table);
    }
    
    function post(){
        $data=array(            
           'kd_konektor'=>  $this->input->post('kd_konektor'),
           'nama_konektor'=>  $this->input->post('nama_konektor'),
           'id_jenis_obat'=>  $this->input->post('jenis_obat'),
           'id_merk'=>  $this->input->post('merk'),
           'id_kategori'=>  $this->input->post('kategori'),
           'id_jenis'=>  $this->input->post('jenis')
                    );
        $this->db->insert($this->table,$data);
    }
    
    
    function edit()
    {
        $data=array(
            'kd_konektor'=>  $this->input->post('kd_konektor'),
           'nama_konektor'=>  $this->input->post('nama_konektor'),
           'id_jenis_obat'=>  $this->input->post('jenis_obat'),
           'id_merk'=>  $this->input->post('merk'),
           'id_kategori'=>  $this->input->post('kategori'),
           'id_jenis'=>  $this->input->post('jenis')
                   );
        $this->db->where('id_konektor',$this->input->post('id'));
        $this->db->update('m_konektor',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_konektor'=>$id);
        return $this->db->get_where('m_konektor',$param);
    }

    function get_one_id($id)
    {
        $param  =   array('id_konektor'=>$id);
        return $this->db->get_where('m_konektor',$param);
    }
    function get_one_count($kd,$idjenisobat,$idmerk,$idjenis,$idKat)
    {
        $query = "select count(id_konektor) AS jml from m_konektor where kd_konektor='$kd' AND id_jenis_obat='$idjenisobat' AND id_merk='$idmerk' AND id_jenis='$idjenis' AND id_kategori='$idKat'";
        // return $this->db->where('m_jenis',$kd);
        return $this->db->query($query);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_konektor',$id);
        $this->db->delete('m_konektor');
    }

    //get konektor
    function Get_konektor($id_jenis_obat)
    {
        $this->db->where('id_jenis_obat', $id_jenis_obat);
        $this->db->order_by('id_jenis_obat', 'ASC');
        return $this->db->from('m_konektor')->get()->result();
    }
}