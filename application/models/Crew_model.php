<?php
class Crew_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function crewaktif($username=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->select('user.id as idokcomputer');
		$this->db->from('user');
		$this->db->join('jabatan', 'user.id_jabatan = jabatan.id');
		$this->db->join('crew', 'user.id_crew = crew.id');
		$this->db->where('user.active', 1);
		if($username!=FALSE){
			$this->db->where('username', $username);
		}
		return $this->db->get();
	}


	public function crew($username=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->select('user.id as idokcomputer');
		$this->db->from('user');
		$this->db->join('jabatan', 'user.id_jabatan = jabatan.id');
		$this->db->join('crew', 'user.id_crew = crew.id');
		if($username!=FALSE){
			$this->db->where('username', $username);
		}
		return $this->db->get();
	}

	public function user($username=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('jabatan', 'user.id_jabatan = jabatan.id');
		$this->db->join('crew', 'user.id_crew = crew.id');
		if($username!=FALSE){
			$this->db->where('username', $username);
		}
		return $this->db->get();
	}

	public function crewstatus($id=FALSE){
		$this->db->flush_cache();
		if($id!=FALSE){
			$this->db->select('*');
			$this->db->from('crew');
			$this->db->where('id', id);
		return $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('crew');
			return $this->db->get();
		}
	}

	 public function delcrewstatus($id){
		$this->db->flush_cache();
		$this->db->db_debug=FALSE;
		if($this->db->delete('crew', array('id' => $id))){
			return true;
		}else{
			return false;
		}
	}

	public function jabatan($id=FALSE){
		$this->db->flush_cache();
		if($id!=FALSE){
			$this->db->select('*');
			$this->db->from('jabatan');
			$this->db->where('id', id);
		return $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('jabatan');
			return $this->db->get();
		}
	}


}
