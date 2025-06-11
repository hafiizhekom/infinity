	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
		$this->load->model('slide_model');
		$this->load->model('feedback_model');
		$this->load->model('news_model');
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
		$data['slide']=$this->slide_model->slide();
		$this->addfeedback();
		$name_theme=$this->theme_model->actived_theme();
		$data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";

		$data['articles']=$this->news_model->news(8);
		$data['articles1']=$this->news_model->articles1();
		$data['articles2']=$this->news_model->articles2();

		$this->load->view('head-index', $data);
		$this->load->view('home', $data);
		$this->load->view('footer-index');
	}

	private function addfeedback(){
		if(!empty($this->input->post('saran'))){
			$nama=$this->input->post('nama');
			$email = $this->input->post('email');
			$telepon = $this->input->post('phone');
			$isi = $this->input->post('isi');

			
			echo $telepon;
			$this->load->library('mymail');
			

			
			if($this->feedback_model->addfeedback($nama, $email, $isi, $telepon)){
				if($this->mymail->mailfeedbacknotif($nama, $email, $isi)==true){
								$this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengirim feedback</div>");
				                                header("Location: ?page=okcomputer");
                            }
			}
		}
	}
}
