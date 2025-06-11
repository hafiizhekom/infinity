<?php
class Acara_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function addacara($nama_acara, $keterangan, $date_posted, $datetime, $tempat){
		$this->db->flush_cache();
		$data = array(
        'nama_acara' => $nama_acara,
        'keterangan' => $keterangan, 
        'date_posted' => $date_posted,
        'waktu' => $datetime,
        'tempat' => $tempat
		);

		if($this->db->insert('acara', $data)){
			return true;
		}
	}

	public function delacara($id){
		$this->db->flush_cache();
		$this->db->delete('acara', array('id' => $id)); 
	}

	public function editacara($id, $nama_acara, $keterangan, $date_posted, $datetime, $tempat){
		$this->db->flush_cache();
		$data = array(
        'nama_acara' => $nama_acara,
        'keterangan' => $keterangan,
        'date_posted' => $date_posted,
        'waktu' => $datetime, 
        'tempat' => $tempat
		);
		$this->db->where('id', $id);

		if($this->db->update('acara', $data)){
			return true;
		}
	}

	public function acara($id=FALSE){
		$this->db->flush_cache();
  		$this->db->select('*');
  		$this->db->from('acara');
  		if($id!=FALSE){
  			$this->db->where('id', $id);
  		}
		return $this->db->get();
	}

	public function topuniqueacara($data){
		return $this->db->get_where('acara', $data, 1);
	}

	

}
  ?>
