<?php
class Customer extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_customer');
        $this->load->model('model_customer_alat');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/customer/index/';
        $config['total_rows'] = $this->model_customer->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_customer->tampilkan_data_paging($halaman,$config['per_page']);
        $keterangan="Lihat Data master Customer";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','customer/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses customer
            $this->model_customer->post();
            $keterangan="Insert Data master customer";
            $kd_customer =  $this->input->post('kd_customer');
            $nama_customer =  $this->input->post('nama_customer');
            // $alamat_customer =  $this->input->post('alamat_customer');
            // $tlp_customer =  $this->input->post('tlp_customer');
            // $email_customer =  $this->input->post('email_customer');
            // $pic_customer =  $this->input->post('pic_customer');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$kd_customer.'|'.$nama_customer,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('customer');
            
        }
        else{
            //$this->load->view('customer/form_input');
            $this->template->load('template','customer/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses customer
            $this->model_customer->edit();
            $keterangan="Update Data master customer";
            $kd_customer =  $this->input->post('kd_customer');
            $nama_customer =  $this->input->post('nama_customer');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$kd_customer.'|'.$nama_customer,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('customer');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_customer->get_one($id)->row_array();
            //$this->load->view('customer/form_edit',$data);
            $this->template->load('template','customer/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_customer->delete($id);
        $keterangan="Delete Data master Customer";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan.'| id ='.$id,
                'recmod'=>date("Y-m-d H:i:s"));
        $this->db->insert('history_log', $log);
        redirect('customer');
    }

    //alat
    function detail()
    {
        
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_customer->get_one($id)->row_array();
            $data['recordalat']=  $this->model_customer_alat->tampilkan_data_alat($id);

            $keterangan="Lihat Data Customer Alat";
            $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
            $this->template->load('template','customer/lihat_data_alat',$data);
        
    }

    function cetak()
    {
       
        $id=  $this->uri->segment(3);
        $data['record']=  $this->model_customer->get_one($id)->row_array();
        $data['recordalat']=  $this->model_customer_alat->tampilkan_data_alat($id);
        $keterangan="Cetak Data Customer";
            $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
            // $this->template->load('template','transaksi_masuk/form_input_barang',$data);
            $this->load->view('cetak/cetak_customer',$data);
        
    }
    
}