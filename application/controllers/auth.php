<?php
class auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_user');
    }
    
    function login()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil=  $this->model_user->login($username,$password);
            // cek ke tabel berdasarkan username dan password yang diinput
				$query = $this->db->select("*")->from("user")->where("username", $username)->get();

				// menyimpan data/ hasil dalam bentuk row/ baris
				$row = $query->row();
                // print_r($row->id_user);
                // die;
            if($hasil==1)
            {
                

                // update last login
                $this->db->where('username',$username);
                $this->db->update('user',array('last_login'=>date('Y-m-d')));
                $session = array(
                                    'status_login'=>'oke',
                                    'username'=>$username,
                                    'id_user'=>$row->id_user,
                                    'level'=>$row->level
                );
                $this->session->set_userdata($session);
                // $this->session->set_userdata(array(
                //                                     'status_login'=>'oke',
                //                                     'username'=>$username,
                //                                     'id_user'=>$row->id_user));
                $keterangan="Login User";
                $log = array(
                        'id_user' =>$this->session->userdata('id_user'),
                        'keterangan' =>$keterangan.'| username ='.$username,
                        'recmod'=>date("Y-m-d H:i:s"));
                $this->db->insert('history_log', $log);
                                                    
                redirect('dashboard');
            }
            else{
                redirect('auth/login');
            }
        }
        else{
            //$this->load->view('form_login2');
            chek_session_login();
            $this->load->view('form_login');
        }
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}