<?php 
	
	class Model_User extends CI_Model{

		public function insert($data){
			$this->db->insert('users',$data);
		}

		public function getUser($nombre,$pass){

        $consulta="SELECT * FROM `users` WHERE name = '$nombre' and password = '$pass'";
        $query = $this->db->query("$consulta");
        return $query->row();
    

		}

	}
?>