<?php
class Jenis extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_jenis');
        $this->load->model('model_kategori');
        $this->load->model('model_merk');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/jenis/index/';
        $config['total_rows'] = $this->model_jenis->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_jenis->tampilkan_data_paging($halaman,$config['per_page']);

        $keterangan="Lihat Data master Jenis";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);

        $this->template->load('template','jenis/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            $kd = $_POST['kd_jenis'];
            $idKat = $_POST['kategori'];
            $count =  $this->model_jenis->get_one_count($kd,$idKat)->result();
            // echo $count[0]->jml;
            // die;
            if($count[0]->jml > 0){
                $this->load->model('model_kategori');
                $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            
                $messge = array('message' => 'Duplicate Code. Please try again!','class' => 'alert alert-danger fade in');
                $this->session->set_flashdata('item',$messge );
                    
                $this->template->load('template','jenis/form_input',$data);
            }
            else{
            // proses jenis
            $this->model_jenis->post();

            $keterangan="Insert Data master Jenis";
            $id_kategori =  $this->input->post('kategori');
            $kd_jenis =  $this->input->post('kd_jenis');
            $nama_jenis =  $this->input->post('nama_jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$kd_jenis.'|'.$nama_jenis,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('jenis');
            }
        }
        else{
            //$this->load->view('jenis/form_input');
            $this->load->model('model_kategori');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            
            $this->template->load('template','jenis/form_input',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses jenis
            $this->model_jenis->edit();
            $keterangan="Update Data master Jenis";
            $id_kategori =  $this->input->post('kategori');
            $kd_jenis =  $this->input->post('kd_jenis');
            $nama_jenis =  $this->input->post('nama_jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$kd_jenis.'|'.$nama_jenis,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('jenis');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']=  $this->model_jenis->get_one($id)->row_array();
            //$this->load->view('jenis/form_edit',$data);
            $this->template->load('template','jenis/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_jenis->delete($id);

        $keterangan="Delete Data master Kategori";
            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'| id ='.$id,
                    'recmod'=>date("Y-m-d H:i:s"));
            $this->db->insert('history_log', $log);
        redirect('jenis');
    }
    //get jenis
    function get_jenis()
    {
        $id_kategori=$this->input->post('id_kategori');   
        $data=$this->model_jenis->Jenis_Kategori($id_kategori);
        echo json_encode($data);
    }
    //get merk
    function get_merk()
    {
        $id_jenis=$this->input->post('id_jenis');   
        $data=$this->model_merk->Get_jenis($id_jenis);
        echo json_encode($data);
    }
}