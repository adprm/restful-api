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

}