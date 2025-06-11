<?php
class Gallery_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function album(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('album');
		$this->db->order_by('album');
		return $this->db->get();
	}

	public function foto($album=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->select('foto.id as aselole');
		$this->db->select('foto.file as fileaselole');
		$this->db->from('foto');
		$this->db->join('album', 'foto.id_album = album.id');
		if($album!=FALSE){
			$this->db->where('id_album',$album);
		}
		return $this->db->get();
	}

	public function totalfoto($id_album){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->where('id_album', $id_album);
		return $this->db->get()->num_rows();
	}

	public function addalbum($album){
		$this->db->flush_cache();
		$data = array(
        'album' => $album
		);

		if($this->db->insert('album', $data)){
			return true;
		}
	}

	public function lastalbum(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('album');
		$this->db->order_by('id', 'DESC');
		$this->db->limit('1');
		return $this->db->get();
	}

	public function addfoto($file, $id_album, $date_upload){
		$this->db->flush_cache();
		$data = array(
        'file' => $file,
        'id_album' => $id_album,
        'date_upload' => $date_upload
		);

		if($this->db->insert('foto', $data)){
			return true;
		}
	}

	public function delfoto($id){
		$this->db->flush_cache();
		if($this->db->delete('foto', array('id' => $id))){
			return true;
		}
	}

	public function delalbum($id){
		$this->db->flush_cache();
		if($this->db->delete('album', array('id' => $id))){
			return true;
		}
	}

	public function delslide($id){
		$this->db->flush_cache();
		if($this->db->delete('slide', array('id' => $id))){
			return true;
		}
	}
}
  ?>
