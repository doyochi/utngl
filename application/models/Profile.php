<?php

class Profile extends CI_Model{
    public function getAll(){
        return $this->db->get('user')->result();
    }
    
    // public function getById($id){
    //     return $this->db->get_where('user', ['EMAIL_USER' => $id])->row();
    // }
}