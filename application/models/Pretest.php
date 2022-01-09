<?php

class Pretest extends CI_Model{
    public function getAll(){
        return $this->db->order_by('NAMA_PRETEST ASC')->get('pretest')->result();
    }
    public function getById($id){
        return $this->db->get_where('pretest', ['ID_PRETEST' => $id])->row();
    }
    public function get($param){
        if(!empty($param['orderBy'])){ // order by
            $this->db->order_by($param['orderBy']);
            unset($param['orderBy']);
        }
        if(!empty($param['limit'])){ // limit
            $this->db->limit($param['limit']);
            unset($param['limit']);
        }

        return $this->db->get_where('pretest', $param)->result();
    }
    public function insert($param){
        $this->db->insert('pretest', $param);
    }
    public function update($param){
        $this->db->where('ID_PRETEST', $param['ID_PRETEST'])->update('pretest', $param);
    }
    public function delete($param){
        $this->db->delete('pretest', $param);
    }
}