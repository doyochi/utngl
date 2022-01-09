<?php

class UpgradeUser extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('bayar', $data);
        return TRUE;
    }

    public function getAll(){
        return $this->db->get('bayar')->result();
    }
}