<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminkalbis3972 extends CI_Controller
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('messages_model');
        $this->load->model('feedback_model');
        $this->load->model('news_model');
        $this->load->model('crew_model');
        $this->load->model('gallery_model');
        $this->load->model('dana_model');
        $this->load->model('acara_model');
        $this->load->model('arsip_model');
        $this->load->model('log_model');
        $this->load->model('absen_model');
        $this->load->model('rapat_model');
        $this->load->model('slide_model');
        $this->load->model('profile_model');
        $this->load->model('registration_model');
        $this->load->model('jurnal_model');

    }

    public function testmail(){
        $this->load->library('mymail');
        $this->mymail->testing();
    }



    private $admin_page=ADMIN_PAGE;


    private function setvision(){
        if(!empty($this->input->post('savevision'))){
            $visi=$this->input->post('vision');
            if($this->profile_model->checkingprofile()->num_rows()==0){
                $this->profile_model->newprofile();
            }

            if($this->profile_model->setvisi($visi, $this->profile_model->checkingprofile()->result()[0]->id)){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menyimpan visi</div>");
                                header("Location: ?page=okcomputer");
            }



        }

    }

    private function setmision(){
        if(!empty($this->input->post('savemision'))){
            $misi=$this->input->post('mision');
            if($this->profile_model->checkingprofile()->num_rows()==0){
                $this->profile_model->newprofile();
            }

            if($this->profile_model->setmisi($misi, $this->profile_model->checkingprofile()->result()[0]->id)){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menyimpan misi</div>");
                                header("Location: ?page=okcomputer");
            }



        }

    }

    private function setrencana(){
        if(!empty($this->input->post('saverencana'))){
            $rencana=$this->input->post('rencana');
            if($this->profile_model->checkingprofile()->num_rows()==0){
                $this->profile_model->newprofile();
            }

            if($this->profile_model->setrencana($rencana, $this->profile_model->checkingprofile()->result()[0]->id)){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menyimpan rencana kerja</div>");
                                header("Location: ?page=okcomputer");
            }



        }

    }

    public function toZip()
    {
        $this->load->library('zip');
        if(!empty($this->input->post('filesexport'))){


            foreach ($this->input->post('filesexport') as $key => $value) {
                $name = explode('/',$value);
                $namefile = $name[sizeof($name)-1];
                $titlefile=$this->arsip_model->exportgetTitle($namefile)->result()[0]->title;
                $ext = pathinfo($namefile, PATHINFO_EXTENSION);
                $titlefileexport = $titlefile.".".$ext;
                $this->zip->add_data($titlefileexport, file_get_contents($value));


            }

        }
        $this->zip->download('arsip.zip');

    }

    public function toZipJurnal()
    {
        $this->load->library('zip');
        if(!empty($this->input->post('filesexport'))){


            foreach ($this->input->post('filesexport') as $key => $value) {
                 $name = explode('/',$value);
                $namefile = $name[sizeof($name)-1];
                $titlefile=$this->jurnal_model->jurnalfile($namefile)->result()[0]->title;
                $ext = pathinfo($namefile, PATHINFO_EXTENSION);
                $titlefileexport = $titlefile.".".$ext;
                $this->zip->add_data($titlefileexport, file_get_contents($value));


            }

        }
        $this->zip->download('jurnal.zip');

    }

    public function toWordRapat($id){ 
        $data = $this->rapat_model->rapat($id)->result()[0];
                $topik = $data->topik;
                $keterangan = $data->keterangan;
                $tempat = $data->tempat;
                $tanggal = nice_date($data->waktu, 'd F Y');
                $time = nice_date($data->waktu, 'H:i');


                $this->load->library('word');
                $section = $this->word->createSection(array('orientation'=>'potrait'));
                //$section->addText('Hello World!');
                //$section->addTextBreak(1);
                        
                //$section->addText('I am inline styled.', array('name'=>'Verdana', 'color'=>'006699'));
                //$section->addTextBreak(1);
                        
                $section->addImage(FCPATH.'/image/logo/logo.png', array('width'=>90, 'height'=>60, 'align'=>'center'));

                $this->word->addParagraphStyle('centered', array('align'=>'center', 'spaceAfter'=>10));
                $this->word->addParagraphStyle('left', array('align'=>'left', 'spaceAfter'=>10));
                $this->word->addParagraphStyle('right', array('align'=>'right', 'spaceAfter'=>10));
                $section->addText('INFINITY', array('name'=>'Calibri', 'color'=>'006699', 'size'=>25), 'centered');
                $section->addText('Himpunan Mahasiswa Informatika Kalbis Insitute',  array('name'=>'Calibri', 'size'=>14), 'centered');
                $section->addText('Address: Jl. Pulo Mas Selatan Kav. 22, RT. 4 / RW. 9, Kayu Putih, Pulo Gadung, Jakarta Timur, 13210, Indonesia',  array('name'=>'Calibri', 'size'=>11), 'centered');
                $section->addTextBreak(1);
                $section->addTextBreak(1);
                 $section->addText($keterangan,  array('name'=>'Calibri', 'size'=>12), 'left');
                $section->addText('Sehubungan akan dilaksanakan rapat '.$topik.', saya selaku Ketua Himpunan Mahasiswa Informatika mengundang para anggota himpunan untuk hadir pada: ',  array('name'=>'Calibri', 'size'=>12), 'left');
                $section->addTextBreak(1);

                $styleTable = array('borderSize'=>6);
                //$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');
                        
                // Define cell style arrays
                $styleCell = array('valign'=>'center');
                //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
                        
                // Define font style for first row
                $fontStyle = array('bold'=>true, 'align'=>'center');
                        
                // Add table style
                $this->word->addTableStyle('tableUndangan', $styleTable);
                        
                // Add table
                $table = $section->addTable('tableUndangan');

                    $table->addRow();
                    $table->addCell(4500, $styleCell)->addText(" Tanggal");
                    $table->addCell(4500, $styleCell)->addText(" ".$tanggal);

                    $table->addRow();
                    $table->addCell(4500, $styleCell)->addText(" Waktu");
                    $table->addCell(4500, $styleCell)->addText(" ".$time);

                    $table->addRow();
                    $table->addCell(4500, $styleCell)->addText(" Tempat");
                    $table->addCell(4500, $styleCell)->addText(" ".$tempat);

                    $section->addTextBreak(1);
                    $section->addTextBreak(1);
                    $section->addTextBreak(1);
                    $section->addText('Demikian surat undangan ini kami sampaikan, atas kehadirannya kami ucapkan terima kasih.',  array('name'=>'Calibri', 'size'=>12), 'left');


                $section->addTextBreak(1);
                $section->addTextBreak(1);
                    $section->addText('KETUA INFINITY.',  array('name'=>'Calibri', 'size'=>12, 'bold'=>true, 'spaceAfter'=>1000), 'right');
                    $section->addImage(FCPATH.'/image/signature_ketua.png', array('width'=>90, 'height'=>60, 'align'=>'right'));
                    $section->addText('Patrick Wanggai.',  array('name'=>'Calibri', 'size'=>12, 'bold'=>true, 'spaceAfter'=>1000), 'right'); 

                $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
                $filename=$topik.'.docx'; //save our document as this file name
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                 
                $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
                $objWriter->save('php://output');
    }

    public function toWordAcara($id){ 
        $data = $this->acara_model->acara($id)->result()[0];
                $acara = $data->nama_acara;
                $keterangan = $data->keterangan;
                $tempat = $data->tempat;
                $tanggal = nice_date($data->waktu, 'd F Y');
                $time = nice_date($data->waktu, 'H:i');


                $this->load->library('word');
                $section = $this->word->createSection(array('orientation'=>'potrait'));
                //$section->addText('Hello World!');
                //$section->addTextBreak(1);
                        
                //$section->addText('I am inline styled.', array('name'=>'Verdana', 'color'=>'006699'));
                //$section->addTextBreak(1);
                        
                $section->addImage(FCPATH.'/image/logo/logo.png', array('width'=>90, 'height'=>60, 'align'=>'center'));

                $this->word->addParagraphStyle('centered', array('align'=>'center', 'spaceAfter'=>10));
                $this->word->addParagraphStyle('left', array('align'=>'left', 'spaceAfter'=>10));
                $this->word->addParagraphStyle('right', array('align'=>'right', 'spaceAfter'=>10));
                $section->addText('INFINITY', array('name'=>'Calibri', 'color'=>'006699', 'size'=>25), 'centered');
                $section->addText('Himpunan Mahasiswa Informatika Kalbis Insitute',  array('name'=>'Calibri', 'size'=>14), 'centered');
                $section->addText('Address: Jl. Pulo Mas Selatan Kav. 22, RT. 4 / RW. 9, Kayu Putih, Pulo Gadung, Jakarta Timur, 13210, Indonesia',  array('name'=>'Calibri', 'size'=>11), 'centered');
                $section->addTextBreak(1);
                $section->addTextBreak(1);
                 $section->addText($keterangan,  array('name'=>'Calibri', 'size'=>12), 'left');
                $section->addText('Sehubungan akan dilaksanakan acara '.$acara.', kami selaku Himpunan Mahasiswa Informatika mengundang teman - teman untuk hadir pada: ',  array('name'=>'Calibri', 'size'=>12), 'left');
                $section->addTextBreak(1);

                $styleTable = array('borderSize'=>6);
                //$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');
                        
                // Define cell style arrays
                $styleCell = array('valign'=>'center');
                //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
                        
                // Define font style for first row
                $fontStyle = array('bold'=>true, 'align'=>'center');
                        
                // Add table style
                $this->word->addTableStyle('tableUndangan', $styleTable);
                        
                // Add table
                $table = $section->addTable('tableUndangan');

                    $table->addRow();
                    $table->addCell(4500, $styleCell)->addText(" Tanggal");
                    $table->addCell(4500, $styleCell)->addText(" ".$tanggal);

                    $table->addRow();
                    $table->addCell(4500, $styleCell)->addText(" Waktu");
                    $table->addCell(4500, $styleCell)->addText(" ".$time);

                    $table->addRow();
                    $table->addCell(4500, $styleCell)->addText(" Tempat");
                    $table->addCell(4500, $styleCell)->addText(" ".$tempat);

                    $section->addTextBreak(1);
                    $section->addTextBreak(1);
                    $section->addTextBreak(1);
                    $section->addText('Demikian surat undangan ini kami sampaikan, atas kehadirannya kami ucapkan terima kasih.',  array('name'=>'Calibri', 'size'=>12), 'left');


                $section->addTextBreak(1);
                $section->addTextBreak(1);
                    $section->addText('KETUA INFINITY.',  array('name'=>'Calibri', 'size'=>12, 'bold'=>true, 'spaceAfter'=>1000), 'right');
                    $section->addImage(FCPATH.'/image/signature_ketua.png', array('width'=>90, 'height'=>60, 'align'=>'right'));
                    $section->addText('Patrick Wanggai.',  array('name'=>'Calibri', 'size'=>12, 'bold'=>true, 'spaceAfter'=>1000), 'right'); 

                $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
                $filename=$acara.'.docx'; //save our document as this file name
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                 
                $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
                $objWriter->save('php://output');
    }

    private function excelDana($query){
        $this->load->library('excel');
        $query = $query;
        $this->excel->set_query($query);
        $this->excel->set_header(array('Perihal', 'Jenis', 'Jumlah', 'Date'));
        $this->excel->set_column(array('perihal', 'jenis', 'jumlah', 'date_paid'));
        $this->excel->set_width(array(30, 10, 20, 13));
        $this->excel->exportTo2007('Dana '.nice_date('2000-'.$this->uri->segment(3).'-01', 'F').' '.$this->uri->segment(4));

    }
    private function editcrew(){

        if(!empty($this->input->post('edit_crew'))){
            
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_anggota');
            $id_jabatan = $this->input->post('sebagai_anggota');
            $id_crew = $this->input->post('jabatan_anggota');
            $config['upload_path']          = './foto';

            $config['filename']             =$id;
            $config['encrypt_name']         = TRUE;
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 10000;
            if($_FILES['foto_anggota']['size']==0)
                {  
                    
                   if($this->admin_model->editadmin($id, $nama, $id_jabatan, $id_crew)==true){
                                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengedit</div>");
                                header("Location: ?page=okcomputer");
                            }

                }else{

                     $this->load->library('upload', $config);
                       if ( ! $this->upload->do_upload('foto_anggota'))
                        {

                            
                             $error = array('error' => $this->upload->display_errors());
                         $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>".$error['error']."</div>");
                         header("Location: ?page=okcomputer");
                        }else{

                            
                            $data = array('upload_data' => $this->upload->data());
                             if($this->admin_model->editadmin($id, $nama, $id_jabatan, $id_crew, $data['upload_data']['file_name'])==true){
                                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengedit</div>");
                                header("Location: ?page=okcomputer");
                                
                            }
                        }
                }
        }
    }

    private function delcrew(){

        if(!empty($this->input->post('delete'))){
            
            $usernameoke = $this->input->post('username');
            if($this->admin_model->deladmin($usernameoke)==true){
                $this->session->set_flashdata('notifikasi', "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menghapus</div>");
                
            }else{
                $this->session->set_flashdata('notifikasi', "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Maaf User ini telah berjasa. User ini akan diabadikan atas jasanya. User hanya dapat dinon aktifkan</div>");
            }
        }
    }


    private function nonactivecrew(){

        if(!empty($this->input->post('nonaktif'))){
            $usernameoke = $this->input->post('username');
            if($this->admin_model->nonactive($usernameoke)){
                $this->session->set_flashdata('notifikasi', "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menonaktifkan</div>");
                header("Location: ?page=okcomputer");
            }
        }
    }

    private function activecrew(){

        if(!empty($this->input->post('aktif'))){
            $usernameoke = $this->input->post('username');
            if($this->admin_model->active($usernameoke)){
                $this->session->set_flashdata('notifikasi', "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengaktifkan</div>");
                header("Location: ?page=okcomputer");
            } 
        }
    }

    private function addcrew(){
        if(!empty($this->input->post('add_crew'))){
            $username =  $this->input->post('username_anggota');
            $nama = $this->input->post('nama_anggota');
            $password = md5($this->input->post('password_anggota'));
            $id_jabatan = $this->input->post('sebagai_anggota');
            $id_crew = $this->input->post('jabatan_anggota');

            if($this->admin_model->addadmin($username, $nama, $password, $id_jabatan, $id_crew)){
                $this->session->set_flashdata('notifikasi', "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menambah Crew</div>");
                header("Location: ?page=okcomputer");
            }
        }
    }


    private function addmessages(){
        if(!empty($this->input->post('to_username'))){
            $to=$this->input->post('to_username');
            $isi = $this->input->post('isi');
            $date_send=date('Y-m-d H:i');

            if($this->messages_model->addmessages($this->session->userdata('username'), $to, $isi, $date_send)){

            }
        }
    }

    private function delAcara(){
        if(!empty($this->input->post('id'))){
            if($this->acara_model->delacara($this->input->post('id'))){

            }else{

            }
        }
    }

    private function delRapat(){
        if(!empty($this->input->post('id'))){
            if($this->rapat_model->delrapat($this->input->post('id'))){

            }else{

            }
        }
    }


    private function delArsip(){
        $this->load->helper('file');
      if(!empty($this->input->post('id'))){
        $data  = $this->input->post('id');
        $dataexplode = explode(":", $data);
        $namafile = $dataexplode[0];
        $id = $dataexplode[1];
        $type = $dataexplode[2];
        if($type=="none"){
            $path = './archive/none/'.$namafile;
            if(file_exists($path)==true){
              unlink($path);
            }else{
              echo "File tidak ada";
            }

            $this->arsip_model->delarsip($id);

        }else if($type=="acara"){
            $path = './archive/acara/'.$namafile;
            if(file_exists($path)==true){
              unlink($path);
            }else{
              echo "File tidak ada";
            }
            $this->arsip_model->delarsipacara($id);
        }else if($type=="rapat"){
            $path = './archive/rapat/'.$namafile;
            if(file_exists($path)==true){
              unlink($path);
            }else{
              echo "File tidak ada";
            }
            $this->arsip_model->delarsiprapat($id);
        }


      }
    }

     private function deldana(){
      if(!empty($this->input->post('id'))){


            $this->dana_model->deldana($this->input->post('id'));

        }
      }

      private function editacara(){
        if(!empty($this->input->post('update_acara'))){
            $date_posted= date("Y-m-d");
            $id_acara = $this->input->post('id_acara');
            $nama_acara=$this->input->post('judul_acara');
            $keterangan=$this->input->post('keterangan_acara');
            $tanggal=$this->input->post('date_acara');
            $jam=$this->input->post('jam_acara');
            $menit=$this->input->post('menit_acara');
            $jam_total="". $jam .":". $menit .":00";
            $tempat=$this->input->post('tempat_acara');
            $datetime=$tanggal." ".$jam_total."";
            if($this->acara_model->editacara($id_acara, $nama_acara, $keterangan, $date_posted, $datetime, $tempat)==true){
                $this->session->set_flashdata('notifikasi',"<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengubah acara</div>");
                header("Location: ?page=okcomputer");
            }
            

        }
    }

    private function editrapat(){
        if(!empty($this->input->post('update_acara'))){
            $date_posted= date("Y-m-d");
            $id_acara = $this->input->post('id_acara');
            $nama_acara=$this->input->post('judul_acara');
            $keterangan=$this->input->post('keterangan_acara');
            $tanggal=$this->input->post('date_acara');
            $jam=$this->input->post('jam_acara');
            $menit=$this->input->post('menit_acara');
            $jam_total="". $jam .":". $menit .":00";
            $tempat=$this->input->post('tempat_acara');
            $datetime=$tanggal." ".$jam_total."";
            if($this->rapat_model->editrapat($id_acara, $nama_acara, $keterangan, $date_posted, $datetime, $tempat)==true){
                $this->session->set_flashdata('notifikasi',"<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengubah rapat</div>");
                header("Location: ?page=okcomputer");
            }
            

        }
    }


    private function addacara(){
        if(!empty($this->input->post('add_acara'))){
            $date_posted= date("Y-m-d");
            $nama_acara=$this->input->post('judul_acara');
            $keterangan=$this->input->post('keterangan_acara');
            $surat_pembuka=$this->input->post('kata_pembuka');
            $tanggal=$this->input->post('date_acara');
            $jam=$this->input->post('jam_acara');
            $menit=$this->input->post('menit_acara');
            $jam_total="". $jam .":". $menit .":00";
            $tempat=$this->input->post('tempat_acara');
            $datetime=$tanggal." ".$jam_total."";

            //log
            $pemberitahuan_acara=$this->session->userdata('username')." telah menambahkan Acara $nama_acara";
            $pemberitahuan_berita=$this->session->userdata('username')." telah menambahkan Berita Acara $nama_acara";
            $link_acara = base_url('acara');
            $link_berita = base_url('post');
            $link_arsip=base_url('arsip');

            //news
            $nama=$this->crew_model->crew($this->session->userdata('username'))->result()[0]->nama;
            $crew=$this->crew_model->crew($this->session->userdata('username'))->result()[0]->crew;
            $berita="".$keterangan."<br><br> Acara ". $nama_acara ." akan diadakan pada waktu dan tempat:<table class='table'><tbody><tr><td>Tanggal:</td><td>".nice_date($tanggal, 'd-M-Y')."</td></tr><tr><td>Pukul:</td><td>".$jam_total."</td></tr><tr><td>Tempat:</td><td>".$tempat."</td></tr></tbody></table><br>Kami mohon partisipasi dan kedatanganya, saya $nama selaku $crew di INFINITY. Mengucapkan terima kasih banyak";

            //add acara
            if($this->acara_model->addacara($nama_acara, $surat_pembuka, $date_posted, $datetime, $tempat)==true){
                $requirement = array(
                'nama_acara' => $nama_acara,
                'date_posted' => $date_posted,
                'waktu' => $datetime,
                'tempat' => $tempat
                );
                $idAcara=$this->acara_model->topuniqueacara($requirement)->result()[0]->id;
                $namaAcara=$this->acara_model->topuniqueacara($requirement)->result()[0]->nama_acara;
                $tglAcara=substr($this->acara_model->topuniqueacara($requirement)->result()[0]->waktu, 0, 10 );
                //add acara to berita
                if($this->news_model->addarticlesacara($nama_acara, $date_posted, $berita, $this->session->userdata('username'), $idAcara)==true){
                        //add acara, berita, ke log
                         if($this->log_model->addlog($date_posted, $pemberitahuan_acara, $link_acara)==true && $this->log_model->addlog($date_posted, $pemberitahuan_berita, $link_berita)==true){
                            //echo add_absen_acara();
                            foreach ($this->crew_model->crew()->result() as $key => $value) {
                                $this->absen_model->newabsenacara($idAcara, $value->username);
                            }

                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Acara berhasil ditambahkan</div>");
                        }else{
                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan acara</div>");
                        }
                }else{
                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan acara</div>");
                        }
            }else{
                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan acara</div>");
                        }
                        header("Location: ?page=oks");
        }
        
    }

    private function addrapat(){
        if(!empty($this->input->post('add_rapat'))){

            $date_posted= date("Y-m-d");
            $topik=$this->input->post('judul_rapat');
            $tanggal=$this->input->post('date_rapat');
            $jam=$this->input->post('jam_rapat');
            $menit=$this->input->post('menit_rapat');
            $jam_total="". $jam .":". $menit .":00";
            $tempat=$this->input->post('tempat_rapat');
            $datetime=$tanggal." ".$jam_total."";
            $keterangan=$this->input->post('keterangan_rapat');

            //log
            $pemberitahuan_rapat=$this->session->userdata('username')." telah menambahkan Rapat dengan Topik $topik";
            $pemberitahuan_berita=$this->session->userdata('username')." telah menambahkan Berita Rapat $topik";
            $link_rapat = base_url('rapat');
            $link_berita = base_url('post');
            $link_arsip=base_url('arsip');

            //news
            $nama=$this->crew_model->crew($this->session->userdata('username'))->result()[0]->nama;
            $crew=$this->crew_model->crew($this->session->userdata('username'))->result()[0]->crew;
            $berita="Rapat tentang ". $topik ." akan diadakan pada waktu dan tempat:
            <table class=''table''><tbody><tr><td>Tanggal:</td><td>".nice_date($tanggal, 'd-M-Y')."</td></tr>
            <tr><td>Pukul:</td><td>$jam_total</td></tr>
            <tr><td>Tempat:</td><td>$tempat</td></tr>
            </tbody></table><br>
            Untuk para anggota KATAR 06 segera datang pada waktu dan tempat yang telah disebutkan,
            saya ".$nama." selaku ".$crew." di KATAR 06. Mengucapkan terima kasih banyak ";

            //add rapat
            if($this->rapat_model->addrapat($topik, $keterangan, $date_posted, $datetime, $tempat)==true){
                $requirement = array(
                'topik' => $topik,
                'keterangan' => $keterangan,
                'date_posted' => $date_posted,
                'waktu' => $datetime,
                'tempat' => $tempat
                );
                $idRapat=$this->rapat_model->topuniquerapat($requirement)->result()[0]->id;
                $namaRapat=$this->rapat_model->topuniquerapat($requirement)->result()[0]->topik;
                $tglRapat=substr($this->rapat_model->topuniquerapat($requirement)->result()[0]->waktu, 0, 10 );
                //add acara to berita
                if($this->news_model->addarticlesrapat($topik, $date_posted, $berita, $this->session->userdata('username'), $idRapat)==true){
                        //add acara, berita, ke log
                        if($this->log_model->addlog($date_posted, $pemberitahuan_rapat, $link_rapat)==true && $this->log_model->addlog($date_posted, $pemberitahuan_berita, $link_berita)==true){
                            //echo add_absen_acara();
                            foreach ($this->crew_model->crew()->result() as $key => $value) {
                                $this->absen_model->newabsenrapat($idRapat, $value->username);
                            }

                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Rapat berhasil ditambahkan</div>");
                        }else{
                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan acara</div>");
                        }
                    }else{
                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan acara</div>");
                        }
            }else{
                            $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan acara</div>");
                        }
        header("Location: ?page=okcomputer");
        }
        
    }

    private function addarticles(){
        if(!empty($this->input->post('berita'))){
            if(!empty($this->input->post('post'))){
                $judul=$this->input->post('judul_post');
                $isi=$this->input->post('post');
                $date_posted=date('Y-m-d');
                $author=$_SESSION['username'];
                if($this->news_model->addarticles($judul, $date_posted, $isi, $author)==true){
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Post berhasil ditambahkan</div>");
                }else{
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan post</div>");
                }
            }
            header("Location: ?page=okcomputer");
        }
        
    }

    private function editarticles(){
        if(!empty($this->input->post('edit'))){
            if(!empty($this->input->post('postedit'))){
                $judul=$this->input->post('judul_post');
                $isi=$this->input->post('postedit');
                $id=$this->input->post('idpost');
                $type=$this->input->post('typepost');
                $date_posted=date('Y-m-d');
                $author=$_SESSION['username'];
                if($this->news_model->editarticles($id, $judul, $isi, $type)==true){
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengupdate</div>");
                }else{
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal mengupdate</div>");
                }
            }
            header("Location: ?page=okcomputer");
        }
        
    }

    private function adddana(){
        if(!empty($this->input->post('add_laporan_dana'))){
            $jenis=$this->input->post('jenis_laporan');
            $perihal=$this->input->post('perihal_dana');
            $sejumlah=$this->input->post('jumlah_dana');
            $tanggal_pembayaran=$this->input->post('date_pembayaran');
            $date_now=date('Y-m-d');
            if($this->dana_model->adddana($jenis, $perihal, $sejumlah, $tanggal_pembayaran, $date_now)==true){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Laporan Dana berhasil disimpan</div>");
            }else{
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal menambahkan laporan dana</div>");
            }
        }
        header("Location: ?page=okcomputer");
    }

    private function addarsip(){
        if(!empty($this->input->post('nama_arsip'))){
      $name=$this->input->post('nama_arsip');
      $type=$this->input->post('type_arsip');
      $date=date("Y-m-d");
      if(!empty($this->input->post('idevents'))){
        $idevents = $this->input->post('idevents');
      }


      $target_dir="archive/";
      if(!is_dir('archive')){
        mkdir('./archive');
      }
      if(!is_dir('archive/acara')){
        mkdir('./archive/acara');
      }
      if(!is_dir('archive/rapat')){
        mkdir('./archive/rapat');
      }
      if(!is_dir('archive/none')){
        mkdir('./archive/none');
      }

      if($type==0){
        if(!is_dir('archive/none')){
            mkdir('./archive/none');
        }
        $config['upload_path']          = './archive/none';
      }else if($type==1){
        if(!is_dir('archive/acara')){
            mkdir('./archive/acara');
        }
        $config['upload_path']          = './archive/acara/';
      }else if($type==2){
        if(!is_dir('archive/rapat')){
            mkdir('./archive/rapat');
        }
        $config['upload_path']          = './archive/rapat';
      }

        $config['filename']             =$name;
        $config['encrypt_name']         = TRUE;
        $config['allowed_types']        = 'docx|doc|pdf|xlsx|xls|xml';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
         if ( ! $this->upload->do_upload('arsip'))
                {
                        $error = array('error' => $this->upload->display_errors());
                         $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>".$error['error']."</div>");
                }
                else
                {

                        $data = array('upload_data' => $this->upload->data());

                        if($type==0){
                            if($this->arsip_model->addarsip($name, $date, $data['upload_data']['file_name'])==true){
                                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menambahkan arsip</div>");
                            }
                        }else if($type==1){
                            if($this->arsip_model->addarsipacara($name, $date, $data['upload_data']['file_name'], $idevents)==true){
                                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menambahkan arsip acara</div>");
                            }
                        }else if($type==2){
                            if($this->arsip_model->addarsiprapat($name, $date, $data['upload_data']['file_name'], $idevents)==true){

                                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menambahkan arsip rapat</div>");
                            }
                        }
                }
                header("Location: ?page=okcomputer");
            }
    }

    private function replyfeedback(){
        if(!empty($this->input->post('sendfeedback'))){
            $isifeedback=$this->input->post('isifeedback');
            $email=$this->input->post('emailfeedback');
            $this->load->library('mymail');
            
            
            if($this->mymail->replyfeedback($email, $isifeedback)){
                $date=date('Y-m-d H:i');
                if($this->feedback_model->replyfeedback($this->session->userdata('username'), $email, $isifeedback, $date)==true){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengirim email</div>");
                    header("Location: ?page=okcomputer");
                }else{
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal mengirim email</div>");
                    header("Location: ?page=okcomputer");
                }
                }else{
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Gagal mengirim email</div>");
                    header("Location: ?page=okcomputer");
                }
        }
    }

    public function feedback($email=FALSE, $clearall=FALSE){
        $this->replyfeedback();
        $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');
        if($email!=FALSE){
            
            if($email=="_-_" && $clearall=="clearall"){
                $this->feedback_model->clearfeedbackall();
                redirect(base_url(ADMIN_PAGE.'/messages'));
            }else{
                $emailclear=str_replace("_dot_", ".", $email);
            $emailclear=str_replace("_at_", "@", $emailclear);
            $this->feedback_model->clearfeedback($emailclear);
            }
            $data['email']=$email;
            $this->load->view('admin/head',$data);
            $this->load->view('admin/feedback-detail',$data);
        }else{

            $this->load->view('admin/head',$data);
            $this->load->view('admin/feedback',$data);
        }
        
    }

    public function eventrapat($id=FALSE){
        $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        $this->addrapat();
        $this->editrapat();
        $this->delrapat();

        if($id==FALSE){
        $data['rapat']=$this->rapat_model->rapat();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/rapat',$data);
    }else{
        $data['rapat']=$this->rapat_model->rapat($id);

        $this->load->view('admin/head',$data);
        $this->load->view('admin/rapat-detail',$data);
    }

        
    }

    public function eventacara($id=FALSE){
        $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        $this->addacara();
        $this->editacara();
        $this->delacara();

        if($id==FALSE){
        $data['acara']=$this->acara_model->acara();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/acara',$data);
    }else{
        $data['acara']=$this->acara_model->acara($id);

        $this->load->view('admin/head',$data);
        $this->load->view('admin/acara-detail',$data);
    }
}

    private function updateabsenacara(){
        if(!empty($this->input->post('simpan_absen_acara'))){
            $count=0;
            $username = $this->input->post('username');
            $absen = $this->input->post('absen');
            $id_acara = $this->input->post('id_acara');
            foreach ($this->input->post('absen') as $key => $value) {

                
                if($this->absen_model->updateabsenacara($id_acara, $username[$key], $absen[$key])){
                    $count++;
                }

                if($count==($key+1)){
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menyimpan</div>");
                    header("Location: ?page=okcomputer");

                }

            }
        }
    }

    public function absenacara($id=FALSE){
        $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        $this->updateabsenacara();
       
    if($id==FALSE){
        $this->load->view('errors/html/error_404');
    }else{
        $data['crew']=$this->absen_model->absenacara($id);
$data['id_acara']=$id;
        $this->load->view('admin/head',$data);
        $this->load->view('admin/acara-absen',$data);
    }

        
    }

    private function updateabsenrapat(){
        if(!empty($this->input->post('simpan_absen_rapat'))){
            $count=0;
            $username = $this->input->post('username');
            $absen = $this->input->post('absen');
            $id_acara = $this->input->post('id_rapat');
            foreach ($this->input->post('absen') as $key => $value) {

                
                if($this->absen_model->updateabsenrapat($id_acara, $username[$key], $absen[$key])){
                    $count++;
                }

                if($count==($key+1)){
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menyimpan</div>");
                    header("Location: ?page=okcomputer");

                }

            }
        }
    }

    public function absenrapat($id=FALSE){
        $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        $this->updateabsenrapat();
       
    if($id==FALSE){
        $this->load->view('errors/html/error_404');
    }else{
        $data['crew']=$this->absen_model->absenrapat($id);
$data['id_acara']=$id;
        $this->load->view('admin/head',$data);
        $this->load->view('admin/rapat-absen',$data);
    }

        
    }

    private function addjabatan(){
        if(!empty($this->input->post('add_jabatan'))){
            $jabatan=$this->input->post('jabatan');
            if($this->admin_model->addjabatan($jabatan)){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menambah</div>");
                header("Location: ?page=okcomputer");
            }
        }
    }

    private function deljabatan(){
        if(!empty($this->input->post('deletecrewstats'))){
            $id=$this->input->post('idcrewstats');
            if($this->crew_model->delcrewstatus($id)){
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menghapus</div>");
                header("Location: ?page=okcomputer");
            }else{
                $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Masih ada user yang menduduki jabatan ini</div>");
                header("Location: ?page=okcomputer");
            }
        }
    }

    public function crew(){
        $data['jabatan']=$this->session->userdata('jabatan');
      $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        if($this->session->userdata('jabatan')=="dosen" || $this->session->userdata('jabatan')=="admin"){
        

        $this->addcrew();
        $this->editcrew();
        $this->nonactivecrew();
        $this->activecrew();
        $this->delcrew();
        $this->addjabatan();
        $this->deljabatan();

        $data['crewadmin']=$this->crew_model->crew();
        $data['crew']=$this->crew_model->crewstatus();
        $data['jabatans']=$this->crew_model->jabatan();

        $this->load->view('admin/head', $data);
        $this->load->view('admin/crew', $data);
        }else{
            $this->load->view('errors/html/error_404');
        }
    }

    public function dashboard(){

        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');
        if($this->profile_model->checkingprofile()->num_rows()!=0){

            $data['visi'] = $this->profile_model->profile()->result()[0]->visi;
            $data['misi'] = $this->profile_model->profile()->result()[0]->misi;
            $data['rencana'] = $this->profile_model->profile()->result()[0]->program_kerja;
               
        }
        $this->setvision();
        $this->setmision();
        $this->setrencana();

        //if(!empty($this->input->post('berita'))){
        //    $this->addarticles();
        //}
        //if(!empty($this->input->post('add_laporan_dana'))){
        //    $this->adddana();
        //}
        //if(!empty($this->input->post('add_acara'))){
        //    $this->addacara();
        //}
        //if(!empty($this->input->post('add_rapat'))){
        //    $this->addrapat();
        //}
        $data['feedbacktotal']=$this->feedback_model->feedback()->num_rows();
        $data['newstotal']=$this->news_model->news()->num_rows();
        $data['crewtotal']=$this->crew_model->crew()->num_rows();
        $data['gallerytotal']=$this->gallery_model->foto()->num_rows();

        $data['admin_page']=$this->admin_page;
        $this->load->view('admin/head', $data);
        $this->load->view('admin/dashboard', $data);
    }

    public function post($page=FALSE){
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');
        $data['admin_page']=$this->admin_page;
        $this->addarticles();
        $this->editarticles();
        if(!empty($this->input->post('id'))){
            $exploded =  explode(":", $this->input->post('id'));
            $iddel = $exploded[0];
            $typedel = $exploded[1];
            if($typedel=="none"){
                $this->news_model->delberita($iddel);
            }else if($typedel=="acara"){
                $this->news_model->delberitaacara($iddel);
            }else if($typedel=="rapat"){
                $this->news_model->delberitarapat($iddel);
            }
        }

        

        if($page!=FALSE){
            if($page!="add"){
            $pageexplode=explode("-", $page);
            $type=$pageexplode[0];
            if(!empty($pageexplode[1])){
               $id=$pageexplode[1];
                if($this->news_model->berita($type, $id)->num_rows()==0){
                    redirect(base_url($this->admin_page));
                }
                $data['post']=$this->news_model->berita($type, $id);
                $this->load->view('admin/head',$data);
                $this->load->view('admin/post-detail',$data);
            }else{
                $data['berita']=$this->news_model->berita($type);
                $this->load->view('admin/head',$data);
                $this->load->view('admin/post',$data);
            }
        }else{
            $this->load->view('admin/head',$data);
                $this->load->view('admin/add-post',$data);
        }

        }else{
            $data['berita']=$this->news_model->berita();
            $this->load->view('admin/head',$data);
            $this->load->view('admin/post',$data);
        }
    }

    public function messages($username=FALSE, $clearall=FALSE){
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        $this->addmessages();

        if(!empty($this->input->post('add_pesan'))){
            $from = $this->session->userdata('username');
            $to = $this->input->post('kepada_pesan');
            $isi = $this->input->post('isi_pesan');
            $date_send = date('Y-m-d H:i');
            echo "<h1>Hhellow Wworld</h1>";
            if($this->messages_model->addmessages($from, $to, $isi, $date_send)==true){

                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengirim pesan</div>");
                header("Location: ?page=okcomputer");
            }
        }

        $data['admin_page']=$this->admin_page;
        if($username==FALSE){
            //if($clearall=="clearall"){
            //    $this->messages_model->clearmessagesall();
            //}


            $this->load->view('admin/head', $data);
            $this->load->view('admin/messages', $data);
        }else{
            if($this->messages_model->headmessages($username)->num_rows()==0){
                if($username == "_-_"){
                    if($clearall=="clearall"){
                        $this->messages_model->clearmessagesall();
                    }
                    redirect(base_url(ADMIN_PAGE.'/messages'));
                    
                }else{
                    redirect(base_url(ADMIN_PAGE.'/messages'));
                }
                
            }else{
            $this->messages_model->clearmessage($username);
            $data['usernameMe']=$this->session->userdata('username');
            $data['usernameTo']=$username;
            $this->load->view('admin/head', $data);
            $this->load->view('admin/messages-detail', $data);
            }
        }


    }

    public function funds($bulan=FALSE, $tahun=FALSE, $jenis=FALSE, $export=FALSE){
         if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        $this->deldana();

        if(!empty($this->input->post('add_laporan_dana'))){
            $this->adddana();
        }



        $data['admin_page']=$this->admin_page;
        if(!empty($this->input->post('add_arsip'))){
            $this->addarsip();
        }
        if($jenis==FALSE && $tahun==FALSE && $bulan==FALSE){
            $data['periodedana']=$this->dana_model->periodedana();
            $this->load->view('admin/head',$data);
            $this->load->view('admin/dana',$data);
        }else{
            if($jenis=="masuk"){
                $data['dana']=$this->dana_model->dana('masuk', $bulan, $tahun);
                $this->load->view('admin/head',$data);
            $this->load->view('admin/dana-detail',$data);
            }else if($jenis=="keluar"){
                $data['dana']=$this->dana_model->dana('keluar', $bulan, $tahun);
                $this->load->view('admin/head',$data);
            $this->load->view('admin/dana-detail',$data);
            }else if($jenis==FALSE || $jenis=="all"){
                $data['dana']=$this->dana_model->dana('all', $bulan, $tahun);
                if($export=="excel"){
                    $this->excelDana($this->dana_model->dana('all', $bulan, $tahun));
                }
                $this->load->view('admin/head',$data);
            $this->load->view('admin/dana-detail',$data);
            }
        }




    }

    public function archive($type=FALSE){


        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');

        if(!empty($this->input->post('add_arsip'))){
            $this->addarsip();
        }

        $this->delarsip();


        if($type==FALSE){
            foreach ($this->arsip_model->arsip()->result() as $key => $value) {
                $newValue[$key]=new stdClass();
                $newValue[$key]->id=$value->id;
                $newValue[$key]->title=$value->title;
                $newValue[$key]->file=$value->file;
                $newValue[$key]->date_upload=$value->date_upload;
                if($value->type_events=="none"){
                    $newValue[$key]->type_events="none";
                     $newValue[$key]->events="-";
                }else if($value->type_events=="acara"){
                    $newValue[$key]->type_events="acara";
                    $newValue[$key]->events=$this->acara_model->acara($value->id_events)->result()[0]->nama_acara;
                }else if($value->type_events=="rapat"){
                    $newValue[$key]->type_events="rapat";
                    $newValue[$key]->events=$this->rapat_model->rapat($value->id_events)->result()[0]->topik;
                }
            }
            if(($this->arsip_model->arsip()->num_rows()!=0)){

                $data['arsip']=$newValue;
            }
        }else if($type=="none"){
            $data['arsip']=$this->arsip_model->arsip("none")->result();
        }else if($type=="acara"){
            $data['arsip']=$this->arsip_model->arsip("acara")->result();
        }else if($type=="rapat"){
            $data['arsip']=$this->arsip_model->arsip("rapat")->result();
        }




        $data['admin_page']=$this->admin_page;
        $this->load->view('admin/head', $data);
        $this->load->view('admin/archive', $data);
    }

    public function index()
    {
        if (!empty($this->input->post('admin_login')) && !empty($this->input->post('password')) && !empty($this->input->post('password'))) {
            if (empty($this->session->userdata('username'))) {
                if ($this->admin_model->login($this->input->post('username'), md5($this->input->post('password')))>0) {
                    $newDataLogin=array(
                        'username'=>$this->input->post('username'),
                        'jabatan'=>$this->admin_model->profile($this->input->post('username'))->result()[0]->jabatan
                  );
                    $this->session->set_userdata($newDataLogin);
                } else {
                    echo "Username atau Password Salah!";
                }
            }
        }

        if ($this->session->has_userdata('username')) {
            redirect(base_url($this->admin_page).'/dashboard', 'refresh');
        } else {
            $this->load->view('admin/login');
        }
    }

    private function addalbum(){

        if(!empty($this->input->post('album_new') && $this->input->post('album_new')!="" && empty($this->input->post('album_option')))){

            if($this->gallery_model->addalbum($this->input->post('album_new'))){

                return $this->gallery_model->lastalbum()->result()[0]->id;

            }
        }
        return false;
    }

     private function delfoto(){
            if(!empty($this->input->post('hapus'))){
                if($this->gallery_model->delfoto($this->input->post('id_foto'))==true){
                    $namafile=$this->input->post('file_foto');
                     $path = './image/gallery/'.$namafile;
                        if(file_exists($path)==true){
                          unlink($path);
                        }else{
                          echo "File tidak ada";
                        }
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menghapus</div>");
                    header("Location: ?page=okcomputer");
                }
            }
     }

     private function delalbum(){
            if(!empty($this->input->post('delalbum'))){
                foreach ($this->gallery_model->foto($this->input->post('id_album'))->result() as $key => $value) {

                        $namafile=$value->file;
                        $path = './image/gallery/'.$namafile;
                        if(file_exists($path)==true){
                          unlink($path);
                        }else{
                          echo "File tidak ada";
                        }
                    }

                if($this->gallery_model->delalbum($this->input->post('id_album'))==true){

                                        $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menghapus</div>");
                    header("Location: ?page=okcomputer");
                }
            }
     }

     private function addfoto(){

        if(!empty($this->input->post('album_new') && $this->input->post('album_new')!="" || !empty($this->input->post('album_option')))){


            $config['upload_path']          = './image/gallery';
            $config['encrypt_name']         = TRUE;
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 100000;
            $config['overwrite']            = 1;

            $this->load->library('upload', $config);

            $images = array();  
            $files=$_FILES['foto'];
            
            $album = $this->addalbum();
            
            foreach ($files['name'] as $key => $image) {
                
                $_FILES['images']['name']= $files['name'][$key];
                $_FILES['images']['type']= $files['type'][$key];
                $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images']['error']= $files['error'][$key];
                $_FILES['images']['size']= $files['size'][$key];

                $filename = "gambar-".$image;
                $images[] = $filename;
                $config['file_name'] = $filename;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('images')) {
                    
                    $fotonya=$this->upload->data();
                    if($album==false){
                        $this->gallery_model->addfoto($fotonya['file_name'], $this->input->post('album_option'), date('Y-m-d'));
                    }else{
                        $this->gallery_model->addfoto($fotonya['file_name'], $album, date('Y-m-d'));
                    }
            

                } else {
                     $error = array('error' => $this->upload->display_errors());
                }
            }
            header("Location: ?page=okcomputer");
        }
    }


    public function gallery($id=FALSE){
        $data['admin_page']=$this->admin_page;
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');
        $data['album']=$this->gallery_model->album();

        if($id!=FALSE){
            $data['foto']=$this->gallery_model->foto($id);
        }


        
        $this->addfoto();
        $this->delfoto();
        $this->delalbum();


        $this->load->view('admin/head',$data);
        $this->load->view('admin/gallery',$data);
    }

    private function changetheme(){
        if(!empty($this->input->post('setting_theme'))){
            $this->theme_model->netralisir();
            $this->theme_model->changetheme($this->input->post('theme'));
            header("Location: ?page=okcomputer");

        }
    }

    private function addslide(){
        if(!empty($this->input->post('addslide'))){
            $config['upload_path']          = './image/slide';
            $config['encrypt_name']         = TRUE;
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 100000;
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('image_slide')){
                $error = array('error' => $this->upload->display_errors());
            }else{
                $fotonya=$this->upload->data();
                if(!empty($this->input->post('post'))){
                    $link = $this->input->post('post');
                }else{
                    if(!empty($this->input->post('link_slide'))){
                        $link=$this->input->post('link_slide');
                    }else{
                        $link="";
                    }
                }
                
                $this->slide_model->addslide($fotonya['file_name'], $link, $this->input->post('ket_slide'));
            }
        }
    }

    private function delslide(){
            if(!empty($this->input->post('delslide'))){
                if($this->gallery_model->delslide($this->input->post('id_slide'))==true){
                    $namafile=$this->input->post('file_foto');
                     $path = './image/slide/'.$namafile;
                        if(file_exists($path)==true){
                          unlink($path);
                        }else{
                          echo "File tidak ada";
                        }
                    $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menghapus</div>");
                    header("Location: ?page=okcomputer");
                }
            }
     }

    public function settings(){
         $data['admin_page']=$this->admin_page;
         $data['jabatan']=$this->session->userdata('jabatan');
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }

        $this->changetheme();
        $this->addslide();
        $this->delslide();
        
        $data['theme']=$this->theme_model->theme();
        $data['slide']=$this->slide_model->slide();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/settings',$data);
    }

     private function delnominasi(){

        if(!empty($this->input->post('id'))){
            
            $this->registration_model->delnominasi($this->input->post('id'));
        }
    }

    private function importnominasi(){
        if(!empty($this->input->post('import'))){
            $id=$this->input->post('id_import');
            if($this->registration_model->nonaktifnominasi($id)==true){
                $nama = $this->registration_model->nominasiall($id)->result()[0]->nama;
                $username=$this->input->post('username');
                $password=md5($this->input->post('password_anggota'));
                $id_jabatan=$this->input->post('jabatan_anggota');
                $id_sabagai=$this->input->post('sebagai_anggota');
                if($this->admin_model->addadmin($username, $nama, $password, $id_sabagai, $id_jabatan)==true){
                     $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil mengimport</div>");
                                header("Location: ?page=okcomputer");
                }
            }
        }
    }

    public function nominasi(){
        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }
        $data['jabatan']=$this->session->userdata('jabatan');
        if($this->session->userdata('jabatan')=="dosen" || $this->session->userdata('jabatan')=="admin"){
        $data['jabatan']=$this->session->userdata('jabatan');
        $this->delnominasi();
        $this->importnominasi();
        $data['crew']=$this->crew_model->crewstatus();
        $data['jabs']=$this->crew_model->jabatan();
        $data['admin_page']=$this->admin_page;
        $data['nominasi']=$this->registration_model->nominasi();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/nominasi',$data);
        }else{
            $this->load->view('errors/html/error_404');
        }
    }

    private function deljurnal(){
        if($this->session->userdata('jabatan')=="admin"){
        if(!empty($this->input->post('id'))){
            $file = $this->jurnal_model->jurnal($this->input->post('id'))->result()[0]->file;
            $this->jurnal_model->deljurnal($this->input->post('id'));
             $namafile=$file;
                     $path = './jurnal/'.$namafile;
                        if(file_exists($path)==true){
                          unlink($path);
                        }else{
                          echo "File tidak ada";
                        }
        }
    }else{
        $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Tidak dapat menghapus</div>");
        header("Location: ?page=okcomputer");
    }
    }

    private function addjurnal(){
        if(!empty($this->input->post('addjurnal'))){
            $title=$this->input->post('title');
            $abstract = $this->input->post('abstract');
            $date = date('Y-m-d');

             $config['upload_path']          = './jurnal';
        $config['filename']             =$title;
        $config['encrypt_name']         = TRUE;
        $config['allowed_types']        = 'docx|doc|pdf';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
         if ( ! $this->upload->do_upload('jurnal'))
                {
                    $error = array('error' => $this->upload->display_errors());
                         $this->session->set_flashdata("notifikasi", "<div class='alert alert-danger' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>".$error['error']."</div>");
                }
        else{
            $data = array('upload_data' => $this->upload->data());

                        if($type==0){
                            if($this->jurnal_model->addjurnal($title, $abstract, $data['upload_data']['file_name'], $date)==true){
                                $this->session->set_flashdata("notifikasi", "<div class='alert alert-success' role='alert' style='position:fixed;right:10px;top:70px;z-index:1000;' id='notifikasi'>Berhasil menambahkan jurnal</div>");
                            }
                        }
            header("Location: ?page=okcomputer");
        }
    }
}
    public function jurnal(){

        if(!$this->session->has_userdata('username')){
            redirect(base_url($this->admin_page), 'refresh');
        }

        if($this->session->userdata('jabatan')=="dosen" || $this->session->userdata('jabatan')=="admin"){

        $data['jabatan']=$this->session->userdata('jabatan');
        $data['admin_page']=$this->admin_page;
        $data['jurnal']=$this->jurnal_model->jurnal();

        $this->addjurnal();
        if($this->session->userdata('jabatan')=="admin"){
            $this->deljurnal();
        }
        $this->load->view('admin/head',$data);
        $this->load->view('admin/jurnal',$data);
    }else{
        $this->load->view('errors/html/error_404');
    }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}

