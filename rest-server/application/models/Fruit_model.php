<?php

class Fruit_model extends CI_Model {

    public function getFruits($id = null)
    {
        if ($id === null) {
            return $this->db->get('fruits')->result_array();
        } else {
            return $this->db->get_where('fruits', ['id' => $id])->result_array();
        }
    }

}