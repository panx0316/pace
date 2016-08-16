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
	
	public function getHitos()
	{
	$sql="select * from p_hitos";

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	public function getAvanceHitos($id_proyecto,$id_area,$id_hito)
	{	
	$sql="select PORCENTAJE_HITO from V_PROMEDIO_HITO WHERE P_ID_PROYECTO='{$id_proyecto}' AND P_ID_AREA='{$id_area}' AND P_ID_HITO='{$id_hito}'";
	$query = $this->db->query($sql);
	$porcentaje=($query->row()->PORCENTAJE_HITO);
	return $porcentaje;
	}
	
	public function getAvanceArea($id_proyecto,$id_area)
	{	
	$sql="select PORCENTAJE_AREA from V_PROMEDIO_AREA WHERE P_ID_PROYECTO='{$id_proyecto}' AND P_ID_AREA='{$id_area}' ";
	$query = $this->db->query($sql);
	$porcentaje=($query->row()->PORCENTAJE_AREA);
	return $porcentaje;
	}
	
	public function getAvanceProyecto($id_proyecto)
	{	
	$sql="select PORCENTAJE_PROYECTO from V_PROMEDIO_PROYECTO WHERE P_ID_PROYECTO='{$id_proyecto}' ";
	$query = $this->db->query($sql);
	$porcentaje=($query->row()->PORCENTAJE_PROYECTO);
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
	
	public function getAreas()
	{
	$sql="select * from p_area";

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
	
	
}


