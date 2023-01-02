<?php
class model_transaksi_keluar_detail_temp extends ci_model{
    var $table  = 'transaksi_keluar_detail_temp';
    
    
    
    function get_one($sid)
    {
        // print_r($sid);
        // die;
        $query= "SELECT a.*,b.nama_barang,b.stok FROM transaksi_keluar_detail_temp as a, m_barang as b WHERE id_session='$sid' AND a.id_barang=b.id_barang";
        return $this->db->query($query);
    }
    function cekdata($sid)
    {
        // print_r($sid);
        // die;
        $query= "SELECT * FROM transaksi_keluar_detail_temp WHERE id_session='$sid'";
        return $this->db->query($query);
    }

    function get_count_barang_jual($id,$sid)
    {
        $chek=  $this->db->get_where('transaksi_keluar_detail_temp',array('id_barang'=>$id, 'id_session'=>$sid));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function deleteTemp($kemarin){        
        $this->db->where_in('tgl_order_temp', $kemarin);    
        $this->db->delete('transaksi_keluar_detail_temp');  
    }

    function get_one_cek_trans($id,$sid)
    {
        $query= "SELECT *
                FROM transaksi_masuk_detail_temp 
                WHERE id_barang='$id' and id_session='$sid'";
        return $this->db->query($query);
    }
    public function deletetemptrans($id,$session){        
        $this->db->where('id_transaksi_keluar_detail', $id);          
        $this->db->where('id_session', $session);    
        $this->db->delete('transaksi_keluar_detail_temp');  
    }

    function isi_keranjang($sid){
        // print_r($sid);
        // die;
        $sql = "SELECT * FROM transaksi_keluar_detail_temp WHERE id_session='$sid'";
        return $this->db->query($sql);
    }
}