<?php

class Fruit_model extends CI_Model {

    public function getAll() {
        return $this->db->get('fruits')->result();
    }

    public function getById($id) {
        return $this->db->get_where('fruits', ['id' => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->name = $post['name'];
        $this->price = $post['price'];
        $this->image = $this->_uploadImage();

        return $this->db->insert('fruits', $this);
        
    }

    private function _uploadImage() {
        
    }

}