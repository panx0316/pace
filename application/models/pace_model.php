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
	
	public function getActividades()
	{
	$sql="select * from p_actividad";

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
	
}


