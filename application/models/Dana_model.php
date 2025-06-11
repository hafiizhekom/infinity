<?php
class Dana_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function adddana($jenis, $perihal, $jumlah, $tanggal_pembayaran, $date_posted){
		$this->db->flush_cache();
		$data = array(
        'perihal' => $perihal,
        'jenis' => $jenis,
        'jumlah' => $jumlah,
        'date_paid' => $tanggal_pembayaran,
        'date_posted' => $date_posted
		);

		if($this->db->insert('dana', $data)){
			return true;
		}
	}

	public function dana($jenis=FALSE, $bulan=FALSE, $tahun=FALSE){
		$this->db->flush_cache();

		
		
		if($bulan!=FALSE && $tahun!=FALSE){

			if($jenis=="masuk"){
				$requirement['jenis'] = "AND danawithperiode.jenis='Masuk'";
			}else if($jenis=="keluar"){
				$requirement['jenis'] = "AND danawithperiode.jenis='Keluar'";
			}else{
				$requirement['jenis'] = "";
			}

			return $this->db->query("SELECT * FROM(SELECT *, year(date_paid) as tahun, month(date_paid) as bulan FROM dana) as danawithperiode WHERE danawithperiode.tahun = '".$tahun	."' AND danawithperiode.bulan = '".$bulan."' ".$requirement['jenis']."");
		}
		
		
		return null;
		}

	public function periodedana(){
		$this->db->flush_cache();
		$this->db->distinct();
		$this->db->select('year(date_paid) as tahun');
		$this->db->select('month(date_paid) as bulan');
		$this->db->from('dana');
		$this->db->order_by('tahun', 'DESC');
		return $this->db->get();

	}

	public function deldana($id){
		$this->db->flush_cache();
		$this->db->delete('dana', array('id' => $id)); 
	}
}

  ?>
