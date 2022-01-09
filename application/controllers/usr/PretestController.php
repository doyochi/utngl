<?php

class PretestController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('PretestUser');
        $this->load->library('upload');
    }
    public function vPretest($id){
        $email = $this->session->userdata('email');
        $data['title']   = 'Pretest';
        $data['pretest'] = $this->Pretest->getById($id);

        if($this->session->userdata('is_logged')){
            $data['is_logged']      = true;
            $data['pretestUser']    = $this->PretestUser->get(['EMAIL_USER' => $email, 'ID_PRETEST' => $id]);
        }else{
            $data['is_logged']      = false;
        }
        
        $this->template->index('general/pretest', $data);
    }
    public function vDo($idPU){
        $data['title']  = 'Pretest'; // PLACEHOLDER VARIABLE DATA
        $data['pu']     = $this->PretestUser->getById($idPU);

        $this->template->index('general/pretestCourse', $data);
    }
    public function vSubmit($idPU){
        $data['title']  = 'Pretest'; // PLACEHOLDER VARIABLE DATA
        $data['pu']     = $this->PretestUser->getById($idPU);

        $this->template->index('general/pretestSubmit', $data);
    }
    public function start($id){
        $email = $this->session->userdata('email');
        $deadline = explode(';', $this->Pretest->getById($id)->DEADLINE_PRETEST);
        $add = '+'.$deadline[0].' days +'.$deadline[1].' hours +'.$deadline[2].' minutes';

        $deadlinePU = date('Y-m-d H:i:s', strtotime($add));
        $newIdPU = $this->PretestUser->insert(['EMAIL_USER' => $email, 'ID_PRETEST' => $id, 'DEADLINE_PU' => $deadlinePU]);

        redirect('pretest/do/'.$newIdPU);
    }
    public function collect(){
        $email  = $this->session->userdata('email');
        $upload = $this->upload_file($email,"file", $_POST['id'], $_POST['type']);
        if($upload['status'] == true){
            $formData['ID_PU']          = $_POST['id'];
            $formData['JAWABAN_PU']     = $upload['link'];
            $formData['STAT_PU']        = "2";
            $formData['submited_at']    = date('Y-m-d H:i:s');

            $this->PretestUser->update($formData);
            redirect('pretest/do/'.$_POST['id']);
        }else{
            $data['title']  = 'pretestCourse'; // PLACEHOLDER VARIABLE DATA
            $data['pu']     = $this->PretestUser->getById($_POST['id']);

            $this->session->set_flashdata('err_msg', $upload['msg']);
            $this->template->index('general/pretestSubmit', $data);
        }
    }
    public function upload_file($email, $file, $idPU, $typeFile){
        $email = str_replace("@", "__", $email);
        $path  = 'uploads/user/'.$email.'/pretest/'.$idPU;
        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $conf['upload_path']    = $path;
        $conf['allowed_types']  = $typeFile;
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
}