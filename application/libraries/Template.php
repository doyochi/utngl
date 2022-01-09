<?php

class Template {
    protected $_ci;

    function __construct(){
        $this->_ci = &get_instance();
    }
    public function admin($content, $data){
        $this->_ci->load->view('adm/template/header', $data); // Header
        $this->_ci->load->view('adm/template/sidebar', $data); // Sidebar
        $this->_ci->load->view('adm/template/topbar', $data); // Topbar
        $this->_ci->load->view($content, $data); // Content
        $this->_ci->load->view('adm/template/footer', $data); // Footer
    }
    public function index($content, $data) {
        $this->_ci->load->view('_components/Header', $data); // Header
        $this->_ci->load->view('_components/nav_header', $data); // Header
        $this->_ci->load->view($content, $data); // Header
        $this->_ci->load->view('_components/nav_footer', $data); // Header
        $this->_ci->load->view('_components/Footer', $data); // Header
    }
}