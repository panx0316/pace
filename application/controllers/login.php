<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
    }

    public function index(){
      $this->template->load('template', 'loginscreen');
    }

    public function startSession(){
      $email = $this->input->post("email");
      $password = $this->input->post("password");

      $data=array(
        "USER"=>$email,
        "PASS"=>$password
      );

      $respuesta = $this->login_model->getInfoUser($data);


      if($respuesta!='FALSE'){

        $session_data = array(
        'username' => $respuesta['P_CORREO_USUARIO']
        );
        // Add user data in session
        $this->session->set_userdata($session_data);


        echo "success";
      }
      else{
        echo "fail";
      }

    }
}
?>
