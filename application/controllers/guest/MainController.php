<?php

class MainController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
        $data['title']  = 'home'; // PLACEHOLDER VARIABLE DATA
        $email = $this->session->userdata('email');

        if($this->session->userdata('is_logged')){
            $data['is_logged'] = true;
            $data['accstatus'] = $this->User->got(['EMAIL_USER' => $email]);
        }else {
            $data['is_logged'] = false;
        }
        
        $this->template->index('general/home', $data);
    }

    public function course_list()
    {
        $data['title']  = 'course'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/courseList', $data);
    }
    
    public function course()
    {
        $data['title']  = 'course'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/course', $data);
    }
    public function event()
    {
        $data['title']  = 'event'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/event', $data);
    }
    public function eventList()
    {
        $data['title']  = 'eventList'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/eventList', $data);
    }
    public function about()
    {
        $data['title']  = 'About'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/about', $data);
    }
    public function pretest()
    {
        $data['title']  = 'pretest'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/pretest', $data);
    }
    public function pretestCourse()
    {
        $data['title']  = 'pretestCourse'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/pretestCourse', $data);
    }
    public function pretestSubmit()
    {
        $data['title']  = 'pretestSubmit'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('general/pretestSubmit', $data);
    }

    public function upgrade()
    {
        $data['title'] = 'Upgrade';

        $this->template->index('general/upgrade', $data);
    }

    public function upgradePayment()
    {
        $data['title'] = 'Payment';

        $this->template->index('general/upgradePayment', $data);
    }

    public function upgradePaymentSuccess()
    {
        $data['title'] = 'Payment Success';

        $this->template->index('general/upgradePaymentSuccess', $data);
    }
}
