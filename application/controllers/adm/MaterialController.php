<?php

class MaterialController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_admin') != true){
            redirect('admin');
        }
        $this->load->model('Course');
        $this->load->model('Material');
        $this->load->model('MaterialUser');
        $this->load->library('upload');
    }

    public function vMaterial($id){
        $data['title']      = 'Materi';
        $data['sidebar']    = 'course';
        $data['course']     = $this->Course->getById($id);
        $data['materials']  = $this->Material->get(['ID_COURSE' => $id]);

        $this->template->admin('adm/material/material', $data);
    }
    
    public function vAdd($id){
        $data['title']      = 'Tambah Materi';
        $data['sidebar']    = 'course';
        $data['course']     = $this->Course->getById($id);
    
        $this->template->admin('adm/material/material_add', $data);
    }

    public function vEdit($id){
        $data['title']      = 'Edit Materi';
        $data['sidebar']    = 'course';
        $data['material']   = $this->Material->getById($id);
    
        $this->template->admin('adm/material/material_edit', $data);
    }

    public function store(){
        $formData['ID_COURSE']           = $_POST['idCourse'];
        $formData['NAMA_MATERIAL']       = $_POST['topik'];
        $formData['CONTENT_MATERIAL']    = $_POST['konten'];
        $formData['DESKRIPSI_MATERIAL']  = $_POST['deskripsi'];
        
        if(!empty($_FILES['file']['name'][0])){ // cek if process upload files exist
            $upload = $this->upload_files($_POST['idCourse'], $_FILES['file']);
            if($upload['status'] == true){
                $formData['RESOURCE_MATERIAL']  = $upload['link'];

                $this->session->set_flashdata('succ_msg', 'Berhasil menambah materi baru!');
                $this->Material->insert($formData);
                redirect('admin/material/'.$_POST['idCourse']);
            }else{
                $data['title']                  = 'Tambah Materi';
                $data['sidebar']                = 'course';
                $data['dataTemp']               = $_POST;

                $this->session->set_flashdata('err_msg', $upload['msg']);
                $this->template->admin('adm/material/material_add', $data);
            }
        }else{
            $this->session->set_flashdata('succ_msg', 'Berhasil menambah materi baru!');
            $this->Material->insert($formData);
            redirect('admin/material/'.$_POST['idCourse']);
        }
    }

    public function update(){
        $formData['ID_MATERIAL']         = $_POST['idMaterial'];
        $formData['NAMA_MATERIAL']       = $_POST['topik'];
        $formData['CONTENT_MATERIAL']    = $_POST['konten'];
        $formData['DESKRIPSI_MATERIAL']  = $_POST['deskripsi'];

        if(!empty($_FILES['file']['name'][0])){ // cek if edit img / poster
            $upload = $this->upload_files($_POST['idCourse'], $_FILES['file']);
            if($upload['status'] == true){
                $resources = $this->Material->getById($_POST['idMaterial'])->RESOURCE_MATERIAL;
                $formData['RESOURCE_MATERIAL']  = $resources.';'.$upload['link'];

                $this->session->set_flashdata('succ_msg', 'Berhasil menambah materi baru!');
                $this->Material->update($formData);
                redirect('admin/material/'.$_POST['idCourse']);
            }else{
                $data['title']                  = 'Tambah Materi';
                $data['sidebar']                = 'course';
                $data['dataTemp']               = $_POST;

                $this->session->set_flashdata('err_msg', $upload['msg']);
                $this->template->admin('adm/material/material_edit', $data);
            }
        }else{
            $this->Material->update($formData);
            $this->session->set_flashdata('succ_msg', 'Berhasil mengubah materi!');
            redirect('admin/material/'.$_POST['idCourse']);
        }
    }

    public function finish(){
        $this->Course->update(['ID_COURSE' => $_POST['idCourse'], 'ISMATREADY_COURSE' => '1']);
        $this->session->set_flashdata('succ_msg', 'Berhasil mengubah status materi menjadi selesai!');
        redirect('admin/material/'.$_POST['idCourse']);
    }

    public function destroyResource(){
        $material = $this->Material->getById($_POST['idMaterial']);
        $resources = explode(';', $material->RESOURCE_MATERIAL);

        $newResource = array();
        foreach ($resources as $item) {
            $resource = explode('/', $item);
            if($_POST['resource'] == $resource[count($resource) - 1]){
                unlink('./uploads/material/course_'.$material->ID_COURSE.'/'.$_POST['resource']);
            }else{
                array_push($newResource, $item);
            }
        }

        $this->Material->update(['ID_MATERIAL' => $_POST['idMaterial'], 'RESOURCE_MATERIAL' => implode(';', $newResource)]);
        $this->session->set_flashdata('succ_msg', 'Berhasil menghapus resource tambahan!');
        redirect('admin/material/edit/'.$_POST['idMaterial']);
    }

    public function destroy(){
        $materialUser = $this->MaterialUser->get(['ID_MATERIAL' => $_POST['id']]);
        if($materialUser != null){// check if course user exist
            $this->session->set_flashdata('err_msg', 'Opps, terdapat transaksi user terhadap materi!');
            redirect('admin/material/'.$_POST['idCourse']);
        }

        $this->Material->delete(['ID_MATERIAL' => $_POST['id']]);
        $this->session->set_flashdata('succ_msg', 'Materi berhasil dihapus');
        redirect('admin/material/'.$_POST['idCourse']);
    }

    public function upload_files($idCourse, $files){
        $path = 'uploads/material/course_'.$idCourse;
        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $resources = array();
        $links     = array();
        foreach ($files['name'] as $item => $file) { // upload multiple files
            $_FILES['resources[]']['name']      = $files['name'][$item];
            $_FILES['resources[]']['type']      = $files['type'][$item];
            $_FILES['resources[]']['tmp_name']  = $files['tmp_name'][$item];
            $_FILES['resources[]']['error']     = $files['error'][$item];
            $_FILES['resources[]']['size']      = $files['size'][$item];

            $fileName = str_replace(" ", "", $file);

            $resources[] = $fileName;
            $links[]     = base_url($path."/".$fileName);

            $conf['upload_path']    = $path;
            $conf['allowed_types']  = "pdf|doc|docx|pptx|ppt";
            $conf['max_size']       = 2048;
            $conf['file_name']      = $fileName;
            $this->upload->initialize($conf);

            if ($this->upload->do_upload('resources[]')) {
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
            'link'  => ($links != null ? implode(';', $links) : null)
        ];
    }
}