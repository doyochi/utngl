<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('User');
		$data['title']  = 'Home'; // PLACEHOLDER VARIABLE DATA
		$email = $this->session->userdata('email');
		
		if($this->session->userdata('is_logged')){
			$data['is_logged'] = true;
			$data['accstatus'] = $this->User->got(['EMAIL_USER' => $email]);
        }else {
            $data['is_logged'] = false;
		}
		
		$this->template->index('general/home', $data);
	}
}
