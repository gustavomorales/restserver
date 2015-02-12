<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Productos_api extends REST_Controller{
	function __contruct(){

		 parent::__construct();
        
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
	}


    function product_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
    	/*$users = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
			2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
		);*/
		$this->load->model('products');

    	$product = $this->products->mostrarultimo($this->get('id'));
    	
        if($product)
        {
            $this->response($product, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No hay Producto'), 404);
        }
    }
        function productxcat_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
        /*$users = array(
            1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
            2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
            3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
        );*/
        $this->load->model('products');
        
        $product = $this->products->buscarxcat($this->get('id'));
        
        if($product)
        {
            $this->response($product, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No hay Producto con esa categoria'), 404);
        }
    }

    function product_post()
    {
        //$this->some_model->updateUser( $this->get('id') );
        $message = array('producto' => $this->post('producto'), 'precio' => $this->post('precio'), 'cantidad' => $this->post('cantidad'), 'unidad'=>$this->post('unidad'));
        echo $this->get('producto');
        $this->load->model('products');
        $product = $this->products->agregar($message);
        $message['mensaje']="Producto Agregado";
        $this->response($message, 200); // 200 being the HTTP response code
    }

        function product_delete()
    {
        //$this->some_model->deletesomething( $this->get('id') );
        $this->load->model('products');
        $this->products->borrar($this->get('id'));
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }

    function products_get()
    {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        /*$users = array(
            array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
            array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
            3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
        );*/

        $this->load->model('products');
  

        $productos=$this->products->mostrartodos();

        if($productos)
        {
            $this->response($productos, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }
}
