<?php

use GuzzleHttp\Client;

class Fruit_model extends CI_Model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/restful-api-crud/rest-server/api/',
            'auth' => ['adit', '050801']
        ]);
    }

    public function getAll() {
        // return $this->db->get('fruits')->result();
        $response = $this->_client->request('GET', 'fruits', [
            'query' => [
                'apikey' => '050801'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
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

    public function update() {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->name = $post['name'];
        $this->price = $post['price'];
        $this->image = $this->_uploadImage();

        if (!empty($_FILES['image']['name'])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post['old_image'];
        }

        return $this->db->update('fruits', $this, array('id' => $post['id']));
    }

    public function delete($id) {
        $this->_deleteImage($id);
        return $this->db->delete('fruits', array('id' => $id));
    }

    private function _uploadImage() {
        $config['upload_path']      = './assets/img/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['file_name']        = $this->id;
        $config['overwrite']        = true;
        $config['max_size']         = '10000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    private function _deleteImage($id) {
        $fruit = $this->getById($id);

        if ($fruit->image != "default.jpg") {
            $file_name = explode(".", $fruit->image)[0];
            return array_map('unlink', glob(FCPATH. "assets/img/$file_name.*"));
        }
    }

}