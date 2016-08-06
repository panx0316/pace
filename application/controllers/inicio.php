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
		
		
	}
	
	
	
	
	public function index()
	{
		$this->load->model('pace_model');
		$nombre='Francisco';
		$data['usuario'] = $this->pace_model->getUsuario($nombre);
		$this->template->load('template', 'about', $data);
		//$this->template->load('plantilla', 'controlador', dato);
	}
	
	
	public function tareas()
	{
		$this->load->model('pace_model');
		$nombre='Francisco';
		$data['usuario'] = $this->pace_model->getUsuario($nombre);
		$this->template->load('template', 'arbol', $data);
		//$this->template->load('plantilla', 'controlador', dato);
	}
	
	
}
