<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	 function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
    public function index(){
    	$this->load->view('agregarusuarios');
    }

    public function agregar(){

    	$this->load->model('usuarios');
    	$this->load->view('login');
    }
}