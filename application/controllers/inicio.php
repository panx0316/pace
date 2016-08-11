<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	
		/*
	* Función constructora
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
		
		$nombre='Francisco';
		$data['usuario'] = $this->pace_model->getUsuario($nombre);
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['hitos'] = $this->pace_model->getHitos();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['areas'] = $this->pace_model->getAreas();
		
		$this->template->load('template', 'arbol', $data);
		//$this->template->load('plantilla', 'controlador', dato);
	}
	
	public function nuevoProyecto(){
		$this->load->view('nuevo_proyecto');
	}
	
	
	
	
	
}
