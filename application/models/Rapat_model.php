<?php
class Rapat_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function addrapat($topik, $keterangan, $date_posted, $datetime, $tempat){
		$this->db->flush_cache();
		$data = array(
        'topik' => $topik,
        'keterangan' => $keterangan,
        'date_posted' => $date_posted,
        'waktu' => $datetime,
        'tempat' => $tempat
		);
		
		if($this->db->insert('rapat', $data)){
			return true;
		}
	}

	public function delrapat($id){
		$this->db->flush_cache();
		$this->db->delete('rapat', array('id' => $id)); 
	}

	public function editrapat($id, $nama_acara, $keterangan, $date_posted, $datetime, $tempat){
		$this->db->flush_cache();
		$data = array(
        'topik' => $nama_acara,
        'keterangan' => $keterangan,
        'date_posted' => $date_posted,
        'waktu' => $datetime, 
        'tempat' => $tempat
		);
		$this->db->where('id', $id);

		if($this->db->update('rapat', $data)){
			return true;
		}
	}

	public function rapat($id=FALSE){
		$this->db->flush_cache();
  		$this->db->select('*');
  		$this->db->from('rapat');
  		if($id!=FALSE){
  			$this->db->where('id', $id);
  		}
		return $this->db->get();
	}

	public function topuniquerapat($data){
		return $this->db->get_where('rapat', $data, 1);
	}

}
  ?>