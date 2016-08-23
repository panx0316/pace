<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	
		/*
	* FunciÛn constructora
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
		$data['componentes'] = $this->pace_model->getComponentes();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['estrategias'] = $this->pace_model->getEstrategias();
		
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
		$data['estrategias'] = $this->pace_model->getEstrategias();
		$this->load->view('modal/nuevo_hito', $data);
	}
	public function nuevaActividad(){
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['estrategias'] = $this->pace_model->getEstrategias();
		$data['componentes'] = $this->pace_model->getComponentes();
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
	
	
	public function editarActividad()
	{
		$id = $this->input->post("id_actividad");
		$data['actividades'] = $this->pace_model->getActividades($id);
		
		$this->load->view('modal/editar_actividad', $data);
		
	}
	
	public function editar_actividad_progress(){
		if($_POST)
		{
		
		$id_actividad = $this->input->post("id_actividad");
		$titulo = $this->input->post("titulo");
		$rut_responsable = $this->input->post("rut_responsable");
		$nombre_responsable = $this->input->post("nombre_responsable");
		
		$descripcion = $this->input->post("descripcion");
		$avance = $this->input->post("avance");
		// $fecha_inicio = $this->input->post("fecha_inicio");
		// $fecha_termino = $this->input->post("fecha_termino");
			
		$data=array(
			"ID"=>$id_actividad,
			"NOMBRE_ACTIVIDAD"=>$titulo,
			"RUT_RESPONSABLE"=>$rut_responsable,
			"NOMBRE_RESPONSABLE"=>$nombre_responsable,
			"DESCRIPCION"=>$descripcion,
			"AVANCE"=>$avance
		);
		
		$resultado = $this->pace_model->setEditProyecto($data);
		
		if($resultado!=FALSE){
		$mensaje='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Datos Guardados correctamente</strong></div>';	
		}
		else{
		$mensaje='<div class="alert alert-danger"><strong>Error al guardar los datos</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		echo $mensaje;
		}
		else{
		echo '<div class="alert alert-danger"><strong>NO HAY DATOS ENVIADOS</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		
	}
	
	public function nueva_area_progress(){
		if($_POST)
		{
				
		$proyecto = $this->input->post("proyecto");
		$titulo = $this->input->post("titulo");
		$abreviacion = $this->input->post("abreviacion");
		$rut_responsable = $this->input->post("rut_responsable");

			
		$data=array(
			"ID_PROYECTO"=>$proyecto,
			"NOMBRE_ESTRATEGIA"=>$titulo,
			"ABREV_ESTRATEGIA"=>$abreviacion,
			"RUT_RESPONSABLE"=>$rut_responsable
		);
		
		$resultado = $this->pace_model->setCreateArea($data);
		
		if($resultado!=FALSE){
		$mensaje='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Datos Guardados correctamente</strong></div>';	
		}
		else{
		$mensaje='<div class="alert alert-danger"><strong>Error al guardar los datos</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		echo $mensaje;
		}
		else{
		echo '<div class="alert alert-danger"><strong>NO HAY DATOS ENVIADOS</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		
	}
	
	
	public function getEstrategias(){
		$opcion = $this->input->post("opcion");
		$estrategias= $this->pace_model->getEstrategias($opcion);
		
			if($estrategias != FALSE)
			{
				$data = '<option value="">-- Seleccione √Årea --</option>';
				foreach($estrategias as $data_estrategias)
				{
						$data .= '<option value="'.$data_estrategias->P_ID_ESTRATEGIA.'">'.$data_estrategias->P_NOMBRE_ESTRATEGIA.' ('.$data_estrategias->P_ABREVIACION_ESTRATEGIA.') </option>';
				}
				echo $data;
			}
	}	
	
	public function getComponentes(){
		$proyecto = $this->input->post("proyecto");
		$estrategias_proyecto = $this->input->post("area");
		$componentes= $this->pace_model->getComponentes($proyecto, $estrategias_proyecto);
		
			if($componentes != FALSE)
			{
				$data = '<option value="">-- Seleccione Hito --</option>';
				foreach($componentes as $data_componentes)
				{
						$data .= '<option value="'.$data_componentes->P_ID_COMPONENTE.'">'.$data_componentes->P_NOMBRE_COMPONENTE.'</option>';
				}
				echo $data;
			}
	}
	
	public function nuevo_hito_progress(){
		if($_POST)
		{
				
		$proyecto = $this->input->post("proyecto");
		$area = $this->input->post("area");
		$titulo = $this->input->post("titulo");
		$rut_responsable = $this->input->post("rut_responsable");
		$descripcion = $this->input->post("descripcion");

			
		$data=array(
			"ID_PROYECTO"=>$proyecto,
			"ID_ESTRATEGIA"=>$area,
			"NOMBRE_COMPONENTE"=>$titulo,
			"RUT_RESPONSABLE"=>$rut_responsable,
			"DESCRIPCION"=>$descripcion
		);
		
		$resultado = $this->pace_model->setCreateHito($data);
		
		if($resultado!=FALSE){
		$mensaje='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Datos Guardados correctamente</strong></div>';	
		}
		else{
		$mensaje='<div class="alert alert-danger"><strong>Error al guardar los datos</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		echo $mensaje;
		}
		else{
		echo '<div class="alert alert-danger"><strong>NO HAY DATOS ENVIADOS</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		
	}
	
	public function nueva_actividad_progress(){
		if($_POST)
		{
				
		$proyecto = $this->input->post("proyecto");
		$area = $this->input->post("area");
		$hito = $this->input->post("hito");
		$titulo = $this->input->post("titulo");
		$costo = $this->input->post("costo");
		$descripcion = $this->input->post("descripcion");
		
		$rut_responsable = $this->input->post("rut_responsable");
		$nombre_responsable = $this->input->post("nombre_responsable");
		
		$fecha_inicio = $this->input->post("fecha_inicio");
		
		$fecha_termino = $this->input->post("fecha_termino");

			
		$data=array(
			"ID_PROYECTO"=>$proyecto,
			"ID_ESTRATEGIA"=>$area,
			"ID_COMPONENTE"=>$hito,
			"NOMBRE_ACTIVIDAD"=>$titulo,
			"RUT_RESPONSABLE"=>$rut_responsable,
			"FECHA_INI"=>$fecha_inicio,
			"FECHA_TER"=>$fecha_termino,
			"DESCRIPCION"=>$descripcion
		);
		
		$resultado = $this->pace_model->setCreateActividad($data);
		
		if($resultado!=FALSE){
		$mensaje='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Datos Guardados correctamente</strong></div>';	
		}
		else{
		$mensaje='<div class="alert alert-danger"><strong>Error al guardar los datos</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		echo $mensaje;
		}
		else{
		echo '<div class="alert alert-danger"><strong>NO HAY DATOS ENVIADOS</strong><button type="button" class="btn btn-default salir" data-dismiss="modal">Salir</button></div>';
		}
		
	}
	
	
	
	
	
}
