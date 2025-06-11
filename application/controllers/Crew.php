<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crew extends CI_Controller {

public function __construct(){
  parent::__construct();
  $this->load->model('crew_model');
}

public function index()
{

  $name_theme=$this->theme_model->actived_theme();
  $data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";
  $data['crew']=$this->crew_model->crewaktif();
  $this->load->view('head', $data);
  $this->load->view('crew', $data);
  $this->load->view('footer');
}


}
