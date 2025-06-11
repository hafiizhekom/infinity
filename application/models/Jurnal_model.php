<?php
class Jurnal_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function jurnal($id=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('jurnal');
		if($id!=FALSE){
			$this->db->where('id', $id);
		}
		return $this->db->get();
	}

	public function jurnalfile($file){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->where('file',$file);
		return $this->db->get();
	}

	public function addjurnal($title, $abstract, $file, $date){
		$this->db->flush_cache();
		$data = array(
        'title' => $title,
        'abstract' => $abstract,
        'file' => $file,
        'tanggal_upload' => $date,
        'author' => $this->session->userdata('username')
		);
		$this->db->insert('jurnal',$data);
	}

	public function deljurnal($id){
		$this->db->flush_cache();
		$this->db->delete('jurnal', array('id' => $id)); 
	}
}
  ?>
