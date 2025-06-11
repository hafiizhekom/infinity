<?php
class Messages_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function messagesnotif(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->where('to', $this->session->userdata('username'));
    //$this->db->or_where('from', $this->session->userdata('username'));
    $this->db->where('check', 0);
    $this->db->order_by('date_send', 'desc');
		return $this->db->get();
	}

	public function messagesdetail($to, $limit){
		$me=$this->session->userdata('username');
		return $this->db->query("SELECT * FROM `pesan` WHERE (`from`='".$me."' OR `to`='".$me."') AND (`from`='$to' OR `to`='$to') ORDER BY `id` DESC LIMIT ".$limit."");
	}

	public function headmessages($subject){
		$this->db->flush_cache();

		return $this->db->query("SELECT * FROM pesan WHERE (`to` = '".$this->session->userdata('username')."' OR `from` = '".$this->session->userdata('username')."') AND (`to` = '".$subject."' OR `from` = '".$subject."') ORDER BY id DESC LIMIT 1");
	}

	public function whomessages($limit){
		$this->db->flush_cache();
		$this->db->select('from');
		$this->db->select('to');
		$this->db->distinct();
		$this->db->from('pesan');
		$this->db->where('to', $this->session->userdata('username'));
    	$this->db->or_where('from', $this->session->userdata('username'));
    	$this->db->limit($limit);
		return $this->db->get();
	}

	public function messages(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->where('to', $this->session->userdata('username'));
    	$this->db->or_where('from', $this->session->userdata('username'));
    	$this->db->order_by('from');
    	$this->db->order_by('to');
		return $this->db->get();
	}

	public function addmessages($from, $to, $isi, $date_send){
		$this->db->flush_cache();
		$data = array(
        'from' => $from,
        'to' => $to,
        'isi' => $isi,
        'date_send' => $date_send
		);

		if($this->db->insert('pesan', $data)){
			return true;
		}
	}

	public function clearmessage($username){
		$this->db->flush_cache();
		$data = array(
        'check' => 1
		);
		$this->db->where('from', $username);
		$this->db->where('to', $this->session->userdata('username'));


		if($this->db->update('pesan', $data)){
			return true;
		}
	}

	public function clearmessagesall(){
		$this->db->flush_cache();
		$data = array(
        'check' => 1
		);
		$this->db->where('to', $this->session->userdata('username'));


		if($this->db->update('pesan', $data)){
			return true;
		}
	}
}
  ?>
