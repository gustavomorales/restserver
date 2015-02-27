<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->check_isvalidated();
		
		$this->inactivo();
	}

	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('index.php/login');
        }
    }

    private function inactivo(){
    	$inac=60;

    	if($this->session->userdata('tiempo'))
    	{	
    		
    		$vidasession=time()-$this->session->userdata('tiempo');
    		if($vidasession>$inac){
    			$this->session->unset_userdata('usuario');
    			$this->session->unset_userdata('email');
    			$this->session->unset_userdata('nombre');
    			$this->session->unset_userdata('validated');
    		    
        		redirect('index.php/login');	
    		}
    			
    		$this->session->set_userdata('tiempo',time());

    	}
    }



	public function index()
	{	
		$this->load->model('categorias');
		$this->load->model('fabricantes');
		$this->load->model('marcas');
		$this->load->model('unidad');
		$data['categorias']=$this->categorias->mostrarcategorias();
		$data['fabricantes']=$this->fabricantes->mostrarfabricantes();
		$data['marcas']=$this->marcas->mostrarmarcas();
		$data['unidad']=$this->unidad->mostrarunidades();

		$this->load->view('agregarproducto',$data);
	}

	public function agregarproducto()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('producto','Producto','required|is_unique[products.producto]');
		$this->form_validation->set_rules('precio','Precio','required|numeric');
		$this->form_validation->set_rules('cantidad','Cantidad','required|numeric');
		$this->form_validation->set_rules('unidad','Unidad','required');
		$this->form_validation->set_message('is_unique',"El campo %s debe ser unico, Ya Existe!");
		$this->form_validation->set_message('numeric',"El campo %s debe ser numerico!");


		if($this->form_validation->run()!=false)

		{
			
			$producto=$_POST['producto'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$unidad=$_POST['unidad'];
			$fabricante=$_POST['fabricante'];
			$categoria=$_POST['categoria'];
			$marca=$_POST['marca'];

		

			$data=array('producto'=>$producto,'precio'=>$precio,'cantidad'=>$cantidad,'unidad_id'=>$unidad,'fabricante_id'=>$fabricante,'categoria_id'=>$categoria,'marca_id'=>$marca);
			

			$this->load->model('products');
			$this->load->model('usuarios');
			$id=$this->products->agregar($data);
			$data['getproducto']= $this->products->mostrarultimo($id);
			$this->load->model('categorias');
			$this->load->model('fabricantes');
			$this->load->model('marcas');
			$this->load->model('unidad');
			$data['categorias']=$this->categorias->mostrarcategorias();
			$data['fabricantes']=$this->fabricantes->mostrarfabricantes();
			$data['marcas']=$this->marcas->mostrarmarcas();
			$data['unidad']=$this->unidad->mostrarunidades();

			
			$this->load->view('agregarproducto',$data);

		}
		else
		{	$data['success']= "fail";
			$this->load->model('categorias');
			$this->load->model('fabricantes');
			$this->load->model('marcas');
			$this->load->model('unidad');
			$data['categorias']=$this->categorias->mostrarcategorias();
			$data['fabricantes']=$this->fabricantes->mostrarfabricantes();
			$data['marcas']=$this->marcas->mostrarmarcas();
			$data['unidad']=$this->unidad->mostrarunidades();

			$this->load->view('agregarproducto',$data);
		}
	}

	public function mostrarproductos(){
		$this->load->model('products');
		$data['productos']=$this->products->mostrarproductos();
		$this->load->view('listadodeproductos',$data);
	}

	public function eliminar(){
		
		$id=$_GET['id'];
		$this->load->model('products');
		$this->products->borrar($id);
		$data['productos']=$this->products->mostrarproductos();
		$data['exito']="Producto Eliminado!!!";
		$this->load->view('listadodeproductos',$data);
	}

		public function buscar()
	{	

			$id=$_GET['id'];
			$this->load->model('products');
			
			
			$p=$this->products->buscar($id);
			foreach ($p->result() as $data) {
				$datos['producto_id']=$data->producto_id;
				$datos['producto']=$data->producto;
				$datos['precio']=$data->precio;
				$datos['cantidad']=$data->cantidad;
				$datos['unidad']=$data->unidad;
				$datos['marca']=$data->marca;
				$datos['categoria']=$data->categoria;
				$datos['fabricante']=$data->fabricante;
				$datos['categoria_id']=$data->categoria_id;
				$datos['fabricante_id']=$data->fabricante_id;
				$datos['marca_id']=$data->marca_id;
				$datos['unidad_id']=$data->unidad_id;
				$this->load->model('categorias');
				$this->load->model('fabricantes');
				$this->load->model('marcas');
				$this->load->model('unidad');
				$datos['categorias']=$this->categorias->mostrarcategorias();
				$datos['fabricantes']=$this->fabricantes->mostrarfabricantes();
				$datos['marcas']=$this->marcas->mostrarmarcas();
				$datos['unidades']=$this->unidad->mostrarunidades();
				$this->load->library('session');
				$this->session->set_userdata($datos);
		
			}
			$datos['productos']=$this->products->mostrarproductos();
			$datos['success']='fail';

			$this->load->view('listadodeproductos',$datos);


	}

		public function update()
	{	$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('producto','Producto','required');
		$this->form_validation->set_rules('precio','Precio','required|numeric');
		$this->form_validation->set_rules('cantidad','Cantidad','required|numeric');
		$this->form_validation->set_rules('unidad','Unidad','required');
		$this->form_validation->set_message('is_unique',"El campo %s debe ser unico, Ya Existe!");
		$this->form_validation->set_message('numeric',"El campo %s debe ser numerico!");
	
		if($this->form_validation->run()!=false)

		{
			$this->load->model('products');
			$ppp=$this->session->userdata('producto');
			if($ppp==$_POST['producto']){

			$id=$_POST['producto_id'];
			$producto=$_POST['producto'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$unidad=$_POST['unidad'];
			$marca=$_POST['marca'];
			$fabricante=$_POST['fabricante'];
			$categoria=$_POST['categoria'];

			$data=array('producto'=>$producto,'precio'=>$precio,'cantidad'=>$cantidad,'unidad_id'=>$unidad,'marca_id'=>$marca,'fabricante_id'=>$fabricante,'categoria_id'=>$categoria);
			
			$this->products->update($id,$data);
			$datos['productos']=$this->products->mostrarproductos();
			$datos['exito']="Producto Modificado!!!";
			$this->load->view('listadodeproductos',$datos);

			}
		
			else{
				$p=$this->products->buscarproducto($_POST['producto']);
				if($p->num_rows()==0)
				{
					$id=$_POST['producto_id'];
					$producto=$_POST['producto'];
					$precio=$_POST['precio'];
					$cantidad=$_POST['cantidad'];
					$unidad=$_POST['unidad'];
					$marca=$_POST['marca'];
					$fabricante=$_POST['fabricante'];
					$categoria=$_POST['categoria'];

					$data=array('producto'=>$producto,'precio'=>$precio,'cantidad'=>$cantidad,'unidad_id'=>$unidad,'marca_id'=>$marca,'fabricante_id'=>$fabricante,'categoria_id'=>$categoria);
			
					
					$this->products->update($id,$data);
					$datos['productos']=$this->products->mostrarproductos();
					$datos['exito']="Modificación Existosa!!!";
					$this->load->view('listadodeproductos',$datos);	
				}
				else
				{
				$datos['productos']=$this->products->mostrarproductos();
				$datos['exito']="El producto ya existe";
				$this->load->view('listadodeproductos',$datos);
				}

			}

		}
		else
		{
			$this->load->view('listadodeproductos');
		}


		

	}

	public function agregarvarios(){

		$this->load->view('crearvarios');
	}

	public function agregarcategoria()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria','Categoria','required|is_unique[categorias.categoria]');
		$this->form_validation->set_message('is_unique',"El campo %s debe ser unico, Ya Existe!");
		$this->form_validation->set_message('numeric',"El campo %s debe ser numerico!");


		if($this->form_validation->run()!=false)

		{
			
			$categoria=$_POST['categoria'];
	
		

			$data=array('categoria'=>$categoria);
		

			$this->load->model('categorias');
			$id=$this->categorias->agregar($data);
			$data['getcategoria']= $this->categorias->mostrarultimo($id);
			
			$this->load->view('crearvarios',$data);

		}
		else
		{	$data['success']= "fail";
			$this->load->view('crearvarios',$data);
		}
	}

		public function agregarfabricante()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fabricante','Fabricante','required|is_unique[fabricantes.fabricante]');
		$this->form_validation->set_message('is_unique',"El campo %s debe ser unico, Ya Existe!");
		$this->form_validation->set_message('numeric',"El campo %s debe ser numerico!");


		if($this->form_validation->run()!=false)

		{
			
			$fabricante=$_POST['fabricante'];
	
		

			$data=array('fabricante'=>$fabricante);
		

			$this->load->model('fabricantes');
			$id=$this->fabricantes->agregar($data);
			$data['getfabricante']= $this->fabricantes->mostrarultimo($id);
			
			$this->load->view('crearvarios',$data);

		}
		else
		{	$data['success']= "fail";
			$this->load->view('crearvarios',$data);
		}
	}

			public function agregarmarca()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('marca','Marca','required|is_unique[marcas.marca]');
		$this->form_validation->set_message('is_unique',"El campo %s debe ser unico, Ya Existe!");
		$this->form_validation->set_message('numeric',"El campo %s debe ser numerico!");


		if($this->form_validation->run()!=false)

		{
			
			$marca=$_POST['marca'];
	
		

			$data=array('marca'=>$marca);
		

			$this->load->model('marcas');
			$id=$this->marcas->agregar($data);
			$data['getmarca']= $this->marcas->mostrarultimo($id);
			
			$this->load->view('crearvarios',$data);

		}
		else
		{	$data['success']= "fail";
			$this->load->view('crearvarios',$data);
		}
	}

	public function agregarunidad()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('unidad','Unidad','required|is_unique[unidad.unidad]');
		$this->form_validation->set_message('is_unique',"El campo %s debe ser unico, Ya Existe!");
		$this->form_validation->set_message('numeric',"El campo %s debe ser numerico!");


		if($this->form_validation->run()!=false)

		{
			
			$unidad=$_POST['unidad'];
	
		

			$data=array('unidad'=>$unidad);
		

			$this->load->model('unidad');
			$id=$this->unidad->agregar($data);
			$data['getunidad']= $this->unidad->mostrarultimo($id);
			
			$this->load->view('crearvarios',$data);

		}
		else
		{	$data['success']= "fail";
			$this->load->view('crearvarios',$data);
		}
	}




}
