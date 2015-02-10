<?php 
Class Marcas extends CI_Model{


	function _contructor(){
		parent::Model();
	}

	

	public function agregar($data)
	{

		$this->db->insert('marcas',$data);

		return $this->db->insert_id();
		

	}

		public function mostrarultimo($id)

	{
		$this->db->select('id_marca,marca');
		$this->db->from('marcas');
		$this->db->where('id_marca',$id);
		$r=$this->db->get();
		$query=$r->result();


		return $query;

	}

	public function mostrartodos()
	{
		$this->db->select('id_marca,marca');
		$this->db->from('marcas');
		
		$r=$this->db->get();
		$query=$r->result_array();
		return $query;
	}

		public function mostrarmarcas()
	{
		$this->db->select('id_marca,marca');
		$this->db->from('marcas');
		
		$r=$this->db->get();
	
		return $r;
	}





	public function buscar($id){
		$this->db->select('id_marca,marca');
		$this->db->from('marcas');
		$this->db->where('id_marca',$id);
		$query=$this->db->get();

		return $query;


	}
		public function buscarmarca($marca){
		$this->db->select('id_marca,marca');
		$this->db->from('marcas');
		$this->db->where('marca',$marca);
		$query=$this->db->get();

		return $query;


	}

		public function update($id,$data){

		$this->db->where('id_marca', $id);
		$this->db->update('marcas', $data); 



	}
	public function borrar($id)
	{
		$this->db->where('id_marca', $id);
		$this->db->delete('marcas'); 
	}


}