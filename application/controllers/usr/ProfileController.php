<?php

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title']      = 'profile'; // PLACEHOLDER VARIABLE DATA

        $data['users']      = $this->Profile->getAll();

        $this->template->index('user/profile', $data);
    }

    
}
