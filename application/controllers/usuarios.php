<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	 function __construct(){
        parent::__construct();
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
        $this->form_validation->set_rules('usuario','Usuario','required|is_unique[usuarios.usuario]');
        $this->form_validation->set_rules('pass','Pass','required|matches[repass]');
        $this->form_validation->set_rules('repass','Repass','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('pass','Pass','required|matches[repass]');

        if($this->form_validation->run()!=false){

            $usuario=$_POST['usuario'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $nombre=$_POST['nombre'];

            $data=array('usuario'=>$usuario,'pass'=>$pass,'email'=>$email,'nombre'=>$nombre);

            $this->load->model('usuarios');
            $id=$this->usuarios->agregar($data);
            $data['getusuario']=$this->usuarios->mostrarultimo($id);
            $this->load->view('agregarusuarios',$data);

         }
         else
         {
            $data['mensaje']="validacion incorrecta";
            $this->load->view('agregarusuarios',$data);
         }
}
}