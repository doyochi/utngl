<?php

class PretestUser extends CI_Model{
    public function getAll(){
        return $this->db->get('v_pretest_user')->result();
    }
    public function getById($id){
        return $this->db->get_where('v_pretest_user', ['ID_PU' => $id])->row();
    }
    public function get($param){
        return $this->db->get_where('v_pretest_user', $param)->result();
    }
    public function getListId($email){
        return $this->db->select('GROUP_CONCAT(ID_PRETEST) AS ID_PRETESTS')->get_where('pretest_user', ['EMAIL_USER' => $email])->row();
    }
    public function insert($param){
        $this->db->insert('pretest_user', $param);
        return $this->db->insert_id();
    }
    public function update($param){
        $this->db->where('ID_PU', $param['ID_PU'])->update('pretest_user', $param);
    }
    public function delete($param){
        $this->db->delete('pretest_user', ['ID_PU' => $param]);
    }
}