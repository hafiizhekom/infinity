<?php
class Absen_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function newabsenacara($id_parent, $username){
		$this->db->flush_cache();
		$data = array(
        'id_acara' => $id_parent,
        'username' => $username
		);

		if($this->db->insert('absen_acara', $data)){
			return true;
		}
	}

	public function absenacara($id_acara){
		  $this->db->flush_cache();
		  $this->db->select('*');
		  $this->db->from('absen_acara');
		  $this->db->where('id_acara', $id_acara);
			return $this->db->get();
 	}

 	public function updateabsenacara($id_acara, $username, $kehadiran){
 		$this->db->flush_cache();
		$this->db->set('kehadiran', $kehadiran);
		$this->db->where('username', $username);
		if($this->db->update('absen_acara')){
			return true;
		}

 	}

 	public function updateabsenrapat($id_rapat, $username, $kehadiran){
 		$this->db->flush_cache();
		$this->db->set('kehadiran', $kehadiran);
		$this->db->where('username', $username);
		if($this->db->update('absen_rapat')){
			return true;
		}

 	}

 	public function absenrapat($id_rapat){
		  $this->db->flush_cache();
		  $this->db->select('*');
		  $this->db->from('absen_rapat');
		  $this->db->where('id_rapat', $id_rapat);
			return $this->db->get();
 	}

	public function newabsenrapat($id_parent, $username){
		$this->db->flush_cache();
		$data = array(
        'id_rapat' => $id_parent,
        'username' => $username
		);

		if($this->db->insert('absen_rapat', $data)){
			return true;
		}
	}
}
  ?>
