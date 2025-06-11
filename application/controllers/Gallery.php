<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {



public function __construct(){
  parent::__construct();
  $this->load->model('gallery_model');
}






public function index()
{
  $data['page']="gallery";
  $data['album']=$this->gallery_model->album();
  $this->load->view('head', $data);
  $this->load->view('gallery', $data);
  $this->load->view('footer');
}

public function album($cat=FALSE)
{
    $data['page']="gallery";
  $data['album']=$this->gallery_model->album();
  if($cat!=FALSE){
    if($this->gallery_model->foto($cat)->num_rows()==0){
      redirect(base_url('gallery'));
    }else{
    $data['foto']=$this->gallery_model->foto($cat);

    $this->load->view('head', $data);
    $this->load->view('image', $data);
  }
  }else{  
    $this->load->view('head', $data);
    $this->load->view('gallery', $data);
  }
  
  $this->load->view('footer');

}
}
