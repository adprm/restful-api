<?php

class Fruit_model extends CI_Model {

    public function getFruits($id = null)
    {
        if ($id === null) {
            return $this->db->get('fruits')->result();
        } else {
            return $this->db->get_where('fruits', ['id' => $id])->row();
        }
    }

    public function deleteFruits($id)
    {
        $this->db->delete('fruits', array('id' => $id));
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