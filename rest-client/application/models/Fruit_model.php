<?php

class Fruit_model extends CI_Model {

    public function getAll() {
        return $this->db->get('fruits')->result();
    }

    public function getById($id) {
        return $this->db->get_where('fruits', ['id' => $id])->row();
    }

}