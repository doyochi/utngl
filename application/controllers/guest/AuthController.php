<?php

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title']  = 'login'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('auth/login', $data);
    }

    public function register()
    {
        $data['title']  = 'register'; // PLACEHOLDER VARIABLE DATA

        $this->template->index('auth/register', $data);
    }
}
