<?php

class Fruit_model extends CI_Model {

    public function getAll() {
        return $this->db->get('fruits')->result();
    }

}