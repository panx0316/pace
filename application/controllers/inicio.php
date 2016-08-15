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
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['hitos'] = $this->pace_model->getHitos();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['areas'] = $this->pace_model->getAreas();
		
		$this->template->load('template', 'arbol', $data);
		//$this->template->load('plantilla', 'controlador', dato);
	}
	
	public function nuevoProyecto(){
		$this->load->view('modal/nuevo_proyecto');
	}
	public function nuevaArea(){
		$data['proyectos'] = $this->pace_model->getProyectos();
		$this->load->view('modal/nueva_area', $data);
	}
	public function nuevoHito(){
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['areas'] = $this->pace_model->getAreas();
		$this->load->view('modal/nuevo_hito', $data);
	}
	public function nuevaActividad(){
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['areas'] = $this->pace_model->getAreas();
		$data['hitos'] = $this->pace_model->getHitos();
		$this->load->view('modal/nueva_actividad', $data);
	}
	
	public function nuevo_proyecto_progress(){
		if($_POST)
		{
		
		$titulo = $this->input->post("titulo");
		$rut_responsable = $this->input->post("rut_responsable");
		$nombre_responsable = $this->input->post("nombre_responsable");
		$costo = $this->input->post("costo");
		$descripcion = $this->input->post("descripcion");
		$fecha_inicio = $this->input->post("fecha_inicio");
		$fecha_termino = $this->input->post("fecha_termino");
			
		$data=array(
			"TITULO"=>$titulo,
			"RUT_RESPONSABLE"=>$rut_responsable,
			"NOMBRE_RESPONSABLE"=>$nombre_responsable,
			"COSTO"=>$costo,
			"DESCRIPCION"=>$descripcion,
			"FECHA_INI"=>$fecha_inicio,
			"FECHA_TER"=>$fecha_termino
		);
		
		$resultado = $this->pace_model->setCreateProyecto($data);
		
		
		if($resultado!=FALSE){
		$mensaje='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Proyecto registrado correctamente</strong></div>';	
		}
		else{
		$mensaje='<div class="alert alert-danger"><strong>Error al registrar proyecto</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		echo $mensaje;
		}
		else{
		echo '<div class="alert alert-danger"><strong>NO HAY DATOS ENVIADOS</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		
	}
	
	
	
}
