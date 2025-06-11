<?php
class Log_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function addlog($date_posted, $isi, $url){
		$this->db->flush_cache();
		$data = array(
        'date' => $date_posted,
        'isi' => $isi,
        'url' => $url
		);

		if($this->db->insert('log', $data)){
			return true;
		}
	}
}
  ?>
