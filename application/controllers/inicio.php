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
		$data['usuario'] = $this->pace_model->getUsuario();
		print_r($data);
		$this->load->view('welcome_message');
	}
	
}
