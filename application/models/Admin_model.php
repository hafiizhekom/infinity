<?php
class Admin_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login($username, $password){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('active', 1);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	public function addadmin($username, $nama, $password, $id_jabatan, $id_crew){
		$this->db->flush_cache();
		$data = array(
        'username' => $username,
        'nama' => $nama,
        'password' => $password,
        'id_jabatan' => $id_jabatan,
        'id_crew'=> $id_crew
		);
		
		if($this->db->insert('user', $data)){
			return true;
		}
	}

	public function addjabatan($jabatan){
		$this->db->flush_cache();
		$data = array(
        'crew' => $jabatan
		);
		
		if($this->db->insert('crew', $data)){
			return true;
		}
	}

	public function editadmin($id, $nama, $id_jabatan, $id_crew, $image=FALSE){
		$this->db->flush_cache();
		if($image!=FALSE){
			$data = array(
	        'nama' => $nama,
	        'id_jabatan' => $id_jabatan,
	        'id_crew'=> $id_crew,
	        'image'=> $image
			);
		}else{
			$data = array(
	        'nama' => $nama,
	        'id_jabatan' => $id_jabatan,
	        'id_crew'=> $id_crew
			);
		}
		$this->db->where('id', $id);
		if($this->db->update('user', $data)){
			return true;
		}
	}

	public function deladmin($username){
		$this->db->flush_cache();
		$this->db->db_debug=FALSE;
		if($this->db->delete('user', array('username' => $username))){
			return true;
		}else{
			return false;
		}
	}

	public function nonactive($username){
		$this->db->flush_cache();
		$this->db->set('active', '0');
		$this->db->where('username', $username);
		if($this->db->update('user')){
			return true;
		}
	}

	public function active($username){
		$this->db->flush_cache();
		$this->db->set('active', '1');
		$this->db->where('username', $username);
		if($this->db->update('user')){
			return true;
		}
	}

	public function profile($username){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('jabatan', 'user.id_jabatan = jabatan.id');
		$this->db->join('crew', 'user.id_crew = crew.id');
		$this->db->where('user.username', $username);
		return $this->db->get();
	}
}
  ?>
