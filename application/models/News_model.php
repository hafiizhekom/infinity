<?php
class News_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function articles(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('berita');
		return $this->db->get();
	}

	public function tempgetidberitaacara($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('berita_acara');
		$this->db->where('id_acara', $id);
		return $this->db->get();
	}

	public function event($limit=FALSE, $id=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('berita_acara');
		if($id!=FALSE){
			$this->db->where('id',$id);
		}
		if($limit!=FALSE){
			$this->db->limit($limit);
		}
		return $this->db->get();
	}

	public function news($limit=FALSE, $id=FALSE, $offset=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('berita');
		if($id!=FALSE){
			$this->db->where('id',$id);
		}
		if($limit!=FALSE){
			if($offset!=FALSE){
			$this->db->limit($limit,$offset);
				}else{
			$this->db->limit($limit);
				}
		}
		$this->db->order_by('id', 'DESC');
		return $this->db->get();
	}

	public function articles1(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit(4, 0);
		$this->db->order_by('id', 'DESC');
		return $this->db->get();
	}

	public function articles2(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit(4, 4);
		$this->db->order_by('id', 'DESC');
		return $this->db->get();
	}

	public function editarticles($id, $judul, $isi, $type){
		$this->db->flush_cache();
			$data = array(
	        'judul' => $judul,
	        'isi' => $isi
			);
		$this->db->where('id', $id);
		if($type=="none"){
			if($this->db->update('berita', $data)){
				return true;
			}
		}else if($type=="acara"){
			if($this->db->update('berita_acara', $data)){
				return true;
			}
		}else if($type=="rapat"){
			if($this->db->update('berita_rapat', $data)){
				return true;
			}
		}
	}

	public function addarticles($judul, $date_posted, $isi, $author){
		$this->db->flush_cache();
		$data = array(
        'judul' => $judul,
        'date_posted' => $date_posted,
        'author' => $author,
        'isi' => $isi
		);
		if($this->db->insert('berita', $data)){
			return true;
		}
	}

	public function addarticlesacara($judul, $date_posted, $isi, $author, $parent_id){
		$this->db->flush_cache();
		$data = array(
        'judul' => $judul,
        'date_posted' => $date_posted,
        'author' => $author,
        'isi' => $isi,
        'id_acara' => $parent_id
		);
		if($this->db->insert('berita_acara', $data)){
			return true;
		}
	}

	public function addarticlesrapat($judul, $date_posted, $isi, $author, $parent_id){
		$this->db->flush_cache();
		$data = array(
				'judul' => $judul,
				'date_posted' => $date_posted,
				'author' => $author,
				'isi' => $isi,
				'id_rapat' => $parent_id
		);
		if($this->db->insert('berita_rapat', $data)){
			return true;
		}
	}

	public function berita($type=FALSE, $id=FALSE){
		$this->db->flush_cache();
		if($type==FALSE && $id==FALSE){
		return $this->db->query("SELECT id, judul, isi, author, date_posted, '0' as id_events, 'none' as type_events FROM berita UNION SELECT id, judul, isi, author, date_posted, id_acara as id_events, 'acara' as type_events FROM berita_acara UNION SELECT id, judul, isi, author, date_posted, id_rapat as id_events, 'rapat' as type_events FROM berita_rapat");
		}else{

			if($type!=FALSE && $id==FALSE){
				if($type=="none"){
					$this->db->select('*');
					$this->db->select('0 as id_events');
					$this->db->select('\'none\' as type_events');
					$this->db->from('berita');
					return $this->db->get();
				}else if($type=="acara"){
					$this->db->select('*');
					$this->db->select('id_acara as id_events');
					$this->db->select('\'acara\' as type_events');
					$this->db->from('berita_acara');
					return $this->db->get();
				}else if($type=="rapat"){
					$this->db->select('*');
					$this->db->select('id_rapat as id_events');
					$this->db->select('\'rapat\' as type_events');
					$this->db->from('berita_rapat');
					return $this->db->get();
				}
			}else{
				if($type=="none"){
					$this->db->select('*');
					$this->db->select('0 as id_events');
					$this->db->select('\'none\' as type_events');
					$this->db->from('berita');
					$this->db->where('id',$id);
					return $this->db->get();
				}else if($type=="acara"){
					$this->db->select('*');
					$this->db->select('id_acara as id_events');
					$this->db->select('\'acara\' as type_events');
					$this->db->from('berita_acara');
					$this->db->where('id',$id);
					return $this->db->get();
				}else if($type=="rapat"){
					$this->db->select('*');
					$this->db->select('id_rapat as id_events');
					$this->db->select('\'rapat\' as type_events');
					$this->db->from('berita_rapat');
					$this->db->where('id',$id);
					return $this->db->get();
				}
			}
		}
	}

	public function delberita($id){
		$this->db->flush_cache();
		$this->db->delete('berita', array('id' => $id)); 
	}

	public function delberitaacara($id){
		$this->db->flush_cache();
		$this->db->delete('berita_acara', array('id' => $id)); 
	}

	public function delberitarapat($id){
		$this->db->flush_cache();
		$this->db->delete('berita_rapat', array('id' => $id)); 
	}

	public function searchnews($keyword=FALSE, $date1=FALSE, $date2=FALSE){
		$this->db->flush_cache();
		if($keyword==FALSE){
			$keyword="";
		}

		if($date1!=FALSE && $date2!=FALSE){
			$query =	$this->db->query("SELECT * FROM `berita` WHERE (`judul` LIKE '%".$keyword."%' OR `author` LIKE '%".$keyword."%' OR `isi` LIKE '%".$keyword."%') AND (`date_posted` BETWEEN '".$date1."' AND '".$date2."')");
		}else{
			$query = $this->db->query("SELECT * FROM `berita` WHERE `judul` LIKE '%".$keyword."%' OR `author` LIKE '%".$keyword."%' OR `isi` LIKE '%".$keyword."%'");
		}

		if(!$query){
			return false; 
			
		}else{
			return $query;
		}

	}

	public function searchacara($keyword=FALSE, $date1=FALSE, $date2=FALSE){
		$this->db->flush_cache();
		if($keyword==FALSE){
			$keyword="";
		}

		if($date1!=FALSE && $date2!=FALSE){
			$query = $this->db->query("SELECT * FROM `berita_acara` WHERE (`judul` LIKE '%".$keyword."%' OR `author` LIKE '%".$keyword."%' OR `isi` LIKE '%".$keyword."%') AND (`date_posted` BETWEEN '".$date1."' AND '".$date2."')");
		}else{
			$query =   $this->db->query("SELECT * FROM `berita_acara` WHERE `judul` LIKE '%".$keyword."%' OR `author` LIKE '%".$keyword."%' OR `isi` LIKE '%".$keyword."%'");
		}

		if(!$query){
			return false;
		}else{
			return $query;
		}

	}
}
  ?>
