<?php

class PretestController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_admin') != true){
            redirect('admin');
        }
        $this->load->model('Pretest');
        $this->load->model('PretestUser');
        $this->load->library('upload');
    }
    public function index(){
        $data['title']      = "Pretest";
        $data['sidebar']    = "pretest";
        $data['pretests']   = $this->Pretest->getAll();

        $this->template->admin('adm/pretest/pretest', $data);
    }
    public function vAdd(){
        $data['title']   = "Tambah Pretest";
        $data['sidebar'] = "pretest";

        $this->template->admin('adm/pretest/pretest_add', $data);
    }
    public function vEdit($id){
        $data['title']      = 'Ubah Pretest';
        $data['sidebar']    = 'pretest';
        $data['pretest']    = $this->Pretest->getById($id);

        $this->template->admin('adm/pretest/pretest_edit', $data);
    }
    public function store(){
        $formData['NAMA_PRETEST']               = $_POST['nama'];
        $formData['PERATURAN_PRETEST']          = $_POST['peraturan'];
        $formData['SOAL_PRETEST']               = $_POST['soal'];
        $formData['FORMATFILE_PRETEST']         = $_POST['frmtFile'];
        $formData['FORMATPENGERJAAN_PRETEST']   = $_POST['pengerjaan'];
        $formData['DEADLINE_PRETEST']           = $_POST['durHa'].';'.$_POST['durJa'].';'.$_POST['durMe'];

        if($_FILES['poster']['name'] != ""){
            $upload = $this->upload_image();
            if($upload['status'] == true){ // cek if upload success
                $formData['IMG_PRETEST']    = $upload['link'];
                $this->Pretest->insert($formData);
                
                $this->session->set_flashdata('succ_msg', 'Berhasil menambahkan pretest baru!');
                redirect('admin/pretest');
            }else{
                $data['title']      = 'Tambah Pretest';
                $data['sidebar']    = 'pretest';
                $data['dataTemp']   = $_POST;

                $this->session->set_flashdata('err_msg', $upload['msg']);
                $this->template->admin('adm/pretest/pretest_add', $data);
            }
        }else{
            $this->Pretest->insert($formData);
            
            $this->session->set_flashdata('succ_msg', 'Berhasil menambahkan pretest baru!');
            redirect('admin/pretest');
        }
        
    }
    public function update(){
        $formData['ID_PRETEST']                 = $_POST['id'];
        $formData['NAMA_PRETEST']               = $_POST['nama'];
        $formData['PERATURAN_PRETEST']          = $_POST['peraturan'];
        $formData['SOAL_PRETEST']               = $_POST['soal'];
        $formData['FORMATFILE_PRETEST']         = $_POST['frmtFile'];
        $formData['FORMATPENGERJAAN_PRETEST']   = $_POST['pengerjaan'];
        $formData['DEADLINE_PRETEST']           = $_POST['durHa'].';'.$_POST['durJa'].';'.$_POST['durMe'];

        if($_FILES['poster']['name'] != ""){
            $upload = $this->upload_image();
            if($upload['status'] == true){ // cek if upload success
                $formData['IMG_PRETEST']    = $upload['link'];
                $this->Pretest->update($formData);
                
                $this->session->set_flashdata('succ_msg', 'Berhasil mengubah pretest!');
                redirect('admin/pretest');
            }else{
                $data['title']      = 'Tambah Pretest';
                $data['sidebar']    = 'pretest';
                $data['dataTemp']   = $_POST;

                $this->session->set_flashdata('err_msg', $upload['msg']);
                $this->template->admin('adm/pretest/pretest_add', $data);
            }
        }else{
            $this->Pretest->update($formData);
            
            $this->session->set_flashdata('succ_msg', 'Berhasil mengubah pretest!');
            redirect('admin/pretest');
        }
    }
    public function publish(){
        $this->Pretest->update(['ID_PRETEST' => $_POST['id'], 'ISPUBLISHED_PRETEST' => $_POST['stat']]);
        $this->session->set_flashdata('succ_msg', 'Berhasil mengubah status publish!');
        redirect('admin/pretest');
    }
    public function destroy(){
        $pretestUser = $this->PretestUser->get(['ID_PRETEST' => $_POST['id']]);
        if($pretestUser != null){// check if course user exist
            $this->session->set_flashdata('err_msg', 'Opps, terdapat transaksi user terhadap pretest!');
            redirect('admin/pretest');
        }

        $this->Pretest->delete(['ID_PRETEST' => $_POST['id']]);
        $this->session->set_flashdata('succ_msg', 'Pretest berhasil dihapus');
        redirect('admin/pretest');
    }
    public function upload_image(){
        $conf['upload_path']    = "./uploads/pretest/";
        $conf['allowed_types']  = "jpg|png|jpeg|bmp";
        $conf['max_size']       = 2048;
        $conf['file_name']      = time();
        $conf['encrypt_name']   = TRUE;

        $this->upload->initialize($conf);
        if($this->upload->do_upload('poster')){
            $img = $this->upload->data();
            return [
                    'status'=> true,
                    'msg'   => 'Data berhasil terupload',
                    'link'  => base_url('uploads/pretest/'.$img['file_name'])
                ];
        }else{
            return [
                'status'=> false,
                'msg'   => $this->upload->display_errors(),
            ];
        }
    }
}