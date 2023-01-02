<?php
class model_user extends CI_Model{
    
    
    
    function login($username,$password)
    {
        $chek=  $this->db->get_where('user',array('username'=>$username,'password'=>  md5($password)));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    function ceckuser($username,$password)
    {
        // $chek=  $this->db->get_where('user',array('username'=>$username,'password'=>  md5($password)));
        // $param  =   array('username'=>$username,
        //                 'password'=> md5($password));
        return $this->db->get_where('user',array('username'=>$username,'password'=>  md5($password)));
        // return $this->db->query("select * from user where username='$username' AND password='md5($password)'");
    }
    
    
    function tampildata()
    {
        return $this->db->get('user');
    }
    
    function get_one($id)
    {
        $param  =   array('id_user'=>$id);
        return $this->db->get_where('user',$param);
    }
}