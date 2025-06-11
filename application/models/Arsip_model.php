<?php
class Arsip_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function addarsip($title, $date_posted, $file){
		$this->db->flush_cache();
		$data = array(
        'title' => $title,
        'date_upload' => $date_posted,
        'file' => $file
		);
		
		if($this->db->insert('arsip', $data)){
			return true;
		}
	}

	public function delarsip($id){
		$this->db->flush_cache();
		$this->db->delete('arsip', array('id' => $id)); 
	}

	public function delarsipacara($id){
		$this->db->flush_cache();
		$this->db->delete('arsip_acara', array('id' => $id)); 
	}

	public function delarsiprapat($id){
		$this->db->flush_cache();
		$this->db->delete('arsip_rapat', array('id' => $id)); 
	}

	public function addarsipacara($title, $date_posted, $file, $idacara){
		$this->db->flush_cache();
		$data = array(
        'title' => $title,
        'date_upload' => $date_posted,
        'file' => $file,
        'id_acara'=>$idacara
		);
		
		if($this->db->insert('arsip_acara', $data)){
			return true;
		}
	}

	public function addarsiprapat($title, $date_posted, $file, $idrapat){
		$this->db->flush_cache();
		$data = array(
        'title' => $title,
        'date_upload' => $date_posted,
        'file' => $file,
        'id_rapat'=>$idrapat
		);
		
		if($this->db->insert('arsip_rapat', $data)){
			return true;
		}
	}
	public function arsipacara($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('arsip_acara');
		$this->db->where('id_acara', $id);
		return $this->db->get();

	}

	public function arsiprapat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('arsip_rapat');
		$this->db->where('id_rapat', $id);
		return $this->db->get();

	}

	public function arsip($type=FALSE){
		$this->db->flush_cache();
		if($type==FALSE){
			$query=$this->db->query("SELECT id, title, file, 0 as id_events, date_upload, 'none' as type_events FROM arsip UNION SELECT id, title, file, id_acara, date_upload, 'acara' as type_events FROM arsip_acara UNION  SELECT id, title, file, id_rapat, date_upload, 'rapat' as type_events FROM arsip_rapat");
			return $query;
		}else{
			if($type=="none"){
				$this->db->select('*');
				$this->db->select('\'-\' as events');
				$this->db->select('\'none\' as type_events');
				$this->db->from('arsip');
				return $this->db->get();
			}else if($type=="acara"){
				$this->db->select('*');
				$this->db->select('title as events');
				$this->db->select('\'acara\' as type_events');
				$this->db->from('arsip_acara');
				return $this->db->get();
			}else if($type=="rapat"){
				$this->db->select('*');
				$this->db->select('title as events');
				$this->db->select('\'rapat\' as type_events');
				$this->db->from('arsip_rapat');
				return $this->db->get();
			}
		}
	}


	public function exportgetTitle($file){
		$this->db->flush_cache();
		
			$query=$this->db->query("SELECT * FROM (SELECT id, title, file, 0 as id_events, date_upload, 'none' as type_events FROM arsip UNION SELECT id, title, file, id_acara, date_upload, 'acara' as type_events FROM arsip_acara UNION  SELECT id, title, file, id_rapat, date_upload, 'rapat' as type_events FROM arsip_rapat) as rapat WHERE rapat.file = '".$file."'");
			return $query;
	}
}
  ?>