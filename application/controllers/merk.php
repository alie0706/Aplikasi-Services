<?php
class Merk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_jenis_obat');
        $this->load->model('model_merk');
        $this->load->model('model_jenis');
        $this->load->model('model_kategori');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/merk/index/';
        $config['total_rows'] = $this->model_merk->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_merk->tampilkan_data_paging($halaman,$config['per_page']);

        $keterangan="Lihat Data master Merk";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','merk/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            $kd = $_POST['kd_jenis'];
            $idKat = $_POST['kategori'];
            $count =  $this->model_merk->get_one_count($kd,$idKat)->result();
            // echo $count[0]->jml;
            // die;
            if($count[0]->jml > 0){
                $this->load->model('model_kategori');
                $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            
                $messge = array('message' => 'Duplicate Code. Please try again!','class' => 'alert alert-danger fade in');
                $this->session->set_flashdata('item',$messge );
                    
                $this->template->load('template','merk/form_input',$data);
            }
            else{
            // proses merk
            $this->model_merk->post();

            $keterangan="Insert Data master Merk";
            $kd_merk =  $this->input->post('kd_merk');
            $nama_merk =  $this->input->post('nama_merk');
            $id_kategori =  $this->input->post('kategori');
            $id_jenis =  $this->input->post('jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$id_jenis.'|'.$kd_merk.'|'.$nama_merk,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('merk');
            }
        }
        else{
            //$this->load->view('merk/form_input');
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            
            $this->template->load('template','merk/form_input',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses merk
            $this->model_merk->edit();

            $keterangan="Update Data master Merk";
            $kd_merk =  $this->input->post('kd_merk');
            $nama_merk =  $this->input->post('nama_merk');
            $id_kategori =  $this->input->post('kategori');
            $id_jenis =  $this->input->post('jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$id_jenis.'|'.$kd_merk.'|'.$nama_merk,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('merk');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['record']=  $this->model_merk->get_one($id)->row_array();
            //$this->load->view('merk/form_edit',$data);
            $this->template->load('template','merk/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $keterangan="Delete Data master Merk";
            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'| id ='.$id,
                    'recmod'=>date("Y-m-d H:i:s"));
            $this->db->insert('history_log', $log);
        $this->model_merk->delete($id);
        
        redirect('merk');
    }
    //get jenis_obat
    function get_jenis_obat()
    {
        $id_merk=$this->input->post('id_merk');   
        $data=$this->model_jenis_obat->Get_jenis_obat($id_merk);
        echo json_encode($data);
    }
}