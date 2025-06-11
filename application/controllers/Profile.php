<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

public function __construct(){
  parent::__construct();
  $this->load->model('profile_model');
}

public function index()
{

  $name_theme=$this->theme_model->actived_theme();
  $data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";


  if($this->profile_model->checkingprofile()->num_rows()!=0){
  	$data['visi']=$this->profile_model->profile()->result()[0]->visi;
  	$data['misi']=$this->profile_model->profile()->result()[0]->misi;
  	$data['rencana']=$this->profile_model->profile()->result()[0]->program_kerja;
  }
  $this->load->view('head', $data);
  $this->load->view('profile');
  $this->load->view('footer');
}
}
