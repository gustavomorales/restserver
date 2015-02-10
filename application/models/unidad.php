<?php 
Class Unidad extends CI_Model{


	function _contructor(){
		parent::Model();
	}

	

	public function agregar($data)
	{

		$this->db->insert('unidad',$data);

		return $this->db->insert_id();
		

	}

		public function mostrarultimo($id)

	{
		$this->db->select('id_unidad,unidad');
		$this->db->from('unidad');
		$this->db->where('id_unidad',$id);
		$r=$this->db->get();
		$query=$r->result();


		return $query;

	}

	public function mostrartodos()
	{
		$this->db->select('id_unidad,unidad');
		$this->db->from('unidad');
		
		$r=$this->db->get();
		$query=$r->result_array();
		return $query;
	}

		public function mostrarunidades()
	{
		$this->db->select('id_unidad,unidad');
		$this->db->from('unidad');
		
		$r=$this->db->get();
	
		return $r;
	}





	public function buscar($id){
		$this->db->select('id_unidad,unidad');
		$this->db->from('unidad');
		$this->db->where('id_unidad',$id);
		$query=$this->db->get();

		return $query;


	}
		public function buscarunidad($marca){
		$this->db->select('id_unidad,unidad');
		$this->db->from('unidad');
		$this->db->where('unidad',$marca);
		$query=$this->db->get();

		return $query;


	}

		public function update($id,$data){

		$this->db->where('id_unidad', $id);
		$this->db->update('unidad', $data); 



	}
	public function borrar($id)
	{
		$this->db->where('id_unidad', $id);
		$this->db->delete('unidad'); 
	}


}