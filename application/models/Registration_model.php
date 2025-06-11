<?php
class Registration_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function register($nim, $nama, $phone, $email, $motivasi, $ttl){
		$this->db->flush_cache();
		$data = array(
        'nim' => $nim,
        'nama' => $nama,
        'telepon' => $phone,
        'email' => $email,
        'tanggal_lahir' => $ttl,
        'motivasi' => $motivasi
		);

		if($this->db->insert('nominasi', $data)){
			return true;
		}
	}

	public function nominasi(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('nominasi');
		$this->db->where('active',1);
		return $this->db->get();
	}

	public function delnominasi($id){
		$this->db->flush_cache();
		if($this->db->delete('nominasi', array('id' => $id))){
			return true;
		}
	}

	public function nonaktifnominasi($id){
		$this->db->flush_cache();
		$data = array(
        'active' => '0'
		);
		$this->db->where('id', $id);

		if($this->db->update('nominasi', $data)){
			return true;
		}
	}


	public function nominasiall($id=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('nominasi');
		if($id!=FALSE){
			$this->db->where('id', $id);
		}
		return $this->db->get();
	}


}
  ?>
