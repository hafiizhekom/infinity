<?php
class Theme_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function actived_theme(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('theme');
		$this->db->where('active',1);
		return $this->db->get()->result()[0]->name_theme;
	}

	public function theme(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('theme');
		return $this->db->get();
	}

	public function netralisir(){
		$this->db->flush_cache();
		$this->db->set('active',0);
		if($this->db->update('theme')){
			return true;
		}
	}

	public function changetheme($theme){
		$this->db->flush_cache();
		$this->db->set('active',1);
		$this->db->where('name_theme', $theme);
		if($this->db->update('theme')){
			return true;
		}
	}
}
  ?>
