<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {


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
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['componentes'] = $this->pace_model->getComponentes();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['estrategias'] = $this->pace_model->getEstrategias();
		$data['resultados'] = $this->pace_model->getResultados();

		

		$this->template->load('template', 'arbolscreen', $data);
		}
		else{
			redirect('login');
		}
		//$this->template->load('plantilla', 'controlador', dato);
	}


	public function display_arbol()
	{
		if(($this->session->userdata('username')) ){
		$proyecto = $this->input->post("proyecto");
		$data['proyectos'] = $this->pace_model->getProyectos2($proyecto);
		$data['componentes'] = $this->pace_model->getComponentes();
		$data['actividades'] = $this->pace_model->getActividades();
		$data['estrategias'] = $this->pace_model->getEstrategias();
		$data['resultados'] = $this->pace_model->getResultados();

		$data['username'] = $this->session->userdata('username');

		$this->load->view('arbol',$data);
		}
		else{
			redirect('login');
		}
		//$this->template->load('plantilla', 'controlador', dato);
	}



	public function nuevoProyecto(){
		$this->load->view('modal/nuevo_proyecto');
	}
	public function nuevaEstrategia(){
		$data['proyectos'] = $this->pace_model->getProyectos();
		$this->load->view('modal/nueva_estrategia', $data);
	}
	public function nuevoComponente(){
		$data['proyectos'] = $this->pace_model->getProyectos();
		$data['estrategias'] = $this->pace_model->getEstrategias();
		$this->load->view('modal/nuevo_componente', $data);
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
	public function editarFechas()
	{
		$id = $this->input->post("id_actividad");
		$data['actividades'] = $this->pace_model->getActividades($id);


		$this->load->view('modal/editar_fechas', $data);

	}

	public function editar_actividad_progress(){
		if($_POST)
		{

		$id_actividad = $this->input->post("id_actividad");
		$titulo = $this->input->post("titulo");
		$rut_responsable = $this->input->post("rut_responsable");
		$nombre_responsable = $this->input->post("nombre_responsable");

		$descripcion = $this->input->post("descripcion");
		$sem_ejecutadas = $this->input->post("sem_ejecutadas");
		// $fecha_inicio = $this->input->post("fecha_inicio");
		// $fecha_termino = $this->input->post("fecha_termino");

		$data=array(
			"ID"=>$id_actividad,
			"NOMBRE_ACTIVIDAD"=>$titulo,
			"RUT_RESPONSABLE"=>$rut_responsable,
			"NOMBRE_RESPONSABLE"=>$nombre_responsable,
			"DESCRIPCION"=>$descripcion,
			"SEM_EJECUTADAS"=>$sem_ejecutadas
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

	public function edit_fecha_progress()
	{
		if($_POST)
		{
		$id_actividad = $this->input->post("id_actividad");
		$fecha_inicio = $this->input->post("fecha_inicio");
		$fecha_termino = $this->input->post("fecha_termino");

		$data=array(
			"ID_ACTIVIDAD"=>$id_actividad,
			"FECHA_INI"=>$fecha_inicio,
			"FECHA_TER"=>$fecha_termino
		);
		$resultado = $this->pace_model->setEditFechas($data);

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




	public function nueva_estrategia_progress(){
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

		$resultado = $this->pace_model->setCreateEstrategia($data);

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
				$data = '<option value="">-- Seleccione una Estrategia --</option>';
				foreach($estrategias as $data_estrategias)
				{
						$data .= '<option value="'.$data_estrategias->P_ID_ESTRATEGIA.'">'.$data_estrategias->P_NOMBRE_ESTRATEGIA.' ('.$data_estrategias->P_ABREVIACION_ESTRATEGIA.') </option>';
				}
				echo $data;
			}
	}

	public function getComponentes(){
		$proyecto = $this->input->post("proyecto");
		$estrategias_proyecto = $this->input->post("estrategia");
		$componentes= $this->pace_model->getComponentes($proyecto, $estrategias_proyecto);

			if($componentes != FALSE)
			{
				$data = '<option value="">-- Seleccione un Componente --</option>';
				foreach($componentes as $data_componentes)
				{
						$data .= '<option value="'.$data_componentes->P_ID_COMPONENTE.'">'.$data_componentes->P_NOMBRE_COMPONENTE.'</option>';
				}
				echo $data;
			}
	}

	public function nuevo_componente_progress(){
		if($_POST)
		{

		$proyecto = $this->input->post("proyecto");
		$estrategia = $this->input->post("estrategia");
		$titulo = $this->input->post("titulo");
		$rut_responsable = $this->input->post("rut_responsable");
		$descripcion = $this->input->post("descripcion");


		$data=array(
			"ID_PROYECTO"=>$proyecto,
			"ID_ESTRATEGIA"=>$estrategia,
			"NOMBRE_COMPONENTE"=>$titulo,
			"RUT_RESPONSABLE"=>$rut_responsable,
			"DESCRIPCION"=>$descripcion
		);

		$resultado = $this->pace_model->setCreateComponente($data);

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
		$estrategia = $this->input->post("estrategia");
		$componente = $this->input->post("componente");
		$titulo = $this->input->post("titulo");
		$costo = $this->input->post("costo");
		$descripcion = $this->input->post("descripcion");

		$rut_responsable = $this->input->post("rut_responsable");
		$nombre_responsable = $this->input->post("nombre_responsable");

		$fecha_inicio = $this->input->post("fecha_inicio");

		$fecha_termino = $this->input->post("fecha_termino");


		$data=array(
			"ID_PROYECTO"=>$proyecto,
			"ID_ESTRATEGIA"=>$estrategia,
			"ID_COMPONENTE"=>$componente,
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
