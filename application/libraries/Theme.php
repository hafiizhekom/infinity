<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme{

public function __construct(){
  $this->CI =& get_instance();
  $this->CI->load->model('theme_model');
}

public function current_theme(){
  $name_theme=$this->CI->theme_model->actived_theme();
  return "<link href='".base_url()."css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='".base_url()."css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";
}

public function current_theme_admin(){
  $name_theme=$this->CI->theme_model->actived_theme();
  return "<link href='".base_url()."css/theme-color/".$name_theme."/extension.css' rel='stylesheet'>
	<link href='".base_url()."css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>
	<link href='".base_url()."css/theme-color/".$name_theme."/sb-admin.css' rel='stylesheet'>
  <link href='".base_url()."css/styleadmin.css' rel='stylesheet'>";
}
}
