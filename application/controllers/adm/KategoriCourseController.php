<?php

class KategoriCourseController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_admin') != true){
            redirect('admin');
        }
        
        $this->load->model('KategoriCourse');
        $this->load->model('Course');
    }

    public function index(){
        $data['title']      = 'Kategori Course';
        $data['sidebar']    = 'kategori-course';
        $data['katcous']    = $this->KategoriCourse->getAll();

        $this->template->admin('adm/kategori-course/kategori-course', $data);
    }
    public function vAdd(){
        $data['title']      = 'Tambah Kategori Course';
        $data['sidebar']    = 'kategori-course';

        $this->template->admin('adm/kategori-course/kategori-course_add', $data);
    }
    public function vEdit($id){
        $data['title']      = 'Ubah Kategori Course';
        $data['sidebar']    = 'kategori-course';
        $data['kategori']   = $this->KategoriCourse->getById($id);

        $this->template->admin('adm/kategori-course/kategori-course_edit', $data);
    }
    public function store(){
        $formData['NAMA_KATCOU'] = $_POST['nama'];
        $this->KategoriCourse->insert($formData);

        $this->session->set_flashdata('succ_msg', 'Berhasil menambahkan kategori course baru!');
        redirect('admin/kategori-course');
    }
    public function update(){
        $formData['NAMA_KATCOU']    = $_POST['nama'];
        $formData['ID_KATCOU']      = $_POST['id'];
        $this->KategoriCourse->update($formData);

        $this->session->set_flashdata('succ_msg', 'Berhasil mengubah kategori course baru!');
        redirect('admin/kategori-course');
    }
    public function publish(){
        $this->KategoriCourse->update(['ID_KATCOU' => $_POST['id'], 'ISPUBLISHED_KATCOU' => $_POST['stat']]);
        $this->session->set_flashdata('succ_msg', 'Berhasil mengubah status publish!');
        redirect('admin/kategori-course');
    }
    public function destroy(){
        $this->KategoriCourse->delete(['ID_KATCOU' => $_POST['id']]);
        $this->session->set_flashdata('succ_msg', 'Kategori Course berhasil dihapus');
        redirect('admin/kategori-course');
    }
}