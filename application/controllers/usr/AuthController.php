<?php

class AuthController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User');
        $this->load->library('upload');
    }
    public function vHome(){
        $data['title']  = 'Home'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/home', $data);
    }
    public function vSignUp(){
        $data['title']      = 'Daftar'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('auth/register', $data);
    }
    public function vSignIn(){
        $data['title']  = 'Masuk'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('auth/login', $data);
    }
    public function vKebijakan(){
        $data['title']  = 'Kebijakan & Privacy'; // PLACEHOLDER VARIABLE DATA
    
        $this->template->index('general/kebijakan', $data);
    }
    public function register(){
        $formData['EMAIL_USER']             = $_POST['email'];
        $formData['TELP_USER']              = $_POST['telp'];
        $formData['PASSWORD_USER']          = hash('sha256', md5($_POST['pass']));
        $formData['NAMA_USER']              = $_POST['nama'];
        $formData['JK_USER']                = $_POST['jk'];
        $formData['ALAMAT_USER']            = $_POST['alamat'];
        $formData['TEMPATLAHIR_USER']       = $_POST['tmpt_lahir'];
        $formData['TGLLAHIR_USER']          = $_POST['tgl_lahir'];
        $formData['BULANLAHIR_USER']        = $_POST['bln_lahir'];
        $formData['TAHUNLAHIR_USER']        = $_POST['thn_lahir'];
        $formData['AGAMA_USER']             = $_POST['agama'];
        $formData['NIK_USER']               = $_POST['nik'];
        $formData['PERGURUANTINGGI_USER']   = $_POST['pt'];
        $formData['NIM_USER']               = $_POST['nim'];
        $formData['PROGRAMSTUDI_USER']      = $_POST['ps'];
        $formData['JENJANG_USER']           = $_POST['jenjang'];
        $formData['SEMESTER_USER']          = $_POST['semester'];
        $formData['STATUS_USER']            = $_POST['status'];

        $uploadCV = $this->upload_file($_POST['email'], 'cv', 'cv');
        if($uploadCV['status'] == true){
            $formData['CV_USER'] = $uploadCV['link'];
        }

        $uploadPortfolio = $this->upload_file($_POST['email'], 'portfolio', 'porto');
        if($uploadPortfolio['status'] == true){
            $formData['PORTFOLIO_USER'] = $uploadPortfolio['link'];
        }
        
        $uploadRekom = $this->upload_file($_POST['email'], 'surat-rekomendasi', 'rekom');
        if($uploadRekom['status'] == true){
            $formData['SURATREKOM_USER'] = $uploadRekom['link'];
        }

        $uploadDokPend = $this->upload_dokPend($_POST['email'], $_FILES['dokPend']);
        if($uploadDokPend['status'] == true){
            $formData['DOKPEND_USER'] = $uploadDokPend['link'];
        }

        $this->setSession($_POST['email'], $_POST['nama'], $_POST['telp'], $_POST['jk'], $_POST['tmpt_lahir'], $_POST['tgl_lahir'], $_POST['bln_lahir'], $_POST['thn_lahir'], $_POST['nik'],
                            $_POST['pt'], $_POST['nim'], $_POST['ps'], $_POST['semester'], $_POST['status']);
        
        $this->User->insert($formData);
        redirect('/');
    }

    public function login(){
       $user = $this->User->get(['EMAIL_USER' => $_POST['email']]);
       
       if($user == null){ // cek email is exist
            $this->session->set_flashdata('err_msg', 'Email atau Password salah!');
            redirect('sign-in');
       }

       if($user[0]->PASSWORD_USER != hash('sha256', md5($_POST['pass']))){ // cek password is correct
            $this->session->set_flashdata('err_msg', 'Email atau Password salah!');
            redirect('sign-in');
        }
    
        $this->setSession($user[0]->EMAIL_USER, $user[0]->NAMA_USER, $user[0]->TELP_USER, $user[0]->JK_USER, $user[0]->TEMPATLAHIR_USER, $user[0]->TGLLAHIR_USER, $user[0]->BULANLAHIR_USER, $user[0]->TAHUNLAHIR_USER, $user[0]->NIK_USER,
                            $user[0]->PERGURUANTINGGI_USER, $user[0]->NIM_USER, $user[0]->PROGRAMSTUDI_USER, $user[0]->SEMESTER_USER,
                            $user[0]->STATUS_USER);
        redirect('/');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }

    public function setSession($email, $nama, $telp, $jk, $tempatlahir, $tgllahir, $blnlahir, $thnlahir, $nik, $univ, $nim, $prodi, $semester, $status){
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('nama', $nama);
        $this->session->set_userdata('telp', $telp);
        $this->session->set_userdata('jk', $jk);
        $this->session->set_userdata('tempatlahir', $tempatlahir);
        $this->session->set_userdata('tgllahir', $tgllahir);
        $this->session->set_userdata('blnlahir', $blnlahir);
        $this->session->set_userdata('thnlahir', $thnlahir);
        $this->session->set_userdata('nik', $nik);
        $this->session->set_userdata('univ', $univ);
        $this->session->set_userdata('nim', $nim);
        $this->session->set_userdata('prodi', $prodi);
        $this->session->set_userdata('semester', $semester);
        $this->session->set_userdata('status', $status);
        $this->session->set_userdata('is_logged', true);
    }

    public function upload_file($email, $folder, $file){
        $email = str_replace("@", "__", $email);
        $path = 'uploads/user/'.$email.'/'.$folder;
        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $conf['upload_path']    = $path;
        $conf['allowed_types']  = "pdf";
        $conf['max_size']       = 2048;
        $conf['file_name']      = str_replace(" ", "", $_FILES[$file]['name']);

        $this->upload->initialize($conf);
        if($this->upload->do_upload($file)){
            $dataUpload = $this->upload->data();
            return [
                    'status'=> true,
                    'msg'   => 'Data berhasil terupload',
                    'link'  => base_url($path."/".$dataUpload['file_name'])
                ];
        }else{
            return [
                'status'=> false,
                'msg'   => $this->upload->display_errors(),
            ];
        }
    }

    public function upload_dokPend($email, $files){
        $email = str_replace("@", "__", $email);
        $path = 'uploads/user/'.$email.'/dokumen-pendukung';
        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $dokPend = array();
        $links     = array();
        foreach ($files['name'] as $item => $file) { // upload multiple files
            $_FILES['dokPend[]']['name']      = $files['name'][$item];
            $_FILES['dokPend[]']['type']      = $files['type'][$item];
            $_FILES['dokPend[]']['tmp_name']  = $files['tmp_name'][$item];
            $_FILES['dokPend[]']['error']     = $files['error'][$item];
            $_FILES['dokPend[]']['size']      = $files['size'][$item];

            $fileName = str_replace(" ", "", $file);

            $dokPend[] = $fileName;
            $links[]     = base_url($path."/".$fileName);

            $conf['upload_path']    = $path;
            $conf['allowed_types']  = "pdf";
            $conf['max_size']       = 2048;
            $conf['file_name']      = $fileName;
            $this->upload->initialize($conf);

            if ($this->upload->do_upload('dokPend[]')) {
                $this->upload->data();
            } else {
                return [
                    'status'=> false,
                    'msg'   => $this->upload->display_errors()
                ];
            }
        }
        return [
            'status'=> true,
            'msg'   => 'Data berhasil terupload',
            'link'  => implode(';', $links)
        ];
    }
}