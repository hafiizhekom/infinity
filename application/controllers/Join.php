	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('registration_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->registration();
		$this->load->view('head');
		$this->load->view('join');
		$this->load->view('footer');

	}

	private function registration(){
		if(!empty($this->input->post('registration'))){
			$nim=$this->input->post('nim');
			$nama=$this->input->post('nama');
			$email=$this->input->post('email');
			$telepon=$this->input->post('phone');
			$email=$this->input->post('email');
			$motivasi=$this->input->post('motivasi');
			$ttl=$this->input->post('ttl');
			if($this->registration_model->register($nim, $nama, $telepon, $email, $motivasi, $ttl)){

				$message=" Terdapat pendaftaran baru dengan Nama ".$nama." dan Email ".$email.". Untuk lebih lanjut silahkan cek di admin panel website INFINITY";
			
				$this->load->library('mymail');

				if($this->mymail->mailjoin($message)==true){
				

				$this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil register</div>");
					header("Location: ?page=okomputer");
				}else{
					$this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal register</div>");
					header("Location: ?page=okcomputer");
				}
			}
		}
	}
}
