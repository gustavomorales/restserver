<?php 
Class Usuarios extends CI_Model{


	function _contructor(){
		parent::Model();
	}

	

	public function login($usuario,$pass)
	{
		$this->db->select('usuario,email,nombre');
		$this->db->from('usuarios');
		$this->db->where('usuario',$usuario);
		$this->db->where('contraseña',$pass);
	

		$query=$this->db->get();
		

		return $query	;
	}


	public function agregar($data)
	{

		$this->db->insert('usuarios',$data);

		return $this->db->insert_id();
		

	}
	public function mostrarultimo($id)

	{
		$this->db->select('usuario,email,nombre');
		$this->db->from('usuarios');
		$this->db->where('usuario_id',$id);
		$query=$this->db->get();

		return $query;

	}

	public function buscar($usuario){
		$this->db->select('usuario,email,nombre');
		$this->db->from('usuarios');
		$this->db->where('usuario',$usuario);
		$query=$this->db->get();

		return $query;


	}
		public function update($id,$data){

		$this->db->where('usuario_id', $id);
		$this->db->update('usuarios', $data); 



	}
	

	//-$id = function inserta_usuario($datos = array())

	//redirecr("rssar".$id)

}