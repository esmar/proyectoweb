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

		public function getUserID($id){

			$consulta='SELECT * FROM `users` WHERE id ='.$id;
        	$query = $this->db->query("$consulta");
        	return $query->result_arrat();
		}

		public function verificando($code){
			$consulta="UPDATE `users` SET `estado`=1 WHERE code='$code'";
        	$query = $this->db->query("$consulta");
        	return $query;

		}

		public function estado($ide){
			$consulta='SELECT estado FROM `users` WHERE id ='.$ide;
        	$query = $this->db->query("$consulta");
        	return $query->row();

		}


	}
?>