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

}