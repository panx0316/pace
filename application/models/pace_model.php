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
	
	public function getProyectos($nombre = FALSE)
	{
	$sql="select * from p_proyecto";

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
	public function getHitos($nombre = FALSE)
	{
	$sql="select * from p_hitos";

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
	public function getActividades($nombre = FALSE)
	{
	$sql="select * from p_actividad";

	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
}


