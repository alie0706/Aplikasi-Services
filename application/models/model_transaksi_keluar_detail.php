<?php
class model_transaksi_keluar_detail extends ci_model{
    var $table  = 'transaksi_keluar_detail';
    
    
    
    function get_one($id)
    {
        // print_r($sid);
        // die;
        $query= "SELECT a.*,b.nama_barang,b.stok FROM transaksi_keluar_detail as a, m_barang as b WHERE id_transaksi_keluar_detail='$id' AND a.id_barang=b.id_barang";
        return $this->db->query($query);
    }
    function get_one_barang($id)
    {
        // print_r($sid);
        // die;
        $query= "SELECT a.*,b.nama_barang,b.stok FROM transaksi_keluar_detail as a, m_barang as b WHERE id_transaksi_keluar='$id' AND a.id_barang=b.id_barang";
        return $this->db->query($query);
    }
    function cekdata($id)
    {
        // print_r($sid);
        // die;
        $query= "SELECT * FROM transaksi_keluar_detail WHERE id_transaksi_keluar='$id'";
        return $this->db->query($query);
    }

    function cekbarangdetail($id,$idbarang,$idtrans)
    {
        // print_r($sid);
        // die;
        $query= "SELECT * FROM transaksi_keluar_detail WHERE id_transaksi_keluar_detail='$id' AND id_barang='$idbarang' AND id_transaksi_keluar='$idtrans'";
        return $this->db->query($query);
    }

    function get_count_barang_jual($id,$sid)
    {
        $chek=  $this->db->get_where('transaksi_keluar_detail',array('id_barang'=>$id, 'id_transaksi_keluar_detail'=>$sid));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    function get_count_barang_jual_trans($idbarang,$id)
    {
        $chek=  $this->db->get_where('transaksi_keluar_detail',array('id_barang'=>$idbarang, 'id_transaksi_keluar'=>$id));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    function cekdatatrans($idbarang,$id)
    {
        // print_r($sid);
        // die;
        $query= "SELECT * FROM transaksi_keluar_detail WHERE id_barang='$idbarang' AND id_transaksi_keluar='$id'";
        return $this->db->query($query);
    }
    public function deleteTemp($kemarin){        
        $this->db->where_in('tgl_order', $kemarin);    
        $this->db->delete('transaksi_keluar_detail');  
    }

    function get_one_cek_trans($id,$sid)
    {
        $query= "SELECT *
                FROM transaksi_masuk_detail 
                WHERE id_barang='$id' and id_transaksi_keluar_detail='$sid'";
        return $this->db->query($query);
    }
    
    public function deletetrans($id,$idbarang){        
        $this->db->where('id_transaksi_keluar_detail', $id);          
        $this->db->where('id_barang', $idbarang);    
        $this->db->delete('transaksi_keluar_detail');  
    }
}