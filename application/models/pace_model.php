<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pace_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	
	
	public function getUsuario($nombre = FALSE)
	{
	$sql="SELECT * FROM p_usuario where P_NOMBRE_USUARIO='{$nombre}' ";

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
	public function getProyectos()
	{
	$sql="select * from p_proyecto";

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
	public function getComponentes($proyecto=FALSE,$estrategia=FALSE)
	{
	
	echo $estrategia;
	if($proyecto!=FALSE && $estrategia!=FALSE ){
	$sql="select * from p_componente where P_ID_ESTRATEGIA='{$estrategia}' AND P_ID_PROYECTO='{$proyecto}' ";	
	}
	else{
	$sql="select * from p_componente";
	}	

	
	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	public function getAvanceComponentes($id_proyecto,$id_estrategia,$id_componente)
	{	
	$sql="select PORCENTAJE_COMPONENTE from V_PROMEDIO_COMPONENTE WHERE P_ID_PROYECTO='{$id_proyecto}' AND P_ID_ESTRATEGIA='{$id_estrategia}' AND P_ID_COMPONENTE='{$id_componente}'";
	$query = $this->db->query($sql);
	$porcentaje=($query->row()->PORCENTAJE_COMPONENTE);
	if($porcentaje==null){
		$porcentaje=0;
	}
	return $porcentaje;
	}
	
	public function getAvanceEstrategia($id_proyecto,$id_estrategia)
	{	
	$sql="select PORCENTAJE_ESTRATEGIA from V_PROMEDIO_ESTRATEGIA WHERE P_ID_PROYECTO='{$id_proyecto}' AND P_ID_ESTRATEGIA='{$id_estrategia}' ";
	$query = $this->db->query($sql);
	$porcentaje=($query->row()->PORCENTAJE_ESTRATEGIA);
	if($porcentaje==null){
		$porcentaje=0;
	}
	return $porcentaje;
	}
	
	public function getAvanceProyecto($id_proyecto)
	{	
	$sql="select PORCENTAJE_PROYECTO from V_PROMEDIO_PROYECTO WHERE P_ID_PROYECTO='{$id_proyecto}' ";
	$query = $this->db->query($sql);
	$porcentaje=($query->row()->PORCENTAJE_PROYECTO);
	if($porcentaje==null){
		$porcentaje=0;
	}
	return $porcentaje;
	}
	
	public function getActividades($id=FALSE)
	{
	if($id!=FALSE){
	$sql="select * from p_actividad where P_ID_ACTIVIDAD='{$id}' ";	
	}
	else{
	$sql="select * from p_actividad";	
	}

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
	public function getEstrategias($proyecto=FALSE)
	{
	

	if($proyecto!=FALSE){
	$sql="select * from p_estrategia where P_ID_PROYECTO='{$proyecto}' ";	
	}
	else{
	$sql="select * from p_estrategia";	
	}
	
	
	$query = $this->db->query($sql);
	
	return $query->result();
	}
	
	public function setCreateProyecto($data){
		if($data != FALSE)
		{
			$this->db->trans_start();
			
			$consulta = $this->db->query("select P_ID_USUARIO,P_NOMBRE_USUARIO from p_usuario WHERE P_RUT_RESPONSABLE='".$data['RUT_RESPONSABLE']."'");
		
				if($consulta->row()->P_ID_USUARIO != NULL)
				{
					$id_responsable = ($consulta->row()->P_ID_USUARIO);
					$nombre_responsable = ($consulta->row()->P_NOMBRE_USUARIO);
				}
				else
				{
					return FALSE;
				}
			
			
			
			
			$query = $this->db->query("select max(P_ID_PROYECTO) as MAX_ID from p_proyecto");
		
				if($query->row()->MAX_ID != NULL)
				{
					$id = ($query->row()->MAX_ID+1);
				}
				else
				{
					$id = 1;
				}
		
			$fecha_ini=FormatearFecha($data['FECHA_INI']);
			$fecha_ter=FormatearFecha($data['FECHA_TER']);
		
		
			$this->db->set('P_ID_PROYECTO', $id);
			$this->db->set('P_NOMBRE_PROYECTO', $data['TITULO']);
			$this->db->set('P_ID_USUARIO_RESPONSABLE', $id_responsable);
			$this->db->set('P_RUT_RESPONSABLE', $data['RUT_RESPONSABLE']);
			$this->db->set('P_NOMBRE_RESPONSABLE', $nombre_responsable);
			$this->db->set('P_FECHA_INICIO', $fecha_ini);
			$this->db->set('P_FECHA_TERMINO', $fecha_ter);
			$this->db->set('P_VALOR', $data['COSTO']);
			$this->db->set('P_PORC_AVANCE', '0');
			$this->db->set('P_DESCRIPCION', $data['DESCRIPCION']);
			
			$this->db->insert('p_proyecto');
			
			
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			
		}
	}
	
	public function getDetalleGasto()
	{
	$sql="select * from v_detalle_gastos";

	$query = $this->db->query($sql);
	
	return $query->result();
	}
	
	public function getAllTipoGasto()
	{
	$sql="select * from p_tipo_gasto";

	$query = $this->db->query($sql);
	
	return $query->result();
	}
	
	public function getAllItemTipoGasto()
	{
	$sql="select * from p_item_tipo_gasto";

	$query = $this->db->query($sql);
	
	return $query->result();
	}
	
	public function getNombreResponsable($rut)
	{
	$sql="select P_NOMBRE_USUARIO from p_usuario where P_RUT_RESPONSABLE='{$rut}'";

	$query = $this->db->query($sql);
	
	$nombre=($query->row()->P_NOMBRE_USUARIO);
	return $nombre;
	
	}
	
	public function setEditProyecto($data){
		if($data != FALSE)
		{
			$this->db->trans_start();
		$datos = array(
            'P_NOMBRE_ACTIVIDAD' => $data['NOMBRE_ACTIVIDAD'],
            'P_RESPONSABLE_ACTIVIDAD' => $data['RUT_RESPONSABLE'],
            'P_DESCRIPCION' => $data['DESCRIPCION'],
            'P_PORC_AVANCE' => $data['AVANCE']
        );
		$this->db->where('P_ID_ACTIVIDAD', $data['ID']);
		$this->db->update('p_actividad', $datos);
			
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			
		}
	}
	
	public function setCreateEstrategia($data){
		if($data != FALSE)
		{
			$this->db->trans_start();
			
			$consulta = $this->db->query("select P_ID_USUARIO,P_NOMBRE_USUARIO from p_usuario WHERE P_RUT_RESPONSABLE='".$data['RUT_RESPONSABLE']."'");
		
				if($consulta->row()->P_ID_USUARIO != NULL)
				{
					$id_responsable = ($consulta->row()->P_ID_USUARIO);
					$nombre_responsable = ($consulta->row()->P_NOMBRE_USUARIO);
				}
				else
				{
					return FALSE;
				}
			

			$query = $this->db->query("select max(P_ID_ESTRATEGIA) as MAX_ID from p_estrategia");
		
				if($query->row()->MAX_ID != NULL)
				{
					$id = ($query->row()->MAX_ID+1);
				}
				else
				{
					$id = 1;
				}

			$this->db->set('P_ID_ESTRATEGIA', $id);
			$this->db->set('P_NOMBRE_ESTRATEGIA', $data['NOMBRE_ESTRATEGIA']);
			$this->db->set('P_ABREVIACION_ESTRATEGIA', $data['ABREV_ESTRATEGIA']);
			$this->db->set('P_ID_PROYECTO', $data['ID_PROYECTO']);
			$this->db->set('P_ID_RESPONSABLE', $id_responsable);
		
			
			$this->db->insert('p_estrategia');
			
			
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			
		}
	}
	
	public function setCreateComponente($data){
		if($data != FALSE)
		{
			$this->db->trans_start();
			
			$consulta = $this->db->query("select P_ID_USUARIO,P_NOMBRE_USUARIO from p_usuario WHERE P_RUT_RESPONSABLE='".$data['RUT_RESPONSABLE']."'");
		
				if($consulta->row()->P_ID_USUARIO != NULL)
				{
					$id_responsable = ($consulta->row()->P_ID_USUARIO);
					$nombre_responsable = ($consulta->row()->P_NOMBRE_USUARIO);
				}
				else
				{
					return FALSE;
				}
			

			$query = $this->db->query("select max(P_ID_COMPONENTE) as MAX_ID from p_componente");
		
				if($query->row()->MAX_ID != NULL)
				{
					$id = ($query->row()->MAX_ID+1);
				}
				else
				{
					$id = 1;
				}

			$this->db->set('P_ID_COMPONENTE', $id);
			$this->db->set('P_ID_ESTRATEGIA', $data['ID_ESTRATEGIA']);
			$this->db->set('P_NOMBRE_COMPONENTE', $data['NOMBRE_COMPONENTE']);
			$this->db->set('P_ID_PROYECTO', $data['ID_PROYECTO']);
			$this->db->set('P_ID_RESPONSABLE', $id_responsable);
		
			
			$this->db->insert('p_componente');
			
			
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			
		}
	}
	
	public function setCreateActividad($data){
		if($data != FALSE)
		{
			$this->db->trans_start();
			
			$consulta = $this->db->query("select P_ID_USUARIO,P_NOMBRE_USUARIO,P_RUT_RESPONSABLE from p_usuario WHERE P_RUT_RESPONSABLE='".$data['RUT_RESPONSABLE']."'");
		
				if($consulta->row()->P_ID_USUARIO != NULL)
				{
					$id_responsable = ($consulta->row()->P_ID_USUARIO);
					$rut_responsable = ($consulta->row()->P_RUT_RESPONSABLE);
					$nombre_responsable = ($consulta->row()->P_NOMBRE_USUARIO);
				}
				else
				{
					return FALSE;
				}
			

			$query = $this->db->query("select max(P_ID_ACTIVIDAD) as MAX_ID from p_actividad");
		
				if($query->row()->MAX_ID != NULL)
				{
					$id = ($query->row()->MAX_ID+1);
				}
				else
				{
					$id = 1;
				}

				
			$fecha_ini=FormatearFecha($data['FECHA_INI']);
			$fecha_ter=FormatearFecha($data['FECHA_TER']);	
				
				
			$this->db->set('P_ID_PROYECTO', $data['ID_PROYECTO']);
			$this->db->set('P_ID_ESTRATEGIA', $data['ID_ESTRATEGIA']);
			$this->db->set('P_ID_COMPONENTE', $data['ID_COMPONENTE']);
			$this->db->set('P_ID_ACTIVIDAD', $id);
			$this->db->set('P_NOMBRE_ACTIVIDAD', $data['NOMBRE_ACTIVIDAD']);
			$this->db->set('P_RESPONSABLE_ACTIVIDAD', $data['RUT_RESPONSABLE']);
			$this->db->set('P_DESCRIPCION', $data['DESCRIPCION']);
			$this->db->set('P_FECHA_INICIO', $fecha_ini);
			$this->db->set('P_FECHA_TERMINO', $fecha_ter);
			
			$this->db->insert('p_actividad');
			
			
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			
		}
		else{
				return FALSE;
		}
	}
	
	
}


