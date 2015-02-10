<?php 
Class Fabricantes extends CI_Model{


	function _contructor(){
		parent::Model();
	}

	

	public function agregar($data)
	{

		$this->db->insert('fabricantes',$data);

		return $this->db->insert_id();
		

	}

		public function mostrarultimo($id)

	{
		$this->db->select('id_fabricante,fabricante');
		$this->db->from('fabricantes');
		$this->db->where('id_fabricante',$id);
		$r=$this->db->get();
		$query=$r->result();


		return $query;

	}

	public function mostrartodos()
	{
		$this->db->select('id_fabricante,fabricante');
		$this->db->from('fabricantes');
		
		$r=$this->db->get();
		$query=$r->result_array();
		return $query;
	}

		public function mostrarfabricantes()
	{
		$this->db->select('id_fabricante,fabricante');
		$this->db->from('fabricantes');
		
		$r=$this->db->get();
	
		return $r;
	}





	public function buscar($id){
		$this->db->select('id_fabricante,fabricante');
		$this->db->from('fabricantes');
		$this->db->where('id_fabricante',$id);
		$query=$this->db->get();

		return $query;


	}
		public function buscarfabricante($fabricante){
		$this->db->select('id_fabricante,fabricante');
		$this->db->from('fabricantes');
		$this->db->where('fabricante',$fabricante);
		$query=$this->db->get();

		return $query;


	}

		public function update($id,$data){

		$this->db->where('id_fabricante', $id);
		$this->db->update('fabricantes', $data); 



	}
	public function borrar($id)
	{
		$this->db->where('id_fabricante', $id);
		$this->db->delete('fabricantes'); 
	}


}