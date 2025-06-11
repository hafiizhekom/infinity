	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('slide_model');
		$this->load->model('news_model');
		$this->load->model('admin_model');
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

		$name_theme=$this->theme_model->actived_theme();
		$data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";

		$data['articles']=$this->news_model->news(8);

		$this->load->view('head', $data);
		$this->load->view('news', $data);
		$this->load->view('footer');
	}

	public function page($id=FALSE)
	{
		

		if($id==FALSE){
  if($this->news_model->news()->num_rows()!=0)
  {


    $data['jurnal']=$this->news_model->news();
    $this->load->view('head', $data);
    $this->load->view('news',$data);
    $this->load->view('footer');
  }

}else{
    $id=str_replace("-", "", $id);
    if($this->news_model->news(false, $id)->num_rows()!=0){
    $data['jurnal']=$this->news_model->news(false, $id);
    $this->load->view('head', $data);
    $this->load->view('news-detail',$data);
    $this->load->view('footer');
    }else{
      redirect(base_url('/news'));
    }
  }
	}

	public function limit($limit=FALSE, $offset=FALSE)
	{
		if($offset==FALSE){$offset=0;}
		$data['slide']=$this->slide_model->slide();

		$name_theme=$this->theme_model->actived_theme();
		$data['theme']="<link href='css/theme-color/".$name_theme."/extension.css' rel='stylesheet'><link href='css/theme-color/".$name_theme."/bootstrap.css' rel='stylesheet'>";
		if($limit!=FALSE){
			$limit=str_replace("-", "", $limit);
			$data['articles']=$this->news_model->news($limit, false, $offset);

		}else{
			$data['articles']=$this->news_model->news(8);
		}

		$this->load->view('head', $data);
		$this->load->view('news', $data);
		$this->load->view('footer');
	}

	private function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

	public function search(){
		$keyword=$this->input->get('keyword');
		$date1=$this->input->get('date1');
		$date2=$this->input->get('date2');
		if($this->validateDate($date1) && $this->validateDate($date2)){
		if($this->news_model->searchnews($keyword, $date1, $date2)!=false){
		$data['searchdata']=$this->news_model->searchnews($keyword, $date1, $date2);
		}else{
			redirect(base_url());
		}
		}else{
			redirect(base_url());
		}
		$this->load->view('head');
		$this->load->view('news-search', $data);
		$this->load->view('footer');
	}
}
