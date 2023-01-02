<?php
class model_transaksi_keluar extends ci_model{
    var $table  = 'transaksi_keluar';
    
    function tampil_data()
    {
        $query= "SELECT a.id_transaksi_keluar,a.no_transaksi,a.tgl_transaksi,b.id_customer,b.nama_customer
                FROM transaksi_keluar as a, m_customer as b 
                WHERE a.id_customer=b.id_customer";
        return $this->db->query($query);
       
    }
    
    function post($data)
    {
        $data=array(
                    'no_transaksi'     =>  $this->input->post('no_transaksi'),
                    'tgl_transaksi'   =>  $this->input->post('tgl_transaksi'),
                    'id_customer'   =>  $this->input->post('customer'),
                    'id_user'   =>  $this->input->post('id_user'),
                    'tgl_input'     =>  date("Y-m-d")
                     );
         $this->db->insert('transaksi_keluar',$data);

         //data barang
        //  return $this->db->insert('m_barang', $data);
    }
    function cekdata($id)
    {
        // print_r($sid);
        // die;
        $query= "SELECT * FROM transaksi_keluar WHERE id_transaksi_keluar='$id'";
        return $this->db->query($query);
    }
    function postbarang($data)
    {
        
         //data barang
         return $this->db->insert_batch('m_barang', $data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_transaksi_keluar'=>$id);
        return $this->db->get_where('transaksi_keluar',$param);
    }
    
    function edit($data,$id)
    {
        $rp = $this->input->post('harga');
        $data=array(
            'no_transaksi'     =>  $this->input->post('no_transaksi'),
            'tgl_transaksi'   =>  $this->input->post('tgl_transaksi'),
            'tgl_input'     =>  date("Y-m-d")
                     );
        $this->db->where('id_transaksi_keluar',$id);
        $this->db->update('transaksi_keluar',$data);
    }
    function update($id)
    {
        $rp = $this->input->post('harga');
        $data=array(
            'no_transaksi'     =>  $this->input->post('no_transaksi'),
            'tgl_transaksi'   =>  $this->input->post('tgl_transaksi'),
            'tgl_input'     =>  date("Y-m-d")
                     );
        $this->db->where('id_transaksi_keluar',$id);
        $this->db->update('transaksi_keluar',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_transaksi_keluar',$id);
        $this->db->delete('transaksi_keluar');
    }

    function cari($tgl1,$tgl2)
    {
        $query= "SELECT a.*,b.id_customer,b.nama_customer
        FROM transaksi_keluar as a, m_customer as b 
        WHERE a.id_customer=b.id_customer AND a.tgl_transaksi BETWEEN '$tgl1' and '$tgl2'";
        return $this->db->query($query);
    }
}