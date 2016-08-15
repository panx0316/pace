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
	}
	
		public function index()
	{
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['hitos'] = $this->pace_model->getHitos();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['areas'] = $this->pace_model->getAreas();
		
		$this->template->load('template', 'lista', $data);
		//$this->template->load('plantilla', 'controlador', dato);
	}

}