<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller {

public function __construct(){
  parent::__construct();
  $this->load->model('jurnal_model');
}

public function index($id=FALSE)
{

  $name_theme=$this->theme_model->actived_theme();
  $data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";


  if($this->jurnal_model->jurnal()->num_rows()!=0)
  {


  	$data['jurnal']=$this->jurnal_model->jurnal();
  }
  $this->load->view('head', $data);
  $this->load->view('jurnal',$data);
  $this->load->view('footer');
}

public function page($id=FALSE)
{

  $name_theme=$this->theme_model->actived_theme();
  $data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";

if($id==FALSE){
  if($this->jurnal_model->jurnal()->num_rows()!=0)
  {


    $data['jurnal']=$this->jurnal_model->jurnal();
    $this->load->view('head', $data);
    $this->load->view('jurnal',$data);
    $this->load->view('footer');
  }

}else{
    $id=str_replace("-", "", $id);
    if($this->jurnal_model->jurnal($id)->num_rows()!=0){
    $data['jurnal']=$this->jurnal_model->jurnal($id);
    $this->load->view('head', $data);
    $this->load->view('jurnal-detail',$data);
    $this->load->view('footer');
    }else{
      redirect(base_url('/journal'));
    }
  }
  

}
}
