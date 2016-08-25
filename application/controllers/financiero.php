<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financiero extends CI_Controller {


		/*
	* Función constructora
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

		$this->template->load('template', 'financieroscreen', $data);
		//$this->template->load('plantilla', 'controlador', dato);
		}
		else{
			redirect('login');
		}
	}

	public function display_financiero()
{
	if(($this->session->userdata('username')) ){
	$proyecto = $this->input->post("proyecto");
	$data['proyectos'] = $this->pace_model->getProyectos($proyecto);
	$data['componentes'] = $this->pace_model->getComponentes();
	$data['actividades'] = $this->pace_model->getActividades();
	$data['estrategias'] = $this->pace_model->getEstrategias();

	//aca va la linea donde llamamos al detalle de los gastos
	$data['gastos'] = $this->pace_model->getDetalleGasto();


	$data['tipo_gastos'] = $this->pace_model->getAllTipoGasto();
	$data['item_tipo_gastos'] = $this->pace_model->getAllItemTipoGasto();




	$this->load->view('financiero', $data);

	}
	else{
		redirect('login');
	}
}



}
