<?php 

class CourseController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_admin') != true){
            redirect('admin');
        }

        $this->load->library('upload');
        $this->load->model('Course');
        $this->load->model('CourseUser');
        $this->load->model('Material');
        $this->load->model('KategoriCourse');
    }

    public function index(){
        $data['title']      = 'Course';
        $data['sidebar']    = 'course';
        $data['courses']    = $this->Course->getAll();

        $this->template->admin('adm/course/course', $data);
    }

    public function vAdd(){
        $data['title']      = 'Tambah Course';
        $data['sidebar']    = 'course';
        $data['kategoris']   = $this->KategoriCourse->getAll();

        $this->template->admin('adm/course/course_add', $data);
    }

    public function vEdit($id){
        $data['title']      = "Ubah Course";
        $data['sidebar']    = 'course';
        $data['course']     = $this->Course->getById($id);
        $data['kategoris']  = $this->KategoriCourse->getAll();

        $this->template->admin('adm/course/course_edit', $data);
    }

    public function store(){
        $upload = $this->upload_image();
        if($upload['status'] == true){ // cek if upload success
            $formData['NAMA_COURSE']        = $_POST['nama'];
            $formData['ID_KATCOU']          = $_POST['kat'];
            $formData['DESKRIPSI_COURSE']   = $_POST['deskripsi'];
            $formData['PENGUMUMAN_COURSE']  = $_POST['pengumuman'];
            $formData['IMG_COURSE']         = $upload['link'];
            $this->Course->insert($formData);
            
            $this->session->set_flashdata('succ_msg', 'Berhasil menambahkan course baru!');
            redirect('admin/course');
        }else{
            $data['title']      = 'Tambah Course';
            $data['sidebar']    = 'course';
            $data['kategoris']  = $this->KategoriCourse->getAll();
            $data['dataTemp']   = $_POST;

            $this->session->set_flashdata('err_msg', $upload['msg']);
            $this->template->admin('adm/course/course_add', $data);
        }
    }

    public function update(){
        $formData['ID_COURSE']          = $_POST['idCourse'];
        $formData['NAMA_COURSE']        = $_POST['nama'];
        $formData['DESKRIPSI_COURSE']   = $_POST['deskripsi'];
        $formData['PENGUMUMAN_COURSE']  = $_POST['pengumuman'];
        $formData['ID_KATCOU']          = $_POST['kat'];

        if(!empty($_FILES['poster']['name'])){ // cek if edit img / poster
            $upload = $this->upload_image();
            if($upload['status'] == true){ // cek if upload success
                $formData['IMG_COURSE'] = $upload['link'];
                $this->Course->update($formData);
                
                $this->session->set_flashdata('succ_msg', 'Berhasil mengubah course!');
                redirect('admin/course');
            }else{
                $data['title']      = 'Ubah Course';
                $data['sidebar']    = 'course';
                $data['kategoris']  = $this->KategoriCourse->getAll();
                $data['dataTemp']   = $_POST;

                $this->session->set_flashdata('err_msg', $upload['msg']);
                $this->template->admin('adm/course/course_edit', $data);
            }
        }else{
            $this->Course->update($formData);
            $this->session->set_flashdata('succ_msg', 'Berhasil mengubah course!');
            redirect('admin/course');
        }
    }

    public function destroy(){
        $courseUsers = $this->CourseUser->get(['ID_COURSE' => $_POST['idCourse']]);
        if($courseUsers != null){// check if course user exist
            $this->session->set_flashdata('err_msg', 'Opps, terdapat transaksi user terhadap course!');
            redirect('admin/course');
        }

        $this->Material->delete(['ID_COURSE' => $_POST['idCourse']]);
        $this->Course->delete(['ID_COURSE' => $_POST['idCourse']]);
        $this->session->set_flashdata('succ_msg', 'Course berhasil dihapus');
        redirect('admin/course');
    }

    public function publish(){
        $statMateri = $this->Course->getById($_POST['idCourse'])->ISMATREADY_COURSE;
        if($statMateri == "0"){ // check if materi not ready
            $this->session->set_flashdata('err_msg', 'Materi course belum tervalidasi!');
            redirect('admin/course');
        }

        $this->Course->update(['ID_COURSE' => $_POST['idCourse'], 'ISPUBLISHED_COURSE' => $_POST['stat']]);
        $this->session->set_flashdata('succ_msg', 'Berhasil mengubah status publish!');
        redirect('admin/course');
    }

    public function upload_image(){
        $conf['upload_path']    = "./uploads/course/";
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
                    'link'  => base_url('uploads/course/'.$img['file_name'])
                ];
        }else{
            return [
                'status'=> false,
                'msg'   => $this->upload->display_errors(),
            ];
        }
    }



}