<?php

class EventController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_admin') != true){
            redirect('admin');
        }
        
        $this->load->model('Event');
        $this->load->library('upload');
    }
    public function index(){
        $data['title']      = 'Event';
        $data['sidebar']    = 'event';
        $data['events']     = $this->Event->getAll();

        $this->template->admin('adm/event/event', $data);
    }
    public function vAdd(){
        $data['title']      = 'Tambah Event';
        $data['sidebar']    = 'event';
    
        $this->template->admin('adm/event/event_add', $data);
    }

    public function vEdit($id){
        $data['title']      = 'Ubah Event';
        $data['sidebar']    = 'event';
        $data['event']      = $this->Event->getById($id);
    
        $this->template->admin('adm/event/event_edit', $data);
    }

    public function store(){
        $upload = $this->upload_image();
        if($upload['status'] == true){ // cek if upload success
            $formData['NAMA_EVENT']             = $_POST['judul'];
            $formData['DESKRIPSI_EVENT']        = $_POST['deskripsi'];
            $formData['LOKASI_EVENT']           = $_POST['tempat'];
            $formData['TGL_EVENT']              = $_POST['tgl'];
            $formData['LINK_EVENT']             = $_POST['link'];
            $formData['PENYELENGGARA_EVENT']    = $_POST['penyelenggara'];
            $formData['NARAHUBUNG_EVENT']       = $_POST['narahubung'];
            $formData['IMG_EVENT']              = $upload['link'];
            $this->Event->insert($formData);
            
            $this->session->set_flashdata('succ_msg', 'Berhasil menambahkan event baru!');
            redirect('admin/event');
        }else{
            $data['title']      = 'Tambah Event';
            $data['sidebar']    = 'event';
            $data['dataTemp']   = $_POST;

            $this->session->set_flashdata('err_msg', $upload['msg']);
            $this->template->admin('adm/event/event_add', $data);
        }
    }
    public function update(){
        $formData['ID_EVENT']               = $_POST['idEvent'];
        $formData['NAMA_EVENT']             = $_POST['judul'];
        $formData['DESKRIPSI_EVENT']        = $_POST['deskripsi'];
        $formData['LOKASI_EVENT']           = $_POST['tempat'];
        $formData['TGL_EVENT']              = $_POST['tgl'];
        $formData['LINK_EVENT']             = $_POST['link'];
        $formData['PENYELENGGARA_EVENT']    = $_POST['penyelenggara'];
        $formData['NARAHUBUNG_EVENT']       = $_POST['narahubung'];

        if(!empty($_FILES['poster']['name'])){ // cek if edit img / poster
            $upload = $this->upload_image();
            if($upload['status'] == true){ // cek if upload success
                $formData['IMG_EVENT'] = $upload['link'];
                $this->Event->update($formData);
                
                $this->session->set_flashdata('succ_msg', 'Berhasil mengubah event!');
                redirect('admin/event');
            }else{
                $data['title']                  = 'Ubah Event';
                $data['sidebar']                = 'event';
                $data['dataTemp']               = $_POST;

                $this->session->set_flashdata('err_msg', $upload['msg']);
                $this->template->admin('adm/event/event_edit', $data);
            }
        }else{
            $this->Event->update($formData);
            $this->session->set_flashdata('succ_msg', 'Berhasil mengubah event!');
            redirect('admin/event');
        }
    }
    public function publish(){
        $this->Event->update(['ID_EVENT' => $_POST['idEvent'], 'ISPUBLISHED_EVENT' => $_POST['stat']]);
        $this->session->set_flashdata('succ_msg', 'Berhasil mengubah status publish!');
        redirect('admin/event');
    }
    public function destroy(){
        $this->Event->delete(['ID_EVENT' => $_POST['idEvent']]);
        $this->session->set_flashdata('succ_msg', 'Berhasil menghapus event!');
        redirect('admin/event');
    }
    public function upload_image(){
        $conf['upload_path']    = "./uploads/event/";
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
                    'link'  => base_url('uploads/event/'.$img['file_name'])
                ];
        }else{
            return [
                'status'=> false,
                'msg'   => $this->upload->display_errors(),
            ];
        }
    }
}