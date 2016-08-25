<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {


		/*
	* Funci�n constructora
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pace_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

		public function index()
	{
		if(($this->session->userdata('username')) ){
		$data['username'] = $this->session->userdata('username');
		$data['proyectos'] = $this->pace_model->getProyectos();

		$this->template->load('template', 'listascreen', $data);
		//$this->template->load('plantilla', 'controlador', dato);
		}
		else{
			redirect('login');
		}
	}

	public function display_lista(){

		$proyecto = $this->input->post("proyecto");

		$data['proyectos'] = $this->pace_model->getProyectosLista($proyecto);
		$data['componentes'] = $this->pace_model->getComponentes();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['estrategias'] = $this->pace_model->getEstrategias();

		$this->load->view('lista', $data);
	}

}
