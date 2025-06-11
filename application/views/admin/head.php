<!DOCTYPE html>
<html lang="en">

<head>
  <title>HIMIF KALBIS</title>
  <link rel="icon" href="<?php echo base_url(); ?>image/logo/logo.png" sizes="16x16">
  <?php echo($this->theme->current_theme_admin()); ?>
  <link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/bootstrap-table.css" rel="stylesheet">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>css/bootssummernote.css" rel="stylesheet">

  <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap-table.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/summernote.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $('#automodal').modal('show');
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 200
      });
    });
  </script>
  <script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>

  <?php $this->load->view('ajax'); ?>

</head>

<body>
  <?php
              //echo kunci();
              //echo upload_picture();
  						//echo update_ket();
  						//echo add_post();
  						//echo add_dana();
  						//echo add_acara();
  						//echo add_rapat();
  						//echo add_donasi();

    $menu['dashboard']="";
    $menu['archive']="";
    $menu['funds']="";
    $menu['messages']="";
    $menu['feedback']="";
    $menu['post']="";
    $menu['event']="";
    $menu['meeting']="";
    $menu['absenmeeting']="";
    $menu['absenevent']="";
    $menu['crew']="";
    $menu['gallery']="";
    $menu['nominasi']="";
    $menu['jurnal']="";
    $in['document']="";
    $in['event']="";
    $in['absen']="";


    if(strtolower($this->uri->segment(2))=="dashboard"){
      $menu['dashboard']="active";
    }elseif(strtolower($this->uri->segment(2))=="archive"){
      $menu['archive']="active-collapse";
      $in['document']="in";
    }elseif(strtolower($this->uri->segment(2))=="funds"){
      $menu['funds']="active-collapse";
      $in['document']="in";
     }elseif(strtolower($this->uri->segment(2))=="messages"){
      $menu['messages']="active";
    }elseif(strtolower($this->uri->segment(2))=="feedback"){
      $menu['feedback']="active";
    }elseif(strtolower($this->uri->segment(2))=="post"){
      $menu['post']="active";
    }elseif(strtolower($this->uri->segment(2))=="eventacara"){
      $menu['event']="active-collapse";
      $in['event']="in";
    }elseif(strtolower($this->uri->segment(2))=="eventrapat"){
      $menu['meeting']="active-collapse";
      $in['event']="in";
    }elseif(strtolower($this->uri->segment(2))=="absenmeeting"){
      $menu['absenmeeting']="active-collapse";
      $in['absen']="in";
    }elseif(strtolower($this->uri->segment(2))=="absenevent"){
      $menu['absenevent']="active-collapse";
      $in['absen']="in";
    }elseif(strtolower($this->uri->segment(2))=="crew"){
      $menu['crew']="active";
    }elseif(strtolower($this->uri->segment(2))=="gallery"){
      $menu['gallery']="active";
    }elseif(strtolower($this->uri->segment(2))=="nominasi"){
      $menu['nominasi']="active";
    }elseif(strtolower($this->uri->segment(2))=="jurnal"){
      $menu['jurnal']="active";
    }

  ?>
  <div id="wrapper">


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" style="max-width:100px;" data-toggle="collapse" data-target="#navbar-ex1-collapse"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url($admin_page); ?>" id="nav-pandan">HIMIF KALBIS</a>
      </div>
      <!-- Top Menu Items -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right top-nav">
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <span id="messagescounternotif"></span>
              <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown-dropdown" id="messagesnotif">
            </ul>
          </li>
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <span id="feedbackcounternotif"></span>
              <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown-dropdown" id="feedbacknotif">
            </ul>
          </li>
          <?php if($this->session->userdata('jabatan')=="admin"){ ?>
          <!--<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php //echo pemberitahuan_counter(); ?>
              <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown-dropdown">
              <?php //echo pemberitahuan_nav_admin(); ?>

            </ul>
          </li>-->
          <?php } ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-cog"></span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url(); ?>">
                  <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> View</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo base_url($admin_page.'/settings'); ?>">
                  <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Setting</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo base_url($admin_page.'/logout'); ?>">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

      <div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="<?php echo $menu['dashboard'];?>">
            <a href="<?php echo base_url($admin_page); ?>">
              <span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
          </li>
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#document">
              <span class="glyphicon glyphicon-folder-open"></span> Document</a>
            <ul id="document" class="collapse <?php echo $in['document']; ?>">
              <li class="<?php echo $menu['archive'];?>">
                <a href="<?php echo base_url($admin_page.'/archive'); ?>">Archive</a>
              </li>
              <li class="<?php echo $menu['funds'];?>">
                <a href="<?php echo base_url($admin_page.'/funds'); ?>">Funds</a>
              </li>
            </ul>
          </li>
           <li class="<?php echo $menu['messages'];?>">
            <a href="<?php echo base_url($admin_page.'/messages'); ?>">
              <span class="glyphicon glyphicon-comment"></span> Messages</a>
          </li>
           <li class="<?php echo $menu['feedback'];?>">
            <a href="<?php echo base_url($admin_page.'/feedback'); ?>">
              <span class="glyphicon glyphicon-asterisk"></span> Feedback</a>
          </li>
          <li class="<?php echo $menu['post'];?>">
            <a href="<?php echo base_url($admin_page.'/post'); ?>">
              <span class="glyphicon glyphicon-file"></span> Post</a>
          </li>
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#events">
              <span class="glyphicon glyphicon-road"></span> Event/Meeting</a>
            <ul id="events" class="collapse <?php echo $in['event']; ?>">
              <li class="<?php echo $menu['event'];?>">
                <a href="<?php echo base_url($admin_page.'/eventacara'); ?>">Event</a>
              </li>
              <li class="<?php echo $menu['meeting'];?>">
                <a href="<?php echo base_url($admin_page.'/eventrapat'); ?>">Meeting</a>
              </li>
            </ul>
          </li>
          
          <!--<li>-->
          <!--<a href="javascript:;" data-toggle="collapse" data-target="#absen">-->
          <!--<span class="glyphicon glyphicon-th-list"></span> Absen</a>-->
          <!--<ul id="absen" class="collapse <?php echo $in['absen']; ?>">-->
          <!--<li class="<?php echo $menu['absenevent'];?>">-->
          <!--<a href="<?php echo base_url($admin_page.'/absenacara'); ?>">Event</a>-->
          <!--</li>-->
          <!--<li class="<?php echo $menu['absenmeeting'];?>">-->
          <!--<a href="<?php echo base_url($admin_page.'/absenrapat'); ?>">Meeting</a>-->
          <!--</li>-->
          <!--</ul>-->
          <!--</li>-->

          <?php if($jabatan=="admin"){ ?>
          <li class="<?php echo $menu['crew'];?>">
            <a href="<?php echo base_url($admin_page.'/crew'); ?>">
              <span class="glyphicon glyphicon-user"></span> Crew</a>
          </li>
          <?php } ?>
          <li class="<?php echo $menu['gallery'];?>">
            <a href="<?php echo base_url($admin_page.'/gallery'); ?>">
              <span class="glyphicon glyphicon-picture"></span> Gallery</a>
          </li>
          <?php if($jabatan=="admin"){ ?>
          <li class="<?php echo $menu['nominasi'];?>">
            <a href="<?php echo base_url($admin_page.'/nominasi'); ?>">
              <span class="glyphicon glyphicon-knight"></span> Registration</a>
          </li>
          <?php } ?>
          <?php if($jabatan=="dosen" || $jabatan=="admin"){ ?>
          <li class="<?php echo $menu['jurnal'];?>">
            <a href="<?php echo base_url($admin_page.'/jurnal'); ?>">
              <span class="glyphicon glyphicon-paperclip"></span> Journal/Paper</a>
          </li>
          <?php } ?>

        </ul>
        <div style="clear: both;"></div>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
