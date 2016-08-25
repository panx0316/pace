<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

	public function __construct(){
		parent::__construct();

	}



	public function getInfoUser($data = FALSE)
	{
		$user=TRIM($data['USER']);
		$pass=TRIM($data['PASS']);

		$this->db->trans_start();
		if(isset($user) && isset($pass) && $user!='' && $pass!=''){
			$sql="SELECT * FROM p_usuario where P_CORREO_USUARIO='{$user}' AND P_PASSWORD='{$pass}' ";

			$query = $this->db->query($sql);

			$row = $query->row_array();

			if (isset($row))
			{
				return $row;
			}
			else{
				return "FALSE";
			}
		}
		else{
				return "FALSE";
		}
	}


}
