<?php
class Profile_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function checkingprofile(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('profile');
		return $this->db->get();
	}


	public function profile(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('profile');
		return $this->db->get();
	}



	public function newprofile(){
		$this->db->flush_cache();
		$data = array(
        'visi' => '-',
        'misi' => '-',
        'program_kerja' => '-'
		);
		
		if($this->db->insert('profile', $data)){
			return true;
		}
	}

	public function setvisi($visi, $id){
		$this->db->flush_cache();
		$data = array(
        'visi' => $visi
		);
		$this->db->where('id', $id);

		if($this->db->update('profile', $data)){
			return true;
		}
	}

	public function setmisi($misi, $id){
		$this->db->flush_cache();
		$data = array(
        'misi' => $misi
		);
		$this->db->where('id', $id);

		if($this->db->update('profile', $data)){
			return true;
		}
	}

	public function setrencana($rencana, $id){
		$this->db->flush_cache();
		$data = array(
        'program_kerja' => $rencana
		);
		$this->db->where('id', $id);

		if($this->db->update('profile', $data)){
			return true;
		}
	}

}

  ?>
