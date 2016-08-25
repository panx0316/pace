<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultado extends CI_Controller {


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

    $this->template->load('template', 'resultado', $data);
    
    }
    else{
      redirect('login');
    }
  }


}
