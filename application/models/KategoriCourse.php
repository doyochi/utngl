<?php

class KategoriCourse extends CI_Model{
    public function getAll(){
        return $this->db->order_by('NAMA_KATCOU ASC')->get('kategori_course')->result();
    }
    public function getById($id){
        return $this->db->get_where('kategori_course', ['ID_KATCOU' => $id])->row();
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

        return $this->db->get_where('kategori_course', $param)->result();
    }
    public function insert($param){
        $this->db->insert('kategori_course', $param);
    }
    public function update($param){
        $this->db->where('ID_KATCOU', $param['ID_KATCOU'])->update('kategori_course', $param);
    }
    public function delete($param){
        $this->db->delete('kategori_course', $param);
    }
}