<?php
class Konektor extends CI_Controller{
    
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
        $config['base_url'] = base_url().'index.php/konektor/index/';
        $config['total_rows'] = $this->model_konektor->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_konektor->tampilkan_data_paging($halaman,$config['per_page']);
        $keterangan="Lihat Data master Konektor";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','konektor/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            $kd = $_POST['kd_konektor'];
            $idjenisobat = $_POST['jenisobat'];
            $idmerk = $_POST['merk'];
            $idjenis = $_POST['jenis'];
            $idKat = $_POST['kategori'];
            $count =  $this->model_konektor->get_one_count($kd,$idjenisobat,$idmerk,$idjenis,$idKat)->result();
            // echo $count[0]->jml;
            // die;
            if($count[0]->jml == 1){
                $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
                $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
                $data['merk']=  $this->model_merk->tampilkan_data()->result();
                $data['jenis_obat']=  $this->model_jenis_obat->tampilkan_data()->result();
            
                $messge = array('message' => 'Duplicate Code. Please try again!','class' => 'alert alert-danger fade in');
                $this->session->set_flashdata('item',$messge );
                    
                $this->template->load('template','konektor/form_input',$data);
            }
            else{
            // proses jenis_obat
            $this->model_konektor->post();

            $keterangan="Insert Data master Jenis Konektor";
            $kd_konektor =  $this->input->post('kd_konektor');
            $nama_konektor =  $this->input->post('nama_konektor');
            $id_jenis_obat =  $this->input->post('jenis_obat');
            $id_merk =  $this->input->post('merk');
            $id_kategori =  $this->input->post('kategori');
            $id_jenis =  $this->input->post('jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$id_jenis.'|'.$id_merk.'|'.$id_jenis_obat.'|'.$kd_konektor.'|'.$nama_konektor,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('konektor');
            }
        }
        else{
            //$this->load->view('konektor/form_input');
            $data['jenis_obat']=  $this->model_jenis_obat->tampilkan_data()->result();
            $data['merk']=  $this->model_merk->tampilkan_data()->result();
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            
            $this->template->load('template','konektor/form_input',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses merk
            $this->model_konektor->edit();

            $keterangan="Update Data master Jenis Konektor";
            $kd_konektor =  $this->input->post('kd_konektor');
            $nama_konektor =  $this->input->post('nama_konektor');
            $id_jenis_obat =  $this->input->post('jenis_obat');
            $id_merk =  $this->input->post('merk');
            $id_kategori =  $this->input->post('kategori');
            $id_jenis =  $this->input->post('jenis');

            $log = array(
                    'id_user' =>$this->session->userdata('id_user'),
                    'keterangan' =>$keterangan.'|'.$id_kategori.'|'.$id_jenis.'|'.$id_merk.'|'.$id_jenis_obat.'|'.$kd_konektor.'|'.$nama_konektor,
                    'recmod'=>date("Y-m-d H:i:s"));
                    $this->db->insert('history_log', $log);
            redirect('konektor');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['jenis_obat']=  $this->model_jenis_obat->tampilkan_data()->result();
            $data['merk']=  $this->model_merk->tampilkan_data()->result();
            $data['jenis']=  $this->model_jenis->tampilkan_data()->result();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['record']=  $this->model_konektor->get_one($id)->row_array();
            
            //$this->load->view('konektor/form_edit',$data);
            $this->template->load('template','konektor/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_konektor->delete($id);

        $keterangan="Delete Data master Konektor";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan.'| id ='.$id,
                'recmod'=>date("Y-m-d H:i:s"));
        $this->db->insert('history_log', $log);
        redirect('konektor');
    }
}