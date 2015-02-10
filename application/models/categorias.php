<?php 
Class Categorias extends CI_Model{


	function _contructor(){
		parent::Model();
	}

	

	public function agregar($data)
	{

		$this->db->insert('categorias',$data);

		return $this->db->insert_id();
		

	}

		public function mostrarultimo($id)

	{
		$this->db->select('id_categoria,categoria');
		$this->db->from('categorias');
		$this->db->where('id_categoria',$id);
		$r=$this->db->get();
		$query=$r->result();


		return $query;

	}

	public function mostrartodos()
	{
		$this->db->select('id_categoria,categoria');
		$this->db->from('categorias');
		
		$r=$this->db->get();
		$query=$r->result_array();
		return $query;
	}

		public function mostrarcategorias()
	{
		$this->db->select('id_categoria,categoria');
		$this->db->from('categorias');
		
		$r=$this->db->get();
	
		return $r;
	}





	public function buscar($id){
		$this->db->select('id_categoria,categoria');
		$this->db->from('categorias');
		$this->db->where('id_categoria',$id);
		$query=$this->db->get();

		return $query;


	}
		public function buscarcategoria($categoria){
		$this->db->select('id_categoria,categoria');
		$this->db->from('categorias');
		$this->db->where('categoria',$producto);
		$query=$this->db->get();

		return $query;


	}

		public function update($id,$data){

		$this->db->where('id_categoria', $id);
		$this->db->update('categorias', $data); 



	}
	public function borrar($id)
	{
		$this->db->where('id_categoria', $id);
		$this->db->delete('categorias'); 
	}


}