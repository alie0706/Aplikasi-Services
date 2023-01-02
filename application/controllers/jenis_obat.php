<?php
class Jenis_obat extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_konektor');
        $this->load->model('model_jenis_obat');
        $this->load->model('model_merk');
        $this->load->model('model_jenis');
        $this->load->model('model_kategori');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/jenis_obat/index/';
        $config['total_rows'] = $this->model_jenis_obat->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_jenis_obat->tampilkan_data_paging($halaman,$config['per_page']);

        $keterangan="Lihat Data master Jenis Obat";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','jenis_obat/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            $kd = $_POST['kd_jenis_obat'];
            $idmerk = $_POST['merk'];
            $idjenis = $_POST['jenis'];
            $idKat = $_POST['kategori'];
            $count =  $this->model_jenis_obat->get_one_count($kd,$idmerk,$idjenis,$idKat)->result();
            // echo $count[0]->jml;
            // die;
            if($count[0]->jml == 1){
                $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
                $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
                $data['merk']=  $this->model_merk->tampilkan_data()->result();
            
                $messge = array('message' => 'Duplicate Code. Please try again!','class' => 'alert alert-danger fade in');
                $this->session->set_flashdata('item',$messge );
                    
                $this->template->load('template','jenis_obat/form_input',$data);
            }
            else{
            // proses jenis_obat
            $this->model_jenis_obat->post();

            $keterangan="Insert Data master Jenis Obat";
            $kd_jenis_obat = $this->input->post('kd_jenis_obat');
            $nama_jenis_obat = $this->input->post('nama_jenis_obat');
            $id_merk = $this->input->post('merk');
            $id_kategori = $this->input->post('kategori');
            $id_jenis = $this->input->post('jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$id_jenis.'|'.$id_merk.'|'.$kd_jenis_obat.'|'.$nama_jenis_obat,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('jenis_obat');
            }
        }
        else{
            //$this->load->view('jenis_obat/form_input');
            $data['merk']=  $this->model_merk->tampilkan_data()->result();
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            
            $this->template->load('template','jenis_obat/form_input',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses merk
            $this->model_jenis_obat->edit();
            $keterangan="Update Data master Jenis Obat";
            $kd_jenis_obat = $this->input->post('kd_jenis_obat');
            $nama_jenis_obat = $this->input->post('nama_jenis_obat');
            $id_merk = $this->input->post('merk');
            $id_kategori = $this->input->post('kategori');
            $id_jenis = $this->input->post('jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$id_jenis.'|'.$id_merk.'|'.$kd_jenis_obat.'|'.$nama_jenis_obat,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('jenis_obat');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['merk']=  $this->model_merk->tampilkan_data()->result();
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['record']=  $this->model_jenis_obat->get_one($id)->row_array();
            
            //$this->load->view('jenis_obat/form_edit',$data);
            $this->template->load('template','jenis_obat/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_jenis_obat->delete($id);

        $keterangan="Delete Data master Jenis Obat";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan.'| id ='.$id,
                'recmod'=>date("Y-m-d H:i:s"));
        $this->db->insert('history_log', $log);
        redirect('jenis_obat');
    }

    //get konektor
    function get_konektor()
    {
        $id_jenis_obat=$this->input->post('id_jenis_obat');   
        $data=$this->model_konektor->Get_konektor($id_jenis_obat);
        echo json_encode($data);
    }
}