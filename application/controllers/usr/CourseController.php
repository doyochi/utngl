<?php

class CourseController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('KategoriCourse');
        $this->load->model('Course');
        $this->load->model('CourseUser');
        $this->load->model('Material');
        $this->load->model('MaterialUser');
        $this->load->model('User');

        if($this->session->userdata('is_logged')){  // cek if new course
            $email = $this->session->userdata('email');

            $idCourses = $this->Course->getListIdPublished()->ID_COURSES;
            $idCourses = explode(',', $idCourses);
            
            $idCUs = $this->CourseUser->getListId($email)->ID_COURSES;
            $idCUs = explode(',', $idCUs);

            $newCourseUser = array_diff($idCourses, $idCUs);
            foreach ($newCourseUser as $item) {
                $this->CourseUser->insert(['EMAIL_USER' => $email, 'ID_COURSE' => $item]);
            }
        }
    }

    public function vCourseList($idKat){
        $email = $this->session->userdata('email');

        $data['title']      = 'Course';
        $data['kategori']   = $this->KategoriCourse->getById($idKat);

        if($this->session->userdata('is_logged')){
            $data['is_logged'] = true;
            $data['courses']    = $this->CourseUser->get(['EMAIL_USER' => $email, 'ID_KATCOU' => $idKat]);
            $data['accstatus']  = $this->User->got(['EMAIL_USER' => $email]);
        }else{
            $data['is_logged'] = false;
            $data['courses']    = $this->Course->get(['ID_KATCOU' => $idKat]);
        }

        $this->template->index('general/courseList', $data);
    }
    public function vCourse($idCU){
        $courseUser     = $this->CourseUser->getById($idCU);
        $materialUsers  = $this->MaterialUser->get(['ID_CU' => $idCU]);
        if($materialUsers == null){
            $materials = $this->Material->get(['ID_COURSE' => $courseUser->ID_COURSE]);
            $firstMateri = true;
            foreach ($materials as $item) {
                if($firstMateri == true){
                    $this->MaterialUser->insert(['ID_CU' => $idCU, 'ID_MATERIAL' => $item->ID_MATERIAL, 'STAT_MU' => '1']);
                }else{
                    $this->MaterialUser->insert(['ID_CU' => $idCU, 'ID_MATERIAL' => $item->ID_MATERIAL]);
                }
                $firstMateri = false;
            }
            $materialUsers  = $this->MaterialUser->get(['ID_CU' => $idCU]);
            $this->CourseUser->update(['ID_CU' => $idCU, 'STAT_CU' => "1"]);
        }

        $data['title']      = 'Course';        
        $data['course']     = $courseUser;        
        $data['materials']  = $materialUsers;        
        $this->template->index('general/course', $data);
    }
    public function ajxGetMU(){
        $mu = $this->MaterialUser->getById($_POST['id']);
        echo json_encode($mu);
    }
    public function nextMateri(){
        $cu     = $this->CourseUser->getById($_POST['idcu']);
        $mus    = $this->MaterialUser->get(['ID_CU' => $_POST['idcu']]);

        $this->MaterialUser->update(['ID_MU' => $_POST['id'], 'STAT_MU' => "2"]);
        $this->MaterialUser->update(['ID_MU' => ($_POST['id']+1), 'STAT_MU' => "1"]);

        $newStepCU      = $cu->STEP_CU + 1;
        $newProgressCU  = ($newStepCU / count($mus)) * 100;
        $this->CourseUser->update(['ID_CU' => $_POST['idcu'], 'STEP_CU' => $newStepCU, 'PROGRESS_CU' => $newProgressCU]);

        redirect('course/'.$_POST['idcu']);
    }
    public function finishMateri(){
        $cu     = $this->CourseUser->getById($_POST['idcu']);
        $mus    = $this->MaterialUser->get(['ID_CU' => $_POST['idcu']]);

        $this->MaterialUser->update(['ID_MU' => $_POST['id'], 'STAT_MU' => "2"]);

        $newStepCU      = $cu->STEP_CU + 1;
        $newProgressCU  = ($newStepCU / count($mus)) * 100;
        $this->CourseUser->update(['ID_CU' => $_POST['idcu'], 'PROGRESS_CU' => $newProgressCU, 'STAT_CU' => '2']);

        redirect('course/'.$_POST['idcu']);
    }
}