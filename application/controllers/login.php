    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   
        
        $this->load->view('login2');
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
            if(!$user){
                $datos["mensaje"]="Usuario o Contraseña Incorrectos";
                
                $this->load->view('login2',$datos);

            }
            else{
            $user2=$user->result();

                if($user2){

                    $this->load->library('session');

                    
                    $userdata1=array('usuario'=>$user2[0]->usuario,'email'=>$user2[0]->email,'nombre'=>$user2[0]->nombre,'validated'=>true,'tiempo'=>time());
                    $this->session->set_userdata($userdata1);
                    
                    
                    if($this->session->userdata('urlactual')){
                        $t=$this->session->userdata('urlactual');
                        $r=str_replace('restserver/index.php', '', $t);
                        redirect($r);
                    }
                    $this->load->view('inicio');
                }

            }


        } else {

            $datos["mensaje"]="Validacion incorrecta";

            $this->load->view('login2',$datos);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    public function inactivo(){
        $inac=60;

        if(!$this->session->userdata('tiempo'))
        {
            $vidasession=time()-$this->session->userdata('tiempo');
            if($vidasession>$inac){
                $this->session->sess_destroy($userdata);
                redirect('login');  
            }

        }
    }
}   

