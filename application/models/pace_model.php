<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pace_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	
	
	public function getUsuario()
	{
	$sql="SELECT * FROM p_usuario";
	$query = $this->db->query($sql);
	
	return $query->result();
	
	}
	
}


