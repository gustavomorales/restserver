<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{

		$this->load->view('login');
	}

	public function loguear(){

		$this->load->helper("url");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario','Usuario','required|xss_clean');
		$this->form_validation->set_rules('pass','Pass','required|xss_clean');


		if($this->form_validation->run()!=false) {

			$usuario=$_POST['usuario'];
			$pass=$_POST['pass'];
			$this->load->model('usuarios');
			$user=$this->usuarios->login($usuario,$pass);
			$user2=$user->result();
			

			if($user2){
				$this->load->library('session');
				$userdata=array('usuario'=>$user2[0]->usuario,'email'=>$user2[0]->email,'nombre'=>$user2[0]->nombre,'validated'=>true);
				$this->session->set_userdata($userdata);
				
				$this->load->view('inicio');
			}
			else
			{	
				$datos["mensaje"]="Usuario o Contraseña Incorrectos";
				
				$this->load->view('login',$datos);
			}
		} else {

			$datos["mensaje"]="Validacion incorrecta";

			$this->load->view('login',$datos);
		}
	}

	    public function logout(){
        $this->session->sess_destroy();
        redirect('index.php/login');
    }
}
