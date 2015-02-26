	<?php 
Class Usuarios extends CI_Model{


	function _contructor(){
		parent::Model();

	}

	

	public function login($usuario,$hash)
	{
		$this->db->select('usuario,pass,email,nombre');
		$this->db->from('usuarios');
		$this->db->where('usuario',$usuario);
		$query=$this->db->get();

		if($query->num_rows() == 1)
        {
            $user = $query->row();
            $pass = $user->pass;

 			
            if($this->bcrypt->check_password($hash, $pass))
            {	
                return $query;
            }
        }

        return false;
    	
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
		$this->db->where('id_usuario',$id);
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

		$this->db->where('id_usuario', $id);
		$this->db->update('usuarios', $data); 



	}
	

	//-$id = function inserta_usuario($datos = array())

	//redirecr("rssar".$id)

}