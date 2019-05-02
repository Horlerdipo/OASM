<?php
class user_model extends CI_MODEL{

	public function check_user($username,$email){
		$this->db->where('name',$username);
		$this->db->where('email',$email);
		$query=$this->db->get('users');
		
		if ($query) {
			# code...
			return TRUE;

		}else{

			return FALSE;
		}
		//return $query->result();
	}



	public function login_user($username,$email,$password){

		$this->db->where("name",$username);
		$this->db->where('email',$email);
		$query=$this->db->get('users');
		$result=$query->result();

		if (empty($result)) {
			$return=NULL;
			return($return);

		}else{

			$hashed_password=($result[0]->password);

			if(md5($password)===$hashed_password){

				return($result[0]->id);
			}
		}
		

	}	




	public function register_user($data){

		$query=$this->db->insert('users',$data);

		if ($query) {
			# code...
			return TRUE;

		}else{

			return FALSE;
		}
	}



} 





?>