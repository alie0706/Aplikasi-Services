<?php
class Model_customer_alat extends CI_Model{
    
    
    
    function tampilkan_data(){
        $query = "select a.*,b.id_customer-alat,b.tgl_terima_alat,b.kd_customer_alat,b.nama_customer_alat,b.serial_number,b.keterangan_customer_alat 
                    FROM m_customer as a, m_customer_alat where a.id_customer=b.id_customer";
        return $this->db->query($query);
        // return $this->db->get('m_customer_alat');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
    $query = "select *  FROM m_customer_alat";
    return $this->db->query($query);
  }
  function get_one_cek($kd)
  {
      $param  =   array('id_customer_alat'=>$kd);
      return $this->db->get_where('m_customer_alat',$param);
  }
    function post(){
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
       
        
        $image_name=$this->input->post('id_customer').'-'.$this->input->post('kd_customer_alat').'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $this->input->post('id_customer').'-'.$this->input->post('kd_customer_alat'); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data=array(            
           'id_customer'=>  $this->input->post('id_customer'),
		   'tgl_terima_alat'=>  $this->input->post('tgl_terima_alat'),
           'kd_customer_alat'=>  $this->input->post('kd_customer_alat'),
           'nama_customer_alat'=>  $this->input->post('nama_customer_alat'),
		   'merk_customer_alat'=>  $this->input->post('merk_customer_alat'),
		   'type_customer_alat'=>  $this->input->post('type_customer_alat'),
           'serial_number'=>  $this->input->post('serial_number'),
           'keterangan_customer_alat'=>  $this->input->post('keterangan_customer_alat'),
           'qr_code' => $image_name
                    );
        $this->db->insert('m_customer_alat',$data);
    }
    
    
    function edit()
    {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
       
        
        $image_name=$this->input->post('id_customer').'-'.$this->input->post('kd_customer_alat').'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $this->input->post('id_customer').'-'.$this->input->post('kd_customer_alat'); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data=array(
           'id_customer'=>  $this->input->post('id_customer'),
		   'tgl_terima_alat'=>  $this->input->post('tgl_terima_alat'),
           'kd_customer_alat'=>  $this->input->post('kd_customer_alat'),
           'nama_customer_alat'=>  $this->input->post('nama_customer_alat'),
		   'merk_customer_alat'=>  $this->input->post('merk_customer_alat'),
		   'type_customer_alat'=>  $this->input->post('type_customer_alat'),
		   'serial_number'=>  $this->input->post('serial_number'),
           'keterangan_customer_alat'=>  $this->input->post('keterangan_customer_alat'),
           'qr_code' => $image_name
                    );
        $this->db->where('id_customer_alat',$this->input->post('id'));
        $this->db->update('m_customer_alat',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_customer'=>$id);
        return $this->db->get_where('m_customer_alat',$param);
    }
    function get_one_alat($id)
    {
        $param  =   array('id_customer_alat'=>$id);
        return $this->db->get_where('m_customer_alat',$param);
    }
    function tampilkan_data_alat($id){
        $query = "select a.*,b.id_customer_alat,b.tgl_terima_alat,b.kd_customer_alat,b.nama_customer_alat,b.merk_customer_alat,b.type_customer_alat,b.serial_number,b.keterangan_customer_alat 
                    FROM m_customer as a, m_customer_alat as b where a.id_customer=b.id_customer AND b.id_customer='$id'";
        return $this->db->query($query);
        // return $this->db->get('m_customer_alat');
    }
    function get_one_count($kd,$idKat)
    {
        $query = "select count(id_customer_alat) AS jml from m_customer_alat_alat where kd_customer='$kd' AND id_kategori='$idKat'";
        // return $this->db->where('m_customer_alat',$kd);
        return $this->db->query($query);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_customer_alat',$id);
        $this->db->delete('m_customer_alat');
    }

   //get customer
   function Get_customer($id_customer)
   {
    //    $this->db->where('id_customer', $id_customer);
    //    $this->db->order_by('id_customer', 'ASC');
    //    return $this->db->from('m_customer_alat')->get()->result();
    $param  =   array('id_customer'=>$id_customer);
    return $this->db->get_where('m_customer_alat',$param);
   }
}