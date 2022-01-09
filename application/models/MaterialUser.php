<?php

class MaterialUser extends CI_Model{
    public function getAll(){
        return $this->db->get('v_material_user')->result();
    }
    public function getById($id){
        return $this->db->get_where('v_material_user', ['ID_MU' => $id])->row();
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

        return $this->db->get_where('v_material_user', $param)->result();
    }
    public function insert($param){
        $this->db->insert('material_user', $param);
    }
    public function update($param){
        $this->db->where('ID_MU', $param['ID_MU'])->update('material_user', $param);
    }
    public function delete($param){
        $this->db->delete('material_user', $param);
    }
}