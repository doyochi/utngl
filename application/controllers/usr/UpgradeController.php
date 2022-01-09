<?php

class UpgradeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UpgradeUser');
        $this->load->library('upload');
    }


    public function store(){
        $upload = $this->upload_image();
        if($upload['status'] == true){ // cek if upload success
            $email = $this->session->userdata('email');
            $formData['EMAIL_USER']     = $email;
            $formData['BUKTI_BAYAR']    = $upload['link'];
            $this->UpgradeUser->insert($formData);
            
            $this->session->set_flashdata('succ_msg', 'Berhasil menambahkan event baru!');
            redirect('upgrade/sukses');
        }else{
            echo $this->upload->display_errors();
            // $data['title']      = 'Tambah Event';
            // $data['sidebar']    = 'event';
            // $data['dataTemp']   = $_POST;

            // $this->session->set_flashdata('err_msg', $upload['msg']);
            // $this->template->admin('adm/event/event_add', $data);
        }
    }

    public function upload_image(){
        $conf['upload_path']    = "./uploads/payment/";
        $conf['allowed_types']  = "jpg|png|jpeg|bmp";
        $conf['max_size']       = 2048;
        $conf['file_name']      = $_FILES['bukti']['name'];
        $conf['encrypt_name']   = TRUE;

        $this->upload->initialize($conf);
        if($this->upload->do_upload('bukti')){
            $img = $this->upload->data();
            return [
                    'status'=> true,
                    'msg'   => 'Data berhasil terupload',
                    'link'  => base_url('uploads/payment/'.$img['file_name'])
                ];
        }else{
            return [
                'status'=> false,
                'msg'   => $this->upload->display_errors(),
            ];
        }
    }

    public function tampilandata() {
    // public function upload_bukti()
    // {
    //     $config['upload_path']          = '././uploads/payment/';
    //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //     $config['max_size']             = '2048';
    //     $config['max_width']            = '4480';
    //     $config['max_height']           = '4480';
    //     $config['file_name']            = $_FILES['bukti']['name'];
    //     // var_dump($_FILES['bukti']['name']);
    //     // die;

    //     $this->upload->initialize($config);

    //     if (!empty($_FILES['bukti']['name'])) {
    //         if ($this->upload->do_upload('bukti')) {
    //             // die(" upload");
    //             $bukti = $this->upload->data();
    //             $email = $this->session->userdata('email');
    //             $data  = array(
    //                             'EMAIL_USER'    => $email,
    //                             'BUKTI_BAYAR'   => $bukti['file_name']
    //             );
    //             $this->UpgradeUser->insert($data);
                
    //             redirect('upgrade/sukses');
    //         } else {
    //             echo $this->upload->display_errors();
    //             // die("gagal upload");
    //         }
    //     } else {
    //         echo "tidak mashok";
    //     }
    // }
    }
    public function tampildata()
    {
        $data['title']      = "Payment";
        $data['sidebar']    = 'payment';
        $data['users']      = $this->UpgradeUser->getAll();

        $this->template->admin('adm/payment/paymentv', $data);
    }

}
