<?php

class EventController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Event');
    }
    public function vEventList(){
        $data['title'] = 'Event';
        $data['events'] = $this->Event->get(['ISPUBLISHED_EVENT' => '1', 'orderBy' => "TGL_EVENT ASC"]);

        $this->template->index('general/eventList', $data);
    }
    public function vEvent($id){
        $data['title']  = 'Event';
        $data['event']  = $this->Event->getById($id);
        $data['events'] = $this->Event->get(['ISPUBLISHED_EVENT' => '1', 'orderBy' => "TGL_EVENT ASC", 'limit' => '6']);

        $this->template->index('general/event', $data);
    }

} 