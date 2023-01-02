<?php
class Profile extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_profile');
        $this->load->library('form_validation');
        chek_session();
    }
    
    function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/merk/index/';
        $config['total_rows'] = $this->model_profile->tampilkan_data()->num_rows();
        $config['per_page'] = 3; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman;
        $data['record']     =    $this->model_profile->tampilkan_data_paging($halaman,$config['per_page']);

        $keterangan="Lihat Data master profile";
        $log = array(
                'id_user' =>$this->session->userdata('id_user'),
                'keterangan' =>$keterangan,
                'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
        $this->template->load('template','profile/lihat_data',$data);
        
    }


    function edit(){
        $keterangan="Profile Perusahaan";
        if(isset($_POST['submit'])){
            // proses customer
            
            // $keterangan="Profile Perusahaan";
            // $id =  $this->input->post('id');
            // $nama =  $this->input->post('nama');
            // $alamat =  $this->input->post('alamat');
            // $tlp =  $this->input->post('tlp');
            // $email =  $this->input->post('email');
            // $logo =  $this->input->post('logo');

            // $this->model_profile->edit();

           
            // $this->template->load('template','profile/input_data',$id);

            $filelama=$this->input->post('file_lama');
            $id =  $this->input->post('id');
            $nama_pt =  $this->input->post('nama_pt');
            $alamat =  $this->input->post('alamat');
            $tlp =  $this->input->post('tlp');
            $email =  $this->input->post('email');
            // $logo =  $this->input->post('logo');



        $config['upload_path'] = './images';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);


        if($this->upload->do_upload('file')) {

            //tampung data dari form
            

            $fileData = $this->upload->data();

            $upload = [
                    'nama_pt' => $nama_pt,
                    'alamat' => $alamat,
                    'tlp' => $tlp,
                    'email' => $email,
                    'logo' => $fileData['file_name'],
            ];

                if($this->model_profile->edit($upload,$id)) {
                    
                    $this->session->set_flashdata('success', '<p>Selamat! Anda berhasil mengunggah file <strong>'. $fileData['file_name'] .'</strong></p>');
                } else {
                        $this->session->set_flashdata('error', '<p>Gagal! File '. $fileData['file_name'] .' tidak berhasil tersimpan di database anda</p>');
                }
                $path = './images/'.$filelama;
                unlink($path);
                // $this->template->load('template','profile/input_data');
                redirect(base_url('profile'));
            } else {
                $fileData = $this->upload->data();

                $upload = [
                    'nama_pt' => $nama_pt,
                    'alamat' => $alamat,
                    'tlp' => $tlp,
                    'email' => $email,
                    
                        
                ];

                if($this->model_profile->edit($upload,$id)) {
                    $this->session->set_flashdata('success', '<p>Selamat! Anda berhasil mengunggah file <strong>'. $fileData['file_name'] .'</strong></p>');
                } else {
                        $this->session->set_flashdata('error', '<p>Gagal! File '. $fileData['file_name'] .' tidak berhasil tersimpan di database anda</p>');
                }
                
                redirect(base_url('profile'));
            }
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_profile->get_one($id)->result();
            //$this->load->view('profile/form_edit',$data);
            $this->template->load('template','profile/input_data',$data);
        }
    }
    
    
    
}