<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fruits extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Fruit_model');
    }

	public function index()
	{
        $data['title'] = 'List Fruits';
        $data['fruits'] = $this->Fruit_model->getAll();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('fruit/index', $data);
		$this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Add Data';
        $fruit = $this->Fruit_model;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('fruit/add_data', $data);
            $this->load->view('templates/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to added!</div>');
        } else {
            $fruit->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data added!</div>');
            redirect('fruits');
        }
    }
    
}
