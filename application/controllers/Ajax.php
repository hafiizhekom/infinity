<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

public function __construct(){
  parent::__construct();
  $this->load->model('messages_model');
  $this->load->model('crew_model');
  $this->load->model('feedback_model');
  $this->load->model('acara_model'); 
  $this->load->model('rapat_model');
  $this->load->model('arsip_model');
  $this->load->model('dana_model');
  $this->load->model('news_model');
  $this->load->model('admin_model');
}



public function index()
{
  $data['heading']="Are you lost dude?";
  $data['message']="Page not found";
  $this->load->view('errors/html/error_404', $data);
}

public function checkingUsername(){
  if(!empty($this->input->post('userdataname'))){
    if($this->admin_model->profile($this->input->post('userdataname'))->num_rows()!=0){
      echo "1";
    }else{
      echo "0";
    }
  }else{
    $this->load->view('errors/html/error_404', $data);
  }
}

public function getChatdetail(){
  if(!empty($this->input->post('chat_limit'))){

    $to = $this->input->post('to_username');
  if($this->messages_model->messagesdetail($to, $this->input->post('chat_limit'))->num_rows()!=0){
    
  foreach ($this->messages_model->messagesdetail($to, $this->input->post('chat_limit'))->result() as $key => $value) {  
    
    $dari = $this->admin_model->profile($value->from)->result()[0]->nama;
    if($key!=sizeof($this->messages_model->messagesdetail($to, $this->input->post('chat_limit'))->result())-1){
    echo "<li style='border-bottom:1px solid #DDD;'><a style='color:black;''>
      <h4 class='media-heading'>".$dari."</h4>
    ".$value->isi."
  <br><div class='text-muted'>".nice_date($value->date_send, 'd F Y H:i')."</div></a></li>";
}else{
   echo "<li style='border-bottom:1px solid #DDD;' id='lastdetail'><a style='color:black;''>
      <h4 class='media-heading'>".$dari."</h4>
    ".$value->isi."
  <br><div class='text-muted'>".nice_date($value->date_send, 'd F Y H:i')."</div></a></li>";
}
    }
  }else{
    //echo "<li class='text-center'><a>Tidak ada pesan</a></li>";
  }
}else{
  $this->load->view('errors/html/error_404');
}
}

public function getFeedback(){
  if(!empty($this->input->post('feedback_limit'))){
    $limit = $this->input->post('feedback_limit');
    if($this->feedback_model->whofeedback($limit)->num_rows()!=0){
      foreach ($this->feedback_model->whofeedback($limit)->result() as $key => $value) {
        $lastmessage = $this->feedback_model->lastfeedback($value->email);
        foreach ($lastmessage->result() as $key => $value) {
          $email = $value->email;
          $email = str_replace(".", "_dot_", $email);
          $email = str_replace("@", "_at_", $email);

          
          echo "<li style='border-bottom:1px solid #DDD;'><a style='color:black;' href='".base_url(ADMIN_PAGE.'/feedback/'.$email)."'>
                    <h4 class='media-heading'>".$value->email."</h4>
                  ".$value->isi."
                <br><div class='text-muted'>".nice_date($value->date_send, 'd F Y')." ".nice_date($value->date_send, 'H:i')."</div></a></li>";
        }
        
      }
    }else{
       echo "<li style='border-bottom:1px solid #DDD;'><a style='color:black;' href='#'>
                    <h4 class='media-heading text-center'>Tidak ada feedback</h4></a></li>";
    }
  }else{
    $this->load->view('errors/html/error_404');
  }
}

public function getFeedbackdetail(){
  
  if(!empty($this->input->post('feedback_limit'))){
  $limit = $this->input->post('feedback_limit');

  $email = $this->input->post('email');
  $email=str_replace("_dot_", ".", $email);
  $email=str_replace("_at_", "@", $email);
    if($this->feedback_model->feedbackextension($email, $limit)->num_rows()!=0){
      foreach ($this->feedback_model->feedbackextension($email, $limit )->result() as $key => $value) {
         

                if($key!=sizeof($this->feedback_model->feedbackextension($email, $limit )->result())-1){
                  echo "<li style='border-bottom:1px solid #DDD;padding:2px;'>
                    <h4 class='media-heading'>".$value->dari."</h4>
                  ".$value->isi."
                <br><div class='text-muted'>".nice_date($value->date_send, 'd F Y')." ".nice_date($value->date_send, 'H:i')."</div></li>";
              }else{
                echo "<li style='border-bottom:1px solid #DDD;padding:2px;' id='lastdetail'>
                    <h4 class='media-heading'>".$value->dari."</h4>
                  ".$value->isi."
                <br><div class='text-muted'>".nice_date($value->date_send, 'd F Y')." ".nice_date($value->date_send, 'H:i')."</div></li>";
              }
        
      }
    }else{ 
         echo "<li style='border-bottom:1px solid #DDD;'><a style='color:black;' href='#'>
                    <h4 class='media-heading text-center'>Tidak ada feedback</h4></a></li>";
    }
   }else{
    $this->load->view('errors/html/error_404');
   }
}

