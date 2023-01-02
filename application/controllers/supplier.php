<?php
class Supplier extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_supplier');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/supplier/index/';
        $config['total_rows'] = $this->model_supplier->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_supplier->tampilkan_data_paging($halaman,$config['per_page']);
        $keterangan="Lihat Data master Supplier";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','supplier/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses supplier
            $this->model_supplier->post();

            $keterangan="Insert Data master Supplier";
            $nama_supplier =  $this->input->post('nama_supplier');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$nama_supplier,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('supplier');
            
        }
        else{
            //$this->load->view('supplier/form_input');
            $this->template->load('template','supplier/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses supplier
            $this->model_supplier->edit();
            $keterangan="Update Data master Supplier";
            $nama_supplier =  $this->input->post('nama_supplier');
            $idsupplier =  $this->input->post('id');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$nama_supplier.'|'.$idsupplier,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('supplier');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_supplier->get_one($id)->row_array();
            //$this->load->view('supplier/form_edit',$data);
            $this->template->load('template','supplier/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_supplier->delete($id);
        $keterangan="Delete Data master Supplier";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan.'| id ='.$id,
                'recmod'=>date("Y-m-d H:i:s"));
        $this->db->insert('history_log', $log);
        redirect('supplier');
    }
    
}