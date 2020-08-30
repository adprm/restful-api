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

    public function edit($id = null)
    {
        $data['title'] = 'Edit Data';
        $fruit = $this->Fruit_model;
        $data['fruit'] = $fruit->getById($id);

        if (!isset($id)) redirect('fruits');

        $data['fruit'] = $fruit->getById($id);
        if (!$data['fruit']) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('fruit/edit_data', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to edit!</div>');
        } else {
            $fruit->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data edited successfully!</div>');
            redirect('fruits');
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $fruit = $this->Fruit_model;

        if ($fruit->delete($id)) {
            redirect('fruits');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Info Data Detail';
        $data['fruit'] = $this->Fruit_model->getById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('fruit/detail', $data);
        $this->load->view('templates/footer');
    }
    
}