public function getChat(){
  if(!empty($this->input->post('chat_limit'))){
  if($this->messages_model->whomessages($this->input->post('chat_limit'))->num_rows()!=0){
    $namaselection = array();
  foreach ($this->messages_model->whomessages($this->input->post('chat_limit'))->result() as $key => $value) {
      
     if($value->from!=$this->session->userdata('username')){
        if(!in_array($value->from, $namaselection)){
          array_push($namaselection, $value->from);
        }
     }

     if($value->to!=$this->session->userdata('username')){
      if(!in_array($value->to, $namaselection)){
          array_push($namaselection, $value->to);
        }
     }
   }
  


  

  foreach ($namaselection as $key => $value) {
    $headermessages = $this->messages_model->headmessages($value)->result()[0];

    $isi = $headermessages->isi;
    $whoisthis = $this->admin_model->profile($value)->result()[0];
    if($key==sizeof($namaselection)-1){
      echo "<li><a style='color:black;' href='".base_url(ADMIN_PAGE.'/messages/'.$whoisthis->username)."'>
      <h4 class='media-heading'>".$whoisthis->nama."</h4>
    ".$isi."
  </a></li>";
    }else{
    echo "<li style='border-bottom:1px solid #DDD;'><a style='color:black;' href='".base_url(ADMIN_PAGE.'/messages/'.$whoisthis->username)."'>
      <h4 class='media-heading'>".$whoisthis->nama."</h4>
    ".$isi."
  </a></li>";
}
  }

  
}else{
  echo "<li class='text-center'><a>Tidak ada pesan</a></li>";
}
}else{
  echo "OOO".$this->input->post('chat_limit');
}
}


public function getAcaraOptionSelect(){
  $acara = $this->acara_model->acara();
  if($acara->num_rows()!=0){
    echo "<div class='form-group'><select class='form-control' name='idevents'>";
    foreach ($acara->result() as $key => $value) {
      echo "<option value='".$value->id."'>".$value->nama_acara."</option>";
    }
    echo "</select></div>";
  }else{
    echo "<div class='form-group'><select class='form-control' name='idevents' required=''><option value=''>Tidak ada acara</option></select></div>";
  }
}

public function getRapatOptionSelect(){
  $acara = $this->rapat_model->rapat();
  if($acara->num_rows()!=0){
    echo "<div class='form-group'><select class='form-control' name='idevents'>";
    foreach ($acara->result() as $key => $value) {
      echo "<option value='".$value->id."'>".$value->topik."</option>";
    }
    echo "</select></div>";
  }else{
    echo "<div class='form-group'><select class='form-control' name='idevents' required=''><option value=''>Tidak ada rapat</option></select></div>";
  }
}

public function getMessagesCounterNotif(){
  $messagesCounter=$this->messages_model->messagesnotif()->num_rows();
  if($messagesCounter>0){
    echo "<span class='badge'>".$messagesCounter."</span>";
  }
}

public function getMessagesNotif(){
  $messages=$this->messages_model->messagesnotif();
  if($messages->num_rows()>0){
    foreach ($messages->result() as $key => $value) {
      $from=$this->crew_model->crew($value->from);
        foreach ($from->result() as $key => $valuefrom) {
          echo "
          <li class='message-preview'>
            <a href='".base_url(ADMIN_PAGE.'/messages/'.$valuefrom->username)."'>
              <div class='media'>
                <span class='pull-left'>";

                if($valuefrom->image==""){
                    echo "<img class='media-object' src='".base_url()."/foto/default.jpg' id='chat-foto'>";  
                }else{

                  echo "<img class='media-object' src='".base_url()."/foto/".$valuefrom->image."' id='chat-foto'>";

                } 

                  echo "
                </span>
                <div class='media-body'>
                  <h5 class='media-heading'><strong>".$valuefrom->nama."</strong>
                                                  </h5>
                  <p class='small text-muted'>
                    <span class='glyphicon glyphicon-time' aria-hidden='true'></span> ".nice_date($value->date_send, 'd-M-Y').", ".nice_date($value->date_send,
                    'H:i')."</p>
                  <p>".substr($value->isi, 0, 25)."</p>
                </div>
              </div>
            </a>
          </li>";
        }
    }
    echo "<li class='message-footer'><a href='".base_url(ADMIN_PAGE.'/messages/_-_/clearall')."'>Clear All</a></li>";
  }else{
    echo "<li class='message-footer'><a>Tidak ada pesan baru</a></li>";
  }
}

public function getFeedbackCounterNotif(){
  $feedbackCounter=$this->feedback_model->feedbacknotif($this->session->userdata('jabatan'))->num_rows();
  if($feedbackCounter>0){
    echo "<span class='badge'>".$feedbackCounter."</span>";
  }
}

public function getFeedbackNotif(){
  $feedback=$this->feedback_model->feedbacknotif($this->session->userdata('jabatan'));
  if($feedback->num_rows()>0){
    foreach ($feedback->result() as $key => $value) {
      $emailtemp = $value->email;
      $emailtemp = str_replace("@", "_at_", $emailtemp);
      $emailtemp = str_replace(".", "_dot_", $emailtemp);
      echo "<li class='message-preview'>
                                <a href='".base_url(ADMIN_PAGE."/feedback/".$emailtemp)."'>
                                    <div class='media'>
                                        <div class='media-body'>
                                            <h5 class='media-heading'><strong>".$value->nama." <small>".$value->email."</small></strong>
                                            </h5>
                                            <p class='small text-muted'><span class='glyphicon glyphicon-time' aria-hidden='true'></span> ".nice_date($value->date_send, 'd-M-Y').", ".nice_date($value->date_send,
                                            'H:i')."</p>
                                            <p>".substr($value->isi, 0, 25)."</p>
                                        </div>
                                    </div>
                                </a>
                            </li>";
    }
    echo "<li class='message-footer'><a href='".base_url(ADMIN_PAGE.'/feedback/_-_/clearall')."'>Clear All</a></li>";
  }else{
    echo "<li class='message-footer'>
                              <a>Tidak ada Feedback baru</a>
                          </li>";
  }
  
}


}
