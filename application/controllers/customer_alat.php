<?php
class Customer_alat extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_customer');
        $this->load->model('model_customer_alat');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/customer_alat/index/';
        $config['total_rows'] = $this->model_customer_alat->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_customer_alat->tampilkan_data_paging($halaman,$config['per_page']);

        $keterangan="Lihat Data master Customer Alat";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','customer_alat/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            $id=$_POST['id_customer'];
            // proses customer
            $this->model_customer_alat->post();
            $keterangan="Insert Data master customer alat";
            $id_customer = $this->input->post('id_customer');
            $kd_customer_alat = $this->input->post('kd_customer_alat');
			$merk_customer_alat = $this->input->post('merk_customer_alat');
			$type_customer_alat = $this->input->post('type_customer_alat');
            $serial_number = $this->input->post('serial_number');
            $nama_customer_alat = $this->input->post('nama_customer_alat');
			$tgl_terima_alat = $this->input->post('tgl_terima_alat');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_customer.'|'.$kd_customer_alat.'|'.$merk_customer_alat.'|'.$type_customer_alat.'|'.$serial_number.'|'.$nama_customer_alat.'|'.$tgl_terima_alat,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('customer/detail/'.$id);
            
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_customer->get_one($id)->row_array();
            $this->template->load('template','customer_alat/form_input',$data);
        }
    }
    
    function edit()
    {
        
        // print_r($idcustomer);
        // die;
       
        if(isset($_POST['submit'])){
            $idcustomer =  $_POST['id_customer'];
            // proses customer
            $this->model_customer_alat->edit();
            $keterangan="Update Data master customer alat";
            $id_customer = $this->input->post('id_customer');
            $kd_customer_alat = $this->input->post('kd_customer_alat');
			$merk_customer_alat = $this->input->post('merk_customer_alat');
			$type_customer_alat = $this->input->post('type_customer_alat');
            $serial_number = $this->input->post('serial_number');
            $nama_customer_alat = $this->input->post('nama_customer_alat');
			$tgl_terima_alat = $this->input->post('tgl_terima_alat');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
					'keterangan' =>$keterangan.'|'.$id_customer.'|'.$kd_customer_alat.'|'.$merk_customer_alat.'|'.$type_customer_alat.'|'.$serial_number.'|'.$nama_customer_alat.'|'.$tgl_terima_alat,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('customer/detail/'.$idcustomer);
        }
        else{
            $id=  $this->uri->segment(3);
            // print_r($id);
            // die;
            $data['record']=  $this->model_customer_alat->get_one_alat($id)->row_array();
            // $data['recordalat']=  $this->model_customer_alat->tampilkan_data_alat($id);
            //$this->load->view('customer_alat/form_edit',$data);
            $this->template->load('template','customer_alat/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_customer_alat->delete($id);
        redirect('customer');
    }

    //get merk
    function get_customer_alat()
    {
        $id_customer=$this->input->post('id_customer');   
        $data=$this->model_customer_alat->Get_customer($id_customer);
        echo json_encode($data);
    }

    function get_customer_alat2($id_customer)
    {
        // $id_customer=$this->input->post('id_customer');   
        $data=$this->model_customer_alat->Get_customer($id_customer);
        echo json_encode($data);
    }

    function cetak_barcode()
    {
      
            $kd=  $this->uri->segment(3);

            $data['record']     =  $this->model_customer_alat->get_one_cek($kd)->result();
            
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->load->view('cetak/cetak_barcode_alat',$data);
       
    }
    
}