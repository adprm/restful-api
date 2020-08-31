<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Fruits extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fruit_model');

        // limit apikey
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
    }

    // request method get all and by id
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $fruits = $this->Fruit_model->getFruits();
        } else {
            $fruits = $this->Fruit_model->getFruits($id);

        }
        
        if ($fruits) {
            $this->response([
                'status' => true,
                'data' => $fruits
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // request method delete
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'data' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->Fruit_model->deleteFruits($id) > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted the resource!'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                // id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    // request method post
    public function index_post()
    {
        $data = [
            'id' => $this->post('id'),
            'name' => $this->post('name'),
            'price' => $this->post('price'),
            'image' => $this->post('image')
        ];

        if ($this->Fruit_model->addFruit($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new data has been added!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to add data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // request method put
    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'id' => $this->put('id'),
            'name' => $this->put('name'),
            'price' => $this->put('price'),
            'image' => $this->put('image')
        ];

        if ($this->Fruit_model->updateFruits($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data has been updated!'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}