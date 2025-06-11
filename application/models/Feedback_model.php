<?php
class Feedback_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

  public function feedback($email=FALSE, $limit=FALSE){
  $this->db->flush_cache();
  $this->db->select('*');
  $this->db->from('saran_kritik');
  //$this->db->join('reply_saran_kritik', 'saran_k')
  if($email!=FALSE){

    $this->db->where('email', $email);
    if($limit!=FALSE){
      $this->db->limit($limit);
    }
    $this->db->order_by('id', 'DESC');
  }
	return $this->db->get();
  }

  public function feedbackextension($email, $limit){
    $this->db->flush_cache();
    return $this->db->query("SELECT * FROM (SELECT `email` as dari, '' as kepada, isi, date_send  FROM `saran_kritik` UNION SELECT `username` as dari, `email` as kepada, isi, date_send FROM `reply_saran_kritik` ) as feedback WHERE feedback.dari = '".$email."' OR feedback.kepada= '".$email."' ORDER BY date_send desc LIMIT ".$limit."");
  }



  public function addfeedback($nama, $email, $isi, $telepon){
    $this->db->flush_cache();
    $data = array(
        'nama' => $nama,
        'email' => $email,
        'isi' => $isi,
        'telepon' => $telepon,
        'date_send' => date('Y-m-d H:i')
    );
    
    if($this->db->insert('saran_kritik', $data)){
      return true;
    }
  }

  public function replyfeedback($username, $email, $isi){
    $this->db->flush_cache();
    $data = array(
        'username' => $username,
        'email' => $email,
        'isi' => $isi,
        'date_send' => date('Y-m-d H:i')
    );
    
    if($this->db->insert('reply_saran_kritik', $data)){
      return true;
    }
  }




	public function feedbacknotif(){
  $this->db->flush_cache();
  $this->db->select('*');
  $this->db->from('saran_kritik');
	$this->db->where('check', 0);
	return $this->db->get();
  }

  public function whofeedback($limit){
  $this->db->flush_cache();
  $this->db->select('email');
  $this->db->distinct();
  $this->db->from('saran_kritik');
  $this->db->order_by('date_send',  'DESC');
  $this->db->limit($limit);
  return $this->db->get();
  }

  public function lastfeedback($email){
  $this->db->flush_cache();
  $this->db->select('*');
  $this->db->from('saran_kritik');
  $this->db->where('email', $email);
  $this->db->limit(1);
  return $this->db->get();
  }

  public function clearfeedback($email){
    $this->db->flush_cache();
    $data = array(
        'check' => 1
    );
    $this->db->where('email', $email);


    if($this->db->update('saran_kritik', $data)){
      return true;
    }
  }

   public function clearfeedbackall(){
    $this->db->flush_cache();
    $data = array(
        'check' => 1
    );


    if($this->db->update('saran_kritik', $data)){
      return true;
    }
  }
}
