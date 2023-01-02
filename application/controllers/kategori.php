<?php
class Kategori extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_kategori');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/kategori/index/';
        $config['total_rows'] = $this->model_kategori->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_kategori->tampilkan_data_paging($halaman,$config['per_page']);
        // print_r($this->session->userdata('id_user'));
        // die;
        $keterangan="Lihat Data master Kategori";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','kategori/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $this->model_kategori->post();

            $keterangan="Insert Data master Kategori";
            $nama_kategori = $this->input->post('nama_kategori');
            $ket_kategori =$this->input->post('keterangan');
            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$nama_kategori.'|'.$ket_kategori,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('kategori');
        }
        else{
            //$this->load->view('kategori/form_input');
            $this->template->load('template','kategori/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $this->model_kategori->edit();

            $keterangan="Update Data master Kategori";
            $nama_kategori = $this->input->post('nama_kategori');
            $ket_kategori =$this->input->post('keterangan');
            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$nama_kategori.'|'.$ket_kategori,
                    'recmod'=>date("Y-m-d H:i:s"));
            $this->db->insert('history_log', $log);

            redirect('kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_kategori->get_one($id)->row_array();
            //$this->load->view('kategori/form_edit',$data);
            $this->template->load('template','kategori/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
            $keterangan="Delete Data master Kategori";
            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'| id ='.$id,
                    'recmod'=>date("Y-m-d H:i:s"));
            $this->db->insert('history_log', $log);
        $this->model_kategori->delete($id);
        redirect('kategori');
    }

    
}