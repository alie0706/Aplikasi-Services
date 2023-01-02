<?php
class user extends ci_controller{
    
   function __construct() {
        parent::__construct();
        $this->load->model('model_user');
        chek_session();
    }
    
    function index()
    {
        $data['record']=  $this->model_user->tampildata();
        //$this->load->view('user/lihat_data',$data);
        $this->template->load('template','user/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses data
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            $level   =  $this->input->post('level',true);
            $data       =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password),
                                    'level'=>$level);
            $this->db->insert('user',$data);
            redirect('user');
        }
        else{
            //$this->load->view('user/form_input');
            $this->template->load('template','user/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $id         =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            $level   =  $this->input->post('level',true);
            if(empty($password)){
                 $data  =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'level'=>$level);
            }
            else{
                  $data =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password),
                                    'level'=>$level);
            }
             $this->db->where('user_id',$id);
             $this->db->update('user',$data);
             redirect('user');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_user->get_one($id)->row_array();
            //$this->load->view('user/form_edit',$data);
            $this->template->load('template','user/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('user_id',$id);
        $this->db->delete('user');
        redirect('user');
    }
}