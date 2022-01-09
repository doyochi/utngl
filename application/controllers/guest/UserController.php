<?php

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function profile()
    {
        $data['title']  = 'profile'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('user/profile', $data);
    }
}
