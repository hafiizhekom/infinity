<?php
class Slide_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function slide(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('slide');
		return $this->db->get();
	}


	public function addslide($file, $link, $keterangan){
		$this->db->flush_cache();
		$data = array(
        'file' => $file,
        'link' => $link
		);
		$this->db->insert('slide',$data);
	}
}
  ?>
