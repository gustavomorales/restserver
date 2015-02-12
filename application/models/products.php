<?php 
Class Products extends CI_Model{


	function _contructor(){
		parent::Model();
	}

	

	public function agregar($data)
	{

		$this->db->insert('products',$data);

		return $this->db->insert_id();
		

	}

		public function mostrarultimo($id)

	{
		$this->db->select('p.producto_id,p.producto,p.precio,p.cantidad,u.unidad');
		$this->db->from('products p');
		$this->db->where('producto_id',$id);
		$this->db->join('unidad u','u.id_unidad = p.unidad_id');
		$r=$this->db->get();
		$query=$r->result();


		return $query;

	}

	public function mostrartodos()
	{
		$this->db->select('producto_id,producto,precio,cantidad,unidad_id');
		$this->db->from('products');
		
		$r=$this->db->get();
		$query=$r->result_array();
		return $query;
	}

		public function mostrarproductos()
	{
		$this->db->select('producto_id,producto,precio,cantidad,u.unidad,c.categoria,f.fabricante,m.marca');
		$this->db->from('products');
		$this->db->join('unidad u','u.id_unidad = unidad_id');
		$this->db->join('categorias c','c.id_categoria = categoria_id');
		$this->db->join('marcas m','m.id_marca = marca_id');
		$this->db->join('fabricantes f','f.id_fabricante = fabricante_id');
		
		$r=$this->db->get();
	
		return $r;
	}





	public function buscar($id){
		$this->db->select('producto_id,producto,precio,cantidad,u.unidad,c.categoria,f.fabricante,m.marca,unidad_id,marca_id,fabricante_id,categoria_id');
		$this->db->from('products');
		$this->db->where('producto_id',$id);
		$this->db->join('unidad u','u.id_unidad = unidad_id');
		$this->db->join('categorias c','c.id_categoria = categoria_id');
		$this->db->join('marcas m','m.id_marca = marca_id');
		$this->db->join('fabricantes f','f.id_fabricante = fabricante_id');
		$query=$this->db->get();

		return $query;


	}

	public function buscarxcat($id){
		
		$this->db->select('p.producto_id,p.producto,p.precio,p.cantidad,u.unidad,c.categoria');
		$this->db->from('products p');
		$this->db->where('categoria_id',$id);
		$this->db->join('unidad u','u.id_unidad = p.unidad_id');
		$this->db->join('categorias c','c.id_categoria = p.categoria_id');
		$r=$this->db->get();
		$query=$r->result();


		return $query;

	}
		public function buscarproducto($producto){
		$this->db->select('producto_id,producto,precio,cantidad,unidad_id');
		$this->db->from('products');
		$this->db->where('producto',$producto);
		$query=$this->db->get();

		return $query;


	}

		public function update($id,$data){

		$this->db->where('producto_id', $id);
		$this->db->update('products', $data); 



	}
	public function borrar($id)
	{
		$this->db->where('producto_id', $id);
		$this->db->delete('products'); 
	}


}