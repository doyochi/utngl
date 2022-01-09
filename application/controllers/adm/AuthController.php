<?php

class AuthController extends CI_Controller{
    public function vLogin(){
        $data['title'] = "Login";
        $this->load->view('adm/auth/login', $data);     
    }
    public function auth(){
        if($_POST['user'] == 'admin' && $_POST['pass'] == '123admin456'){
            $this->session->set_userdata('is_logged_admin', true);
            redirect('admin/course');
        }else{
            $this->session->set_flashdata('message', 'Username atau password salah!');
            redirect('admin');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin');
    }
}