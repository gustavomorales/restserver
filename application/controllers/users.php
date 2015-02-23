<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	 function __construct(){
        parent::__construct();
        $this->load->library('bcrypt');//cargamos la librería
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('index.php/login');
        }
    }

    public function index(){

    	$this->load->view('agregarusuarios');
    }
    public function agregar(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario','Usuario','required|is_unique[usuarios.usuario]|min_length[4]');
        $this->form_validation->set_rules('pass','Pass','required|matches[repass]|min_length[4]');
        $this->form_validation->set_rules('repass','Repass','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('nombre','Nombre','required');
        $this->form_validation->set_message('required','El Campo %s es obligatorio');
        $this->form_validation->set_message('is_unique','El Campo %s debe ser unico');
        $this->form_validation->set_message('matches','Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length','El Campo %s debe tener minimo 4 caracteres');
        $this->form_validation->set_message('valid_email','El Campo %s deber ser un email');

        if($this->form_validation->run()!=false){

            $usuario=$_POST['usuario'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $nombre=$_POST['nombre'];
            $hash = $this->bcrypt->hash_password($pass);

            $data=array('usuario'=>$usuario,'pass'=>$hash,'email'=>$email,'nombre'=>$nombre);
            $this->load->model('usuarios');
            $id=$this->usuarios->agregar($data);
            $datos['getusuario']=$this->usuarios->mostrarultimo($id);
            $datos['mensaje']="Usuario Registrado";

            $this->load->view('agregarusuarios',$datos);

         }
         else
         {
            $data['mensaje']="Validacion Incorrecta";
            $this->load->view('agregarusuarios',$data);
         }
}
}