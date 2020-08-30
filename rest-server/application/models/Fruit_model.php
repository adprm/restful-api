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

    public function deleteFruits($id)
    {
        $this->db->delete('fruits', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function addFruit($data)
    {
        $this->db->insert('fruits', $data);
        return $this->db->affected_rows();
    }

    public function updateFruits($data, $id)
    {
        $this->db->update('fruits', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

}