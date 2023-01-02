<?php
class model_transaksi_services_detail extends ci_model{
    var $table  = 'transaksi_services_detail';
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM transaksi_services_detail";
        return $this->db->query($query);
        
    }

    function tampil_data_join($idtransaksiservices)
    {
       $query= "SELECT a.*,b.no_services,b.id_customer,a.id_customer_alat,b.keluhan_services,b.tgl_terima,c.kd_customer,c.nama_customer,d.kd_customer_alat,d.nama_customer_alat,d.serial_number
        FROM transaksi_services_detail as a, transaksi_services as b, m_customer as c, m_customer_alat as d
        WHERE a.id_transaksi_services = b.id_transaksi_services AND c.id_customer = b.id_customer AND d.id_customer_alat = a.id_customer_alat 
        AND a.id_transaksi_services='$idtransaksiservices'";
        return $this->db->query($query);
    }
    
    function post($data)
    {
            $idtransaksiservice       =   $this->input->post('id_transaksi_services');
            $id_customer_alat = $this->input->post('id_customer_alat');
            $qty = $this->input->post('qty');
            $harga_services = $this->input->post('harga_services');
            $keluhan_alat = $this->input->post('keluhan_alat');
            $keterangan_alat = $this->input->post('keterangan_alat');
            
            
            //insert ke table transaksi detail
                    $data       = array(
                                    'id_transaksi_services' => $idtransaksiservice,
                                    'id_customer_alat' => $id_customer_alat,
                                    'qty' => $qty,
                                    'harga_services' => $harga_services,
                                    'keluhan_alat' => $keluhan_alat,
                                    'keterangan_alat' => $keterangan_alat
                                );
       
         $this->db->insert('transaksi_services_detail',$data);

         //data barang
        //  return $this->db->insert('m_barang', $data);
    }
    
    
    function get_one($id)
    {
        $param  =   array('id_transaksi_detail'=>$id);
        return $this->db->get_where('transaksi_services_detail',$param);
    }
    function get_one_cek($id)
    {
        $param  =   array('id_transaksi_detail'=>$id);
        return $this->db->get_where('transaksi_services_detail',$param);
    }
    function get_one_cek_trans($id)
    {
        $query= "SELECT COUNT('id_transaksi_services') AS jml
                FROM transaksi_services_detail 
                WHERE id_transaksi_services='$id'";
        return $this->db->query($query);
    }
    function get_one_transaksi($id)
    {
        $query= "SELECT a.*,b.no_services,b.id_customer,a.id_customer_alat,b.keluhan_services,b.tgl_terima,c.kd_customer,c.nama_customer,d.kd_customer_alat,d.nama_customer_alat,d.serial_number
        FROM transaksi_services_detail as a, transaksi_services as b, m_customer as c, m_customer_alat as d
        WHERE a.id_transaksi_services = b.id_transaksi_services AND c.id_customer = b.id_customer AND d.id_customer_alat = a.id_customer_alat 
        AND a.id_transaksi_services='$id'";
        return $this->db->query($query);
       
    }
    
    function edit($data,$id)
    {
        $rp = $this->input->post('harga');
        $data=array(
            'no_tanda_terima'     =>  $this->input->post('no_tanda_terima'),
            'tgl_terima'   =>  $this->input->post('tgl_terima'),
            'tgl_input'     =>  date("Y-m-d")
                     );
        $this->db->where('id_transaksi',$id);
        $this->db->update('transaksi_services_detail',$data);
    }
    
    
    function delete($id)
    {
        // print_r($id);
        // die;
        $this->db->where('id_transaksi_services_detail',$id);
        $this->db->delete('transaksi_services_detail');
    }
}